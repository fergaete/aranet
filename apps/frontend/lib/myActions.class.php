<?php 

/**
 * myActions class
 *
 * @package    aranet
 * @subpackage frontend
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: myActions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class myActions extends sfActions
{
  
  /**
   * executes index action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeIndex()
  {
    return $this->forward($this->getModuleName(), 'list');
  }
  
  /**
   * executes listByTag action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeListByTag()
  {
    $c = new Criteria();
    $this->tag = $this->getRequestParameter('tag');
    $c->add(TagPeer::NAME, $this->tag);
    $c->addJoin(TagPeer::ID, TaggingPeer::TAG_ID);
    $model = $this->getModel();
    $table = 'aranet_' . $this->getModuleName();
    if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
      $table .= '_item';
    }
    $modelpeer = $model.'Peer';
    $c->add(TaggingPeer::TAGGABLE_MODEL, $model);
    $c->addJoin(TaggingPeer::TAGGABLE_ID, $table . '.id', Criteria::LEFT_JOIN);
    $this->processList($c);
    $this->setTemplate('list');
  }

  /**
   * executes list action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeList()
  {
    $this->processList(new Criteria());
  }

  /**
   * executes create action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate()
  {
    return $this->forward($this->getModuleName(), 'edit');
  }

  /**
   * executes show action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeShow()
  {
    $this->getUser()->setAttribute('index', 0);
    $object = $this->getModuleName();
    $model = $this->getModel();
    if (in_array($object, array('expense', 'income', 'cash'))) {
      $object .= '_item';
    }
    $this->$object = call_user_func(array($this, 'get'.$model));
    return sfView::SUCCESS;
  }

  /**
   * executes edit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit()
  {
    $this->getUser()->setAttribute('index', 0);
    $object = $this->getModuleName();
    $model = $this->getModel();
    if (in_array($object, array('expense', 'income', 'cash'))) {
      $object .= '_item';
    } elseif ($object == 'file') {
      $object = 'sf_propel_file_storage_info';
    }
    $this->$object = call_user_func(array($this, 'get'.$model));
    return sfView::SUCCESS;
  }

  /**
   * executes delete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDelete()
  {
    $select = $this->getRequestParameter('select', array());
    if ($id = $this->getRequestParameter('id')) {
      $select[] = $id;
    }
    $model = $this->getModel();
    $modelpeer = $model.'Peer';
    foreach ($select as $item) {
      if ($item != 0) {
        $object = call_user_func($modelpeer."::retrieveByPk", $item);
        $this->forward404Unless($object);
        $object->delete();
      }
    }

    if ($this->getRequest()->isXmlHttpRequest()) {
      return sfView::SUCCESS;
    } else {
      $this->redirect($this->getModuleName().'/list');
    }
  }

  /**
   * handles update errors
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function handleErrorUpdate()
  {
    $this->forward($this->getModuleName(), 'edit');
  }

  /**
   * handles update errors
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function handleErrorEdit()
  {
    $this->executeEdit();
    return sfView::SUCCESS;
  }

  /**
   * returns the model from the module name
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  private function getModel()
  {
    switch ($this->getModuleName()) {
      case 'user':
        $model = 'sfGuardUserProfile';
        break;
      case 'file':
        $model = 'sfPropelFileStorageInfo';
        break;
      case 'setting':
        $model = 'sfSetting';
        break;
      default:
        $model = ucfirst($this->getModuleName());
        if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
          $model .= 'Item';
        }
    }
    return $model;
  }

  /**
   * process list action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function processList($c, $peerMethod = 'doSelect') {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll($this->getModuleName() . '/filters');
    // pager
    $model = $this->getModel();
    if ($this->getRequest()->hasParameter('n'))
    {
      $n = $this->getRequestParameter('n');
      if ($n == -1) {
          $n = 10000;
      }
      $this->getUser()->setAttribute($this->getModuleName() . '/n', $n);
    }
    $n = $this->getUser()->getAttribute($this->getModuleName() . '/n', 20);

    $this->pager = new sfPropelPager($model, $n);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->setPeerMethod($peerMethod);
    $this->pager->init();
  }
  
  /**
   * process filters
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function processFilters ()
  {
    if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
    {
      $filters = $this->getRequestParameter('filters');
      $this->getUser()->getAttributeHolder()->removeNamespace($this->getModuleName().'/filters');
      $this->getUser()->getAttributeHolder()->add($filters, $this->getModuleName().'/filters');
    }
  }
  
  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortColumn()
  {
    if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
      $order_column = $this->getModuleName().'_item_date';
    } else {
      $order_column = $this->getModuleName().'_date';
    }
    return $order_column;
  }

  /**
   * returns order type
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getOrderType()
  {
    return 'asc';
  }

  /**
   * process sort
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function processSort ()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), $this->getModuleName().'/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), $this->getModuleName().'/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getSortColumn(), $this->getModuleName().'/sort');
      $this->getUser()->setAttribute('type', $this->getOrderType(), $this->getModuleName().'/sort');
    }
  }

  /**
   * adds sort criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addSortCriteria ($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort'))
    {
      $model = $this->getModel();
      $table = 'aranet_' . $this->getModuleName();
      $modelpeer = $model.'Peer';
      $sort_column = call_user_func($modelpeer . '::translateFieldName', $sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, $this->getModuleName().'/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }
  
} // End myActions
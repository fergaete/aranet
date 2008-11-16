<?php 
class anActions extends sfActions
{
  /**
   * executes index action
   *
   * @param $request
   */
  public function executeIndex($request)
  {
    return $this->forward($this->getModuleName(), 'list');
  }

  /**
   * executes create action
   *
   * @param $request
   */
  public function executeCreate($request)
  {
    $this->forward($this->getModuleName(), 'edit');
  }

  /**
   * executes listByTag action
   *
   * @param $request
   */
  public function executeListByTag($request)
  {
      $this->tag = $request->getParameter('tag');
      $c = new Criteria();
      $c->add(TagPeer::NAME, $this->tag);
      $c->addJoin(TagPeer::ID, TaggingPeer::TAG_ID);
      $model = ucfirst($this->getModuleName());
      $table = 'aranet_' . $this->getModuleName();
      if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
          $model .= 'Item';
          $table .= '_item';
      }
      $modelpeer = $model.'Peer';
      $c->add(TaggingPeer::TAGGABLE_MODEL, $model);
      //TODO:
      $c->addJoin(TaggingPeer::TAGGABLE_ID, $table . '.id', Criteria::LEFT_JOIN);
      $this->processList($c);
      $this->setTemplate('list');
  }

  /**
   * executes list action
   *
   * @param $request
   */
  public function executeList($request)
  {
    $this->processList(new Criteria(), 'doSelect');
    return sfView::SUCCESS;
  }

  /**
   * process list action
   *
   * @param $request
   */
  protected function processList($c, $peerMethod = 'doSelect') {
    $this->processSort();

    $this->processFilters();
    $this->filters = $this->getUser()->getAttributeHolder()->getAll($this->getModuleName() . '/filters');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);

    // pager
    if ($this->getModuleName() != 'user' && $this->getModuleName() != 'file') {
      $model = ucfirst($this->getModuleName());
    } else {
      if ($this->getModuleName() == 'user') {
        $model = 'sfGuardUserProfile';
      } else {
        $model = 'sfPropelFileStorageInfo';
      }
    }
    if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
        $model .= 'Item';
    }
    if ($this->getRequest()->hasParameter('n'))
    {
      $n = $this->getRequestParameter('n');
      if ($n == -1) {
          $n = 10000;
      }
      $this->getUser()->setAttribute($this->getModuleName() . '/n', $n);
    }
    $n = $this->getUser()->getAttribute($this->getModuleName() . '/n', 20);

    $this->pager = call_user_func_array($model . 'Peer::getPager', array($this->getRequestParameter('page', 1), $peerMethod, $n, $c));
  }
 
  /**
   * process filter attributes
   */
  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
    {
      $filters = $this->getRequestParameter('filters');
      $this->getUser()->getAttributeHolder()->removeNamespace($this->getModuleName().'/filters');
      $this->getUser()->getAttributeHolder()->add($filters, $this->getModuleName().'/filters');
    }
  }
  
  /**
   * process sort attributes
   */
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), $this->getModuleName().'/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), $this->getModuleName().'/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort')) {
      $this->getUser()->setAttribute('sort', $this->getSortColumn(), $this->getModuleName().'/sort');
      $this->getUser()->setAttribute('type', 'asc', $this->getModuleName().'/sort');
    }
  }
  
  /**
   * add sort criteria
   */
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort'))
    {
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
  
  /**
   * Simplest way to i18n
   */
  public function __()
  {
    $args = func_get_args();

    return call_user_func_array(array($this->getContext()->getI18N(), '__'), $args);
  }

  /**
   * Simplest way to flash vars
   */
  public function setFlash()
  {
    $args = func_get_args();

    return call_user_func_array(array($this->getUser(), 'setFlash'), $args);
  }
  
}
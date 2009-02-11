<?php 
class anActions extends sfActions
{
  
  /**
   * returns object from params
   *
   * @return Object
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getObject()
  {
    $model = $this->getModel();
    if ($this->getRequestParameter('id')) {
      $object = call_user_func($model.'Peer::retrieveByPk', $this->getRequestParameter('id'));
      $this->forward404Unless($object);
    } else {
      $object = new $model();
    }
    return $object;
  }  

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
   * executes stats action
   *
   * @param $request
   */
  public function executeStats($request)
  {
    $model = $this->getModuleObject();
    $this->$model = $this->getObject();
    return sfView::SUCCESS;
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
  * Executes list action
  *
  * @param sfRequest $request A request object
  */
  public function executeList($request)
  {
    $model = $this->getModel();
    $this->processFilters();
    $this->filters = $this->getUser()->getAttributeHolder()->getAll($this->getModuleName().'/filters');
    if (!$request->isXmlHttpRequest()) {
      $table = new yuiDataTable($model);
      $table->setColumns($this->getColumns(), $include_checkbox = true);
      $table->setDataSource('/'.$this->getModuleName().'/list?sort='.$this->getDefaultSortField().'&dir='.$this->getDefaultOrderDir().'&startIndex=0&results='.$this->getDefaultMaxPerPage().$this->addFiltersString());
      $this->table = $table;
      $filter = $model.'FormFilter';
      $this->filter_form = new $filter($this->filters);
      return sfView::SUCCESS;
    }
    sfConfig::set('sf_web_debug', false);
    $this->setLayout(false);
    $this->processSort();
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager = call_user_func($model.'Peer::getPager', $request->getParameter('startIndex'), 'doSelect', $request->getParameter('results', $this->getDefaultMaxPerPage()), $c);
    return 'Json';  
  }
  
  /**
   * returns max results per page
   *
   * @return integer
   * @author Pablo Sánchez
   */
  protected function getDefaultMaxPerPage()
  {
    return sfConfig::get('app_pager_default_max', 10);
  }
  
  /**
   * executes show action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeShow($request)
  {
    $object = $this->getModuleObject();
    $model = $this->getModel();
    if ($request->getParameter('deleted')) {
      sfPropelParanoidBehavior::disable();
    }
    $this->$object = call_user_func(array($this, 'getObject'));
    if ($request->getParameter('deleted')) {
      sfPropelParanoidBehavior::enable();
    }
    return sfView::SUCCESS;
  }

  /**
   * executes edit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit($request)
  {
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
   * @param $request
   */
  public function executeDelete($request)
  {
    
    $select = $request->getParameter('select', array());
    if ($id = $request->getParameter('id')) {
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
   * returns the object name from the module
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  private function getModuleObject()
  {
    switch ($this->getModuleName()) {
      case 'user':
        $model = 'sf_guard_user_profile';
        break;
      case 'file':
        $model = 'sf_file_storage_info';
        break;
      case 'setting':
        $model = 'sf_setting';
        break;
      default:
        $model = $this->getModuleName();
        if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
          $model .= '_item';
        }
    }
    return $model;
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
    
    $model = $this->getModel();
    // pager
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
    if ($this->getRequest()->hasParameter($this->getModuleName().'_filters'))
    {
      $filters = $this->getRequestParameter($this->getModuleName().'_filters');
      $this->getUser()->getAttributeHolder()->removeNamespace($this->getModuleName().'/filters');
      $this->getUser()->getAttributeHolder()->add($filters, $this->getModuleName().'/filters');
    }
  }
  
  /**
   * returns url parameters for filters
   *
   * @return string
   * @author Pablo Sánchez
   */
  protected function addFiltersString()
  {
    $filters_string = '';
    if ($this->filters && is_array($this->filters)) {
      foreach ($this->filters as $key => $filter) {
        if ($filter && is_array($filter)) {
          foreach ($filter as $k => $f) {
            $filters_string .= '&'.$this->getModuleName().'_filters['.$key.']['.$k.']='.$f;
          }
        } else {
          $filters_string .= '&'.$this->getModuleName().'_filters['.$key.']='.$filter;
        }
      }
    }
    return $filters_string;
  }
  
  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getDefaultSortField()
  {
    if (in_array($this->getModuleName(), array('expense', 'income', 'cash'))) {
      $order_column = $this->getModuleName().'_item_date';
    } else {
      $order_column = $this->getModuleName().'_date';
    }
    return $order_column;
  }

  /**
   * returns default order dir
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getDefaultOrderDir()
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
      $this->getUser()->setAttribute('dir', $this->getRequestParameter('dir', $this->getDefaultOrderDir()), $this->getModuleName().'/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getDefaultSortField(), $this->getModuleName().'/sort');
      $this->getUser()->setAttribute('dir', $this->getDefaultOrderDir(), $this->getModuleName().'/sort');
    }
  }

  /**
   * add sort criteria
   */
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, $this->getModuleName().'/sort'))
    {
      $model = $this->getModel();
      $modelpeer = $model.'Peer';
      if ($sort_column == 'name') {
        $sort_column = 'CONCAT(' . constant($modelpeer.'::CONTACT_FIRST_NAME').", ' ', " . constant($modelpeer.'::CONTACT_LAST_NAME').')';
      } else {
        $sort_column = call_user_func($modelpeer.'::translateFieldName', $sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      }

      if ($this->getUser()->getAttribute('dir', null, $this->getModuleName().'/sort') == 'asc')
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
 
  public function executeRpc($request)
  {
    // Caso especial para algunos objetos
    $column = $request->getParameter('editColumn');
    $model = $this->getModel();
    if ($request->getParameter('oldData')) {
      if ($column != 'name') {
        $column = $this->getColumnName($column);
        $object = call_user_func($model.'Peer::getOneBy', $column, $request->getParameter('oldData'));
      } else {
        $object = call_user_func($model.'Peer::retrieveByName', $request->getParameter('oldData'));
      }
      if ($object) {
        if ($column != 'name') {
          $setter = $this->forgeMethodName('set', $request->getParameter('editColumn'));
        } else {
          $setter = 'setName';
        }
        if (is_callable(array($object, $setter))) {
          call_user_func(array($object, $setter), $request->getParameter('newData'));
          $object->save();
          return sfView::NONE;
        }
      }
    }
    $this->forward404();
  }
  
  /**
   * Returns getter / setter name for requested column.
   * 
   * @author  Tristan Rivoallan 
   * @param   BaseObject  $node
   * @param   string      $prefix     get|set|...
   * @param   string      $column     from|to
   */
  private function forgeMethodName($prefix, $column)
  {
    $model = $this->getModel();
    $method_name = sprintf('%s%s', $prefix, call_user_func($model.'Peer::translateFieldName', $column, 
                                                                        BasePeer::TYPE_FIELDNAME, 
                                                                        BasePeer::TYPE_PHPNAME));
    return $method_name;
  }
  /**
   * Returns getter / setter name for requested column.
   * 
   * @author  Tristan Rivoallan 
   * @param   BaseObject  $node
   * @param   string      $prefix     get|set|...
   * @param   string      $column     from|to
   */
  private function getColumnName($column)
  {
    $model = $this->getModel();
    return call_user_func($model.'Peer::translateFieldName', $column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
  }
 
}
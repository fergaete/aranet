<?php 
class myActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward($this->getModuleName(), 'list');
  }

  public function executeListByTag()
  {
      $c = new Criteria();
      $this->tag = $this->getRequestParameter('tag');
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

  public function executeList()
  {
      $this->processList(new Criteria());
  }

  protected function processList($c, $peerMethod = 'doSelect') {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll($this->getModuleName() . '/filters');
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

    $this->pager = new sfPropelPager($model, $n);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->setPeerMethod($peerMethod);
    $this->pager->init();
  }
  
}
?>

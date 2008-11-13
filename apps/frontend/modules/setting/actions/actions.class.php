<?php

/**
 * setting actions.
 *
 * @package    aranet
 * @subpackage setting
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class settingActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('setting', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('setting/filters');
    // pager
    if ($this->getRequest()->hasParameter('n'))
    {
      $n = $this->getRequestParameter('n');
      if ($n == -1) {
          $n = 10000;
      }
      $this->getUser()->setAttribute('setting/n', $n);
    }
    $n = $this->getUser()->getAttribute('setting/n', 20);

    $this->pager = new sfPropelPager('sfSetting', $n);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->setPeerMethod('doSelect');
    $this->pager->init();
  }
  
  public function executeShow()
  {
    $this->sf_setting = sfSettingPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->sf_setting);
  }

  public function executeCreate()
  {
    $this->sf_setting = new sfSetting();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->sf_setting = sfSettingPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->sf_setting);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $sf_setting = new sfSetting();
    }
    else
    {
      $sf_setting = sfSettingPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($sf_setting);
    }

    $sf_setting->setId($this->getRequestParameter('id'));
    $sf_setting->setEnv($this->getRequestParameter('env'));
    $sf_setting->setName($this->getRequestParameter('name'));
    $sf_setting->setValue($this->getRequestParameter('value'));
    $sf_setting->setDescription($this->getRequestParameter('description'));

    $sf_setting->save();

    return $this->redirect('setting/list');
  }

  public function executeDelete()
  {
    $sf_setting = sfSettingPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($sf_setting);
    $sf_setting->delete();

    if (!$this->getRequest()->isXmlHttpRequest())
        return $this->redirect('setting/list');
    else
        return sfView::SUCCESS;
  }
  
    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $sf_setting = sfSettingPeer::retrieveByPk($item);
                    $sf_setting->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('setting/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'setting/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'setting/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'setting/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'setting/sort'))
        {
            $this->getUser()->setAttribute('sort', 'name', 'setting/sort');
            $this->getUser()->setAttribute('type', 'asc', 'setting/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'setting/sort'))
        {
            $sort_column = sfSettingPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'setting/sort') == 'asc')
            {
                $c->addAscendingOrderByColumn($sort_column);
            }
            else
            {
                $c->addDescendingOrderByColumn($sort_column);
            }
        }
    }

    protected function addFiltersCriteria ($c)
    {
        if (isset($this->filters['name']) && $this->filters['name'] && $this->filters['name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $criterion = $c->getNewCriterion(sfSettingPeer::NAME, "%".$this->filters['name']."%", Criteria::LIKE);
            $c->add($criterion);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }
    
}

<?php

/**
 * setting actions.
 *
 * @package    aranet
 * @subpackage setting
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class settingActions extends myActions
{

  /**
   * returns sfSetting from params
   *
   * @return sfSetting
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getsfSetting()
  {
    if ($this->getRequestParameter('id')) {
      $setting = sfSettingPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($setting);
    } else {
      $setting = new sfSetting();
    }
    return $setting;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $setting = $this->getsfSetting();
    $setting->setId($this->getRequestParameter('id'));
    $setting->setEnv($this->getRequestParameter('env'));
    $setting->setName($this->getRequestParameter('name'));
    $setting->setValue($this->getRequestParameter('value'));
    $setting->setDescription($this->getRequestParameter('description'));

    $setting->save();

    return $this->redirect('setting/list');
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

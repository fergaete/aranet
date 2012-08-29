<?php

/**
 * setting actions.
 *
 * @package    aranet
 * @subpackage setting
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class settingActions extends anActions
{

  /**
   * returns sfSetting from params
   *
   * @return sfSetting
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getsfSetting()
  {
    if ($request->getParameter('id')) {
      $setting = sfSettingPeer::retrieveByPk($request->getParameter('id'));
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
    $setting->setId($request->getParameter('id'));
    $setting->setEnv($request->getParameter('env'));
    $setting->setName($request->getParameter('name'));
    $setting->setValue($request->getParameter('value'));
    $setting->setDescription($request->getParameter('description'));

    $setting->save();

    return $this->redirect('setting/list');
  }

  protected function processFilters ()
  {
    if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
    {
      $filters = $request->getParameter('filters');
      $this->getUser()->getAttributeHolder()->removeNamespace('setting/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'setting/filters');
    }
  }

  protected function processSort ()
  {
    if ($request->getParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $request->getParameter('sort'), 'setting/sort');
      $this->getUser()->setAttribute('type', $request->getParameter('type', 'asc'), 'setting/sort');
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
    if (isset($this->filters['name']) && $this->filters['name'] && $this->filters['name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
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

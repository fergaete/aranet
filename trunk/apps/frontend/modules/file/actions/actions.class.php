<?php

/**
 * file actions.
 *
 * @package    aranet
 * @subpackage file
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class fileActions extends anActions
{

 /* returns expense_item from params
   *
   * @return ExpenseItem
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getsfPropelFileStorageInfo()
  {
    if ($request->getParameter('id')) {
      $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($sf_propel_file_storage_info);
    } else {
      $sf_propel_file_storage_info = new sfPropelFileStorageInfo();
    }
    return $sf_propel_file_storage_info;
  }
  
  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preExecute() {
    $this->referer = $this->getRequest()->getReferer();
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $sf_propel_file_storage_info = $this->getsfPropelFileStorageInfo();
    sfPropelFileStorageUtil::saveFromRequest($this->getRequest(), 'uploaded_file', $sf_propel_file_storage_info);
    $sf_propel_file_storage_info->save();
    return $this->redirect($request->getParameter('referer', 'file/list'));
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortField()
  {
    return 'created_at';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['file_name']) && $this->filters['file_name'] !== sfContext::getInstance()->getI18N()->__('Project') . '...' && $this->filters['file_name'] !== '')
    {
      $criterion = $c->getNewCriterion(sfPropelFileStorageInfoPeer::FILE_NAME, "%".$this->filters['file_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(sfPropelFileStorageInfoPeer::FILE_TITLE, "%".$this->filters['file_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

}

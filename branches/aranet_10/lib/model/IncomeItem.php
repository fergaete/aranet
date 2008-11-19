<?php

/**
 * Subclass for representing a row from the 'aranet_income_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: IncomeItem.php 3 2008-08-06 07:48:19Z pablo $
 */

class IncomeItem extends BaseIncomeItem
{

  /**
   * array of files
   *
   * @var array
   **/
  protected $collFiles;

  /**
   * last criteria for files
   *
   * @var Criteria
   **/
  protected $lastFilesCriteria = null;

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getIncomeItemName();
  }

  /**
   * returns income item base amount
   *
   * @param double
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getIncomeItemBase() {
    return (parent::getIncomeItemBase()) ? parent::getIncomeItemBase() : $this->getIncomeItemAmount();
  }

  /**
   * sets income item amount
   *
   * @return double $v
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setIncomeItemBase($v) {
    parent::setIncomeItemBase($v);
    if (!$this->getIncomeItemAmount())
      parent::setIncomeItemAmount($v);
  }

  /**
   * initializes files
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function initFiles()
  {
    if ($this->collFiles === null) {
      $this->collFiles = array();
    }
  }

  /**
   * returns files associated with budget
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFiles($criteria = null, $con = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria();
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }

    if ($this->collFiles === null) {
      if ($this->isNew()) {
        $this->collFiles = array();
      } else {
        $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'IncomeItem');
        $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);
        sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
        $this->collFiles = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
      }
    } else {
      if (!$this->isNew()) {
        $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'IncomeItem');
        $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);
        sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
        if (!isset($this->lastFileCriteria) || !$this->lastFileCriteria->equals($criteria)) {
          $this->collFiles = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
        }
      }
    }
    $this->lastFileCriteria = $criteria;
    return $this->collFiles;
  }

  /**
   * return number of files associated
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function countFiles($criteria = null, $distinct = false, $con = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria();
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }
    $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'IncomeItem');
    $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

    return sfPropelFileStorageInfoPeer::doCount($criteria, $distinct, $con);
  }

  /**
   * adds a file associated to the budget
   *
   * @param File  $l  the file
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function addFile(File $l)
  {
    $this->collFiles[] = $l;

    $l->setContact($this);
  }

}

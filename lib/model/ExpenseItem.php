<?php

/**
 * Subclass for performing query and update operations on the 'aranet_expense_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ExpenseItem.php 3 2008-08-06 07:48:19Z pablo $
 */

class ExpenseItem extends BaseExpenseItem
{
    protected $collFiles;

    protected $lastFilesCriteria = null;

    public function __toString() {
        return $this->getExpenseItemName();
    }

    public function getDate() {
        sfLoader::loadHelpers('Date');
        return format_date($this->getExpensePurchaseDate());
    }

    public function getSubtotal() {
        sfLoader::loadHelpers('Number');
        return format_currency($this->getExpenseItemAmount(), 'EUR');
    }

    public function getExpenseItemBase() {
        return (parent::getExpenseItemBase()) ? parent::getExpenseItemBase() : $this->getExpenseItemAmount();
    }

    public function setExpenseItemBase($v) {
        parent::setExpenseItemBase($v);
        parent::setExpenseItemAmount($v);
    }

    public function getValidation() {
        if ($this->getExpenseValidateDate()) {
            return 'iconSmallValidation-2.png';
        } else {
            return 'iconSmallValidation-1.png';
        }
    }

    public function getMember() {
        return $this->getsfGuardUserRelatedByExpensePurchaseBy()->getProfile();
    }

    public function getValidationStatus() {
        return ($this->getExpenseValidateDate() != null) ? 'Approved' : 'Waiting approval';
    }

    public function getValidationFullStatus() {
        return $this->getValidationStatus() . ": " . $this->getExpenseValidateDate();
    }

    public function getIsValidated() {
        return ($this->getExpenseValidateDate() != null) ? '2' : '1';
    }

    public function initFiles()
    {
        if ($this->collFiles === null) {
            $this->collFiles = array();
        }
    }


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
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'ExpenseItem');
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, $this->getId());
                $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);
                sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
                $this->collFiles = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
            }
        } else {
            if (!$this->isNew()) {
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'ExpenseItem');
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, $this->getId());
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


    public function countFiles($criteria = null, $distinct = false, $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'ExpenseItem');
        $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, $this->getId());
        $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

        return sfPropelFileStorageInfoPeer::doCount($criteria, $distinct, $con);
    }


    public function addFile(File $l)
    {
        $this->collFiles[] = $l;

        $l->setContact($this);
    }

    public function preSave($v) {
        if ($v->getExpenseItemBudgetId() == '-1') {
            $v->setExpenseItemBudgetId(null);
        }
        if ($v->getExpenseItemProjectId() == '-1') {
            $v->setExpenseItemProjectId(null);
        } 
        if (!$v->getExpenseItemProjectId() && $v->getExpenseItemBudgetId()) {
            if ($v->getBudget()->getBudgetProjectId()) {
                $v->setProject($v->getBudget()->getProject());
            }
        }
    }
}
sfMixer::register('BaseExpenseItem:save:pre', array('ExpenseItem', 'preSave'));

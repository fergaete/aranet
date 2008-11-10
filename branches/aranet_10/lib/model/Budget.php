<?php

/**
 * Subclass for representing a row from the 'aranet_budget' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Budget.php 3 2008-08-06 07:48:19Z pablo $
 */

class Budget extends BaseBudget
{
    protected $collFiles;

    protected $lastFilesCriteria = null;

    public function getBudgetAverageMargin() {
        if (MARGIN_MODEL == 'costs') {
            return ($this->getBudgetTotalCost()) ? $this->getBudgetTotalAmount()/($this->getBudgetTotalCost())*100-100 : 0;
        } else {
            return ($this->getBudgetTotalCost()) ? ($this->getBudgetTotalAmount() - $this->getBudgetTotalCost())*100 / $this->getBudgetTotalAmount() : 0;
        }
    }

    public function getBudgetAverageRealMargin() {
        if (MARGIN_MODEL == 'costs') {
            return 0;//($this->getBudgetTotalHourCosts()) ? $this->getBudgetTotalAmount()/($this->getBudgetTotalHourCosts() + $this->getBudgetTotalExpenses())*100-100 : 0;
        } else {
            return 0;//($this->getBudgetTotalHourCosts()) ? ($this->getBudgetTotalAmount() - $this->getBudgetTotalHourCosts() - $this->getBudgetTotalExpenses())*100 / $this->getBudgetTotalAmount() : $this->getBudgetAverageMargin();
        }
    }

    public function setBudgetValidDate($v) {
        parent::setBudgetValidDate($v);
        // Check status
        if ($this->getBudgetStatusId() == 5) {
            $this->setBudgetStatusId(1);
        }
    }

    public function getBudgetCostDifference() {
        return 0;//($this->getBudgetTotalHourCosts()) ? 100 - ($this->getBudgetTotalHourCosts() * 100 / $this->getBudgetTotalCost()) : 100;
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
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'Budget');
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, $this->getId());
                $criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);
                sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
                $this->collFiles = sfPropelFileStorageInfoPeer::doSelectJoinAllExceptsfGuardUserProfileRelatedByDeletedBy($criteria, $con);
            }
        } else {
            if (!$this->isNew()) {
                $criteria->add(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, 'Budget');
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
        if (!$this->collFiles) {
            $this->getFiles();
        }
        return count($this->collFiles);
    }


    public function addFile(File $l)
    {
        $this->collFiles[] = $l;

        $l->setContact($this);
    }

    public function __toString() {
        $name = ($this->getBudgetPrefix()) ? $this->getBudgetPrefix() : '';
        $name .= ($this->getBudgetNumber()) ? $this->getBudgetNumber() : '';
        $name .= ($this->getBudgetRevision() != 0) ? '-r' . $this->getBudgetRevision() : '';
        return $name;
    }

    public function getFullNumber() {
        $name = ($this->getBudgetPrefix()) ? $this->getBudgetPrefix() : '';
        $name .= ($this->getBudgetNumber()) ? $this->getBudgetNumber() : '';
        return $name;
    }

    public function getFullTitle() {
        $number = $this->__toString();
        return $number . ' - ' . $this->getBudgetTitle();
    }

    public function getFullStatus($separator = '<br/>') {
        $content = sfI18N::getInstance()->__('Created') . ': ' . format_date($this->getCreatedAt());
        switch ($this->getBudgetStatusId()) {
            case 1:
            case 2:
                $content .= $separator . $this->getBudgetStatus() . ': ' . format_date($this->getBudgetDate());
                break;
            case 3:
                $content .=  $separator . $this->getBudgetStatus() . ': ' . format_date($this->getBudgetApprovedDate());
            default:
        }
        $content .= ($this->getBudgetStatusId() != 3 && $this->getBudgetValidDate()) ? $separator . sfI18N::getInstance()->__('Valid till') . ': ' . format_date($this->getBudgetValidDate()) : '';
        return $content;
    }

    public function getExpenseItemsOrderedByDate($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->addAscendingOrderByColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
        return parent::getExpenseItemsJoinExpenseCategory($criteria);
    }

    public function getBudgetItemsOrderedByItemOrder($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->addAscendingOrderByColumn(BudgetItemPeer::ITEM_ORDER);
        return parent::getBudgetItemsJoinTypeOfInvoiceItem($criteria);
    }

    public function preSave($v) {
        // Update Budget Status
        if (!$v->getBudgetStatusId()) {
            $v->setBudgetStatusId(1);
        }
        if ($v->getBudgetStatusId() == 3 && !$v->getBudgetApprovedDate()) { // Aceptado
            $v->setBudgetApprovedDate(date('Y-m-d'));
        }
        if (strtotime('now') > strtotime($v->getBudgetValidDate())) {
            // Caducado
            if ($v->getBudgetStatusId()) { // Aceptado
                $v->setBudgetValidDate(date('Y-m-d'));
            } else {
                $v->setBudgetStatusId(5);
            }
        }
        // Asociate client if project
        if ($v->getProject() && !$v->getBudgetClientId()) {
            $v->setBudgetClientId($v->getProject()->getProjectClientId());
        }
        if ($v->getBudgetClientId() == 0)
            $v->setBudgetClientId(null);
        $v->updateBudget();
        // Check if budget is last
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_NUMBER, $v->getBudgetNumber());
        $c->add(BudgetPeer::BUDGET_PREFIX, $v->getBudgetPrefix());
        $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
        //$c->addDescendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
        $last_budget = BudgetPeer::doSelectOne($c);
        if ($v->isNew()) {
            if ($last_budget) {
                if ($last_budget->getBudgetRevision() < $v->getBudgetRevision()) {
                    $v->setBudgetIsLast(true);
                    $last_budget->setBudgetIsLast(false);
                    $last_budget->save();
                }
            } else {
                $v->setBudgetIsLast(true);
            }
        } else {
            if ($last_budget && $v->getId() != $last_budget->getId()) {
                if ($last_budget->getBudgetRevision() < $v->getBudgetRevision()) {
                    $v->setBudgetIsLast(true);
                    $last_budget->setBudgetIsLast(false);
                    $last_budget->save();
                }
            } else {
                $v->setBudgetIsLast(true);
            }
        }
    }

    public function postSave($v) {
        if ($v->collObjectContacts) {
            foreach($v->collObjectContacts as $ocontact) {
                $ocontact->setObjectcontactObjectId($v->getId());
                $ocontact->save();
            }
            if ($v->getBudgetProjectId()) {
                foreach($v->collContacts as $contact) {
                    // Save to project
                    $contact->saveTo('Project', $v->getBudgetProjectId(), $contact->getContactRol());
                }
            }
            if ($v->getBudgetClientId()) {
                foreach($v->collContacts as $contact) {
                    // Save to client
                    $contact->saveTo('Client', $v->getBudgetClientId(), $contact->getContactRol());
                }
            }

        }
    }

    // update budget
    private function updateBudget($con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BudgetPeer::DATABASE_NAME);
        }
        //Update budget data
        $amount = 0; $cost = 0;
        foreach ($this->getBudgetItems() as $itm) {
            if (!$itm->getItemIsOptional()) {
                $amount += ($itm->getItemQuantity() * $itm->getItemRetailPrice());
                $cost += ($itm->getItemQuantity() * $itm->getItemCost());
            }
        }
        $this->setBudgetTotalAmount($amount);
        $this->setBudgetTotalCost($cost);
    }

    public function copyFrom($budget)
    {
        $this->setBudgetPrefix($budget->getBudgetPrefix());
        $this->setBudgetNumber($budget->getBudgetNumber());
        $this->setBudgetRevision($budget->getBudgetRevision()+1);
        $this->setBudgetDate(date('Y-m-d'));
        $this->setBudgetValidDate(date('Y-m-d', strtotime ("+30 days")));
        $this->setBudgetClientId($budget->getBudgetClientId());
        $this->setBudgetProjectId($budget->getBudgetProjectId());
        $this->setBudgetCategoryId($budget->getBudgetCategoryId());
        $this->setBudgetTitle($budget->getBudgetTitle());
        $this->setBudgetComments($budget->getBudgetComments());
        $this->setBudgetPrintComments($budget->getBudgetPrintComments());
        $this->setBudgetTaxRate($budget->getBudgetTaxRate());
        $this->setBudgetFreightCharge($budget->getBudgetFreightCharge());
        $this->setBudgetPaymentConditionId($budget->getBudgetPaymentConditionId());
        $this->initBudgetItems();
        foreach ($budget->getBudgetItems() as $item) {
            $new_item = new budgetItem();
            $new_item->setItemOrder($item->getItemOrder());
            $new_item->setItemTypeId($item->getItemTypeId());
            $new_item->setItemIsOptional($item->getItemIsOptional());
            $new_item->setItemDescription($item->getItemDescription());
            $new_item->setItemQuantity($item->getItemQuantity());
            $new_item->setMilestoneTaskId($item->getMilestoneTaskId());
            $new_item->setItemTaskId($item->getItemTaskId());
            $new_item->setItemCost($item->getItemCost());
            $new_item->setItemMargin($item->getItemMargin());
            $new_item->setItemRetailPrice($item->getItemRetailPrice());
            $new_item->setItemTaxRate($item->getItemTaxRate());
            $new_item->setItemBudgetTypeId($item->getItemBudgetTypeId());
            $this->addBudgetItem($new_item);
        }
        // Add contacts
        $i = 0;
        foreach ($budget->getContacts() as $contact) {
            $this->addContact($contact, ($i==0));
            $i++;
        }
    }

    public function preDelete($v) {
        // First set null associated objects
        $c = new Criteria();
        $c->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $v->getId());
        sfPropelParanoidBehavior::disable();
        $expenses = ExpenseItemPeer::doSelect($c);
        foreach ($expenses as $expense) {
            $expense->setExpenseItemBudgetId(null);
            $expense->save();
        }
    }

}
sfMixer::register('BaseBudget:delete:post', array('Budget', 'postDelete'));
sfMixer::register('BaseBudget:delete:pre', array('Budget', 'preDelete'));
sfMixer::register('BaseBudget:save:post', array('Budget', 'postSave'));
sfMixer::register('BaseBudget:save:pre', array('Budget', 'preSave'));

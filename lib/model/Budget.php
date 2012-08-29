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
   * returns average margin of the budget
   *
   * @return double
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetAverageMargin() {
    if (sfConfig::get('aranet_margin_model', 'costs') == 'costs') {
      return ($this->getBudgetTotalCost()) ? $this->getBudgetTotalAmount()/($this->getBudgetTotalCost())*100-100 : 0;
    } else {
      return ($this->getBudgetTotalCost()) ? ($this->getBudgetTotalAmount() - $this->getBudgetTotalCost())*100 / $this->getBudgetTotalAmount() : 0;
    }
  }

  /**
   * returns average margin of the budget
   *
   * @param  double $total_hour_costs
   * @param  double $total_costs
   * @return double
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetAverageRealMargin($total_hour_costs, $total_costs) {
    // TODO implement getBudgetTotalHourCosts
    if (sfConfig::get('aranet_margin_model', 'costs') == 'costs') {
      return $total_hour_costs ? $this->getBudgetTotalAmount()/($total_hour_costs + $total_costs)*100-100 : 0;
    } else {
      return $total_hour_costs ? ($this->getBudgetTotalAmount() - $total_hour_costs - $total_costs)*100 / $this->getBudgetTotalAmount() : $this->getBudgetAverageMargin();
    }
  }

  /**
   * sets the valid date and changes status
   *
   * @param  string $v  the date
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setBudgetValidDate($v) {
    parent::setBudgetValidDate($v);
    // Check status
    if ($this->getBudgetStatusId() == 5) {
      $this->setBudgetStatusId(1);
    }
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
    if (!$this->collFiles) {
      $this->getFiles();
    }
    return count($this->collFiles);
  }

  /**
   * adds a file associated to the budget
   *
   * @param File  $l  the file
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function addFile($l)
  {
    $this->collFiles[] = $l;
    $l->setContact($this);
  }

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    $name = ($this->getBudgetPrefix()) ? $this->getBudgetPrefix() : '';
    $name .= ($this->getBudgetNumber()) ? $this->getBudgetNumber() : '';
    $name .= ($this->getBudgetRevision() != 0) ? '-r' . $this->getBudgetRevision() : '';
    return $name;
  }

  /**
   * returns prefix+number
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullNumber() {
    $name = ($this->getBudgetPrefix()) ? $this->getBudgetPrefix() : '';
    $name .= ($this->getBudgetNumber()) ? $this->getBudgetNumber() : '';
    return $name;
  }

  /**
   * returns full title of budget (prefix+number+revision+title)
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullTitle() {
    $number = $this->__toString();
    return $number . ' - ' . $this->getBudgetTitle();
  }

  /**
   * returns a string for budget status
   *
   * @param string  $separator
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullStatus($separator = '<br/>') {
    $content = sfContext::getInstance()->getI18N()->__('Created') . ': ' . format_date($this->getCreatedAt());
    switch ($this->getBudgetStatusId()) {
      case 1:
      case 2:
        $content .= $separator . $this->getBudgetStatus() . ': ' . format_date($this->getBudgetDate());
      break;
      case 3:
        $content .=  $separator . $this->getBudgetStatus() . ': ' . format_date($this->getBudgetApprovedDate());
      default:
    }
    $content .= ($this->getBudgetStatusId() != 3 && $this->getBudgetValidDate()) ? $separator . sfContext::getInstance()->getI18N()->__('Valid till') . ': ' . format_date($this->getBudgetValidDate()) : '';
    return $content;
  }

  /**
   * returns associated expense items ordered by date
   *
   * @param   Criteria  $criteria propel criteria for select
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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
    return parent::getExpenseItems($criteria);
  }

  /**
   * returns associated budgets items ordered by order field
   *
   * @param   Criteria  $criteria propel criteria for select
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * preSave function
   *
   * @param   Budget  $v  the budget to process
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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
    if ($v->isNew()) {
      $c = new Criteria();
      $c->add(BudgetPeer::BUDGET_NUMBER, $v->getBudgetNumber());
      $c->add(BudgetPeer::BUDGET_PREFIX, $v->getBudgetPrefix());
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addDescendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
      $last_budget = BudgetPeer::doSelectOne($c);
      if ($last_budget) {
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

  /**
   * postSave function
   *
   * @param   Budget  $v  the budget to process
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * updates budget performance fields
   *
   * @param  PropelConnection $con  Database connection
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * copy budget
   *
   * @param  Budget $budget budget to copy
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * preDelete function
   *
   * @param   Budget  $v  the budget to process
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * returns number of hours
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetTotalHours()
  {
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.')');
    $rs = TimesheetPeer::doSelectRS($c);
    if ($rs->next()) {
      return $rs->getFloat(1);
    }
    return 0;
  }

  /**
   * returns total expenses amount
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetTotalExpenses()
  {
    $amount = 0;
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, $this->getId());
    $c->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, 1); // Reembolsable
    $c->addSelectColumn('SUM('.ExpenseItemPeer::EXPENSE_ITEM_AMOUNT.')');
    $rs = ExpenseItemPeer::doSelectRS($c);
    if ($rs->next()) {
      $amount += $rs->getFloat(1);
    }
    return $amount;
  }
  
  /**
   * returns cost of hours
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetTotalHoursCost()
  {
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_BUDGET_ID, $this->getId());
    $c->add(TimesheetPeer::TIMESHEET_IS_BILLABLE, true);
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.'*'.TypeOfHourPeer::TYPE_OF_HOUR_COST.')');
    $c->addJoin(TimeSheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);
    $rs = TimeSheetPeer::doSelectRS($c);
    if ($rs->next()) {
      return $rs->getFloat(1) ? $rs->getFloat(1) : 0;
    }
    return 0;
  }

}

sfPropelBehavior::add('Budget', array('audit', 'arPropelContactableBehavior', 'arPropelAddressableBehavior', 'sfPropelActAsTaggableBehavior', 'paranoid' => array('column' => 'deleted_at')));

#sfMixer::register('BaseBudget:delete:post', array('Budget', 'postDelete'));
#sfMixer::register('BaseBudget:delete:pre', array('Budget', 'preDelete'));
#sfMixer::register('BaseBudget:save:post', array('Budget', 'postSave'));
#sfMixer::register('BaseBudget:save:pre', array('Budget', 'preSave'));

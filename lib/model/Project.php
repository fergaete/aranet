<?php

/**
 * Subclass for representing a row from the 'aranet_project' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Project.php 3 2008-08-06 07:48:19Z pablo $
 */

class Project extends BaseProject
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    $name = ($this->getProjectPrefix()) ? $this->getProjectPrefix() : '';
    $name .= ($this->getProjectNumber()) ? $this->getProjectNumber() . ' - ': '';
    return $name . $this->getProjectName();
  }

  /**
   * returns full number (prefix+number)
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullNumber() {
    $number = ($this->getProjectPrefix()) ? $this->getProjectPrefix() : '';
    $number .= ($this->getProjectNumber()) ? $this->getProjectNumber(): '';
    return $number;
  }

  /**
   * returns a string for project status
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullStatus() {
    switch ($this->getProjectStatusId()) {
      case 3:
        $content = $this->getProjectStatus() . ": " . format_date($this->getProjectFinishDate());
        break;
      default:
        $content = $this->getProjectStatus();
    }
    return $content;
  }

  /**
   * returns related budgets ordered by date
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBudgetsOrderedByDate($criteria = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria();
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }
    $criteria->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
    return parent::getBudgets($criteria);
  }

  /**
   * returns related last budgets ordered by date
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getLastBudgetsOrderedByDate($criteria = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria();
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }
    $criteria->add(BudgetPeer::BUDGET_IS_LAST, true);
    return $this->getBudgetsOrderedByDate($criteria);
  }

  /**
   * postSave process
   *
   * @param Project $v
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function postSave($v) {
    if ($v->collObjectContacts) {
      foreach($v->collObjectContacts as $ocontact) {
        $ocontact->setObjectcontactObjectId($v->getId());
        $ocontact->save();
      }
      if ($v->getProjectClientId()) {
        $client = $v->getClient();
        foreach($v->collContacts as $contact) {
          // Save to client
          $client->addContact($contact, false, false);
          //$contact->saveTo('Client', $v->getProjectClientId(), $contact->getContactRol()); // Duplica info
        }
        $client->save();
      }
    }
  }

  /**
   * returns related milestones
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getMilestones()
  {
    $c = new Criteria();
    $c->addJoin(ProjectPeer::ID, MilestonePeer::MILESTONE_PROJECT_ID);
    $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
    $milestones = MilestonePeer::doSelect($c);
    return $milestones;
  }

  /**
   * returns related milestones and task ordered
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getMilestonesAndTasks()
  {
    $c = new Criteria();
    $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
    $c->addAscendingOrderByColumn(MilestonePeer::MILESTONE_START_DATE);
    $c->addAscendingOrderByColumn(MilestonePeer::MILESTONE_TITLE);
    $milestones = MilestonePeer::doSelect($c);
    $c1 = new Criteria();
    $c1->addAscendingOrderByColumn(TaskPeer::TASK_START_DATE);
    $tasks = $this->getTasks($c1);
    $mandt = array();
    if ($milestones) {
      foreach ($milestones as $milestone) {
        array_push($mandt, $milestone);
        foreach ($tasks as $task) {
          if ($task->getTaskMilestoneId() == $milestone->getId()) {
            array_push($mandt, $task);
          }
        }
      }
    } else {
      $mandt = $tasks;
    }
    return $mandt;
  }
  
  /**
   * returns number of hours
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectTotalHours()
  {
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
    $c->addSelectColumn('SUM('.MilestonePeer::MILESTONE_TOTAL_HOURS.')');
    $rs = MilestonePeer::doSelectRS($c);
    if ($rs->next()) {
      return $rs->getFloat(1);
    }
    return 0;
  }

  /**
   * returns cost of hours
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectTotalHoursCost()
  {
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getId());
    $c->addSelectColumn('SUM('.MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS.')');
    $rs = MilestonePeer::doSelectRS($c);
    if ($rs->next()) {
      return $rs->getFloat(1);
    }
    return 0;
  }

  /**
   * returns revenue generated by invoices and other incomes
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectTotalRevenue()
  {
    $amount = 0;
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(InvoicePeer::INVOICE_PROJECT_ID, $this->getId());
    $c->addSelectColumn('SUM('.InvoicePeer::INVOICE_TOTAL_AMOUNT.')');
    $rs = InvoicePeer::doSelectRS($c);
    if ($rs->next()) {
      $amount = $rs->getFloat(1);
    }
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, $this->getId());
    $c->addSelectColumn('SUM('.IncomeItemPeer::INCOME_ITEM_AMOUNT.')');
    $rs = IncomeItemPeer::doSelectRS($c);
    if ($rs->next()) {
      $amount += $rs->getFloat(1);
    }
    return $amount;
  }

  /**
   * returns total expenses amount
   *
   * @return float
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectTotalExpenses()
  {
    $amount = 0;
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, $this->getId());
    $c->add(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, 1); // Reembolsable
    $c->addSelectColumn('SUM('.ExpenseItemPeer::EXPENSE_ITEM_AMOUNT.')');
    $rs = ExpenseItemPeer::doSelectRS($c);
    if ($rs->next()) {
      $amount += $rs->getFloat(1);
    }
    return $amount;
  }

}
#sfMixer::register('BaseProject:delete:post', array('Project', 'postDelete'));
#sfMixer::register('BaseProject:save:post', array('Project', 'postSave'));

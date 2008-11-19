<?php

/**
 * timesheet actions.
 *
 * @package    aranet
 * @subpackage timesheet
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class timesheetActions extends myActions
{

  /**
   * returns timesheet from params
   *
   * @return Timesheet
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getTimesheet()
  {
    if ($this->getRequestParameter('id')) {
      $timesheet = TimesheetPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($timesheet);
    } else {
      $timesheet = new Timesheet();
    }
    return $timesheet;
  }
  
  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preExecute() {
    $this->referer = $this->getRequest()->getReferer();
    if (!($members = $this->getUser()->getAttribute('members'))) {
      $members = sfGuardUserProfilePeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('members', $members);
    }
    if (in_array($this->getActionName(), array('index', 'list'))) {
      $this->members = $this->getUser()->getAttribute('members');
    }
  }

  /**
   * executes edit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit()
  {
    $this->timesheet = $this->getTimesheet();
    $c = new Criteria();
    if ($this->timesheet->getTimesheetProjectId()) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->timesheet->getTimesheetProjectId());
    }
    $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
    $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
    $this->budgets = BudgetPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $select = $this->getRequestParameter('select', array(null));
    $m = 0; $t = 0;
    $selected_tasks = myTools::count_array('/task_[0-9]*/', $select);
    $selected_milestones = myTools::count_array('/milestone_[0-9]*/', $select);
    if ($selected_tasks > 1 || $selected_milestones > 1) {
      if ($selected_milestones > 1) {
        $div = $selected_milestones;
      } else {
        $div = $selected_tasks;
      }
      $tempd = ($this->getRequestParameter('timesheet_hours')/$div)*pow(10,2);
      $tempd1 = round($tempd);
      $number = $tempd1/pow(10,2);
    } else {
      $number = $this->getRequestParameter('timesheet_hours');
    }
    foreach ($select as $item) {
      $save_timesheet = false;
      if (!$this->getRequestParameter('id') || $t > 0)
      {
        $timesheet = new Timesheet();
      }
      else
      {
        $timesheet = TimesheetPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($timesheet);
      }
      if ($item) {
        list($class, $id) = explode('_', $item);
        if ($class == 'milestone' && $selected_tasks == 0)
        {
          $m++;
          if ($selected_milestones > 1) {
            $timesheet->setTimesheetDescription($this->getRequestParameter('timesheet_description') . ' (' . $m . '/' . $selected_milestones . ')');
          } else {
            $timesheet->setTimesheetDescription($this->getRequestParameter('timesheet_description'));
          }
          $timesheet->setTimesheetMilestoneId($id);
          // Create new task or retrieve existing task for this milestone
          $task = TaskPeer::getTaskByTitle($timesheet->getTimesheetDescription());
          //$task->setTaskDescription($this->getRequestParameter('task_description'));
          $task->setTaskProjectId($this->getRequestParameter('timesheet_project_id') ? $this->getRequestParameter('timesheet_project_id') : null);
          $task->setTaskMilestoneId($id);
          $task->save();
          $timesheet->setTimesheetTaskId($task->getId());
          $save_timesheet = true;
        }
        elseif ($class == 'task') {
          $t++;
          $timesheet->setTimesheetTaskId($id);
          $task = TaskPeer::retrieveByPk($id);
          if ($task instanceof Task) {
            $timesheet->setTimesheetDescription($task->getTaskTitle());
            $timesheet->setTimesheetMilestoneId($task->getTaskMilestoneId());
          } else {
            $timesheet->setTimesheetDescription($this->getRequestParameter('timesheet_description'));
            $timesheet->setTimesheetMilestoneId(null);
          }
          $save_timesheet = true;
        }
      } else {
        $timesheet->setTimesheetTaskId(null);
        $timesheet->setTimesheetMilestoneId(null);
        $timesheet->setTimesheetDescription($this->getRequestParameter('timesheet_description'));
        $save_timesheet = true;
      }
      if ($save_timesheet) {
        $timesheet->setTimesheetHours($number);
        $timesheet->setTimesheetUserId($this->getRequestParameter('timesheet_user_id') ? $this->getRequestParameter('timesheet_user_id') : $this->getUser()->getGuardUser()->getId());
        $timesheet->setTimesheetBudgetId($this->getRequestParameter('timesheet_budget_id') ? $this->getRequestParameter('timesheet_budget_id') : null);
        if ($this->getRequestParameter('timesheet_project_id')) {
          $timesheet->setTimesheetProjectId($this->getRequestParameter('timesheet_project_id'));
        }
        elseif ($this->getRequestParameter('timesheet_budget_id'))
        {
          $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('timesheet_budget_id'));
          $timesheet->setTimesheetProjectId($budget->getBudgetProjectId());
        } else {
          $timesheet->setTimesheetProjectId(null);
        }
        $timesheet->setTimesheetIsBillable($this->getRequestParameter('timesheet_is_billable', 0));
        $timesheet->setTimesheetTypeId($this->getRequestParameter('timesheet_type_id') ? $this->getRequestParameter('timesheet_type_id') : null);
        if ($this->getRequestParameter('timesheet_date'))
        {
          list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('timesheet_date'), $this->getUser()->getCulture());
          $timesheet->setTimesheetDate("$y-$m-$d");
        }
        $timesheet->save();
      }
    }
    return $this->redirect('timesheet/list');
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['timesheet_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, '');
      $criterion->addOr($c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['timesheet_from']) && $this->filters['timesheet_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['timesheet_from'], $this->getUser()->getCulture());
      $criterion = $c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['timesheet_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, '');
      $criterion2->addOr($c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['timesheet_to']) && $this->filters['timesheet_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['timesheet_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(TimesheetPeer::TIMESHEET_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
      if (isset($criterion)) {
        $criterion->addAnd($criterion2);
      }
      else
      {
        $criterion = $criterion2;
      }
    }
    if (isset($this->filters['timesheet_user_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(TimesheetPeer::TIMESHEET_USER_ID, '');
      $criterion->addOr($c->getNewCriterion(TimesheetPeer::TIMESHEET_USER_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['timesheet_user_id']) && $this->filters['timesheet_user_id'] !== '')
    {
      $c->add(TimesheetPeer::TIMESHEET_USER_ID, $this->filters['timesheet_user_id']);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
    if (isset($this->filters['project_name_is_empty']))
    {
      $criterion = $c->getNewCriterion(TimesheetPeer::TIMESHEET_PROJECT_ID, '');
      $criterion->addOr($c->getNewCriterion(TimesheetPeer::TIMESHEET_PROJECT_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['project_name']) && $this->filters['project_name'] !== sfI18N::getInstance()->__('Project') . '...' && $this->filters['project_name'] !== '')
    {
      $c->add(ProjectPeer::PROJECT_NAME, $this->filters['project_name']);
      $c->addJoin(ProjectPeer::ID, TimesheetPeer::TIMESHEET_PROJECT_ID);
    }
    if (isset($this->filters['timesheet_is_billable_is_empty']))
    {
      $criterion = $c->getNewCriterion(TimesheetPeer::TIMESHEET_IS_BILLABLE, '');
      $criterion->addOr($c->getNewCriterion(TimesheetPeer::TIMESHEET_IS_BILLABLE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['timesheet_is_billable']) && $this->filters['timesheet_is_billable'] !== '')
    {
      $c->add(TimesheetPeer::TIMESHEET_IS_BILLABLE, $this->filters['timesheet_is_billable']);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

}
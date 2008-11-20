<?php

/**
 * Subclass for representing a row from the 'aranet_project_task' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Task.php 3 2008-08-06 07:48:19Z pablo $
 */

class Task extends BaseTask
{
  
  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getTaskTitle();
  }

  /**
   * returns percent of completion
   *
   * @return double
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getTaskCompletionFraction() {
    if ($this->getTaskEstimatedHours()) {
      return $this->getTaskTotalHours() / $this->getTaskEstimatedHours() * 100;
    } else {
      return '';
    }
  }

  /**
   * preSave process
   *
   * @param Task $v
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preSave($v) {
    if (!$v->isNew() && $v->isColumnModified(TaskPeer::TASK_TITLE)) {
      foreach ($v->getTimesheets() as $ts) {
        $ts->setTimesheetDescription($v->getTaskTitle());
      }
    }
  }

  /**
   * updates task hours and costs
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function updateTaskHours()
  {
    $save = false;
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.')');
    $rs = TimesheetPeer::doSelectRS($c);
		if ($rs->next()) {
		  $this->setTaskTotalHours($rs->getInt(1));
		  $save = true;
		}	
		$c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_TASK_ID, $this->getId());
    $c->add(TimesheetPeer::TIMESHEET_IS_BILLABLE, true);
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.'*'.TypeOfHourPeer::TYPE_OF_HOUR_COST.')');
    $c->addJoin(TimeSheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);
    $rs = TimesheetPeer::doSelectRS($c);
		if ($rs->next()) {
		  $this->setTaskTotalHourCosts($rs->getFloat(1));
		  $save = true;
		}
		if ($save) {
      $this->save();
    }
  }
}

sfMixer::register('BaseTask:save:pre', array('Task', 'preSave'));
<?php

/**
 * Subclass for representing a row from the 'aranet_timesheet' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Timesheet.php 3 2008-08-06 07:48:19Z pablo $
 */

class Timesheet extends BaseTimesheet
{

  /**
   * returns project milestones
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectMilestones()
  {
    if ($this->getTimesheetProjectId()) {
      $c = new Criteria();
      $c->addJoin(ProjectPeer::ID, MilestonePeer::MILESTONE_PROJECT_ID);
      $c->add(MilestonePeer::MILESTONE_PROJECT_ID, $this->getTimesheetProjectId());
      $milestones = MilestonePeer::doSelect($c);
    }
    else
    {
      $milestones = array();
    }
    return $milestones;
  }

  /**
   * returns project tasks
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getProjectTasks()
  {
    if ($this->getTimesheetMilestoneId()) {
      $c = new Criteria();
      $c->addJoin(MilestonePeer::ID, TaskPeer::TASK_MILESTONE_ID);
      $c->add(TaskPeer::TASK_MILESTONE_ID, $this->getTimesheetMilestoneId());
      $tasks = TaskPeer::doSelect($c);
    }
    else
    {
      $tasks = array();
    }
    return $tasks;
  }
  
  /**
   * postSave process
   *
   * @param Timesheet $v
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function postSave($v) {
    // Update task & milestone hours
    if ($v->getTimesheetTaskId()) {
      $v->getTask()->updateTaskHours();
    }
    if ($v->getTimesheetMilestoneId()) {
      $v->getMilestone()->updateMilestoneHours();
    }
  }

}

sfMixer::register('BaseTimesheet:save:post', array('Timesheet', 'postSave'));
sfMixer::register('BaseTimesheet:delete:post', array('Timesheet', 'postSave'));
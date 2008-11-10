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
}

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
    public function __toString() {
        return $this->getTaskTitle();
    }

    public function getTaskCompletionFraction() {
        if ($this->getTaskEstimatedHours()) {
            return $this->getTaskTotalHours() / $this->getTaskEstimatedHours() * 100;
        } else {
            return '';
        }
    }

    public function save($con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME);
        }
        try
        {
            //Update Timesheets names
            if (!$this->isNew() && $this->isColumnModified(TaskPeer::TASK_TITLE)) {
                foreach ($this->getTimesheets() as $ts) {
                    $ts->setTimesheetDescription($this->getTaskTitle());
                }
            }
            $ret = parent::save($con);
            $con->commit();
            return $ret;
        }
        catch (Exception $e)
        {
            $con->rollback();
        throw $e;
        }
    }
}

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

}

sfMixer::register('BaseTask:save:pre', array('Task', 'preSave'));
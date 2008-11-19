<?php

/**
 * Subclass for performing query and update operations on the 'aranet_project_task' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: TaskPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class TaskPeer extends BaseTaskPeer
{

  /**
   * returns the task matching given title
   *
   * @param  string $title the title
   * @return Task
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getTaskByTitle($title)
  {
    $c = new Criteria();
    $order   = array("\r\n", "\n", "\r");
    $title = str_replace($order, '', $title);
    $c->add(TaskPeer::TASK_TITLE, $title);
    $task = TaskPeer::doSelectOne($c);
    if (!$task instanceof Task) {
      $task = new Task();
      $task->setTaskTitle($title);
    }
    return $task;
  }

}

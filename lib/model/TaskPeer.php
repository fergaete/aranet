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
  public static function getTaskByTitle($name)
  {
    $c = new Criteria();
    $order   = array("\r\n", "\n", "\r");
    $name = str_replace($order, '', $name);
    $c->add(TaskPeer::TASK_TITLE, $name);
    $task = TaskPeer::doSelectOne($c);
    if (!$task instanceof Task) {
        $task = new Task();
        $task->setTaskTitle($name);
    }
    return $task;
  }

}

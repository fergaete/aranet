<?php

/**
 * Subclass for representing a row from the 'aranet_task_priority' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: TaskPriority.php 3 2008-08-06 07:48:19Z pablo $
 */

class TaskPriority extends BaseTaskPriority
{
  public function __toString() {
    return $this->getTaskPriorityTitle();
  }
}

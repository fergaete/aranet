<?php

/**
 * Subclass for representing a row from the 'aranet_project_frequently_task' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: FrequentlyTask.php 3 2008-08-06 07:48:19Z pablo $
 */

class FrequentlyTask extends BaseFrequentlyTask
{
    public function __toString() {
        return $this->getTaskTitle();
    }
}

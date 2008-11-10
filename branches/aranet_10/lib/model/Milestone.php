<?php

/**
 * Subclass for representing a row from the 'aranet_project_milestone' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Milestone.php 3 2008-08-06 07:48:19Z pablo $
 */

class Milestone extends BaseMilestone
{
    public function __toString() {
        return $this->getMilestoneTitle();
    }

    public function getMilestoneCompletionFraction() {
        if ($this->getMilestoneEstimatedHours()) {
            return $this->getMilestoneTotalHours() / $this->getMilestoneEstimatedHours() * 100;
        } else {
            return '';
        }
    }


}

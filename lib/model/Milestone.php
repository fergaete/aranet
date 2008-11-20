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
  
  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getMilestoneTitle();
  }

  /**
   * returns percent of completion
   *
   * @return double
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getMilestoneCompletionFraction() {
    sfLoader::loadHelpers('NumberExtended');
    if ($this->getMilestoneEstimatedHours()) {
      return round_amount($this->getMilestoneTotalHours() / $this->getMilestoneEstimatedHours() * 100);
    } else {
      return 0;
    }
  }


}

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

  /**
   * updates milestone hours and costs
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function updateMilestoneHours()
  {
    $save = false;
    $c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.')');
    $rs = TimesheetPeer::doSelectRS($c);
		if ($rs->next()) {
		  $this->setMilestoneTotalHours($rs->getInt(1));
		  $save = true;
		}	
		$c = new Criteria();
    $c->clearSelectColumns();
    $c->add(TimesheetPeer::TIMESHEET_MILESTONE_ID, $this->getId());
    $c->add(TimesheetPeer::TIMESHEET_IS_BILLABLE, true);
    $c->addSelectColumn('SUM('.TimesheetPeer::TIMESHEET_HOURS.'*'.TypeOfHourPeer::TYPE_OF_HOUR_COST.')');
    $c->addJoin(TimeSheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);
    $rs = TimesheetPeer::doSelectRS($c);
		if ($rs->next()) {
		  $this->setMilestoneTotalHourCosts($rs->getFloat(1));
		  $save = true;
		}
		if ($save) {
      $this->save();
    }
  }

}

<?php

/**
 * Subclass for performing query and update operations on the 'aranet_timesheet' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: TimesheetPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class TimesheetPeer extends BaseTimesheetPeer
{
	public static function doSelectJoinAllIncludeNulls(Criteria $c, $con = null)
	{
		$c = clone $c;

		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol2 = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + MilestonePeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		TaskPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + TaskPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID, Criteria::LEFT_JOIN);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}


					
			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMilestone(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}


					
			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getTask(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}


					
			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTimesheet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initTimesheets();
				$obj7->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}
}

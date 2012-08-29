<?php


abstract class BaseTimesheetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_timesheet';

	
	const CLASS_DEFAULT = 'lib.model.Timesheet';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_timesheet.ID';

	
	const TIMESHEET_DESCRIPTION = 'aranet_timesheet.TIMESHEET_DESCRIPTION';

	
	const TIMESHEET_HOURS = 'aranet_timesheet.TIMESHEET_HOURS';

	
	const TIMESHEET_USER_ID = 'aranet_timesheet.TIMESHEET_USER_ID';

	
	const TIMESHEET_PROJECT_ID = 'aranet_timesheet.TIMESHEET_PROJECT_ID';

	
	const TIMESHEET_BUDGET_ID = 'aranet_timesheet.TIMESHEET_BUDGET_ID';

	
	const TIMESHEET_MILESTONE_ID = 'aranet_timesheet.TIMESHEET_MILESTONE_ID';

	
	const TIMESHEET_TASK_ID = 'aranet_timesheet.TIMESHEET_TASK_ID';

	
	const TIMESHEET_IS_BILLABLE = 'aranet_timesheet.TIMESHEET_IS_BILLABLE';

	
	const TIMESHEET_TYPE_ID = 'aranet_timesheet.TIMESHEET_TYPE_ID';

	
	const TIMESHEET_DATE = 'aranet_timesheet.TIMESHEET_DATE';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TimesheetDescription', 'TimesheetHours', 'TimesheetUserId', 'TimesheetProjectId', 'TimesheetBudgetId', 'TimesheetMilestoneId', 'TimesheetTaskId', 'TimesheetIsBillable', 'TimesheetTypeId', 'TimesheetDate', ),
		BasePeer::TYPE_COLNAME => array (TimesheetPeer::ID, TimesheetPeer::TIMESHEET_DESCRIPTION, TimesheetPeer::TIMESHEET_HOURS, TimesheetPeer::TIMESHEET_USER_ID, TimesheetPeer::TIMESHEET_PROJECT_ID, TimesheetPeer::TIMESHEET_BUDGET_ID, TimesheetPeer::TIMESHEET_MILESTONE_ID, TimesheetPeer::TIMESHEET_TASK_ID, TimesheetPeer::TIMESHEET_IS_BILLABLE, TimesheetPeer::TIMESHEET_TYPE_ID, TimesheetPeer::TIMESHEET_DATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'timesheet_description', 'timesheet_hours', 'timesheet_user_id', 'timesheet_project_id', 'timesheet_budget_id', 'timesheet_milestone_id', 'timesheet_task_id', 'timesheet_is_billable', 'timesheet_type_id', 'timesheet_date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TimesheetDescription' => 1, 'TimesheetHours' => 2, 'TimesheetUserId' => 3, 'TimesheetProjectId' => 4, 'TimesheetBudgetId' => 5, 'TimesheetMilestoneId' => 6, 'TimesheetTaskId' => 7, 'TimesheetIsBillable' => 8, 'TimesheetTypeId' => 9, 'TimesheetDate' => 10, ),
		BasePeer::TYPE_COLNAME => array (TimesheetPeer::ID => 0, TimesheetPeer::TIMESHEET_DESCRIPTION => 1, TimesheetPeer::TIMESHEET_HOURS => 2, TimesheetPeer::TIMESHEET_USER_ID => 3, TimesheetPeer::TIMESHEET_PROJECT_ID => 4, TimesheetPeer::TIMESHEET_BUDGET_ID => 5, TimesheetPeer::TIMESHEET_MILESTONE_ID => 6, TimesheetPeer::TIMESHEET_TASK_ID => 7, TimesheetPeer::TIMESHEET_IS_BILLABLE => 8, TimesheetPeer::TIMESHEET_TYPE_ID => 9, TimesheetPeer::TIMESHEET_DATE => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'timesheet_description' => 1, 'timesheet_hours' => 2, 'timesheet_user_id' => 3, 'timesheet_project_id' => 4, 'timesheet_budget_id' => 5, 'timesheet_milestone_id' => 6, 'timesheet_task_id' => 7, 'timesheet_is_billable' => 8, 'timesheet_type_id' => 9, 'timesheet_date' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TimesheetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TimesheetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TimesheetPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(TimesheetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TimesheetPeer::ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_DESCRIPTION);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_HOURS);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_USER_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_PROJECT_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_BUDGET_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_MILESTONE_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_TASK_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_IS_BILLABLE);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_TYPE_ID);

		$criteria->addSelectColumn(TimesheetPeer::TIMESHEET_DATE);

	}

	const COUNT = 'COUNT(aranet_timesheet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_timesheet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = TimesheetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TimesheetPeer::populateObjects(TimesheetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseTimesheetPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseTimesheetPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseTimesheetPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseTimesheetPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TimesheetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TimesheetPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinMilestone(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinBudget(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTask(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTypeOfHour(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);
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
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinMilestone(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MilestonePeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MilestonePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getMilestone(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinBudget(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTask(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TaskPeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTask(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTypeOfHour(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TypeOfHourPeer::addSelectColumns($c);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TypeOfHourPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTimesheet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
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

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

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


	
	public static function doCountJoinAllExceptProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptMilestone(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptBudget(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTask(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTypeOfHour(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TimesheetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TimesheetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$criteria->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$rs = TimesheetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptProject(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol2 = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MilestonePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MilestonePeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		TaskPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TaskPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMilestone(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudget(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTask(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptMilestone(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TimesheetPeer::addSelectColumns($c);
		$startcol2 = (TimesheetPeer::NUM_COLUMNS - TimesheetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		TaskPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TaskPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudget(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTask(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptBudget(Criteria $c, $con = null)
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

		TaskPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TaskPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMilestone(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTask(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTask(Criteria $c, $con = null)
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

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMilestone(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUser(Criteria $c, $con = null)
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

		TypeOfHourPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMilestone(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getTask(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTypeOfHour(Criteria $c, $con = null)
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

		$c->addJoin(TimesheetPeer::TIMESHEET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_TASK_ID, TaskPeer::ID);

		$c->addJoin(TimesheetPeer::TIMESHEET_USER_ID, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TimesheetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTimesheets();
				$obj2->addTimesheet($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMilestone(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTimesheets();
				$obj3->addTimesheet($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTimesheets();
				$obj4->addTimesheet($obj1);
			}

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getTask(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTimesheets();
				$obj5->addTimesheet($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTimesheet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTimesheets();
				$obj6->addTimesheet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return TimesheetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTimesheetPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTimesheetPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TimesheetPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseTimesheetPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseTimesheetPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTimesheetPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTimesheetPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(TimesheetPeer::ID);
			$selectCriteria->add(TimesheetPeer::ID, $criteria->remove(TimesheetPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseTimesheetPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseTimesheetPeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(TimesheetPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(TimesheetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Timesheet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TimesheetPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Timesheet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TimesheetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TimesheetPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(TimesheetPeer::DATABASE_NAME, TimesheetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TimesheetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(TimesheetPeer::DATABASE_NAME);

		$criteria->add(TimesheetPeer::ID, $pk);


		$v = TimesheetPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(TimesheetPeer::ID, $pks, Criteria::IN);
			$objs = TimesheetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

        
        public static function getBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $test = $baseColumnNames[$key];
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelect($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        
        
        public static function getOneBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelectOne($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        
        public static function getPager($page, $max_items_per_page = null, $criteria = null)
        {

       if($criteria == null)
        $c = new Criteria();

                        if($max_items_per_page === null)
            {
                if(sfConfig::get('app_pager_default_max'))
                    $max_items_per_page =  sfConfig::get('app_pager_default_max');
                else
                    $max_items_per_page = 10;
            }

                        $pager = new sfPropelPager('Timesheet', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseTimesheetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TimesheetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TimesheetMapBuilder');
}

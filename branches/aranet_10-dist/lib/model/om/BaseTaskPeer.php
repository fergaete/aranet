<?php


abstract class BaseTaskPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_project_task';

	
	const CLASS_DEFAULT = 'lib.model.Task';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_project_task.ID';

	
	const TASK_TITLE = 'aranet_project_task.TASK_TITLE';

	
	const TASK_DESCRIPTION = 'aranet_project_task.TASK_DESCRIPTION';

	
	const TASK_START_DATE = 'aranet_project_task.TASK_START_DATE';

	
	const TASK_FINISH_DATE = 'aranet_project_task.TASK_FINISH_DATE';

	
	const TASK_TOTAL_DURATION = 'aranet_project_task.TASK_TOTAL_DURATION';

	
	const TASK_PRIORITY_ID = 'aranet_project_task.TASK_PRIORITY_ID';

	
	const TASK_PROJECT_ID = 'aranet_project_task.TASK_PROJECT_ID';

	
	const TASK_MILESTONE_ID = 'aranet_project_task.TASK_MILESTONE_ID';

	
	const TASK_BUDGET_ID = 'aranet_project_task.TASK_BUDGET_ID';

	
	const TASK_ESTIMATED_HOURS = 'aranet_project_task.TASK_ESTIMATED_HOURS';

	
	const TASK_TOTAL_HOURS = 'aranet_project_task.TASK_TOTAL_HOURS';

	
	const TASK_TOTAL_HOUR_COSTS = 'aranet_project_task.TASK_TOTAL_HOUR_COSTS';

	
	const CREATED_AT = 'aranet_project_task.CREATED_AT';

	
	const CREATED_BY = 'aranet_project_task.CREATED_BY';

	
	const UPDATED_AT = 'aranet_project_task.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_project_task.UPDATED_BY';

	
	const DELETED_AT = 'aranet_project_task.DELETED_AT';

	
	const DELETED_BY = 'aranet_project_task.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TaskTitle', 'TaskDescription', 'TaskStartDate', 'TaskFinishDate', 'TaskTotalDuration', 'TaskPriorityId', 'TaskProjectId', 'TaskMilestoneId', 'TaskBudgetId', 'TaskEstimatedHours', 'TaskTotalHours', 'TaskTotalHourCosts', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (TaskPeer::ID, TaskPeer::TASK_TITLE, TaskPeer::TASK_DESCRIPTION, TaskPeer::TASK_START_DATE, TaskPeer::TASK_FINISH_DATE, TaskPeer::TASK_TOTAL_DURATION, TaskPeer::TASK_PRIORITY_ID, TaskPeer::TASK_PROJECT_ID, TaskPeer::TASK_MILESTONE_ID, TaskPeer::TASK_BUDGET_ID, TaskPeer::TASK_ESTIMATED_HOURS, TaskPeer::TASK_TOTAL_HOURS, TaskPeer::TASK_TOTAL_HOUR_COSTS, TaskPeer::CREATED_AT, TaskPeer::CREATED_BY, TaskPeer::UPDATED_AT, TaskPeer::UPDATED_BY, TaskPeer::DELETED_AT, TaskPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'task_title', 'task_description', 'task_start_date', 'task_finish_date', 'task_total_duration', 'task_priority_id', 'task_project_id', 'task_milestone_id', 'task_budget_id', 'task_estimated_hours', 'task_total_hours', 'task_total_hour_costs', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TaskTitle' => 1, 'TaskDescription' => 2, 'TaskStartDate' => 3, 'TaskFinishDate' => 4, 'TaskTotalDuration' => 5, 'TaskPriorityId' => 6, 'TaskProjectId' => 7, 'TaskMilestoneId' => 8, 'TaskBudgetId' => 9, 'TaskEstimatedHours' => 10, 'TaskTotalHours' => 11, 'TaskTotalHourCosts' => 12, 'CreatedAt' => 13, 'CreatedBy' => 14, 'UpdatedAt' => 15, 'UpdatedBy' => 16, 'DeletedAt' => 17, 'DeletedBy' => 18, ),
		BasePeer::TYPE_COLNAME => array (TaskPeer::ID => 0, TaskPeer::TASK_TITLE => 1, TaskPeer::TASK_DESCRIPTION => 2, TaskPeer::TASK_START_DATE => 3, TaskPeer::TASK_FINISH_DATE => 4, TaskPeer::TASK_TOTAL_DURATION => 5, TaskPeer::TASK_PRIORITY_ID => 6, TaskPeer::TASK_PROJECT_ID => 7, TaskPeer::TASK_MILESTONE_ID => 8, TaskPeer::TASK_BUDGET_ID => 9, TaskPeer::TASK_ESTIMATED_HOURS => 10, TaskPeer::TASK_TOTAL_HOURS => 11, TaskPeer::TASK_TOTAL_HOUR_COSTS => 12, TaskPeer::CREATED_AT => 13, TaskPeer::CREATED_BY => 14, TaskPeer::UPDATED_AT => 15, TaskPeer::UPDATED_BY => 16, TaskPeer::DELETED_AT => 17, TaskPeer::DELETED_BY => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'task_title' => 1, 'task_description' => 2, 'task_start_date' => 3, 'task_finish_date' => 4, 'task_total_duration' => 5, 'task_priority_id' => 6, 'task_project_id' => 7, 'task_milestone_id' => 8, 'task_budget_id' => 9, 'task_estimated_hours' => 10, 'task_total_hours' => 11, 'task_total_hour_costs' => 12, 'created_at' => 13, 'created_by' => 14, 'updated_at' => 15, 'updated_by' => 16, 'deleted_at' => 17, 'deleted_by' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TaskMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TaskMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TaskPeer::getTableMap();
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
		return str_replace(TaskPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TaskPeer::ID);

		$criteria->addSelectColumn(TaskPeer::TASK_TITLE);

		$criteria->addSelectColumn(TaskPeer::TASK_DESCRIPTION);

		$criteria->addSelectColumn(TaskPeer::TASK_START_DATE);

		$criteria->addSelectColumn(TaskPeer::TASK_FINISH_DATE);

		$criteria->addSelectColumn(TaskPeer::TASK_TOTAL_DURATION);

		$criteria->addSelectColumn(TaskPeer::TASK_PRIORITY_ID);

		$criteria->addSelectColumn(TaskPeer::TASK_PROJECT_ID);

		$criteria->addSelectColumn(TaskPeer::TASK_MILESTONE_ID);

		$criteria->addSelectColumn(TaskPeer::TASK_BUDGET_ID);

		$criteria->addSelectColumn(TaskPeer::TASK_ESTIMATED_HOURS);

		$criteria->addSelectColumn(TaskPeer::TASK_TOTAL_HOURS);

		$criteria->addSelectColumn(TaskPeer::TASK_TOTAL_HOUR_COSTS);

		$criteria->addSelectColumn(TaskPeer::CREATED_AT);

		$criteria->addSelectColumn(TaskPeer::CREATED_BY);

		$criteria->addSelectColumn(TaskPeer::UPDATED_AT);

		$criteria->addSelectColumn(TaskPeer::UPDATED_BY);

		$criteria->addSelectColumn(TaskPeer::DELETED_AT);

		$criteria->addSelectColumn(TaskPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_project_task.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_project_task.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
		$objects = TaskPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TaskPeer::populateObjects(TaskPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseTaskPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseTaskPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseTaskPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TaskPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TaskPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTaskPriority(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTaskRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTaskRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasksRelatedByUpdatedBy();
				$obj2->addTaskRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTaskRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasksRelatedByDeletedBy();
				$obj2->addTaskRelatedByDeletedBy($obj1); 			}
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

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

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
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTaskPriority(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TaskPriorityPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TaskPriorityPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTaskPriority(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
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

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MilestonePeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

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
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

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
										$temp_obj2->addTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTaskRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTaskRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initTasksRelatedByUpdatedBy();
				$obj3->addTaskRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTaskRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initTasksRelatedByDeletedBy();
				$obj4->addTaskRelatedByDeletedBy($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getBudget(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}


					
			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTaskPriority(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initTasks();
				$obj6->addTask($obj1);
			}


					
			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getMilestone(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initTasks();
				$obj7->addTask($obj1);
			}


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getProject(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initTasks();
				$obj8->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTaskPriority(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$rs = TaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTaskPriority(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasks();
				$obj3->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMilestone(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasks();
				$obj4->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTaskPriority(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasks();
				$obj3->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMilestone(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasks();
				$obj4->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasks();
				$obj2->addTask($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTaskPriority(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasks();
				$obj3->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMilestone(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasks();
				$obj4->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
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

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTaskRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTaskRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasksRelatedByUpdatedBy();
				$obj3->addTaskRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTaskRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasksRelatedByDeletedBy();
				$obj4->addTaskRelatedByDeletedBy($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getTaskPriority(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getMilestone(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTasks();
				$obj6->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initTasks();
				$obj7->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTaskPriority(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + BudgetPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + MilestonePeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTaskRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTaskRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasksRelatedByUpdatedBy();
				$obj3->addTaskRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTaskRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasksRelatedByDeletedBy();
				$obj4->addTaskRelatedByDeletedBy($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getBudget(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getMilestone(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTasks();
				$obj6->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initTasks();
				$obj7->addTask($obj1);
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

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TaskPriorityPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTaskRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTaskRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasksRelatedByUpdatedBy();
				$obj3->addTaskRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTaskRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasksRelatedByDeletedBy();
				$obj4->addTaskRelatedByDeletedBy($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getBudget(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTaskPriority(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTasks();
				$obj6->addTask($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initTasks();
				$obj7->addTask($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProject(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TaskPeer::addSelectColumns($c);
		$startcol2 = (TaskPeer::NUM_COLUMNS - TaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + BudgetPeer::NUM_COLUMNS;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + TaskPriorityPeer::NUM_COLUMNS;

		MilestonePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + MilestonePeer::NUM_COLUMNS;

		$c->addJoin(TaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(TaskPeer::TASK_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(TaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(TaskPeer::TASK_MILESTONE_ID, MilestonePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTaskRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initTasksRelatedByCreatedBy();
				$obj2->addTaskRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addTaskRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initTasksRelatedByUpdatedBy();
				$obj3->addTaskRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addTaskRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initTasksRelatedByDeletedBy();
				$obj4->addTaskRelatedByDeletedBy($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getBudget(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initTasks();
				$obj5->addTask($obj1);
			}

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getTaskPriority(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initTasks();
				$obj6->addTask($obj1);
			}

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getMilestone(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initTasks();
				$obj7->addTask($obj1);
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
		return TaskPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTaskPeer', $values, $con);
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

		$criteria->remove(TaskPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseTaskPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseTaskPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseTaskPeer', $values, $con);
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
			$comparison = $criteria->getComparison(TaskPeer::ID);
			$selectCriteria->add(TaskPeer::ID, $criteria->remove(TaskPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseTaskPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseTaskPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(TaskPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TaskPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Task) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TaskPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Task $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TaskPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TaskPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TaskPeer::DATABASE_NAME, TaskPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TaskPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TaskPeer::DATABASE_NAME);

		$criteria->add(TaskPeer::ID, $pk);


		$v = TaskPeer::doSelect($criteria, $con);

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
			$criteria->add(TaskPeer::ID, $pks, Criteria::IN);
			$objs = TaskPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Task', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseTaskPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TaskMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TaskMapBuilder');
}

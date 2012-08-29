<?php


abstract class BaseMilestonePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_project_milestone';

	
	const CLASS_DEFAULT = 'lib.model.Milestone';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_project_milestone.ID';

	
	const MILESTONE_TITLE = 'aranet_project_milestone.MILESTONE_TITLE';

	
	const MILESTONE_DESCRIPTION = 'aranet_project_milestone.MILESTONE_DESCRIPTION';

	
	const MILESTONE_START_DATE = 'aranet_project_milestone.MILESTONE_START_DATE';

	
	const MILESTONE_FINISH_DATE = 'aranet_project_milestone.MILESTONE_FINISH_DATE';

	
	const MILESTONE_PROJECT_ID = 'aranet_project_milestone.MILESTONE_PROJECT_ID';

	
	const MILESTONE_BUDGET_ID = 'aranet_project_milestone.MILESTONE_BUDGET_ID';

	
	const MILESTONE_ESTIMATED_HOURS = 'aranet_project_milestone.MILESTONE_ESTIMATED_HOURS';

	
	const MILESTONE_TOTAL_HOURS = 'aranet_project_milestone.MILESTONE_TOTAL_HOURS';

	
	const MILESTONE_TOTAL_HOUR_COSTS = 'aranet_project_milestone.MILESTONE_TOTAL_HOUR_COSTS';

	
	const CREATED_AT = 'aranet_project_milestone.CREATED_AT';

	
	const CREATED_BY = 'aranet_project_milestone.CREATED_BY';

	
	const UPDATED_AT = 'aranet_project_milestone.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_project_milestone.UPDATED_BY';

	
	const DELETED_AT = 'aranet_project_milestone.DELETED_AT';

	
	const DELETED_BY = 'aranet_project_milestone.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'MilestoneTitle', 'MilestoneDescription', 'MilestoneStartDate', 'MilestoneFinishDate', 'MilestoneProjectId', 'MilestoneBudgetId', 'MilestoneEstimatedHours', 'MilestoneTotalHours', 'MilestoneTotalHourCosts', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (MilestonePeer::ID, MilestonePeer::MILESTONE_TITLE, MilestonePeer::MILESTONE_DESCRIPTION, MilestonePeer::MILESTONE_START_DATE, MilestonePeer::MILESTONE_FINISH_DATE, MilestonePeer::MILESTONE_PROJECT_ID, MilestonePeer::MILESTONE_BUDGET_ID, MilestonePeer::MILESTONE_ESTIMATED_HOURS, MilestonePeer::MILESTONE_TOTAL_HOURS, MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS, MilestonePeer::CREATED_AT, MilestonePeer::CREATED_BY, MilestonePeer::UPDATED_AT, MilestonePeer::UPDATED_BY, MilestonePeer::DELETED_AT, MilestonePeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'milestone_title', 'milestone_description', 'milestone_start_date', 'milestone_finish_date', 'milestone_project_id', 'milestone_budget_id', 'milestone_estimated_hours', 'milestone_total_hours', 'milestone_total_hour_costs', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'MilestoneTitle' => 1, 'MilestoneDescription' => 2, 'MilestoneStartDate' => 3, 'MilestoneFinishDate' => 4, 'MilestoneProjectId' => 5, 'MilestoneBudgetId' => 6, 'MilestoneEstimatedHours' => 7, 'MilestoneTotalHours' => 8, 'MilestoneTotalHourCosts' => 9, 'CreatedAt' => 10, 'CreatedBy' => 11, 'UpdatedAt' => 12, 'UpdatedBy' => 13, 'DeletedAt' => 14, 'DeletedBy' => 15, ),
		BasePeer::TYPE_COLNAME => array (MilestonePeer::ID => 0, MilestonePeer::MILESTONE_TITLE => 1, MilestonePeer::MILESTONE_DESCRIPTION => 2, MilestonePeer::MILESTONE_START_DATE => 3, MilestonePeer::MILESTONE_FINISH_DATE => 4, MilestonePeer::MILESTONE_PROJECT_ID => 5, MilestonePeer::MILESTONE_BUDGET_ID => 6, MilestonePeer::MILESTONE_ESTIMATED_HOURS => 7, MilestonePeer::MILESTONE_TOTAL_HOURS => 8, MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS => 9, MilestonePeer::CREATED_AT => 10, MilestonePeer::CREATED_BY => 11, MilestonePeer::UPDATED_AT => 12, MilestonePeer::UPDATED_BY => 13, MilestonePeer::DELETED_AT => 14, MilestonePeer::DELETED_BY => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'milestone_title' => 1, 'milestone_description' => 2, 'milestone_start_date' => 3, 'milestone_finish_date' => 4, 'milestone_project_id' => 5, 'milestone_budget_id' => 6, 'milestone_estimated_hours' => 7, 'milestone_total_hours' => 8, 'milestone_total_hour_costs' => 9, 'created_at' => 10, 'created_by' => 11, 'updated_at' => 12, 'updated_by' => 13, 'deleted_at' => 14, 'deleted_by' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MilestoneMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MilestoneMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MilestonePeer::getTableMap();
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
		return str_replace(MilestonePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MilestonePeer::ID);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_TITLE);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_DESCRIPTION);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_START_DATE);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_FINISH_DATE);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_PROJECT_ID);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_BUDGET_ID);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_ESTIMATED_HOURS);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_TOTAL_HOURS);

		$criteria->addSelectColumn(MilestonePeer::MILESTONE_TOTAL_HOUR_COSTS);

		$criteria->addSelectColumn(MilestonePeer::CREATED_AT);

		$criteria->addSelectColumn(MilestonePeer::CREATED_BY);

		$criteria->addSelectColumn(MilestonePeer::UPDATED_AT);

		$criteria->addSelectColumn(MilestonePeer::UPDATED_BY);

		$criteria->addSelectColumn(MilestonePeer::DELETED_AT);

		$criteria->addSelectColumn(MilestonePeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_project_milestone.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_project_milestone.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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
		$objects = MilestonePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MilestonePeer::populateObjects(MilestonePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseMilestonePeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseMilestonePeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseMilestonePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseMilestonePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MilestonePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MilestonePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinBudgetRelatedByMilestoneProjectId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinBudgetRelatedByMilestoneBudgetId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinBudgetRelatedByMilestoneProjectId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneProjectId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMilestoneRelatedByMilestoneProjectId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneProjectId();
				$obj2->addMilestoneRelatedByMilestoneProjectId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinBudgetRelatedByMilestoneBudgetId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneBudgetId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMilestoneRelatedByMilestoneBudgetId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneBudgetId();
				$obj2->addMilestoneRelatedByMilestoneBudgetId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
										$temp_obj2->addMilestoneRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMilestonesRelatedByCreatedBy();
				$obj2->addMilestoneRelatedByCreatedBy($obj1); 			}
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

		MilestonePeer::addSelectColumns($c);
		$startcol = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
										$temp_obj2->addMilestoneRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMilestonesRelatedByUpdatedBy();
				$obj2->addMilestoneRelatedByUpdatedBy($obj1); 			}
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

		MilestonePeer::addSelectColumns($c);
		$startcol = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
										$temp_obj2->addMilestoneRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMilestonesRelatedByDeletedBy();
				$obj2->addMilestoneRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$criteria->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$c->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneProjectId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMilestoneRelatedByMilestoneProjectId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneProjectId();
				$obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudgetRelatedByMilestoneBudgetId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMilestoneRelatedByMilestoneBudgetId($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByMilestoneBudgetId();
				$obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addMilestoneRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initMilestonesRelatedByCreatedBy();
				$obj4->addMilestoneRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addMilestoneRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initMilestonesRelatedByUpdatedBy();
				$obj5->addMilestoneRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addMilestoneRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initMilestonesRelatedByDeletedBy();
				$obj6->addMilestoneRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptBudgetRelatedByMilestoneProjectId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptBudgetRelatedByMilestoneBudgetId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$criteria->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$criteria->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MilestonePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MilestonePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$criteria->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);

		$rs = MilestonePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptBudgetRelatedByMilestoneProjectId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
					$temp_obj2->addMilestoneRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByCreatedBy();
				$obj2->addMilestoneRelatedByCreatedBy($obj1);
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
					$temp_obj3->addMilestoneRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByUpdatedBy();
				$obj3->addMilestoneRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addMilestoneRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initMilestonesRelatedByDeletedBy();
				$obj4->addMilestoneRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptBudgetRelatedByMilestoneBudgetId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MilestonePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
					$temp_obj2->addMilestoneRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByCreatedBy();
				$obj2->addMilestoneRelatedByCreatedBy($obj1);
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
					$temp_obj3->addMilestoneRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByUpdatedBy();
				$obj3->addMilestoneRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addMilestoneRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initMilestonesRelatedByDeletedBy();
				$obj4->addMilestoneRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$c->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneProjectId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneProjectId();
				$obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudgetRelatedByMilestoneBudgetId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByMilestoneBudgetId();
				$obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
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

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$c->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneProjectId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneProjectId();
				$obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudgetRelatedByMilestoneBudgetId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByMilestoneBudgetId();
				$obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
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

		MilestonePeer::addSelectColumns($c);
		$startcol2 = (MilestonePeer::NUM_COLUMNS - MilestonePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(MilestonePeer::MILESTONE_PROJECT_ID, BudgetPeer::ID);

		$c->addJoin(MilestonePeer::MILESTONE_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MilestonePeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getBudgetRelatedByMilestoneProjectId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMilestonesRelatedByMilestoneProjectId();
				$obj2->addMilestoneRelatedByMilestoneProjectId($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudgetRelatedByMilestoneBudgetId(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initMilestonesRelatedByMilestoneBudgetId();
				$obj3->addMilestoneRelatedByMilestoneBudgetId($obj1);
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
		return MilestonePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMilestonePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMilestonePeer', $values, $con);
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

		$criteria->remove(MilestonePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseMilestonePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseMilestonePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMilestonePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMilestonePeer', $values, $con);
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
			$comparison = $criteria->getComparison(MilestonePeer::ID);
			$selectCriteria->add(MilestonePeer::ID, $criteria->remove(MilestonePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseMilestonePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseMilestonePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(MilestonePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MilestonePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Milestone) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MilestonePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Milestone $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MilestonePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MilestonePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MilestonePeer::DATABASE_NAME, MilestonePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MilestonePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MilestonePeer::DATABASE_NAME);

		$criteria->add(MilestonePeer::ID, $pk);


		$v = MilestonePeer::doSelect($criteria, $con);

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
			$criteria->add(MilestonePeer::ID, $pks, Criteria::IN);
			$objs = MilestonePeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Milestone', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseMilestonePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MilestoneMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MilestoneMapBuilder');
}

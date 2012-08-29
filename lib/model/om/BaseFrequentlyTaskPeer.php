<?php


abstract class BaseFrequentlyTaskPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_project_frequently_task';

	
	const CLASS_DEFAULT = 'lib.model.FrequentlyTask';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_project_frequently_task.ID';

	
	const TASK_TITLE = 'aranet_project_frequently_task.TASK_TITLE';

	
	const TASK_DESCRIPTION = 'aranet_project_frequently_task.TASK_DESCRIPTION';

	
	const TASK_PRIORITY_ID = 'aranet_project_frequently_task.TASK_PRIORITY_ID';

	
	const CREATED_AT = 'aranet_project_frequently_task.CREATED_AT';

	
	const CREATED_BY = 'aranet_project_frequently_task.CREATED_BY';

	
	const UPDATED_AT = 'aranet_project_frequently_task.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_project_frequently_task.UPDATED_BY';

	
	const DELETED_AT = 'aranet_project_frequently_task.DELETED_AT';

	
	const DELETED_BY = 'aranet_project_frequently_task.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TaskTitle', 'TaskDescription', 'TaskPriorityId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (FrequentlyTaskPeer::ID, FrequentlyTaskPeer::TASK_TITLE, FrequentlyTaskPeer::TASK_DESCRIPTION, FrequentlyTaskPeer::TASK_PRIORITY_ID, FrequentlyTaskPeer::CREATED_AT, FrequentlyTaskPeer::CREATED_BY, FrequentlyTaskPeer::UPDATED_AT, FrequentlyTaskPeer::UPDATED_BY, FrequentlyTaskPeer::DELETED_AT, FrequentlyTaskPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'task_title', 'task_description', 'task_priority_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TaskTitle' => 1, 'TaskDescription' => 2, 'TaskPriorityId' => 3, 'CreatedAt' => 4, 'CreatedBy' => 5, 'UpdatedAt' => 6, 'UpdatedBy' => 7, 'DeletedAt' => 8, 'DeletedBy' => 9, ),
		BasePeer::TYPE_COLNAME => array (FrequentlyTaskPeer::ID => 0, FrequentlyTaskPeer::TASK_TITLE => 1, FrequentlyTaskPeer::TASK_DESCRIPTION => 2, FrequentlyTaskPeer::TASK_PRIORITY_ID => 3, FrequentlyTaskPeer::CREATED_AT => 4, FrequentlyTaskPeer::CREATED_BY => 5, FrequentlyTaskPeer::UPDATED_AT => 6, FrequentlyTaskPeer::UPDATED_BY => 7, FrequentlyTaskPeer::DELETED_AT => 8, FrequentlyTaskPeer::DELETED_BY => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'task_title' => 1, 'task_description' => 2, 'task_priority_id' => 3, 'created_at' => 4, 'created_by' => 5, 'updated_at' => 6, 'updated_by' => 7, 'deleted_at' => 8, 'deleted_by' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FrequentlyTaskMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FrequentlyTaskMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FrequentlyTaskPeer::getTableMap();
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
		return str_replace(FrequentlyTaskPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FrequentlyTaskPeer::ID);

		$criteria->addSelectColumn(FrequentlyTaskPeer::TASK_TITLE);

		$criteria->addSelectColumn(FrequentlyTaskPeer::TASK_DESCRIPTION);

		$criteria->addSelectColumn(FrequentlyTaskPeer::TASK_PRIORITY_ID);

		$criteria->addSelectColumn(FrequentlyTaskPeer::CREATED_AT);

		$criteria->addSelectColumn(FrequentlyTaskPeer::CREATED_BY);

		$criteria->addSelectColumn(FrequentlyTaskPeer::UPDATED_AT);

		$criteria->addSelectColumn(FrequentlyTaskPeer::UPDATED_BY);

		$criteria->addSelectColumn(FrequentlyTaskPeer::DELETED_AT);

		$criteria->addSelectColumn(FrequentlyTaskPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_project_frequently_task.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_project_frequently_task.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
		$objects = FrequentlyTaskPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FrequentlyTaskPeer::populateObjects(FrequentlyTaskPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseFrequentlyTaskPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseFrequentlyTaskPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FrequentlyTaskPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FrequentlyTaskPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTaskPriority(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTaskPriority(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TaskPriorityPeer::addSelectColumns($c);

		$c->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

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
										$temp_obj2->addFrequentlyTask($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFrequentlyTasks();
				$obj2->addFrequentlyTask($obj1); 			}
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

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
										$temp_obj2->addFrequentlyTaskRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFrequentlyTasksRelatedByCreatedBy();
				$obj2->addFrequentlyTaskRelatedByCreatedBy($obj1); 			}
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

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
										$temp_obj2->addFrequentlyTaskRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFrequentlyTasksRelatedByUpdatedBy();
				$obj2->addFrequentlyTaskRelatedByUpdatedBy($obj1); 			}
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

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
										$temp_obj2->addFrequentlyTaskRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFrequentlyTasksRelatedByDeletedBy();
				$obj2->addFrequentlyTaskRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$criteria->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol2 = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TaskPriorityPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$c->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTaskPriority(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFrequentlyTask($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initFrequentlyTasks();
				$obj2->addFrequentlyTask($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFrequentlyTaskRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initFrequentlyTasksRelatedByCreatedBy();
				$obj3->addFrequentlyTaskRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addFrequentlyTaskRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initFrequentlyTasksRelatedByUpdatedBy();
				$obj4->addFrequentlyTaskRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addFrequentlyTaskRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initFrequentlyTasksRelatedByDeletedBy();
				$obj5->addFrequentlyTaskRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTaskPriority(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FrequentlyTaskPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);

		$rs = FrequentlyTaskPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTaskPriority(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol2 = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(FrequentlyTaskPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(FrequentlyTaskPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(FrequentlyTaskPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

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
					$temp_obj2->addFrequentlyTaskRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFrequentlyTasksRelatedByCreatedBy();
				$obj2->addFrequentlyTaskRelatedByCreatedBy($obj1);
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
					$temp_obj3->addFrequentlyTaskRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initFrequentlyTasksRelatedByUpdatedBy();
				$obj3->addFrequentlyTaskRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addFrequentlyTaskRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initFrequentlyTasksRelatedByDeletedBy();
				$obj4->addFrequentlyTaskRelatedByDeletedBy($obj1);
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol2 = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TaskPriorityPeer::NUM_COLUMNS;

		$c->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTaskPriority(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFrequentlyTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFrequentlyTasks();
				$obj2->addFrequentlyTask($obj1);
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol2 = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TaskPriorityPeer::NUM_COLUMNS;

		$c->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTaskPriority(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFrequentlyTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFrequentlyTasks();
				$obj2->addFrequentlyTask($obj1);
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

		FrequentlyTaskPeer::addSelectColumns($c);
		$startcol2 = (FrequentlyTaskPeer::NUM_COLUMNS - FrequentlyTaskPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TaskPriorityPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TaskPriorityPeer::NUM_COLUMNS;

		$c->addJoin(FrequentlyTaskPeer::TASK_PRIORITY_ID, TaskPriorityPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FrequentlyTaskPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TaskPriorityPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTaskPriority(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFrequentlyTask($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initFrequentlyTasks();
				$obj2->addFrequentlyTask($obj1);
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
		return FrequentlyTaskPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseFrequentlyTaskPeer', $values, $con);
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

		$criteria->remove(FrequentlyTaskPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseFrequentlyTaskPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseFrequentlyTaskPeer', $values, $con);
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
			$comparison = $criteria->getComparison(FrequentlyTaskPeer::ID);
			$selectCriteria->add(FrequentlyTaskPeer::ID, $criteria->remove(FrequentlyTaskPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseFrequentlyTaskPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseFrequentlyTaskPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(FrequentlyTaskPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FrequentlyTaskPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FrequentlyTask) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FrequentlyTaskPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(FrequentlyTask $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FrequentlyTaskPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FrequentlyTaskPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FrequentlyTaskPeer::DATABASE_NAME, FrequentlyTaskPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FrequentlyTaskPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FrequentlyTaskPeer::DATABASE_NAME);

		$criteria->add(FrequentlyTaskPeer::ID, $pk);


		$v = FrequentlyTaskPeer::doSelect($criteria, $con);

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
			$criteria->add(FrequentlyTaskPeer::ID, $pks, Criteria::IN);
			$objs = FrequentlyTaskPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('FrequentlyTask', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseFrequentlyTaskPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FrequentlyTaskMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FrequentlyTaskMapBuilder');
}

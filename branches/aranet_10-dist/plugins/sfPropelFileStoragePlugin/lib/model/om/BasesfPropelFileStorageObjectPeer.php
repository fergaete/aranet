<?php


abstract class BasesfPropelFileStorageObjectPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_file_object';

	
	const CLASS_DEFAULT = 'plugins.sfPropelFileStoragePlugin.lib.model.sfPropelFileStorageObject';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_file_object.ID';

	
	const FILE_OBJECT_ID = 'sf_file_object.FILE_OBJECT_ID';

	
	const FILE_OBJECT_CLASS = 'sf_file_object.FILE_OBJECT_CLASS';

	
	const FILE_INFO_ID = 'sf_file_object.FILE_INFO_ID';

	
	const CREATED_AT = 'sf_file_object.CREATED_AT';

	
	const CREATED_BY = 'sf_file_object.CREATED_BY';

	
	const UPDATED_AT = 'sf_file_object.UPDATED_AT';

	
	const UPDATED_BY = 'sf_file_object.UPDATED_BY';

	
	const DELETED_AT = 'sf_file_object.DELETED_AT';

	
	const DELETED_BY = 'sf_file_object.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FileObjectId', 'FileObjectClass', 'FileInfoId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (sfPropelFileStorageObjectPeer::ID, sfPropelFileStorageObjectPeer::FILE_OBJECT_ID, sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS, sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageObjectPeer::CREATED_AT, sfPropelFileStorageObjectPeer::CREATED_BY, sfPropelFileStorageObjectPeer::UPDATED_AT, sfPropelFileStorageObjectPeer::UPDATED_BY, sfPropelFileStorageObjectPeer::DELETED_AT, sfPropelFileStorageObjectPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'file_object_id', 'file_object_class', 'file_info_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FileObjectId' => 1, 'FileObjectClass' => 2, 'FileInfoId' => 3, 'CreatedAt' => 4, 'CreatedBy' => 5, 'UpdatedAt' => 6, 'UpdatedBy' => 7, 'DeletedAt' => 8, 'DeletedBy' => 9, ),
		BasePeer::TYPE_COLNAME => array (sfPropelFileStorageObjectPeer::ID => 0, sfPropelFileStorageObjectPeer::FILE_OBJECT_ID => 1, sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS => 2, sfPropelFileStorageObjectPeer::FILE_INFO_ID => 3, sfPropelFileStorageObjectPeer::CREATED_AT => 4, sfPropelFileStorageObjectPeer::CREATED_BY => 5, sfPropelFileStorageObjectPeer::UPDATED_AT => 6, sfPropelFileStorageObjectPeer::UPDATED_BY => 7, sfPropelFileStorageObjectPeer::DELETED_AT => 8, sfPropelFileStorageObjectPeer::DELETED_BY => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'file_object_id' => 1, 'file_object_class' => 2, 'file_info_id' => 3, 'created_at' => 4, 'created_by' => 5, 'updated_at' => 6, 'updated_by' => 7, 'deleted_at' => 8, 'deleted_by' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfPropelFileStoragePlugin/lib/model/map/sfPropelFileStorageObjectMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageObjectMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfPropelFileStorageObjectPeer::getTableMap();
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
		return str_replace(sfPropelFileStorageObjectPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::ID);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::FILE_OBJECT_ID);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::FILE_OBJECT_CLASS);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::FILE_INFO_ID);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::CREATED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::CREATED_BY);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::UPDATED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::UPDATED_BY);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::DELETED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(sf_file_object.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_file_object.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
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
		$objects = sfPropelFileStorageObjectPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfPropelFileStorageObjectPeer::populateObjects(sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfPropelFileStorageObjectPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfPropelFileStorageObjectPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfPropelFileStorageInfo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserProfileRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserProfileRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserProfileRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfPropelFileStorageInfo(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfPropelFileStorageInfoPeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfPropelFileStorageInfo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfPropelFileStorageObject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageObjects();
				$obj2->addsfPropelFileStorageObject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserProfileRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserProfileRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageObjectsRelatedByCreatedBy();
				$obj2->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserProfileRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserProfileRelatedByUpdatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageObjectsRelatedByUpdatedBy();
				$obj2->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserProfileRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserProfileRelatedByDeletedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageObjectsRelatedByDeletedBy();
				$obj2->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$criteria->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
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

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfPropelFileStorageInfoPeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserProfilePeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$c->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfPropelFileStorageInfoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfPropelFileStorageInfo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageObject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageObjects();
				$obj2->addsfPropelFileStorageObject($obj1);
			}


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserProfileRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initsfPropelFileStorageObjectsRelatedByCreatedBy();
				$obj3->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserProfileRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initsfPropelFileStorageObjectsRelatedByUpdatedBy();
				$obj4->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserProfileRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initsfPropelFileStorageObjectsRelatedByDeletedBy();
				$obj5->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfPropelFileStorageInfo(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserProfileRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserProfileRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserProfileRelatedByDeletedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageObjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);

		$rs = sfPropelFileStorageObjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfPropelFileStorageInfo(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserProfilePeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageObjectPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageObjectPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageObjectPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserProfileRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageObjectsRelatedByCreatedBy();
				$obj2->addsfPropelFileStorageObjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserProfileRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initsfPropelFileStorageObjectsRelatedByUpdatedBy();
				$obj3->addsfPropelFileStorageObjectRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserProfileRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initsfPropelFileStorageObjectsRelatedByDeletedBy();
				$obj4->addsfPropelFileStorageObjectRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserProfileRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfPropelFileStorageInfoPeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfPropelFileStorageInfo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageObject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageObjects();
				$obj2->addsfPropelFileStorageObject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserProfileRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfPropelFileStorageInfoPeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfPropelFileStorageInfo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageObject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageObjects();
				$obj2->addsfPropelFileStorageObject($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserProfileRelatedByDeletedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageObjectPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageObjectPeer::NUM_COLUMNS - sfPropelFileStorageObjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfPropelFileStorageInfoPeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageObjectPeer::FILE_INFO_ID, sfPropelFileStorageInfoPeer::FILE_ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageObjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfPropelFileStorageInfo(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageObject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageObjects();
				$obj2->addsfPropelFileStorageObject($obj1);
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
		return sfPropelFileStorageObjectPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $values, $con);
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

		$criteria->remove(sfPropelFileStorageObjectPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfPropelFileStorageObjectPeer::ID);
			$selectCriteria->add(sfPropelFileStorageObjectPeer::ID, $criteria->remove(sfPropelFileStorageObjectPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfPropelFileStorageObjectPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageObjectPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfPropelFileStorageObjectPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfPropelFileStorageObjectPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfPropelFileStorageObject) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfPropelFileStorageObjectPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfPropelFileStorageObject $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfPropelFileStorageObjectPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfPropelFileStorageObjectPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfPropelFileStorageObjectPeer::DATABASE_NAME, sfPropelFileStorageObjectPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfPropelFileStorageObjectPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfPropelFileStorageObjectPeer::DATABASE_NAME);

		$criteria->add(sfPropelFileStorageObjectPeer::ID, $pk);


		$v = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);

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
			$criteria->add(sfPropelFileStorageObjectPeer::ID, $pks, Criteria::IN);
			$objs = sfPropelFileStorageObjectPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('sfPropelFileStorageObject', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BasesfPropelFileStorageObjectPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfPropelFileStoragePlugin/lib/model/map/sfPropelFileStorageObjectMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageObjectMapBuilder');
}

<?php


abstract class BasesfPropelFileStorageInfoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_file_info';

	
	const CLASS_DEFAULT = 'plugins.sfPropelFileStoragePlugin.lib.model.sfPropelFileStorageInfo';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FILE_ID = 'sf_file_info.FILE_ID';

	
	const FILE_NAME = 'sf_file_info.FILE_NAME';

	
	const FILE_TITLE = 'sf_file_info.FILE_TITLE';

	
	const FILE_SIZE = 'sf_file_info.FILE_SIZE';

	
	const FILE_MIME_TYPE = 'sf_file_info.FILE_MIME_TYPE';

	
	const FILE_WIDTH = 'sf_file_info.FILE_WIDTH';

	
	const FILE_HEIGHT = 'sf_file_info.FILE_HEIGHT';

	
	const FILE_IS_CACHED = 'sf_file_info.FILE_IS_CACHED';

	
	const CREATED_AT = 'sf_file_info.CREATED_AT';

	
	const CREATED_BY = 'sf_file_info.CREATED_BY';

	
	const UPDATED_AT = 'sf_file_info.UPDATED_AT';

	
	const UPDATED_BY = 'sf_file_info.UPDATED_BY';

	
	const DELETED_AT = 'sf_file_info.DELETED_AT';

	
	const DELETED_BY = 'sf_file_info.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FileId', 'FileName', 'FileTitle', 'FileSize', 'FileMimeType', 'FileWidth', 'FileHeight', 'FileIsCached', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (sfPropelFileStorageInfoPeer::FILE_ID, sfPropelFileStorageInfoPeer::FILE_NAME, sfPropelFileStorageInfoPeer::FILE_TITLE, sfPropelFileStorageInfoPeer::FILE_SIZE, sfPropelFileStorageInfoPeer::FILE_MIME_TYPE, sfPropelFileStorageInfoPeer::FILE_WIDTH, sfPropelFileStorageInfoPeer::FILE_HEIGHT, sfPropelFileStorageInfoPeer::FILE_IS_CACHED, sfPropelFileStorageInfoPeer::CREATED_AT, sfPropelFileStorageInfoPeer::CREATED_BY, sfPropelFileStorageInfoPeer::UPDATED_AT, sfPropelFileStorageInfoPeer::UPDATED_BY, sfPropelFileStorageInfoPeer::DELETED_AT, sfPropelFileStorageInfoPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('file_id', 'file_name', 'file_title', 'file_size', 'file_mime_type', 'file_width', 'file_height', 'file_is_cached', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FileId' => 0, 'FileName' => 1, 'FileTitle' => 2, 'FileSize' => 3, 'FileMimeType' => 4, 'FileWidth' => 5, 'FileHeight' => 6, 'FileIsCached' => 7, 'CreatedAt' => 8, 'CreatedBy' => 9, 'UpdatedAt' => 10, 'UpdatedBy' => 11, 'DeletedAt' => 12, 'DeletedBy' => 13, ),
		BasePeer::TYPE_COLNAME => array (sfPropelFileStorageInfoPeer::FILE_ID => 0, sfPropelFileStorageInfoPeer::FILE_NAME => 1, sfPropelFileStorageInfoPeer::FILE_TITLE => 2, sfPropelFileStorageInfoPeer::FILE_SIZE => 3, sfPropelFileStorageInfoPeer::FILE_MIME_TYPE => 4, sfPropelFileStorageInfoPeer::FILE_WIDTH => 5, sfPropelFileStorageInfoPeer::FILE_HEIGHT => 6, sfPropelFileStorageInfoPeer::FILE_IS_CACHED => 7, sfPropelFileStorageInfoPeer::CREATED_AT => 8, sfPropelFileStorageInfoPeer::CREATED_BY => 9, sfPropelFileStorageInfoPeer::UPDATED_AT => 10, sfPropelFileStorageInfoPeer::UPDATED_BY => 11, sfPropelFileStorageInfoPeer::DELETED_AT => 12, sfPropelFileStorageInfoPeer::DELETED_BY => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('file_id' => 0, 'file_name' => 1, 'file_title' => 2, 'file_size' => 3, 'file_mime_type' => 4, 'file_width' => 5, 'file_height' => 6, 'file_is_cached' => 7, 'created_at' => 8, 'created_by' => 9, 'updated_at' => 10, 'updated_by' => 11, 'deleted_at' => 12, 'deleted_by' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfPropelFileStoragePlugin/lib/model/map/sfPropelFileStorageInfoMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageInfoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfPropelFileStorageInfoPeer::getTableMap();
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
		return str_replace(sfPropelFileStorageInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_ID);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_NAME);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_TITLE);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_SIZE);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_MIME_TYPE);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_WIDTH);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_HEIGHT);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::FILE_IS_CACHED);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::CREATED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::CREATED_BY);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::UPDATED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::UPDATED_BY);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::DELETED_AT);

		$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(sf_file_info.FILE_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_file_info.FILE_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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
		$objects = sfPropelFileStorageInfoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfPropelFileStorageInfoPeer::populateObjects(sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfPropelFileStorageInfoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfPropelFileStorageInfoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserProfileRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageInfoPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageInfoPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageInfoPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserProfileRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageInfoPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

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
										$temp_obj2->addsfPropelFileStorageInfoRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageInfosRelatedByCreatedBy();
				$obj2->addsfPropelFileStorageInfoRelatedByCreatedBy($obj1); 			}
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

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageInfoPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

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
										$temp_obj2->addsfPropelFileStorageInfoRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageInfosRelatedByUpdatedBy();
				$obj2->addsfPropelFileStorageInfoRelatedByUpdatedBy($obj1); 			}
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

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserProfilePeer::addSelectColumns($c);

		$c->addJoin(sfPropelFileStorageInfoPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

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
										$temp_obj2->addsfPropelFileStorageInfoRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfPropelFileStorageInfosRelatedByDeletedBy();
				$obj2->addsfPropelFileStorageInfoRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfPropelFileStorageInfoPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageInfoPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$criteria->addJoin(sfPropelFileStorageInfoPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserProfilePeer::NUM_COLUMNS;

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserProfilePeer::NUM_COLUMNS;

		$c->addJoin(sfPropelFileStorageInfoPeer::CREATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageInfoPeer::UPDATED_BY, sfGuardUserProfilePeer::USER_ID);

		$c->addJoin(sfPropelFileStorageInfoPeer::DELETED_BY, sfGuardUserProfilePeer::USER_ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserProfileRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfPropelFileStorageInfoRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfPropelFileStorageInfosRelatedByCreatedBy();
				$obj2->addsfPropelFileStorageInfoRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserProfileRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addsfPropelFileStorageInfoRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initsfPropelFileStorageInfosRelatedByUpdatedBy();
				$obj3->addsfPropelFileStorageInfoRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserProfileRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addsfPropelFileStorageInfoRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initsfPropelFileStorageInfosRelatedByDeletedBy();
				$obj4->addsfPropelFileStorageInfoRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserProfileRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfPropelFileStorageInfoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfPropelFileStorageInfoPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserProfileRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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

		sfPropelFileStorageInfoPeer::addSelectColumns($c);
		$startcol2 = (sfPropelFileStorageInfoPeer::NUM_COLUMNS - sfPropelFileStorageInfoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfPropelFileStorageInfoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return sfPropelFileStorageInfoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $values, $con);
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

		$criteria->remove(sfPropelFileStorageInfoPeer::FILE_ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfPropelFileStorageInfoPeer::FILE_ID);
			$selectCriteria->add(sfPropelFileStorageInfoPeer::FILE_ID, $criteria->remove(sfPropelFileStorageInfoPeer::FILE_ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfPropelFileStorageInfoPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfPropelFileStorageInfoPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfPropelFileStorageInfoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfPropelFileStorageInfoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfPropelFileStorageInfo) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfPropelFileStorageInfoPeer::FILE_ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfPropelFileStorageInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfPropelFileStorageInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfPropelFileStorageInfoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfPropelFileStorageInfoPeer::DATABASE_NAME, sfPropelFileStorageInfoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfPropelFileStorageInfoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfPropelFileStorageInfoPeer::DATABASE_NAME);

		$criteria->add(sfPropelFileStorageInfoPeer::FILE_ID, $pk);


		$v = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);

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
			$criteria->add(sfPropelFileStorageInfoPeer::FILE_ID, $pks, Criteria::IN);
			$objs = sfPropelFileStorageInfoPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('sfPropelFileStorageInfo', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BasesfPropelFileStorageInfoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfPropelFileStoragePlugin/lib/model/map/sfPropelFileStorageInfoMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageInfoMapBuilder');
}

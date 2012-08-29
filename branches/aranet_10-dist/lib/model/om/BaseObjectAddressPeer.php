<?php


abstract class BaseObjectAddressPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_objectaddress';

	
	const CLASS_DEFAULT = 'lib.model.ObjectAddress';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_objectaddress.ID';

	
	const OBJECTADDRESS_NAME = 'aranet_objectaddress.OBJECTADDRESS_NAME';

	
	const OBJECTADDRESS_ADDRESS_ID = 'aranet_objectaddress.OBJECTADDRESS_ADDRESS_ID';

	
	const OBJECTADDRESS_OBJECT_ID = 'aranet_objectaddress.OBJECTADDRESS_OBJECT_ID';

	
	const OBJECTADDRESS_OBJECT_CLASS = 'aranet_objectaddress.OBJECTADDRESS_OBJECT_CLASS';

	
	const OBJECTADDRESS_TYPE = 'aranet_objectaddress.OBJECTADDRESS_TYPE';

	
	const OBJECTADDRESS_IS_DEFAULT = 'aranet_objectaddress.OBJECTADDRESS_IS_DEFAULT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ObjectaddressName', 'ObjectaddressAddressId', 'ObjectaddressObjectId', 'ObjectaddressObjectClass', 'ObjectaddressType', 'ObjectaddressIsDefault', ),
		BasePeer::TYPE_COLNAME => array (ObjectAddressPeer::ID, ObjectAddressPeer::OBJECTADDRESS_NAME, ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, ObjectAddressPeer::OBJECTADDRESS_TYPE, ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'objectaddress_name', 'objectaddress_address_id', 'objectaddress_object_id', 'objectaddress_object_class', 'objectaddress_type', 'objectaddress_is_default', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ObjectaddressName' => 1, 'ObjectaddressAddressId' => 2, 'ObjectaddressObjectId' => 3, 'ObjectaddressObjectClass' => 4, 'ObjectaddressType' => 5, 'ObjectaddressIsDefault' => 6, ),
		BasePeer::TYPE_COLNAME => array (ObjectAddressPeer::ID => 0, ObjectAddressPeer::OBJECTADDRESS_NAME => 1, ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID => 2, ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID => 3, ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS => 4, ObjectAddressPeer::OBJECTADDRESS_TYPE => 5, ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'objectaddress_name' => 1, 'objectaddress_address_id' => 2, 'objectaddress_object_id' => 3, 'objectaddress_object_class' => 4, 'objectaddress_type' => 5, 'objectaddress_is_default' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ObjectAddressMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ObjectAddressMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ObjectAddressPeer::getTableMap();
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
		return str_replace(ObjectAddressPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ObjectAddressPeer::ID);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_NAME);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_TYPE);

		$criteria->addSelectColumn(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT);

	}

	const COUNT = 'COUNT(aranet_objectaddress.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_objectaddress.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ObjectAddressPeer::doSelectRS($criteria, $con);
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
		$objects = ObjectAddressPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ObjectAddressPeer::populateObjects(ObjectAddressPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseObjectAddressPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseObjectAddressPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseObjectAddressPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseObjectAddressPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ObjectAddressPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ObjectAddressPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAddress(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);

		$rs = ObjectAddressPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAddress(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ObjectAddressPeer::addSelectColumns($c);
		$startcol = (ObjectAddressPeer::NUM_COLUMNS - ObjectAddressPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AddressPeer::addSelectColumns($c);

		$c->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectAddressPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AddressPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAddress(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addObjectAddress($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initObjectAddresss();
				$obj2->addObjectAddress($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectAddressPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);

		$rs = ObjectAddressPeer::doSelectRS($criteria, $con);
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

		ObjectAddressPeer::addSelectColumns($c);
		$startcol2 = (ObjectAddressPeer::NUM_COLUMNS - ObjectAddressPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AddressPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AddressPeer::NUM_COLUMNS;

		$c->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectAddressPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = AddressPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAddress(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addObjectAddress($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initObjectAddresss();
				$obj2->addObjectAddress($obj1);
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
		return ObjectAddressPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectAddressPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseObjectAddressPeer', $values, $con);
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

		$criteria->remove(ObjectAddressPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseObjectAddressPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseObjectAddressPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectAddressPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseObjectAddressPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ObjectAddressPeer::ID);
			$selectCriteria->add(ObjectAddressPeer::ID, $criteria->remove(ObjectAddressPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseObjectAddressPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseObjectAddressPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ObjectAddressPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ObjectAddressPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ObjectAddress) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ObjectAddressPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ObjectAddress $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ObjectAddressPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ObjectAddressPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ObjectAddressPeer::DATABASE_NAME, ObjectAddressPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ObjectAddressPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ObjectAddressPeer::DATABASE_NAME);

		$criteria->add(ObjectAddressPeer::ID, $pk);


		$v = ObjectAddressPeer::doSelect($criteria, $con);

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
			$criteria->add(ObjectAddressPeer::ID, $pks, Criteria::IN);
			$objs = ObjectAddressPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('ObjectAddress', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseObjectAddressPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ObjectAddressMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ObjectAddressMapBuilder');
}

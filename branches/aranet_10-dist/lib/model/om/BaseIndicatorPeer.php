<?php


abstract class BaseIndicatorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_indicator';

	
	const CLASS_DEFAULT = 'lib.model.Indicator';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_indicator.ID';

	
	const INDICATOR_ID = 'aranet_indicator.INDICATOR_ID';

	
	const INDICATOR_VALUE = 'aranet_indicator.INDICATOR_VALUE';

	
	const INDICATOR_BEAUTIFIER = 'aranet_indicator.INDICATOR_BEAUTIFIER';

	
	const INDICATOR_UNIT = 'aranet_indicator.INDICATOR_UNIT';

	
	const INDICATOR_OBJECT_ID = 'aranet_indicator.INDICATOR_OBJECT_ID';

	
	const INDICATOR_OBJECT_CLASS = 'aranet_indicator.INDICATOR_OBJECT_CLASS';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IndicatorId', 'IndicatorValue', 'IndicatorBeautifier', 'IndicatorUnit', 'IndicatorObjectId', 'IndicatorObjectClass', ),
		BasePeer::TYPE_COLNAME => array (IndicatorPeer::ID, IndicatorPeer::INDICATOR_ID, IndicatorPeer::INDICATOR_VALUE, IndicatorPeer::INDICATOR_BEAUTIFIER, IndicatorPeer::INDICATOR_UNIT, IndicatorPeer::INDICATOR_OBJECT_ID, IndicatorPeer::INDICATOR_OBJECT_CLASS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'indicator_id', 'indicator_value', 'indicator_beautifier', 'indicator_unit', 'indicator_object_id', 'indicator_object_class', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IndicatorId' => 1, 'IndicatorValue' => 2, 'IndicatorBeautifier' => 3, 'IndicatorUnit' => 4, 'IndicatorObjectId' => 5, 'IndicatorObjectClass' => 6, ),
		BasePeer::TYPE_COLNAME => array (IndicatorPeer::ID => 0, IndicatorPeer::INDICATOR_ID => 1, IndicatorPeer::INDICATOR_VALUE => 2, IndicatorPeer::INDICATOR_BEAUTIFIER => 3, IndicatorPeer::INDICATOR_UNIT => 4, IndicatorPeer::INDICATOR_OBJECT_ID => 5, IndicatorPeer::INDICATOR_OBJECT_CLASS => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'indicator_id' => 1, 'indicator_value' => 2, 'indicator_beautifier' => 3, 'indicator_unit' => 4, 'indicator_object_id' => 5, 'indicator_object_class' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/IndicatorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.IndicatorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = IndicatorPeer::getTableMap();
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
		return str_replace(IndicatorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(IndicatorPeer::ID);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_ID);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_VALUE);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_BEAUTIFIER);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_UNIT);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_OBJECT_ID);

		$criteria->addSelectColumn(IndicatorPeer::INDICATOR_OBJECT_CLASS);

	}

	const COUNT = 'COUNT(aranet_indicator.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_indicator.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IndicatorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IndicatorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = IndicatorPeer::doSelectRS($criteria, $con);
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
		$objects = IndicatorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return IndicatorPeer::populateObjects(IndicatorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseIndicatorPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseIndicatorPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseIndicatorPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseIndicatorPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			IndicatorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = IndicatorPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDefaultIndicator(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IndicatorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IndicatorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IndicatorPeer::INDICATOR_ID, DefaultIndicatorPeer::ID);

		$rs = IndicatorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDefaultIndicator(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IndicatorPeer::addSelectColumns($c);
		$startcol = (IndicatorPeer::NUM_COLUMNS - IndicatorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DefaultIndicatorPeer::addSelectColumns($c);

		$c->addJoin(IndicatorPeer::INDICATOR_ID, DefaultIndicatorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IndicatorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DefaultIndicatorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDefaultIndicator(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIndicator($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIndicators();
				$obj2->addIndicator($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IndicatorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IndicatorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IndicatorPeer::INDICATOR_ID, DefaultIndicatorPeer::ID);

		$rs = IndicatorPeer::doSelectRS($criteria, $con);
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

		IndicatorPeer::addSelectColumns($c);
		$startcol2 = (IndicatorPeer::NUM_COLUMNS - IndicatorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DefaultIndicatorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DefaultIndicatorPeer::NUM_COLUMNS;

		$c->addJoin(IndicatorPeer::INDICATOR_ID, DefaultIndicatorPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IndicatorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DefaultIndicatorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDefaultIndicator(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addIndicator($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initIndicators();
				$obj2->addIndicator($obj1);
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
		return IndicatorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseIndicatorPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseIndicatorPeer', $values, $con);
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

		$criteria->remove(IndicatorPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseIndicatorPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseIndicatorPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseIndicatorPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseIndicatorPeer', $values, $con);
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
			$comparison = $criteria->getComparison(IndicatorPeer::ID);
			$selectCriteria->add(IndicatorPeer::ID, $criteria->remove(IndicatorPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseIndicatorPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseIndicatorPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(IndicatorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(IndicatorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Indicator) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(IndicatorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Indicator $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(IndicatorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(IndicatorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(IndicatorPeer::DATABASE_NAME, IndicatorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = IndicatorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(IndicatorPeer::DATABASE_NAME);

		$criteria->add(IndicatorPeer::ID, $pk);


		$v = IndicatorPeer::doSelect($criteria, $con);

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
			$criteria->add(IndicatorPeer::ID, $pks, Criteria::IN);
			$objs = IndicatorPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Indicator', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseIndicatorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/IndicatorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.IndicatorMapBuilder');
}

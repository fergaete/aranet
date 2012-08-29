<?php


abstract class BaseReportColumnPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_report_column';

	
	const CLASS_DEFAULT = 'lib.model.ReportColumn';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_report_column.ID';

	
	const REPORT_ID = 'aranet_report_column.REPORT_ID';

	
	const COLUMN_PHP_NAME = 'aranet_report_column.COLUMN_PHP_NAME';

	
	const COLUMN_NAME = 'aranet_report_column.COLUMN_NAME';

	
	const COLUMN_ORDER = 'aranet_report_column.COLUMN_ORDER';

	
	const COLUMN_WIDTH = 'aranet_report_column.COLUMN_WIDTH';

	
	const COLUMN_EVAL_SCRIPT = 'aranet_report_column.COLUMN_EVAL_SCRIPT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ReportId', 'ColumnPhpName', 'ColumnName', 'ColumnOrder', 'ColumnWidth', 'ColumnEvalScript', ),
		BasePeer::TYPE_COLNAME => array (ReportColumnPeer::ID, ReportColumnPeer::REPORT_ID, ReportColumnPeer::COLUMN_PHP_NAME, ReportColumnPeer::COLUMN_NAME, ReportColumnPeer::COLUMN_ORDER, ReportColumnPeer::COLUMN_WIDTH, ReportColumnPeer::COLUMN_EVAL_SCRIPT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'report_id', 'column_php_name', 'column_name', 'column_order', 'column_width', 'column_eval_script', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ReportId' => 1, 'ColumnPhpName' => 2, 'ColumnName' => 3, 'ColumnOrder' => 4, 'ColumnWidth' => 5, 'ColumnEvalScript' => 6, ),
		BasePeer::TYPE_COLNAME => array (ReportColumnPeer::ID => 0, ReportColumnPeer::REPORT_ID => 1, ReportColumnPeer::COLUMN_PHP_NAME => 2, ReportColumnPeer::COLUMN_NAME => 3, ReportColumnPeer::COLUMN_ORDER => 4, ReportColumnPeer::COLUMN_WIDTH => 5, ReportColumnPeer::COLUMN_EVAL_SCRIPT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'report_id' => 1, 'column_php_name' => 2, 'column_name' => 3, 'column_order' => 4, 'column_width' => 5, 'column_eval_script' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ReportColumnMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ReportColumnMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ReportColumnPeer::getTableMap();
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
		return str_replace(ReportColumnPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ReportColumnPeer::ID);

		$criteria->addSelectColumn(ReportColumnPeer::REPORT_ID);

		$criteria->addSelectColumn(ReportColumnPeer::COLUMN_PHP_NAME);

		$criteria->addSelectColumn(ReportColumnPeer::COLUMN_NAME);

		$criteria->addSelectColumn(ReportColumnPeer::COLUMN_ORDER);

		$criteria->addSelectColumn(ReportColumnPeer::COLUMN_WIDTH);

		$criteria->addSelectColumn(ReportColumnPeer::COLUMN_EVAL_SCRIPT);

	}

	const COUNT = 'COUNT(aranet_report_column.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_report_column.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ReportColumnPeer::doSelectRS($criteria, $con);
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
		$objects = ReportColumnPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ReportColumnPeer::populateObjects(ReportColumnPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseReportColumnPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseReportColumnPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseReportColumnPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseReportColumnPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ReportColumnPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ReportColumnPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinReport(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ReportColumnPeer::REPORT_ID, ReportPeer::ID);

		$rs = ReportColumnPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinReport(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ReportColumnPeer::addSelectColumns($c);
		$startcol = (ReportColumnPeer::NUM_COLUMNS - ReportColumnPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ReportPeer::addSelectColumns($c);

		$c->addJoin(ReportColumnPeer::REPORT_ID, ReportPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ReportColumnPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ReportPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getReport(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addReportColumn($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initReportColumns();
				$obj2->addReportColumn($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ReportColumnPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ReportColumnPeer::REPORT_ID, ReportPeer::ID);

		$rs = ReportColumnPeer::doSelectRS($criteria, $con);
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

		ReportColumnPeer::addSelectColumns($c);
		$startcol2 = (ReportColumnPeer::NUM_COLUMNS - ReportColumnPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ReportPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ReportPeer::NUM_COLUMNS;

		$c->addJoin(ReportColumnPeer::REPORT_ID, ReportPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ReportColumnPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ReportPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getReport(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addReportColumn($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initReportColumns();
				$obj2->addReportColumn($obj1);
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
		return ReportColumnPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseReportColumnPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseReportColumnPeer', $values, $con);
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

		$criteria->remove(ReportColumnPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseReportColumnPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseReportColumnPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseReportColumnPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseReportColumnPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ReportColumnPeer::ID);
			$selectCriteria->add(ReportColumnPeer::ID, $criteria->remove(ReportColumnPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseReportColumnPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseReportColumnPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ReportColumnPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ReportColumnPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ReportColumn) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ReportColumnPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ReportColumn $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ReportColumnPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ReportColumnPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ReportColumnPeer::DATABASE_NAME, ReportColumnPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ReportColumnPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ReportColumnPeer::DATABASE_NAME);

		$criteria->add(ReportColumnPeer::ID, $pk);


		$v = ReportColumnPeer::doSelect($criteria, $con);

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
			$criteria->add(ReportColumnPeer::ID, $pks, Criteria::IN);
			$objs = ReportColumnPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('ReportColumn', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseReportColumnPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ReportColumnMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ReportColumnMapBuilder');
}

<?php


abstract class BaseGPlotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_plot';

	
	const CLASS_DEFAULT = 'lib.model.GPlot';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_plot.ID';

	
	const PLOT_NAME = 'aranet_plot.PLOT_NAME';

	
	const PLOT_COLOR = 'aranet_plot.PLOT_COLOR';

	
	const PLOT_TYPE = 'aranet_plot.PLOT_TYPE';

	
	const PLOT_CRITERIA = 'aranet_plot.PLOT_CRITERIA';

	
	const PLOT_DATE_VARIABLE = 'aranet_plot.PLOT_DATE_VARIABLE';

	
	const PLOT_CLASS = 'aranet_plot.PLOT_CLASS';

	
	const PLOT_FUNCTION = 'aranet_plot.PLOT_FUNCTION';

	
	const PLOT_CALLBACK = 'aranet_plot.PLOT_CALLBACK';

	
	const PLOT_ACC_FUNCTION = 'aranet_plot.PLOT_ACC_FUNCTION';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PlotName', 'PlotColor', 'PlotType', 'PlotCriteria', 'PlotDateVariable', 'PlotClass', 'PlotFunction', 'PlotCallback', 'PlotAccFunction', ),
		BasePeer::TYPE_COLNAME => array (GPlotPeer::ID, GPlotPeer::PLOT_NAME, GPlotPeer::PLOT_COLOR, GPlotPeer::PLOT_TYPE, GPlotPeer::PLOT_CRITERIA, GPlotPeer::PLOT_DATE_VARIABLE, GPlotPeer::PLOT_CLASS, GPlotPeer::PLOT_FUNCTION, GPlotPeer::PLOT_CALLBACK, GPlotPeer::PLOT_ACC_FUNCTION, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'plot_name', 'plot_color', 'plot_type', 'plot_criteria', 'plot_date_variable', 'plot_class', 'plot_function', 'plot_callback', 'plot_acc_function', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PlotName' => 1, 'PlotColor' => 2, 'PlotType' => 3, 'PlotCriteria' => 4, 'PlotDateVariable' => 5, 'PlotClass' => 6, 'PlotFunction' => 7, 'PlotCallback' => 8, 'PlotAccFunction' => 9, ),
		BasePeer::TYPE_COLNAME => array (GPlotPeer::ID => 0, GPlotPeer::PLOT_NAME => 1, GPlotPeer::PLOT_COLOR => 2, GPlotPeer::PLOT_TYPE => 3, GPlotPeer::PLOT_CRITERIA => 4, GPlotPeer::PLOT_DATE_VARIABLE => 5, GPlotPeer::PLOT_CLASS => 6, GPlotPeer::PLOT_FUNCTION => 7, GPlotPeer::PLOT_CALLBACK => 8, GPlotPeer::PLOT_ACC_FUNCTION => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'plot_name' => 1, 'plot_color' => 2, 'plot_type' => 3, 'plot_criteria' => 4, 'plot_date_variable' => 5, 'plot_class' => 6, 'plot_function' => 7, 'plot_callback' => 8, 'plot_acc_function' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/GPlotMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.GPlotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = GPlotPeer::getTableMap();
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
		return str_replace(GPlotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(GPlotPeer::ID);

		$criteria->addSelectColumn(GPlotPeer::PLOT_NAME);

		$criteria->addSelectColumn(GPlotPeer::PLOT_COLOR);

		$criteria->addSelectColumn(GPlotPeer::PLOT_TYPE);

		$criteria->addSelectColumn(GPlotPeer::PLOT_CRITERIA);

		$criteria->addSelectColumn(GPlotPeer::PLOT_DATE_VARIABLE);

		$criteria->addSelectColumn(GPlotPeer::PLOT_CLASS);

		$criteria->addSelectColumn(GPlotPeer::PLOT_FUNCTION);

		$criteria->addSelectColumn(GPlotPeer::PLOT_CALLBACK);

		$criteria->addSelectColumn(GPlotPeer::PLOT_ACC_FUNCTION);

	}

	const COUNT = 'COUNT(aranet_plot.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_plot.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(GPlotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(GPlotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = GPlotPeer::doSelectRS($criteria, $con);
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
		$objects = GPlotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return GPlotPeer::populateObjects(GPlotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseGPlotPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseGPlotPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseGPlotPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseGPlotPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			GPlotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = GPlotPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return GPlotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseGPlotPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseGPlotPeer', $values, $con);
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

		$criteria->remove(GPlotPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseGPlotPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseGPlotPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseGPlotPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseGPlotPeer', $values, $con);
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
			$comparison = $criteria->getComparison(GPlotPeer::ID);
			$selectCriteria->add(GPlotPeer::ID, $criteria->remove(GPlotPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseGPlotPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseGPlotPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(GPlotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(GPlotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof GPlot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(GPlotPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(GPlot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(GPlotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(GPlotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(GPlotPeer::DATABASE_NAME, GPlotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = GPlotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(GPlotPeer::DATABASE_NAME);

		$criteria->add(GPlotPeer::ID, $pk);


		$v = GPlotPeer::doSelect($criteria, $con);

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
			$criteria->add(GPlotPeer::ID, $pks, Criteria::IN);
			$objs = GPlotPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('GPlot', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseGPlotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/GPlotMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.GPlotMapBuilder');
}

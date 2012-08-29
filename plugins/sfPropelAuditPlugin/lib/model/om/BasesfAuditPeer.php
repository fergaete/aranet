<?php


abstract class BasesfAuditPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_audit';

	
	const CLASS_DEFAULT = 'plugins.sfPropelAuditPlugin.lib.model.sfAudit';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_audit.ID';

	
	const REMOTE_IP_ADDRESS = 'sf_audit.REMOTE_IP_ADDRESS';

	
	const OBJECT = 'sf_audit.OBJECT';

	
	const OBJECT_KEY = 'sf_audit.OBJECT_KEY';

	
	const OBJECT_CHANGES = 'sf_audit.OBJECT_CHANGES';

	
	const QUERY = 'sf_audit.QUERY';

	
	const USER = 'sf_audit.USER';

	
	const TYPE = 'sf_audit.TYPE';

	
	const CREATED_AT = 'sf_audit.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ID', 'RemoteIpAddress', 'Object', 'ObjectKey', 'ObjectChanges', 'Query', 'User', 'Type', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (sfAuditPeer::ID, sfAuditPeer::REMOTE_IP_ADDRESS, sfAuditPeer::OBJECT, sfAuditPeer::OBJECT_KEY, sfAuditPeer::OBJECT_CHANGES, sfAuditPeer::QUERY, sfAuditPeer::USER, sfAuditPeer::TYPE, sfAuditPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'remote_ip_address', 'object', 'object_key', 'object_changes', 'query', 'user', 'type', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ID' => 0, 'RemoteIpAddress' => 1, 'Object' => 2, 'ObjectKey' => 3, 'ObjectChanges' => 4, 'Query' => 5, 'User' => 6, 'Type' => 7, 'CreatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (sfAuditPeer::ID => 0, sfAuditPeer::REMOTE_IP_ADDRESS => 1, sfAuditPeer::OBJECT => 2, sfAuditPeer::OBJECT_KEY => 3, sfAuditPeer::OBJECT_CHANGES => 4, sfAuditPeer::QUERY => 5, sfAuditPeer::USER => 6, sfAuditPeer::TYPE => 7, sfAuditPeer::CREATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'remote_ip_address' => 1, 'object' => 2, 'object_key' => 3, 'object_changes' => 4, 'query' => 5, 'user' => 6, 'type' => 7, 'created_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfPropelAuditPlugin/lib/model/map/sfAuditMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfPropelAuditPlugin.lib.model.map.sfAuditMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfAuditPeer::getTableMap();
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
		return str_replace(sfAuditPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfAuditPeer::ID);

		$criteria->addSelectColumn(sfAuditPeer::REMOTE_IP_ADDRESS);

		$criteria->addSelectColumn(sfAuditPeer::OBJECT);

		$criteria->addSelectColumn(sfAuditPeer::OBJECT_KEY);

		$criteria->addSelectColumn(sfAuditPeer::OBJECT_CHANGES);

		$criteria->addSelectColumn(sfAuditPeer::QUERY);

		$criteria->addSelectColumn(sfAuditPeer::USER);

		$criteria->addSelectColumn(sfAuditPeer::TYPE);

		$criteria->addSelectColumn(sfAuditPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(sf_audit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_audit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfAuditPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfAuditPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfAuditPeer::doSelectRS($criteria, $con);
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
		$objects = sfAuditPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfAuditPeer::populateObjects(sfAuditPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BasesfAuditPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BasesfAuditPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BasesfAuditPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfAuditPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfAuditPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfAuditPeer::getOMClass();
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
		return sfAuditPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAuditPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAuditPeer', $values, $con);
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

		$criteria->remove(sfAuditPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfAuditPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfAuditPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAuditPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAuditPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfAuditPeer::ID);
			$selectCriteria->add(sfAuditPeer::ID, $criteria->remove(sfAuditPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfAuditPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfAuditPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfAuditPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfAuditPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfAudit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfAuditPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfAudit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfAuditPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfAuditPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfAuditPeer::DATABASE_NAME, sfAuditPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfAuditPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfAuditPeer::DATABASE_NAME);

		$criteria->add(sfAuditPeer::ID, $pk);


		$v = sfAuditPeer::doSelect($criteria, $con);

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
			$criteria->add(sfAuditPeer::ID, $pks, Criteria::IN);
			$objs = sfAuditPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('sfAudit', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BasesfAuditPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfPropelAuditPlugin/lib/model/map/sfAuditMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfPropelAuditPlugin.lib.model.map.sfAuditMapBuilder');
}

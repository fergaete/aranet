<?php


abstract class BaseClientPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_client';

	
	const CLASS_DEFAULT = 'lib.model.Client';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_client.ID';

	
	const CLIENT_UNIQUE_NAME = 'aranet_client.CLIENT_UNIQUE_NAME';

	
	const CLIENT_COMPANY_NAME = 'aranet_client.CLIENT_COMPANY_NAME';

	
	const CLIENT_CIF = 'aranet_client.CLIENT_CIF';

	
	const CLIENT_KIND_OF_COMPANY_ID = 'aranet_client.CLIENT_KIND_OF_COMPANY_ID';

	
	const CLIENT_SINCE = 'aranet_client.CLIENT_SINCE';

	
	const CLIENT_WEBSITE = 'aranet_client.CLIENT_WEBSITE';

	
	const CLIENT_COMMENTS = 'aranet_client.CLIENT_COMMENTS';

	
	const CLIENT_HAS_TAGS = 'aranet_client.CLIENT_HAS_TAGS';

	
	const CREATED_AT = 'aranet_client.CREATED_AT';

	
	const CREATED_BY = 'aranet_client.CREATED_BY';

	
	const UPDATED_AT = 'aranet_client.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_client.UPDATED_BY';

	
	const DELETED_AT = 'aranet_client.DELETED_AT';

	
	const DELETED_BY = 'aranet_client.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ClientUniqueName', 'ClientCompanyName', 'ClientCif', 'ClientKindOfCompanyId', 'ClientSince', 'ClientWebsite', 'ClientComments', 'ClientHasTags', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (ClientPeer::ID, ClientPeer::CLIENT_UNIQUE_NAME, ClientPeer::CLIENT_COMPANY_NAME, ClientPeer::CLIENT_CIF, ClientPeer::CLIENT_KIND_OF_COMPANY_ID, ClientPeer::CLIENT_SINCE, ClientPeer::CLIENT_WEBSITE, ClientPeer::CLIENT_COMMENTS, ClientPeer::CLIENT_HAS_TAGS, ClientPeer::CREATED_AT, ClientPeer::CREATED_BY, ClientPeer::UPDATED_AT, ClientPeer::UPDATED_BY, ClientPeer::DELETED_AT, ClientPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'client_unique_name', 'client_company_name', 'client_cif', 'client_kind_of_company_id', 'client_since', 'client_website', 'client_comments', 'client_has_tags', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ClientUniqueName' => 1, 'ClientCompanyName' => 2, 'ClientCif' => 3, 'ClientKindOfCompanyId' => 4, 'ClientSince' => 5, 'ClientWebsite' => 6, 'ClientComments' => 7, 'ClientHasTags' => 8, 'CreatedAt' => 9, 'CreatedBy' => 10, 'UpdatedAt' => 11, 'UpdatedBy' => 12, 'DeletedAt' => 13, 'DeletedBy' => 14, ),
		BasePeer::TYPE_COLNAME => array (ClientPeer::ID => 0, ClientPeer::CLIENT_UNIQUE_NAME => 1, ClientPeer::CLIENT_COMPANY_NAME => 2, ClientPeer::CLIENT_CIF => 3, ClientPeer::CLIENT_KIND_OF_COMPANY_ID => 4, ClientPeer::CLIENT_SINCE => 5, ClientPeer::CLIENT_WEBSITE => 6, ClientPeer::CLIENT_COMMENTS => 7, ClientPeer::CLIENT_HAS_TAGS => 8, ClientPeer::CREATED_AT => 9, ClientPeer::CREATED_BY => 10, ClientPeer::UPDATED_AT => 11, ClientPeer::UPDATED_BY => 12, ClientPeer::DELETED_AT => 13, ClientPeer::DELETED_BY => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'client_unique_name' => 1, 'client_company_name' => 2, 'client_cif' => 3, 'client_kind_of_company_id' => 4, 'client_since' => 5, 'client_website' => 6, 'client_comments' => 7, 'client_has_tags' => 8, 'created_at' => 9, 'created_by' => 10, 'updated_at' => 11, 'updated_by' => 12, 'deleted_at' => 13, 'deleted_by' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ClientMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ClientMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ClientPeer::getTableMap();
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
		return str_replace(ClientPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ClientPeer::ID);

		$criteria->addSelectColumn(ClientPeer::CLIENT_UNIQUE_NAME);

		$criteria->addSelectColumn(ClientPeer::CLIENT_COMPANY_NAME);

		$criteria->addSelectColumn(ClientPeer::CLIENT_CIF);

		$criteria->addSelectColumn(ClientPeer::CLIENT_KIND_OF_COMPANY_ID);

		$criteria->addSelectColumn(ClientPeer::CLIENT_SINCE);

		$criteria->addSelectColumn(ClientPeer::CLIENT_WEBSITE);

		$criteria->addSelectColumn(ClientPeer::CLIENT_COMMENTS);

		$criteria->addSelectColumn(ClientPeer::CLIENT_HAS_TAGS);

		$criteria->addSelectColumn(ClientPeer::CREATED_AT);

		$criteria->addSelectColumn(ClientPeer::CREATED_BY);

		$criteria->addSelectColumn(ClientPeer::UPDATED_AT);

		$criteria->addSelectColumn(ClientPeer::UPDATED_BY);

		$criteria->addSelectColumn(ClientPeer::DELETED_AT);

		$criteria->addSelectColumn(ClientPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_client.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_client.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
		$objects = ClientPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ClientPeer::populateObjects(ClientPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseClientPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseClientPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseClientPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseClientPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ClientPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ClientPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinKindOfCompany(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinKindOfCompany(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ClientPeer::addSelectColumns($c);
		$startcol = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KindOfCompanyPeer::addSelectColumns($c);

		$c->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KindOfCompanyPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getKindOfCompany(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addClient($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initClients();
				$obj2->addClient($obj1); 			}
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

		ClientPeer::addSelectColumns($c);
		$startcol = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

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
										$temp_obj2->addClientRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initClientsRelatedByCreatedBy();
				$obj2->addClientRelatedByCreatedBy($obj1); 			}
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

		ClientPeer::addSelectColumns($c);
		$startcol = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

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
										$temp_obj2->addClientRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initClientsRelatedByUpdatedBy();
				$obj2->addClientRelatedByUpdatedBy($obj1); 			}
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

		ClientPeer::addSelectColumns($c);
		$startcol = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

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
										$temp_obj2->addClientRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initClientsRelatedByDeletedBy();
				$obj2->addClientRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$criteria->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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

		ClientPeer::addSelectColumns($c);
		$startcol2 = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$c->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = KindOfCompanyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKindOfCompany(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addClient($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initClients();
				$obj2->addClient($obj1);
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
					$temp_obj3->addClientRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initClientsRelatedByCreatedBy();
				$obj3->addClientRelatedByCreatedBy($obj1);
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
					$temp_obj4->addClientRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initClientsRelatedByUpdatedBy();
				$obj4->addClientRelatedByUpdatedBy($obj1);
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
					$temp_obj5->addClientRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initClientsRelatedByDeletedBy();
				$obj5->addClientRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptKindOfCompany(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ClientPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ClientPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = ClientPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptKindOfCompany(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ClientPeer::addSelectColumns($c);
		$startcol2 = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ClientPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ClientPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ClientPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

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
					$temp_obj2->addClientRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initClientsRelatedByCreatedBy();
				$obj2->addClientRelatedByCreatedBy($obj1);
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
					$temp_obj3->addClientRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initClientsRelatedByUpdatedBy();
				$obj3->addClientRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addClientRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initClientsRelatedByDeletedBy();
				$obj4->addClientRelatedByDeletedBy($obj1);
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

		ClientPeer::addSelectColumns($c);
		$startcol2 = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KindOfCompanyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKindOfCompany(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addClient($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initClients();
				$obj2->addClient($obj1);
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

		ClientPeer::addSelectColumns($c);
		$startcol2 = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KindOfCompanyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKindOfCompany(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addClient($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initClients();
				$obj2->addClient($obj1);
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

		ClientPeer::addSelectColumns($c);
		$startcol2 = (ClientPeer::NUM_COLUMNS - ClientPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(ClientPeer::CLIENT_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ClientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KindOfCompanyPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getKindOfCompany(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addClient($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initClients();
				$obj2->addClient($obj1);
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
		return ClientPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseClientPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseClientPeer', $values, $con);
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

		$criteria->remove(ClientPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseClientPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseClientPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseClientPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseClientPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ClientPeer::ID);
			$selectCriteria->add(ClientPeer::ID, $criteria->remove(ClientPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseClientPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseClientPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ClientPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ClientPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Client) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ClientPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Client $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ClientPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ClientPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ClientPeer::DATABASE_NAME, ClientPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ClientPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ClientPeer::DATABASE_NAME);

		$criteria->add(ClientPeer::ID, $pk);


		$v = ClientPeer::doSelect($criteria, $con);

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
			$criteria->add(ClientPeer::ID, $pks, Criteria::IN);
			$objs = ClientPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Client', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseClientPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ClientMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ClientMapBuilder');
}

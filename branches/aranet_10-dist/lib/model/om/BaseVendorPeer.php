<?php


abstract class BaseVendorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_vendor';

	
	const CLASS_DEFAULT = 'lib.model.Vendor';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_vendor.ID';

	
	const VENDOR_UNIQUE_NAME = 'aranet_vendor.VENDOR_UNIQUE_NAME';

	
	const VENDOR_COMPANY_NAME = 'aranet_vendor.VENDOR_COMPANY_NAME';

	
	const VENDOR_CIF = 'aranet_vendor.VENDOR_CIF';

	
	const VENDOR_KIND_OF_COMPANY_ID = 'aranet_vendor.VENDOR_KIND_OF_COMPANY_ID';

	
	const VENDOR_SINCE = 'aranet_vendor.VENDOR_SINCE';

	
	const VENDOR_WEBSITE = 'aranet_vendor.VENDOR_WEBSITE';

	
	const VENDOR_COMMENTS = 'aranet_vendor.VENDOR_COMMENTS';

	
	const VENDOR_HAS_TAGS = 'aranet_vendor.VENDOR_HAS_TAGS';

	
	const CREATED_AT = 'aranet_vendor.CREATED_AT';

	
	const CREATED_BY = 'aranet_vendor.CREATED_BY';

	
	const UPDATED_AT = 'aranet_vendor.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_vendor.UPDATED_BY';

	
	const DELETED_AT = 'aranet_vendor.DELETED_AT';

	
	const DELETED_BY = 'aranet_vendor.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'VendorUniqueName', 'VendorCompanyName', 'VendorCif', 'VendorKindOfCompanyId', 'VendorSince', 'VendorWebsite', 'VendorComments', 'VendorHasTags', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (VendorPeer::ID, VendorPeer::VENDOR_UNIQUE_NAME, VendorPeer::VENDOR_COMPANY_NAME, VendorPeer::VENDOR_CIF, VendorPeer::VENDOR_KIND_OF_COMPANY_ID, VendorPeer::VENDOR_SINCE, VendorPeer::VENDOR_WEBSITE, VendorPeer::VENDOR_COMMENTS, VendorPeer::VENDOR_HAS_TAGS, VendorPeer::CREATED_AT, VendorPeer::CREATED_BY, VendorPeer::UPDATED_AT, VendorPeer::UPDATED_BY, VendorPeer::DELETED_AT, VendorPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'vendor_unique_name', 'vendor_company_name', 'vendor_cif', 'vendor_kind_of_company_id', 'vendor_since', 'vendor_website', 'vendor_comments', 'vendor_has_tags', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'VendorUniqueName' => 1, 'VendorCompanyName' => 2, 'VendorCif' => 3, 'VendorKindOfCompanyId' => 4, 'VendorSince' => 5, 'VendorWebsite' => 6, 'VendorComments' => 7, 'VendorHasTags' => 8, 'CreatedAt' => 9, 'CreatedBy' => 10, 'UpdatedAt' => 11, 'UpdatedBy' => 12, 'DeletedAt' => 13, 'DeletedBy' => 14, ),
		BasePeer::TYPE_COLNAME => array (VendorPeer::ID => 0, VendorPeer::VENDOR_UNIQUE_NAME => 1, VendorPeer::VENDOR_COMPANY_NAME => 2, VendorPeer::VENDOR_CIF => 3, VendorPeer::VENDOR_KIND_OF_COMPANY_ID => 4, VendorPeer::VENDOR_SINCE => 5, VendorPeer::VENDOR_WEBSITE => 6, VendorPeer::VENDOR_COMMENTS => 7, VendorPeer::VENDOR_HAS_TAGS => 8, VendorPeer::CREATED_AT => 9, VendorPeer::CREATED_BY => 10, VendorPeer::UPDATED_AT => 11, VendorPeer::UPDATED_BY => 12, VendorPeer::DELETED_AT => 13, VendorPeer::DELETED_BY => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'vendor_unique_name' => 1, 'vendor_company_name' => 2, 'vendor_cif' => 3, 'vendor_kind_of_company_id' => 4, 'vendor_since' => 5, 'vendor_website' => 6, 'vendor_comments' => 7, 'vendor_has_tags' => 8, 'created_at' => 9, 'created_by' => 10, 'updated_at' => 11, 'updated_by' => 12, 'deleted_at' => 13, 'deleted_by' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/VendorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.VendorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = VendorPeer::getTableMap();
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
		return str_replace(VendorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(VendorPeer::ID);

		$criteria->addSelectColumn(VendorPeer::VENDOR_UNIQUE_NAME);

		$criteria->addSelectColumn(VendorPeer::VENDOR_COMPANY_NAME);

		$criteria->addSelectColumn(VendorPeer::VENDOR_CIF);

		$criteria->addSelectColumn(VendorPeer::VENDOR_KIND_OF_COMPANY_ID);

		$criteria->addSelectColumn(VendorPeer::VENDOR_SINCE);

		$criteria->addSelectColumn(VendorPeer::VENDOR_WEBSITE);

		$criteria->addSelectColumn(VendorPeer::VENDOR_COMMENTS);

		$criteria->addSelectColumn(VendorPeer::VENDOR_HAS_TAGS);

		$criteria->addSelectColumn(VendorPeer::CREATED_AT);

		$criteria->addSelectColumn(VendorPeer::CREATED_BY);

		$criteria->addSelectColumn(VendorPeer::UPDATED_AT);

		$criteria->addSelectColumn(VendorPeer::UPDATED_BY);

		$criteria->addSelectColumn(VendorPeer::DELETED_AT);

		$criteria->addSelectColumn(VendorPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_vendor.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_vendor.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
		$objects = VendorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return VendorPeer::populateObjects(VendorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseVendorPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseVendorPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseVendorPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseVendorPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			VendorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = VendorPeer::getOMClass();
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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

		VendorPeer::addSelectColumns($c);
		$startcol = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KindOfCompanyPeer::addSelectColumns($c);

		$c->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
										$temp_obj2->addVendor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVendors();
				$obj2->addVendor($obj1); 			}
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

		VendorPeer::addSelectColumns($c);
		$startcol = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
										$temp_obj2->addVendorRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVendorsRelatedByCreatedBy();
				$obj2->addVendorRelatedByCreatedBy($obj1); 			}
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

		VendorPeer::addSelectColumns($c);
		$startcol = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
										$temp_obj2->addVendorRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVendorsRelatedByUpdatedBy();
				$obj2->addVendorRelatedByUpdatedBy($obj1); 			}
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

		VendorPeer::addSelectColumns($c);
		$startcol = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
										$temp_obj2->addVendorRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initVendorsRelatedByDeletedBy();
				$obj2->addVendorRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$criteria->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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

		VendorPeer::addSelectColumns($c);
		$startcol2 = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$c->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();


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
					$temp_obj2->addVendor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initVendors();
				$obj2->addVendor($obj1);
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
					$temp_obj3->addVendorRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initVendorsRelatedByCreatedBy();
				$obj3->addVendorRelatedByCreatedBy($obj1);
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
					$temp_obj4->addVendorRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initVendorsRelatedByUpdatedBy();
				$obj4->addVendorRelatedByUpdatedBy($obj1);
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
					$temp_obj5->addVendorRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initVendorsRelatedByDeletedBy();
				$obj5->addVendorRelatedByDeletedBy($obj1);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(VendorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(VendorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);

		$rs = VendorPeer::doSelectRS($criteria, $con);
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

		VendorPeer::addSelectColumns($c);
		$startcol2 = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(VendorPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(VendorPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(VendorPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
					$temp_obj2->addVendorRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVendorsRelatedByCreatedBy();
				$obj2->addVendorRelatedByCreatedBy($obj1);
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
					$temp_obj3->addVendorRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initVendorsRelatedByUpdatedBy();
				$obj3->addVendorRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addVendorRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initVendorsRelatedByDeletedBy();
				$obj4->addVendorRelatedByDeletedBy($obj1);
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

		VendorPeer::addSelectColumns($c);
		$startcol2 = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
					$temp_obj2->addVendor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVendors();
				$obj2->addVendor($obj1);
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

		VendorPeer::addSelectColumns($c);
		$startcol2 = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
					$temp_obj2->addVendor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVendors();
				$obj2->addVendor($obj1);
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

		VendorPeer::addSelectColumns($c);
		$startcol2 = (VendorPeer::NUM_COLUMNS - VendorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		KindOfCompanyPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + KindOfCompanyPeer::NUM_COLUMNS;

		$c->addJoin(VendorPeer::VENDOR_KIND_OF_COMPANY_ID, KindOfCompanyPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = VendorPeer::getOMClass();

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
					$temp_obj2->addVendor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initVendors();
				$obj2->addVendor($obj1);
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
		return VendorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseVendorPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseVendorPeer', $values, $con);
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

		$criteria->remove(VendorPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseVendorPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseVendorPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseVendorPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseVendorPeer', $values, $con);
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
			$comparison = $criteria->getComparison(VendorPeer::ID);
			$selectCriteria->add(VendorPeer::ID, $criteria->remove(VendorPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseVendorPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseVendorPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(VendorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(VendorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Vendor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(VendorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Vendor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(VendorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(VendorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(VendorPeer::DATABASE_NAME, VendorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = VendorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(VendorPeer::DATABASE_NAME);

		$criteria->add(VendorPeer::ID, $pk);


		$v = VendorPeer::doSelect($criteria, $con);

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
			$criteria->add(VendorPeer::ID, $pks, Criteria::IN);
			$objs = VendorPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Vendor', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseVendorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/VendorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.VendorMapBuilder');
}

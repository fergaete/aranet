<?php


abstract class BaseObjectContactPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_objectcontact';

	
	const CLASS_DEFAULT = 'lib.model.ObjectContact';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_objectcontact.ID';

	
	const OBJECTCONTACT_CONTACT_ID = 'aranet_objectcontact.OBJECTCONTACT_CONTACT_ID';

	
	const OBJECTCONTACT_OBJECT_ID = 'aranet_objectcontact.OBJECTCONTACT_OBJECT_ID';

	
	const OBJECTCONTACT_OBJECT_CLASS = 'aranet_objectcontact.OBJECTCONTACT_OBJECT_CLASS';

	
	const OBJECTCONTACT_ROL = 'aranet_objectcontact.OBJECTCONTACT_ROL';

	
	const OBJECTCONTACT_IS_DEFAULT = 'aranet_objectcontact.OBJECTCONTACT_IS_DEFAULT';

	
	const CREATED_AT = 'aranet_objectcontact.CREATED_AT';

	
	const CREATED_BY = 'aranet_objectcontact.CREATED_BY';

	
	const UPDATED_AT = 'aranet_objectcontact.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_objectcontact.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ObjectcontactContactId', 'ObjectcontactObjectId', 'ObjectcontactObjectClass', 'ObjectcontactRol', 'ObjectcontactIsDefault', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (ObjectContactPeer::ID, ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, ObjectContactPeer::OBJECTCONTACT_ROL, ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT, ObjectContactPeer::CREATED_AT, ObjectContactPeer::CREATED_BY, ObjectContactPeer::UPDATED_AT, ObjectContactPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'objectcontact_contact_id', 'objectcontact_object_id', 'objectcontact_object_class', 'objectcontact_rol', 'objectcontact_is_default', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ObjectcontactContactId' => 1, 'ObjectcontactObjectId' => 2, 'ObjectcontactObjectClass' => 3, 'ObjectcontactRol' => 4, 'ObjectcontactIsDefault' => 5, 'CreatedAt' => 6, 'CreatedBy' => 7, 'UpdatedAt' => 8, 'UpdatedBy' => 9, ),
		BasePeer::TYPE_COLNAME => array (ObjectContactPeer::ID => 0, ObjectContactPeer::OBJECTCONTACT_CONTACT_ID => 1, ObjectContactPeer::OBJECTCONTACT_OBJECT_ID => 2, ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS => 3, ObjectContactPeer::OBJECTCONTACT_ROL => 4, ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT => 5, ObjectContactPeer::CREATED_AT => 6, ObjectContactPeer::CREATED_BY => 7, ObjectContactPeer::UPDATED_AT => 8, ObjectContactPeer::UPDATED_BY => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'objectcontact_contact_id' => 1, 'objectcontact_object_id' => 2, 'objectcontact_object_class' => 3, 'objectcontact_rol' => 4, 'objectcontact_is_default' => 5, 'created_at' => 6, 'created_by' => 7, 'updated_at' => 8, 'updated_by' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ObjectContactMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ObjectContactMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ObjectContactPeer::getTableMap();
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
		return str_replace(ObjectContactPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ObjectContactPeer::ID);

		$criteria->addSelectColumn(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID);

		$criteria->addSelectColumn(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID);

		$criteria->addSelectColumn(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS);

		$criteria->addSelectColumn(ObjectContactPeer::OBJECTCONTACT_ROL);

		$criteria->addSelectColumn(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT);

		$criteria->addSelectColumn(ObjectContactPeer::CREATED_AT);

		$criteria->addSelectColumn(ObjectContactPeer::CREATED_BY);

		$criteria->addSelectColumn(ObjectContactPeer::UPDATED_AT);

		$criteria->addSelectColumn(ObjectContactPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(aranet_objectcontact.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_objectcontact.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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
		$objects = ObjectContactPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ObjectContactPeer::populateObjects(ObjectContactPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseObjectContactPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseObjectContactPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseObjectContactPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseObjectContactPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ObjectContactPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ObjectContactPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ObjectContactPeer::addSelectColumns($c);
		$startcol = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContactPeer::addSelectColumns($c);

		$c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addObjectContact($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initObjectContacts();
				$obj2->addObjectContact($obj1); 			}
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

		ObjectContactPeer::addSelectColumns($c);
		$startcol = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

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
										$temp_obj2->addObjectContactRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initObjectContactsRelatedByCreatedBy();
				$obj2->addObjectContactRelatedByCreatedBy($obj1); 			}
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

		ObjectContactPeer::addSelectColumns($c);
		$startcol = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

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
										$temp_obj2->addObjectContactRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initObjectContactsRelatedByUpdatedBy();
				$obj2->addObjectContactRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);

		$criteria->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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

		ObjectContactPeer::addSelectColumns($c);
		$startcol2 = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContactPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContactPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);

		$c->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ContactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addObjectContact($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initObjectContacts();
				$obj2->addObjectContact($obj1);
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
					$temp_obj3->addObjectContactRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initObjectContactsRelatedByCreatedBy();
				$obj3->addObjectContactRelatedByCreatedBy($obj1);
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
					$temp_obj4->addObjectContactRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initObjectContactsRelatedByUpdatedBy();
				$obj4->addObjectContactRelatedByUpdatedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptContact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ObjectContactPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ObjectContactPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);

		$rs = ObjectContactPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptContact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ObjectContactPeer::addSelectColumns($c);
		$startcol2 = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ObjectContactPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ObjectContactPeer::UPDATED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

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
					$temp_obj2->addObjectContactRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initObjectContactsRelatedByCreatedBy();
				$obj2->addObjectContactRelatedByCreatedBy($obj1);
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
					$temp_obj3->addObjectContactRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initObjectContactsRelatedByUpdatedBy();
				$obj3->addObjectContactRelatedByUpdatedBy($obj1);
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

		ObjectContactPeer::addSelectColumns($c);
		$startcol2 = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContactPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContactPeer::NUM_COLUMNS;

		$c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addObjectContact($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initObjectContacts();
				$obj2->addObjectContact($obj1);
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

		ObjectContactPeer::addSelectColumns($c);
		$startcol2 = (ObjectContactPeer::NUM_COLUMNS - ObjectContactPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContactPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContactPeer::NUM_COLUMNS;

		$c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ObjectContactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addObjectContact($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initObjectContacts();
				$obj2->addObjectContact($obj1);
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
		return ObjectContactPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectContactPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseObjectContactPeer', $values, $con);
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

		$criteria->remove(ObjectContactPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseObjectContactPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseObjectContactPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseObjectContactPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseObjectContactPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ObjectContactPeer::ID);
			$selectCriteria->add(ObjectContactPeer::ID, $criteria->remove(ObjectContactPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseObjectContactPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseObjectContactPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ObjectContactPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ObjectContactPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ObjectContact) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ObjectContactPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ObjectContact $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ObjectContactPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ObjectContactPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ObjectContactPeer::DATABASE_NAME, ObjectContactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ObjectContactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ObjectContactPeer::DATABASE_NAME);

		$criteria->add(ObjectContactPeer::ID, $pk);


		$v = ObjectContactPeer::doSelect($criteria, $con);

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
			$criteria->add(ObjectContactPeer::ID, $pks, Criteria::IN);
			$objs = ObjectContactPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('ObjectContact', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseObjectContactPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ObjectContactMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ObjectContactMapBuilder');
}

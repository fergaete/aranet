<?php


abstract class BaseNotificationPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_notification';

	
	const CLASS_DEFAULT = 'lib.model.Notification';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_notification.ID';

	
	const NOTIFICATION_TYPE = 'aranet_notification.NOTIFICATION_TYPE';

	
	const NOTIFICATION_APPLICATION = 'aranet_notification.NOTIFICATION_APPLICATION';

	
	const NOTIFICATION_MODULE = 'aranet_notification.NOTIFICATION_MODULE';

	
	const NOTIFICATION_ACTION = 'aranet_notification.NOTIFICATION_ACTION';

	
	const NOTIFICATION_FROM_ADDRESS = 'aranet_notification.NOTIFICATION_FROM_ADDRESS';

	
	const NOTIFICATION_TO_ADDRESS = 'aranet_notification.NOTIFICATION_TO_ADDRESS';

	
	const NOTIFICATION_SUBJECT = 'aranet_notification.NOTIFICATION_SUBJECT';

	
	const NOTIFICATION_CONTENT = 'aranet_notification.NOTIFICATION_CONTENT';

	
	const NOTIFICATION_HTML_CONTENT = 'aranet_notification.NOTIFICATION_HTML_CONTENT';

	
	const NOTIFICATION_RESPONSE_CODE = 'aranet_notification.NOTIFICATION_RESPONSE_CODE';

	
	const NOTIFICATION_RESPONSE = 'aranet_notification.NOTIFICATION_RESPONSE';

	
	const NOTIFICATION_STATUS = 'aranet_notification.NOTIFICATION_STATUS';

	
	const NOTIFICATION_PROJECT_ID = 'aranet_notification.NOTIFICATION_PROJECT_ID';

	
	const CREATED_AT = 'aranet_notification.CREATED_AT';

	
	const CREATED_BY = 'aranet_notification.CREATED_BY';

	
	const UPDATED_AT = 'aranet_notification.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_notification.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'NotificationType', 'NotificationApplication', 'NotificationModule', 'NotificationAction', 'NotificationFromAddress', 'NotificationToAddress', 'NotificationSubject', 'NotificationContent', 'NotificationHtmlContent', 'NotificationResponseCode', 'NotificationResponse', 'NotificationStatus', 'NotificationProjectId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (NotificationPeer::ID, NotificationPeer::NOTIFICATION_TYPE, NotificationPeer::NOTIFICATION_APPLICATION, NotificationPeer::NOTIFICATION_MODULE, NotificationPeer::NOTIFICATION_ACTION, NotificationPeer::NOTIFICATION_FROM_ADDRESS, NotificationPeer::NOTIFICATION_TO_ADDRESS, NotificationPeer::NOTIFICATION_SUBJECT, NotificationPeer::NOTIFICATION_CONTENT, NotificationPeer::NOTIFICATION_HTML_CONTENT, NotificationPeer::NOTIFICATION_RESPONSE_CODE, NotificationPeer::NOTIFICATION_RESPONSE, NotificationPeer::NOTIFICATION_STATUS, NotificationPeer::NOTIFICATION_PROJECT_ID, NotificationPeer::CREATED_AT, NotificationPeer::CREATED_BY, NotificationPeer::UPDATED_AT, NotificationPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'notification_type', 'notification_application', 'notification_module', 'notification_action', 'notification_from_address', 'notification_to_address', 'notification_subject', 'notification_content', 'notification_html_content', 'notification_response_code', 'notification_response', 'notification_status', 'notification_project_id', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'NotificationType' => 1, 'NotificationApplication' => 2, 'NotificationModule' => 3, 'NotificationAction' => 4, 'NotificationFromAddress' => 5, 'NotificationToAddress' => 6, 'NotificationSubject' => 7, 'NotificationContent' => 8, 'NotificationHtmlContent' => 9, 'NotificationResponseCode' => 10, 'NotificationResponse' => 11, 'NotificationStatus' => 12, 'NotificationProjectId' => 13, 'CreatedAt' => 14, 'CreatedBy' => 15, 'UpdatedAt' => 16, 'UpdatedBy' => 17, ),
		BasePeer::TYPE_COLNAME => array (NotificationPeer::ID => 0, NotificationPeer::NOTIFICATION_TYPE => 1, NotificationPeer::NOTIFICATION_APPLICATION => 2, NotificationPeer::NOTIFICATION_MODULE => 3, NotificationPeer::NOTIFICATION_ACTION => 4, NotificationPeer::NOTIFICATION_FROM_ADDRESS => 5, NotificationPeer::NOTIFICATION_TO_ADDRESS => 6, NotificationPeer::NOTIFICATION_SUBJECT => 7, NotificationPeer::NOTIFICATION_CONTENT => 8, NotificationPeer::NOTIFICATION_HTML_CONTENT => 9, NotificationPeer::NOTIFICATION_RESPONSE_CODE => 10, NotificationPeer::NOTIFICATION_RESPONSE => 11, NotificationPeer::NOTIFICATION_STATUS => 12, NotificationPeer::NOTIFICATION_PROJECT_ID => 13, NotificationPeer::CREATED_AT => 14, NotificationPeer::CREATED_BY => 15, NotificationPeer::UPDATED_AT => 16, NotificationPeer::UPDATED_BY => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'notification_type' => 1, 'notification_application' => 2, 'notification_module' => 3, 'notification_action' => 4, 'notification_from_address' => 5, 'notification_to_address' => 6, 'notification_subject' => 7, 'notification_content' => 8, 'notification_html_content' => 9, 'notification_response_code' => 10, 'notification_response' => 11, 'notification_status' => 12, 'notification_project_id' => 13, 'created_at' => 14, 'created_by' => 15, 'updated_at' => 16, 'updated_by' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NotificationMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NotificationMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NotificationPeer::getTableMap();
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
		return str_replace(NotificationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NotificationPeer::ID);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_TYPE);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_APPLICATION);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_MODULE);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_ACTION);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_FROM_ADDRESS);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_TO_ADDRESS);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_SUBJECT);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_CONTENT);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_HTML_CONTENT);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_RESPONSE_CODE);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_RESPONSE);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_STATUS);

		$criteria->addSelectColumn(NotificationPeer::NOTIFICATION_PROJECT_ID);

		$criteria->addSelectColumn(NotificationPeer::CREATED_AT);

		$criteria->addSelectColumn(NotificationPeer::CREATED_BY);

		$criteria->addSelectColumn(NotificationPeer::UPDATED_AT);

		$criteria->addSelectColumn(NotificationPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(aranet_notification.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_notification.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NotificationPeer::doSelectRS($criteria, $con);
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
		$objects = NotificationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NotificationPeer::populateObjects(NotificationPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseNotificationPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseNotificationPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseNotificationPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseNotificationPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NotificationPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NotificationPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NotificationPeer::addSelectColumns($c);
		$startcol = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

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
										$temp_obj2->addNotificationRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initNotificationsRelatedByCreatedBy();
				$obj2->addNotificationRelatedByCreatedBy($obj1); 			}
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

		NotificationPeer::addSelectColumns($c);
		$startcol = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

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
										$temp_obj2->addNotificationRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initNotificationsRelatedByUpdatedBy();
				$obj2->addNotificationRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProject(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NotificationPeer::addSelectColumns($c);
		$startcol = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addNotification($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initNotifications();
				$obj2->addNotification($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
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

		NotificationPeer::addSelectColumns($c);
		$startcol2 = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addNotificationRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initNotificationsRelatedByCreatedBy();
				$obj2->addNotificationRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addNotificationRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initNotificationsRelatedByUpdatedBy();
				$obj3->addNotificationRelatedByUpdatedBy($obj1);
			}


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProject(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addNotification($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initNotifications();
				$obj4->addNotification($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProject(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NotificationPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NotificationPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = NotificationPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NotificationPeer::addSelectColumns($c);
		$startcol2 = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addNotification($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initNotifications();
				$obj2->addNotification($obj1);
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

		NotificationPeer::addSelectColumns($c);
		$startcol2 = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(NotificationPeer::NOTIFICATION_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProject(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addNotification($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initNotifications();
				$obj2->addNotification($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProject(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NotificationPeer::addSelectColumns($c);
		$startcol2 = (NotificationPeer::NUM_COLUMNS - NotificationPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(NotificationPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(NotificationPeer::UPDATED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NotificationPeer::getOMClass();

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
					$temp_obj2->addNotificationRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initNotificationsRelatedByCreatedBy();
				$obj2->addNotificationRelatedByCreatedBy($obj1);
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
					$temp_obj3->addNotificationRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initNotificationsRelatedByUpdatedBy();
				$obj3->addNotificationRelatedByUpdatedBy($obj1);
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
		return NotificationPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseNotificationPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseNotificationPeer', $values, $con);
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

		$criteria->remove(NotificationPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseNotificationPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseNotificationPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseNotificationPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseNotificationPeer', $values, $con);
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
			$comparison = $criteria->getComparison(NotificationPeer::ID);
			$selectCriteria->add(NotificationPeer::ID, $criteria->remove(NotificationPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseNotificationPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseNotificationPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(NotificationPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NotificationPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Notification) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NotificationPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Notification $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NotificationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NotificationPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NotificationPeer::DATABASE_NAME, NotificationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NotificationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NotificationPeer::DATABASE_NAME);

		$criteria->add(NotificationPeer::ID, $pk);


		$v = NotificationPeer::doSelect($criteria, $con);

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
			$criteria->add(NotificationPeer::ID, $pks, Criteria::IN);
			$objs = NotificationPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Notification', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseNotificationPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NotificationMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NotificationMapBuilder');
}

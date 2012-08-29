<?php


abstract class BaseProjectPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_project';

	
	const CLASS_DEFAULT = 'lib.model.Project';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_project.ID';

	
	const PROJECT_PREFIX = 'aranet_project.PROJECT_PREFIX';

	
	const PROJECT_NUMBER = 'aranet_project.PROJECT_NUMBER';

	
	const PROJECT_NAME = 'aranet_project.PROJECT_NAME';

	
	const PROJECT_URL = 'aranet_project.PROJECT_URL';

	
	const PROJECT_CLIENT_ID = 'aranet_project.PROJECT_CLIENT_ID';

	
	const PROJECT_COMMENTS = 'aranet_project.PROJECT_COMMENTS';

	
	const PROJECT_CATEGORY_ID = 'aranet_project.PROJECT_CATEGORY_ID';

	
	const PROJECT_START_DATE = 'aranet_project.PROJECT_START_DATE';

	
	const PROJECT_FINISH_DATE = 'aranet_project.PROJECT_FINISH_DATE';

	
	const PROJECT_STATUS_ID = 'aranet_project.PROJECT_STATUS_ID';

	
	const CREATED_AT = 'aranet_project.CREATED_AT';

	
	const CREATED_BY = 'aranet_project.CREATED_BY';

	
	const UPDATED_AT = 'aranet_project.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_project.UPDATED_BY';

	
	const DELETED_AT = 'aranet_project.DELETED_AT';

	
	const DELETED_BY = 'aranet_project.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ProjectPrefix', 'ProjectNumber', 'ProjectName', 'ProjectUrl', 'ProjectClientId', 'ProjectComments', 'ProjectCategoryId', 'ProjectStartDate', 'ProjectFinishDate', 'ProjectStatusId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (ProjectPeer::ID, ProjectPeer::PROJECT_PREFIX, ProjectPeer::PROJECT_NUMBER, ProjectPeer::PROJECT_NAME, ProjectPeer::PROJECT_URL, ProjectPeer::PROJECT_CLIENT_ID, ProjectPeer::PROJECT_COMMENTS, ProjectPeer::PROJECT_CATEGORY_ID, ProjectPeer::PROJECT_START_DATE, ProjectPeer::PROJECT_FINISH_DATE, ProjectPeer::PROJECT_STATUS_ID, ProjectPeer::CREATED_AT, ProjectPeer::CREATED_BY, ProjectPeer::UPDATED_AT, ProjectPeer::UPDATED_BY, ProjectPeer::DELETED_AT, ProjectPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'project_prefix', 'project_number', 'project_name', 'project_url', 'project_client_id', 'project_comments', 'project_category_id', 'project_start_date', 'project_finish_date', 'project_status_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ProjectPrefix' => 1, 'ProjectNumber' => 2, 'ProjectName' => 3, 'ProjectUrl' => 4, 'ProjectClientId' => 5, 'ProjectComments' => 6, 'ProjectCategoryId' => 7, 'ProjectStartDate' => 8, 'ProjectFinishDate' => 9, 'ProjectStatusId' => 10, 'CreatedAt' => 11, 'CreatedBy' => 12, 'UpdatedAt' => 13, 'UpdatedBy' => 14, 'DeletedAt' => 15, 'DeletedBy' => 16, ),
		BasePeer::TYPE_COLNAME => array (ProjectPeer::ID => 0, ProjectPeer::PROJECT_PREFIX => 1, ProjectPeer::PROJECT_NUMBER => 2, ProjectPeer::PROJECT_NAME => 3, ProjectPeer::PROJECT_URL => 4, ProjectPeer::PROJECT_CLIENT_ID => 5, ProjectPeer::PROJECT_COMMENTS => 6, ProjectPeer::PROJECT_CATEGORY_ID => 7, ProjectPeer::PROJECT_START_DATE => 8, ProjectPeer::PROJECT_FINISH_DATE => 9, ProjectPeer::PROJECT_STATUS_ID => 10, ProjectPeer::CREATED_AT => 11, ProjectPeer::CREATED_BY => 12, ProjectPeer::UPDATED_AT => 13, ProjectPeer::UPDATED_BY => 14, ProjectPeer::DELETED_AT => 15, ProjectPeer::DELETED_BY => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'project_prefix' => 1, 'project_number' => 2, 'project_name' => 3, 'project_url' => 4, 'project_client_id' => 5, 'project_comments' => 6, 'project_category_id' => 7, 'project_start_date' => 8, 'project_finish_date' => 9, 'project_status_id' => 10, 'created_at' => 11, 'created_by' => 12, 'updated_at' => 13, 'updated_by' => 14, 'deleted_at' => 15, 'deleted_by' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ProjectMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ProjectMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ProjectPeer::getTableMap();
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
		return str_replace(ProjectPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ProjectPeer::ID);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_PREFIX);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_NUMBER);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_NAME);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_URL);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_CLIENT_ID);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_COMMENTS);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_CATEGORY_ID);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_START_DATE);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_FINISH_DATE);

		$criteria->addSelectColumn(ProjectPeer::PROJECT_STATUS_ID);

		$criteria->addSelectColumn(ProjectPeer::CREATED_AT);

		$criteria->addSelectColumn(ProjectPeer::CREATED_BY);

		$criteria->addSelectColumn(ProjectPeer::UPDATED_AT);

		$criteria->addSelectColumn(ProjectPeer::UPDATED_BY);

		$criteria->addSelectColumn(ProjectPeer::DELETED_AT);

		$criteria->addSelectColumn(ProjectPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_project.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_project.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
		$objects = ProjectPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ProjectPeer::populateObjects(ProjectPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseProjectPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseProjectPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseProjectPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ProjectPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ProjectPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinClient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProjectCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinProjectStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinClient(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ClientPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProjectCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectCategoryPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProjectCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinProjectStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectStatusPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectStatusPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getProjectStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addProject($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1); 			}
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

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
										$temp_obj2->addProjectRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectsRelatedByCreatedBy();
				$obj2->addProjectRelatedByCreatedBy($obj1); 			}
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

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
										$temp_obj2->addProjectRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectsRelatedByUpdatedBy();
				$obj2->addProjectRelatedByUpdatedBy($obj1); 			}
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

		ProjectPeer::addSelectColumns($c);
		$startcol = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

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
										$temp_obj2->addProjectRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initProjectsRelatedByDeletedBy();
				$obj2->addProjectRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectCategoryPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProjectStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}


					
			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}


					
			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProjectStatus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addProjectRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initProjectsRelatedByCreatedBy();
				$obj5->addProjectRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addProjectRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initProjectsRelatedByUpdatedBy();
				$obj6->addProjectRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addProjectRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initProjectsRelatedByDeletedBy();
				$obj7->addProjectRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptClient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProjectCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptProjectStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ProjectPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ProjectPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$criteria->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$rs = ProjectPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptClient(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectCategoryPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getProjectCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectStatus(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectsRelatedByCreatedBy();
				$obj4->addProjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addProjectRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initProjectsRelatedByUpdatedBy();
				$obj5->addProjectRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addProjectRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initProjectsRelatedByDeletedBy();
				$obj6->addProjectRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProjectCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectStatus(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectsRelatedByCreatedBy();
				$obj4->addProjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addProjectRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initProjectsRelatedByUpdatedBy();
				$obj5->addProjectRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addProjectRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initProjectsRelatedByDeletedBy();
				$obj6->addProjectRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptProjectStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectCategoryPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ProjectPeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProjectRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjectsRelatedByCreatedBy();
				$obj4->addProjectRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addProjectRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initProjectsRelatedByUpdatedBy();
				$obj5->addProjectRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addProjectRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initProjectsRelatedByDeletedBy();
				$obj6->addProjectRelatedByDeletedBy($obj1);
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

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectCategoryPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProjectStatusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProjectStatus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
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

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectCategoryPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProjectStatusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProjectStatus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
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

		ProjectPeer::addSelectColumns($c);
		$startcol2 = (ProjectPeer::NUM_COLUMNS - ProjectPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectCategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectCategoryPeer::NUM_COLUMNS;

		ProjectStatusPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ProjectStatusPeer::NUM_COLUMNS;

		$c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_CATEGORY_ID, ProjectCategoryPeer::ID);

		$c->addJoin(ProjectPeer::PROJECT_STATUS_ID, ProjectStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ProjectPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getClient(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initProjects();
				$obj2->addProject($obj1);
			}

			$omClass = ProjectCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProjectCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initProjects();
				$obj3->addProject($obj1);
			}

			$omClass = ProjectStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getProjectStatus(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addProject($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initProjects();
				$obj4->addProject($obj1);
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
		return ProjectPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPeer', $values, $con);
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

		$criteria->remove(ProjectPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseProjectPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseProjectPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseProjectPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ProjectPeer::ID);
			$selectCriteria->add(ProjectPeer::ID, $criteria->remove(ProjectPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseProjectPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseProjectPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ProjectPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ProjectPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Project) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProjectPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Project $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProjectPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProjectPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ProjectPeer::DATABASE_NAME, ProjectPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ProjectPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ProjectPeer::DATABASE_NAME);

		$criteria->add(ProjectPeer::ID, $pk);


		$v = ProjectPeer::doSelect($criteria, $con);

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
			$criteria->add(ProjectPeer::ID, $pks, Criteria::IN);
			$objs = ProjectPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Project', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseProjectPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ProjectMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ProjectMapBuilder');
}

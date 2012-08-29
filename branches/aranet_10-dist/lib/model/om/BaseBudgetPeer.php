<?php


abstract class BaseBudgetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_budget';

	
	const CLASS_DEFAULT = 'lib.model.Budget';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_budget.ID';

	
	const BUDGET_PREFIX = 'aranet_budget.BUDGET_PREFIX';

	
	const BUDGET_NUMBER = 'aranet_budget.BUDGET_NUMBER';

	
	const BUDGET_REVISION = 'aranet_budget.BUDGET_REVISION';

	
	const BUDGET_DATE = 'aranet_budget.BUDGET_DATE';

	
	const BUDGET_VALID_DATE = 'aranet_budget.BUDGET_VALID_DATE';

	
	const BUDGET_APPROVED_DATE = 'aranet_budget.BUDGET_APPROVED_DATE';

	
	const BUDGET_CLIENT_ID = 'aranet_budget.BUDGET_CLIENT_ID';

	
	const BUDGET_PROJECT_ID = 'aranet_budget.BUDGET_PROJECT_ID';

	
	const BUDGET_CATEGORY_ID = 'aranet_budget.BUDGET_CATEGORY_ID';

	
	const BUDGET_TITLE = 'aranet_budget.BUDGET_TITLE';

	
	const BUDGET_COMMENTS = 'aranet_budget.BUDGET_COMMENTS';

	
	const BUDGET_PRINT_COMMENTS = 'aranet_budget.BUDGET_PRINT_COMMENTS';

	
	const BUDGET_TAX_RATE = 'aranet_budget.BUDGET_TAX_RATE';

	
	const BUDGET_FREIGHT_CHARGE = 'aranet_budget.BUDGET_FREIGHT_CHARGE';

	
	const BUDGET_TOTAL_COST = 'aranet_budget.BUDGET_TOTAL_COST';

	
	const BUDGET_TOTAL_AMOUNT = 'aranet_budget.BUDGET_TOTAL_AMOUNT';

	
	const BUDGET_PAYMENT_CONDITION_ID = 'aranet_budget.BUDGET_PAYMENT_CONDITION_ID';

	
	const BUDGET_STATUS_ID = 'aranet_budget.BUDGET_STATUS_ID';

	
	const BUDGET_IS_LAST = 'aranet_budget.BUDGET_IS_LAST';

	
	const CREATED_AT = 'aranet_budget.CREATED_AT';

	
	const CREATED_BY = 'aranet_budget.CREATED_BY';

	
	const UPDATED_AT = 'aranet_budget.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_budget.UPDATED_BY';

	
	const DELETED_AT = 'aranet_budget.DELETED_AT';

	
	const DELETED_BY = 'aranet_budget.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'BudgetPrefix', 'BudgetNumber', 'BudgetRevision', 'BudgetDate', 'BudgetValidDate', 'BudgetApprovedDate', 'BudgetClientId', 'BudgetProjectId', 'BudgetCategoryId', 'BudgetTitle', 'BudgetComments', 'BudgetPrintComments', 'BudgetTaxRate', 'BudgetFreightCharge', 'BudgetTotalCost', 'BudgetTotalAmount', 'BudgetPaymentConditionId', 'BudgetStatusId', 'BudgetIsLast', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (BudgetPeer::ID, BudgetPeer::BUDGET_PREFIX, BudgetPeer::BUDGET_NUMBER, BudgetPeer::BUDGET_REVISION, BudgetPeer::BUDGET_DATE, BudgetPeer::BUDGET_VALID_DATE, BudgetPeer::BUDGET_APPROVED_DATE, BudgetPeer::BUDGET_CLIENT_ID, BudgetPeer::BUDGET_PROJECT_ID, BudgetPeer::BUDGET_CATEGORY_ID, BudgetPeer::BUDGET_TITLE, BudgetPeer::BUDGET_COMMENTS, BudgetPeer::BUDGET_PRINT_COMMENTS, BudgetPeer::BUDGET_TAX_RATE, BudgetPeer::BUDGET_FREIGHT_CHARGE, BudgetPeer::BUDGET_TOTAL_COST, BudgetPeer::BUDGET_TOTAL_AMOUNT, BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, BudgetPeer::BUDGET_STATUS_ID, BudgetPeer::BUDGET_IS_LAST, BudgetPeer::CREATED_AT, BudgetPeer::CREATED_BY, BudgetPeer::UPDATED_AT, BudgetPeer::UPDATED_BY, BudgetPeer::DELETED_AT, BudgetPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'budget_prefix', 'budget_number', 'budget_revision', 'budget_date', 'budget_valid_date', 'budget_approved_date', 'budget_client_id', 'budget_project_id', 'budget_category_id', 'budget_title', 'budget_comments', 'budget_print_comments', 'budget_tax_rate', 'budget_freight_charge', 'budget_total_cost', 'budget_total_amount', 'budget_payment_condition_id', 'budget_status_id', 'budget_is_last', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'BudgetPrefix' => 1, 'BudgetNumber' => 2, 'BudgetRevision' => 3, 'BudgetDate' => 4, 'BudgetValidDate' => 5, 'BudgetApprovedDate' => 6, 'BudgetClientId' => 7, 'BudgetProjectId' => 8, 'BudgetCategoryId' => 9, 'BudgetTitle' => 10, 'BudgetComments' => 11, 'BudgetPrintComments' => 12, 'BudgetTaxRate' => 13, 'BudgetFreightCharge' => 14, 'BudgetTotalCost' => 15, 'BudgetTotalAmount' => 16, 'BudgetPaymentConditionId' => 17, 'BudgetStatusId' => 18, 'BudgetIsLast' => 19, 'CreatedAt' => 20, 'CreatedBy' => 21, 'UpdatedAt' => 22, 'UpdatedBy' => 23, 'DeletedAt' => 24, 'DeletedBy' => 25, ),
		BasePeer::TYPE_COLNAME => array (BudgetPeer::ID => 0, BudgetPeer::BUDGET_PREFIX => 1, BudgetPeer::BUDGET_NUMBER => 2, BudgetPeer::BUDGET_REVISION => 3, BudgetPeer::BUDGET_DATE => 4, BudgetPeer::BUDGET_VALID_DATE => 5, BudgetPeer::BUDGET_APPROVED_DATE => 6, BudgetPeer::BUDGET_CLIENT_ID => 7, BudgetPeer::BUDGET_PROJECT_ID => 8, BudgetPeer::BUDGET_CATEGORY_ID => 9, BudgetPeer::BUDGET_TITLE => 10, BudgetPeer::BUDGET_COMMENTS => 11, BudgetPeer::BUDGET_PRINT_COMMENTS => 12, BudgetPeer::BUDGET_TAX_RATE => 13, BudgetPeer::BUDGET_FREIGHT_CHARGE => 14, BudgetPeer::BUDGET_TOTAL_COST => 15, BudgetPeer::BUDGET_TOTAL_AMOUNT => 16, BudgetPeer::BUDGET_PAYMENT_CONDITION_ID => 17, BudgetPeer::BUDGET_STATUS_ID => 18, BudgetPeer::BUDGET_IS_LAST => 19, BudgetPeer::CREATED_AT => 20, BudgetPeer::CREATED_BY => 21, BudgetPeer::UPDATED_AT => 22, BudgetPeer::UPDATED_BY => 23, BudgetPeer::DELETED_AT => 24, BudgetPeer::DELETED_BY => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'budget_prefix' => 1, 'budget_number' => 2, 'budget_revision' => 3, 'budget_date' => 4, 'budget_valid_date' => 5, 'budget_approved_date' => 6, 'budget_client_id' => 7, 'budget_project_id' => 8, 'budget_category_id' => 9, 'budget_title' => 10, 'budget_comments' => 11, 'budget_print_comments' => 12, 'budget_tax_rate' => 13, 'budget_freight_charge' => 14, 'budget_total_cost' => 15, 'budget_total_amount' => 16, 'budget_payment_condition_id' => 17, 'budget_status_id' => 18, 'budget_is_last' => 19, 'created_at' => 20, 'created_by' => 21, 'updated_at' => 22, 'updated_by' => 23, 'deleted_at' => 24, 'deleted_by' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BudgetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BudgetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BudgetPeer::getTableMap();
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
		return str_replace(BudgetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BudgetPeer::ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_PREFIX);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_NUMBER);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_REVISION);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_DATE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_VALID_DATE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_APPROVED_DATE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_CLIENT_ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_PROJECT_ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_CATEGORY_ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_TITLE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_COMMENTS);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_PRINT_COMMENTS);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_TAX_RATE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_FREIGHT_CHARGE);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_TOTAL_COST);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_TOTAL_AMOUNT);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_STATUS_ID);

		$criteria->addSelectColumn(BudgetPeer::BUDGET_IS_LAST);

		$criteria->addSelectColumn(BudgetPeer::CREATED_AT);

		$criteria->addSelectColumn(BudgetPeer::CREATED_BY);

		$criteria->addSelectColumn(BudgetPeer::UPDATED_AT);

		$criteria->addSelectColumn(BudgetPeer::UPDATED_BY);

		$criteria->addSelectColumn(BudgetPeer::DELETED_AT);

		$criteria->addSelectColumn(BudgetPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_budget.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_budget.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
		$objects = BudgetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BudgetPeer::populateObjects(BudgetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseBudgetPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseBudgetPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseBudgetPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseBudgetPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BudgetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BudgetPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinBudgetStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPaymentCondition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInvoiceCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinClient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinBudgetStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetStatusPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBudget($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1); 			}
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

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
										$temp_obj2->addBudgetRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetsRelatedByCreatedBy();
				$obj2->addBudgetRelatedByCreatedBy($obj1); 			}
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

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
										$temp_obj2->addBudgetRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetsRelatedByUpdatedBy();
				$obj2->addBudgetRelatedByUpdatedBy($obj1); 			}
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

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
										$temp_obj2->addBudgetRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetsRelatedByDeletedBy();
				$obj2->addBudgetRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPaymentCondition(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentConditionPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PaymentConditionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBudget($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInvoiceCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InvoiceCategoryPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InvoiceCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBudget($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1); 			}
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

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
										$temp_obj2->addBudget($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinClient(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ClientPeer::addSelectColumns($c);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
										$temp_obj2->addBudget($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
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
					$temp_obj3->addBudgetRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByCreatedBy();
				$obj3->addBudgetRelatedByCreatedBy($obj1);
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
					$temp_obj4->addBudgetRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByUpdatedBy();
				$obj4->addBudgetRelatedByUpdatedBy($obj1);
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
					$temp_obj5->addBudgetRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgetsRelatedByDeletedBy();
				$obj5->addBudgetRelatedByDeletedBy($obj1);
			}


					
			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}


					
			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getProject(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
			}


					
			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getClient(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addBudget($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initBudgets();
				$obj9->addBudget($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptBudgetStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPaymentCondition(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInvoiceCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptClient(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$criteria->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$rs = BudgetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptBudgetStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

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
					$temp_obj2->addBudgetRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgetsRelatedByCreatedBy();
				$obj2->addBudgetRelatedByCreatedBy($obj1);
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
					$temp_obj3->addBudgetRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByUpdatedBy();
				$obj3->addBudgetRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addBudgetRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByDeletedBy();
				$obj4->addBudgetRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgets();
				$obj5->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getClient(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
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

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgets();
				$obj3->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgets();
				$obj4->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgets();
				$obj5->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getClient(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
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

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgets();
				$obj3->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgets();
				$obj4->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgets();
				$obj5->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getClient(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
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

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgets();
				$obj3->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgets();
				$obj4->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getProject(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgets();
				$obj5->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getClient(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPaymentCondition(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByCreatedBy();
				$obj3->addBudgetRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudgetRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByUpdatedBy();
				$obj4->addBudgetRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudgetRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgetsRelatedByDeletedBy();
				$obj5->addBudgetRelatedByDeletedBy($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getClient(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInvoiceCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByCreatedBy();
				$obj3->addBudgetRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudgetRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByUpdatedBy();
				$obj4->addBudgetRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudgetRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgetsRelatedByDeletedBy();
				$obj5->addBudgetRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getProject(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getClient(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
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

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + InvoiceCategoryPeer::NUM_COLUMNS;

		ClientPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ClientPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CLIENT_ID, ClientPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByCreatedBy();
				$obj3->addBudgetRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudgetRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByUpdatedBy();
				$obj4->addBudgetRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudgetRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgetsRelatedByDeletedBy();
				$obj5->addBudgetRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}

			$omClass = ClientPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getClient(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptClient(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetPeer::addSelectColumns($c);
		$startcol2 = (BudgetPeer::NUM_COLUMNS - BudgetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetStatusPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + InvoiceCategoryPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		$c->addJoin(BudgetPeer::BUDGET_STATUS_ID, BudgetStatusPeer::ID);

		$c->addJoin(BudgetPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(BudgetPeer::BUDGET_PROJECT_ID, ProjectPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudgetStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgets();
				$obj2->addBudget($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetsRelatedByCreatedBy();
				$obj3->addBudgetRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudgetRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetsRelatedByUpdatedBy();
				$obj4->addBudgetRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addBudgetRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initBudgetsRelatedByDeletedBy();
				$obj5->addBudgetRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initBudgets();
				$obj6->addBudget($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initBudgets();
				$obj7->addBudget($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getProject(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addBudget($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initBudgets();
				$obj8->addBudget($obj1);
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
		return BudgetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseBudgetPeer', $values, $con);
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

		$criteria->remove(BudgetPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseBudgetPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseBudgetPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseBudgetPeer', $values, $con);
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
			$comparison = $criteria->getComparison(BudgetPeer::ID);
			$selectCriteria->add(BudgetPeer::ID, $criteria->remove(BudgetPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseBudgetPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseBudgetPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(BudgetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BudgetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Budget) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BudgetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Budget $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BudgetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BudgetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BudgetPeer::DATABASE_NAME, BudgetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BudgetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BudgetPeer::DATABASE_NAME);

		$criteria->add(BudgetPeer::ID, $pk);


		$v = BudgetPeer::doSelect($criteria, $con);

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
			$criteria->add(BudgetPeer::ID, $pks, Criteria::IN);
			$objs = BudgetPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Budget', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseBudgetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BudgetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BudgetMapBuilder');
}

<?php


abstract class BaseIncomeItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_income_item';

	
	const CLASS_DEFAULT = 'lib.model.IncomeItem';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_income_item.ID';

	
	const INCOME_ITEM_NAME = 'aranet_income_item.INCOME_ITEM_NAME';

	
	const INCOME_ITEM_COMMENTS = 'aranet_income_item.INCOME_ITEM_COMMENTS';

	
	const INCOME_DATE = 'aranet_income_item.INCOME_DATE';

	
	const INCOME_ITEM_CATEGORY_ID = 'aranet_income_item.INCOME_ITEM_CATEGORY_ID';

	
	const INCOME_ITEM_PAYMENT_METHOD_ID = 'aranet_income_item.INCOME_ITEM_PAYMENT_METHOD_ID';

	
	const INCOME_ITEM_PAYMENT_CHECK = 'aranet_income_item.INCOME_ITEM_PAYMENT_CHECK';

	
	const INCOME_ITEM_REIMBURSEMENT_ID = 'aranet_income_item.INCOME_ITEM_REIMBURSEMENT_ID';

	
	const INCOME_ITEM_PROJECT_ID = 'aranet_income_item.INCOME_ITEM_PROJECT_ID';

	
	const INCOME_ITEM_BUDGET_ID = 'aranet_income_item.INCOME_ITEM_BUDGET_ID';

	
	const INCOME_ITEM_AMOUNT = 'aranet_income_item.INCOME_ITEM_AMOUNT';

	
	const INCOME_ITEM_BASE = 'aranet_income_item.INCOME_ITEM_BASE';

	
	const INCOME_ITEM_TAX_RATE = 'aranet_income_item.INCOME_ITEM_TAX_RATE';

	
	const INCOME_ITEM_IRPF = 'aranet_income_item.INCOME_ITEM_IRPF';

	
	const INCOME_ITEM_INVOICE_NUMBER = 'aranet_income_item.INCOME_ITEM_INVOICE_NUMBER';

	
	const INCOME_ITEM_VENDOR_ID = 'aranet_income_item.INCOME_ITEM_VENDOR_ID';

	
	const CREATED_AT = 'aranet_income_item.CREATED_AT';

	
	const CREATED_BY = 'aranet_income_item.CREATED_BY';

	
	const UPDATED_AT = 'aranet_income_item.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_income_item.UPDATED_BY';

	
	const DELETED_AT = 'aranet_income_item.DELETED_AT';

	
	const DELETED_BY = 'aranet_income_item.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IncomeItemName', 'IncomeItemComments', 'IncomeDate', 'IncomeItemCategoryId', 'IncomeItemPaymentMethodId', 'IncomeItemPaymentCheck', 'IncomeItemReimbursementId', 'IncomeItemProjectId', 'IncomeItemBudgetId', 'IncomeItemAmount', 'IncomeItemBase', 'IncomeItemTaxRate', 'IncomeItemIrpf', 'IncomeItemInvoiceNumber', 'IncomeItemVendorId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (IncomeItemPeer::ID, IncomeItemPeer::INCOME_ITEM_NAME, IncomeItemPeer::INCOME_ITEM_COMMENTS, IncomeItemPeer::INCOME_DATE, IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK, IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, IncomeItemPeer::INCOME_ITEM_PROJECT_ID, IncomeItemPeer::INCOME_ITEM_BUDGET_ID, IncomeItemPeer::INCOME_ITEM_AMOUNT, IncomeItemPeer::INCOME_ITEM_BASE, IncomeItemPeer::INCOME_ITEM_TAX_RATE, IncomeItemPeer::INCOME_ITEM_IRPF, IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER, IncomeItemPeer::INCOME_ITEM_VENDOR_ID, IncomeItemPeer::CREATED_AT, IncomeItemPeer::CREATED_BY, IncomeItemPeer::UPDATED_AT, IncomeItemPeer::UPDATED_BY, IncomeItemPeer::DELETED_AT, IncomeItemPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'income_item_name', 'income_item_comments', 'income_date', 'income_item_category_id', 'income_item_payment_method_id', 'income_item_payment_check', 'income_item_reimbursement_id', 'income_item_project_id', 'income_item_budget_id', 'income_item_amount', 'income_item_base', 'income_item_tax_rate', 'income_item_irpf', 'income_item_invoice_number', 'income_item_vendor_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IncomeItemName' => 1, 'IncomeItemComments' => 2, 'IncomeDate' => 3, 'IncomeItemCategoryId' => 4, 'IncomeItemPaymentMethodId' => 5, 'IncomeItemPaymentCheck' => 6, 'IncomeItemReimbursementId' => 7, 'IncomeItemProjectId' => 8, 'IncomeItemBudgetId' => 9, 'IncomeItemAmount' => 10, 'IncomeItemBase' => 11, 'IncomeItemTaxRate' => 12, 'IncomeItemIrpf' => 13, 'IncomeItemInvoiceNumber' => 14, 'IncomeItemVendorId' => 15, 'CreatedAt' => 16, 'CreatedBy' => 17, 'UpdatedAt' => 18, 'UpdatedBy' => 19, 'DeletedAt' => 20, 'DeletedBy' => 21, ),
		BasePeer::TYPE_COLNAME => array (IncomeItemPeer::ID => 0, IncomeItemPeer::INCOME_ITEM_NAME => 1, IncomeItemPeer::INCOME_ITEM_COMMENTS => 2, IncomeItemPeer::INCOME_DATE => 3, IncomeItemPeer::INCOME_ITEM_CATEGORY_ID => 4, IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID => 5, IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK => 6, IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID => 7, IncomeItemPeer::INCOME_ITEM_PROJECT_ID => 8, IncomeItemPeer::INCOME_ITEM_BUDGET_ID => 9, IncomeItemPeer::INCOME_ITEM_AMOUNT => 10, IncomeItemPeer::INCOME_ITEM_BASE => 11, IncomeItemPeer::INCOME_ITEM_TAX_RATE => 12, IncomeItemPeer::INCOME_ITEM_IRPF => 13, IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER => 14, IncomeItemPeer::INCOME_ITEM_VENDOR_ID => 15, IncomeItemPeer::CREATED_AT => 16, IncomeItemPeer::CREATED_BY => 17, IncomeItemPeer::UPDATED_AT => 18, IncomeItemPeer::UPDATED_BY => 19, IncomeItemPeer::DELETED_AT => 20, IncomeItemPeer::DELETED_BY => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'income_item_name' => 1, 'income_item_comments' => 2, 'income_date' => 3, 'income_item_category_id' => 4, 'income_item_payment_method_id' => 5, 'income_item_payment_check' => 6, 'income_item_reimbursement_id' => 7, 'income_item_project_id' => 8, 'income_item_budget_id' => 9, 'income_item_amount' => 10, 'income_item_base' => 11, 'income_item_tax_rate' => 12, 'income_item_irpf' => 13, 'income_item_invoice_number' => 14, 'income_item_vendor_id' => 15, 'created_at' => 16, 'created_by' => 17, 'updated_at' => 18, 'updated_by' => 19, 'deleted_at' => 20, 'deleted_by' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/IncomeItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.IncomeItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = IncomeItemPeer::getTableMap();
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
		return str_replace(IncomeItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(IncomeItemPeer::ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_NAME);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_COMMENTS);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_DATE);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_PAYMENT_CHECK);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_PROJECT_ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_BUDGET_ID);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_AMOUNT);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_BASE);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_TAX_RATE);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_IRPF);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_INVOICE_NUMBER);

		$criteria->addSelectColumn(IncomeItemPeer::INCOME_ITEM_VENDOR_ID);

		$criteria->addSelectColumn(IncomeItemPeer::CREATED_AT);

		$criteria->addSelectColumn(IncomeItemPeer::CREATED_BY);

		$criteria->addSelectColumn(IncomeItemPeer::UPDATED_AT);

		$criteria->addSelectColumn(IncomeItemPeer::UPDATED_BY);

		$criteria->addSelectColumn(IncomeItemPeer::DELETED_AT);

		$criteria->addSelectColumn(IncomeItemPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_income_item.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_income_item.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
		$objects = IncomeItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return IncomeItemPeer::populateObjects(IncomeItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseIncomeItemPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseIncomeItemPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseIncomeItemPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseIncomeItemPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			IncomeItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = IncomeItemPeer::getOMClass();
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinIncomeCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPaymentMethod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinReimbursement(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinBudget(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinVendor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
										$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1); 			}
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
										$temp_obj2->addIncomeItemRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItemsRelatedByUpdatedBy();
				$obj2->addIncomeItemRelatedByUpdatedBy($obj1); 			}
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
										$temp_obj2->addIncomeItemRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItemsRelatedByDeletedBy();
				$obj2->addIncomeItemRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinIncomeCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		IncomeCategoryPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IncomeCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPaymentMethod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentMethodPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PaymentMethodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinReimbursement(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ReimbursementPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ReimbursementPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getReimbursement(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinBudget(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinVendor(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VendorPeer::addSelectColumns($c);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VendorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getVendor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addIncomeItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();


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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}


					
			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}


					
			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}


					
			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getReimbursement(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
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
					$temp_obj8->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getBudget(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
			}


					
			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getVendor(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addIncomeItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initIncomeItems();
				$obj10->addIncomeItem($obj1);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptIncomeCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPaymentMethod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptReimbursement(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptBudget(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptVendor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(IncomeItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = IncomeItemPeer::doSelectRS($criteria, $con);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItems();
				$obj3->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getReimbursement(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItems();
				$obj4->addIncomeItem($obj1);
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
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getBudget(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getVendor(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItems();
				$obj3->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getReimbursement(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItems();
				$obj4->addIncomeItem($obj1);
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
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getBudget(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getVendor(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItems();
				$obj2->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItems();
				$obj3->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getReimbursement(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItems();
				$obj4->addIncomeItem($obj1);
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
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getBudget(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getVendor(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptIncomeCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getReimbursement(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
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
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getBudget(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getVendor(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPaymentMethod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getReimbursement(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
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
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getBudget(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getVendor(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptReimbursement(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentMethodPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
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
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getBudget(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getVendor(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
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

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getReimbursement(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getBudget(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getVendor(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptBudget(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + VendorPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getReimbursement(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
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
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getVendor(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptVendor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		IncomeItemPeer::addSelectColumns($c);
		$startcol2 = (IncomeItemPeer::NUM_COLUMNS - IncomeItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		IncomeCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + IncomeCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = IncomeItemPeer::getOMClass();

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
					$temp_obj2->addIncomeItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initIncomeItemsRelatedByCreatedBy();
				$obj2->addIncomeItemRelatedByCreatedBy($obj1);
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
					$temp_obj3->addIncomeItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initIncomeItemsRelatedByUpdatedBy();
				$obj3->addIncomeItemRelatedByUpdatedBy($obj1);
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
					$temp_obj4->addIncomeItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initIncomeItemsRelatedByDeletedBy();
				$obj4->addIncomeItemRelatedByDeletedBy($obj1);
			}

			$omClass = IncomeCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getIncomeCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initIncomeItems();
				$obj5->addIncomeItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initIncomeItems();
				$obj6->addIncomeItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getReimbursement(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initIncomeItems();
				$obj7->addIncomeItem($obj1);
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
					$temp_obj8->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initIncomeItems();
				$obj8->addIncomeItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getBudget(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addIncomeItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initIncomeItems();
				$obj9->addIncomeItem($obj1);
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
		return IncomeItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseIncomeItemPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseIncomeItemPeer', $values, $con);
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

		$criteria->remove(IncomeItemPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseIncomeItemPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseIncomeItemPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseIncomeItemPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseIncomeItemPeer', $values, $con);
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
			$comparison = $criteria->getComparison(IncomeItemPeer::ID);
			$selectCriteria->add(IncomeItemPeer::ID, $criteria->remove(IncomeItemPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseIncomeItemPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseIncomeItemPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(IncomeItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(IncomeItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof IncomeItem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(IncomeItemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(IncomeItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(IncomeItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(IncomeItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(IncomeItemPeer::DATABASE_NAME, IncomeItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = IncomeItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(IncomeItemPeer::DATABASE_NAME);

		$criteria->add(IncomeItemPeer::ID, $pk);


		$v = IncomeItemPeer::doSelect($criteria, $con);

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
			$criteria->add(IncomeItemPeer::ID, $pks, Criteria::IN);
			$objs = IncomeItemPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('IncomeItem', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseIncomeItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/IncomeItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.IncomeItemMapBuilder');
}

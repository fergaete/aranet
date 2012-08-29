<?php


abstract class BaseExpenseItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_expense_item';

	
	const CLASS_DEFAULT = 'lib.model.ExpenseItem';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_expense_item.ID';

	
	const EXPENSE_ITEM_NAME = 'aranet_expense_item.EXPENSE_ITEM_NAME';

	
	const EXPENSE_ITEM_COMMENTS = 'aranet_expense_item.EXPENSE_ITEM_COMMENTS';

	
	const EXPENSE_PURCHASE_DATE = 'aranet_expense_item.EXPENSE_PURCHASE_DATE';

	
	const EXPENSE_PURCHASE_BY = 'aranet_expense_item.EXPENSE_PURCHASE_BY';

	
	const EXPENSE_ITEM_CATEGORY_ID = 'aranet_expense_item.EXPENSE_ITEM_CATEGORY_ID';

	
	const EXPENSE_ITEM_PAYMENT_METHOD_ID = 'aranet_expense_item.EXPENSE_ITEM_PAYMENT_METHOD_ID';

	
	const EXPENSE_ITEM_PAYMENT_CHECK = 'aranet_expense_item.EXPENSE_ITEM_PAYMENT_CHECK';

	
	const EXPENSE_ITEM_REIMBURSEMENT_ID = 'aranet_expense_item.EXPENSE_ITEM_REIMBURSEMENT_ID';

	
	const EXPENSE_ITEM_PROJECT_ID = 'aranet_expense_item.EXPENSE_ITEM_PROJECT_ID';

	
	const EXPENSE_ITEM_BUDGET_ID = 'aranet_expense_item.EXPENSE_ITEM_BUDGET_ID';

	
	const EXPENSE_ITEM_AMOUNT = 'aranet_expense_item.EXPENSE_ITEM_AMOUNT';

	
	const EXPENSE_ITEM_BASE = 'aranet_expense_item.EXPENSE_ITEM_BASE';

	
	const EXPENSE_ITEM_TAX_RATE = 'aranet_expense_item.EXPENSE_ITEM_TAX_RATE';

	
	const EXPENSE_ITEM_IRPF = 'aranet_expense_item.EXPENSE_ITEM_IRPF';

	
	const EXPENSE_ITEM_INVOICE_NUMBER = 'aranet_expense_item.EXPENSE_ITEM_INVOICE_NUMBER';

	
	const EXPENSE_ITEM_VENDOR_ID = 'aranet_expense_item.EXPENSE_ITEM_VENDOR_ID';

	
	const EXPENSE_VALIDATE_DATE = 'aranet_expense_item.EXPENSE_VALIDATE_DATE';

	
	const EXPENSE_VALIDATE_BY = 'aranet_expense_item.EXPENSE_VALIDATE_BY';

	
	const CREATED_AT = 'aranet_expense_item.CREATED_AT';

	
	const CREATED_BY = 'aranet_expense_item.CREATED_BY';

	
	const UPDATED_AT = 'aranet_expense_item.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_expense_item.UPDATED_BY';

	
	const DELETED_AT = 'aranet_expense_item.DELETED_AT';

	
	const DELETED_BY = 'aranet_expense_item.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ExpenseItemName', 'ExpenseItemComments', 'ExpensePurchaseDate', 'ExpensePurchaseBy', 'ExpenseItemCategoryId', 'ExpenseItemPaymentMethodId', 'ExpenseItemPaymentCheck', 'ExpenseItemReimbursementId', 'ExpenseItemProjectId', 'ExpenseItemBudgetId', 'ExpenseItemAmount', 'ExpenseItemBase', 'ExpenseItemTaxRate', 'ExpenseItemIrpf', 'ExpenseItemInvoiceNumber', 'ExpenseItemVendorId', 'ExpenseValidateDate', 'ExpenseValidateBy', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (ExpenseItemPeer::ID, ExpenseItemPeer::EXPENSE_ITEM_NAME, ExpenseItemPeer::EXPENSE_ITEM_COMMENTS, ExpenseItemPeer::EXPENSE_PURCHASE_DATE, ExpenseItemPeer::EXPENSE_PURCHASE_BY, ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK, ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, ExpenseItemPeer::EXPENSE_ITEM_AMOUNT, ExpenseItemPeer::EXPENSE_ITEM_BASE, ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE, ExpenseItemPeer::EXPENSE_ITEM_IRPF, ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER, ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, ExpenseItemPeer::EXPENSE_VALIDATE_DATE, ExpenseItemPeer::EXPENSE_VALIDATE_BY, ExpenseItemPeer::CREATED_AT, ExpenseItemPeer::CREATED_BY, ExpenseItemPeer::UPDATED_AT, ExpenseItemPeer::UPDATED_BY, ExpenseItemPeer::DELETED_AT, ExpenseItemPeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'expense_item_name', 'expense_item_comments', 'expense_purchase_date', 'expense_purchase_by', 'expense_item_category_id', 'expense_item_payment_method_id', 'expense_item_payment_check', 'expense_item_reimbursement_id', 'expense_item_project_id', 'expense_item_budget_id', 'expense_item_amount', 'expense_item_base', 'expense_item_tax_rate', 'expense_item_irpf', 'expense_item_invoice_number', 'expense_item_vendor_id', 'expense_validate_date', 'expense_validate_by', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ExpenseItemName' => 1, 'ExpenseItemComments' => 2, 'ExpensePurchaseDate' => 3, 'ExpensePurchaseBy' => 4, 'ExpenseItemCategoryId' => 5, 'ExpenseItemPaymentMethodId' => 6, 'ExpenseItemPaymentCheck' => 7, 'ExpenseItemReimbursementId' => 8, 'ExpenseItemProjectId' => 9, 'ExpenseItemBudgetId' => 10, 'ExpenseItemAmount' => 11, 'ExpenseItemBase' => 12, 'ExpenseItemTaxRate' => 13, 'ExpenseItemIrpf' => 14, 'ExpenseItemInvoiceNumber' => 15, 'ExpenseItemVendorId' => 16, 'ExpenseValidateDate' => 17, 'ExpenseValidateBy' => 18, 'CreatedAt' => 19, 'CreatedBy' => 20, 'UpdatedAt' => 21, 'UpdatedBy' => 22, 'DeletedAt' => 23, 'DeletedBy' => 24, ),
		BasePeer::TYPE_COLNAME => array (ExpenseItemPeer::ID => 0, ExpenseItemPeer::EXPENSE_ITEM_NAME => 1, ExpenseItemPeer::EXPENSE_ITEM_COMMENTS => 2, ExpenseItemPeer::EXPENSE_PURCHASE_DATE => 3, ExpenseItemPeer::EXPENSE_PURCHASE_BY => 4, ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID => 5, ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID => 6, ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK => 7, ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID => 8, ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID => 9, ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID => 10, ExpenseItemPeer::EXPENSE_ITEM_AMOUNT => 11, ExpenseItemPeer::EXPENSE_ITEM_BASE => 12, ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE => 13, ExpenseItemPeer::EXPENSE_ITEM_IRPF => 14, ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER => 15, ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID => 16, ExpenseItemPeer::EXPENSE_VALIDATE_DATE => 17, ExpenseItemPeer::EXPENSE_VALIDATE_BY => 18, ExpenseItemPeer::CREATED_AT => 19, ExpenseItemPeer::CREATED_BY => 20, ExpenseItemPeer::UPDATED_AT => 21, ExpenseItemPeer::UPDATED_BY => 22, ExpenseItemPeer::DELETED_AT => 23, ExpenseItemPeer::DELETED_BY => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'expense_item_name' => 1, 'expense_item_comments' => 2, 'expense_purchase_date' => 3, 'expense_purchase_by' => 4, 'expense_item_category_id' => 5, 'expense_item_payment_method_id' => 6, 'expense_item_payment_check' => 7, 'expense_item_reimbursement_id' => 8, 'expense_item_project_id' => 9, 'expense_item_budget_id' => 10, 'expense_item_amount' => 11, 'expense_item_base' => 12, 'expense_item_tax_rate' => 13, 'expense_item_irpf' => 14, 'expense_item_invoice_number' => 15, 'expense_item_vendor_id' => 16, 'expense_validate_date' => 17, 'expense_validate_by' => 18, 'created_at' => 19, 'created_by' => 20, 'updated_at' => 21, 'updated_by' => 22, 'deleted_at' => 23, 'deleted_by' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ExpenseItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ExpenseItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ExpenseItemPeer::getTableMap();
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
		return str_replace(ExpenseItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ExpenseItemPeer::ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_NAME);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_COMMENTS);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_PURCHASE_BY);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_CHECK);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_AMOUNT);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_BASE);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_TAX_RATE);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_IRPF);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_INVOICE_NUMBER);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_VALIDATE_DATE);

		$criteria->addSelectColumn(ExpenseItemPeer::EXPENSE_VALIDATE_BY);

		$criteria->addSelectColumn(ExpenseItemPeer::CREATED_AT);

		$criteria->addSelectColumn(ExpenseItemPeer::CREATED_BY);

		$criteria->addSelectColumn(ExpenseItemPeer::UPDATED_AT);

		$criteria->addSelectColumn(ExpenseItemPeer::UPDATED_BY);

		$criteria->addSelectColumn(ExpenseItemPeer::DELETED_AT);

		$criteria->addSelectColumn(ExpenseItemPeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_expense_item.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_expense_item.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
		$objects = ExpenseItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ExpenseItemPeer::populateObjects(ExpenseItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseExpenseItemPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseExpenseItemPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseExpenseItemPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseExpenseItemPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ExpenseItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ExpenseItemPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByExpensePurchaseBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByExpenseValidateBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinExpenseCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByExpensePurchaseBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VendorPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByExpenseValidateBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addExpenseItemRelatedByExpenseValidateBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpenseValidateBy();
				$obj2->addExpenseItemRelatedByExpenseValidateBy($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItemRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItemsRelatedByCreatedBy();
				$obj2->addExpenseItemRelatedByCreatedBy($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItemRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItemsRelatedByUpdatedBy();
				$obj2->addExpenseItemRelatedByUpdatedBy($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItemRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItemsRelatedByDeletedBy();
				$obj2->addExpenseItemRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinExpenseCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ExpenseCategoryPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ExpenseCategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentMethodPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ReimbursementPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
										$temp_obj2->addExpenseItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();


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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}


					
			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVendor(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByExpenseValidateBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByExpenseValidateBy();
				$obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByCreatedBy();
				$obj6->addExpenseItemRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByUpdatedBy();
				$obj7->addExpenseItemRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItemRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItemsRelatedByDeletedBy();
				$obj8->addExpenseItemRelatedByDeletedBy($obj1);
			}


					
			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}


					
			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}


					
			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11 = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getReimbursement(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12 = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getBudget(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj12->initExpenseItems();
				$obj12->addExpenseItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByExpensePurchaseBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByExpenseValidateBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptExpenseCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ExpenseItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$rs = ExpenseItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByExpensePurchaseBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
					$temp_obj2->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
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
					$temp_obj5->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItems();
				$obj5->addExpenseItem($obj1);
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
					$temp_obj6->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItems();
				$obj6->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getBudget(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItemsRelatedByExpenseValidateBy();
				$obj4->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByCreatedBy();
				$obj5->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByUpdatedBy();
				$obj6->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByDeletedBy();
				$obj7->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItems();
				$obj8->addExpenseItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getReimbursement(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItemsRelatedByExpenseValidateBy();
				$obj4->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByCreatedBy();
				$obj5->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByUpdatedBy();
				$obj6->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByDeletedBy();
				$obj7->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItems();
				$obj8->addExpenseItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getReimbursement(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByExpenseValidateBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
					$temp_obj2->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
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
					$temp_obj5->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItems();
				$obj5->addExpenseItem($obj1);
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
					$temp_obj6->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItems();
				$obj6->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getBudget(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
					$temp_obj2->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
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
					$temp_obj5->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItems();
				$obj5->addExpenseItem($obj1);
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
					$temp_obj6->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItems();
				$obj6->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getBudget(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
					$temp_obj2->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
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
					$temp_obj5->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItems();
				$obj5->addExpenseItem($obj1);
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
					$temp_obj6->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItems();
				$obj6->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getBudget(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + VendorPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
					$temp_obj2->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItems();
				$obj2->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getVendor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
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
					$temp_obj5->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItems();
				$obj5->addExpenseItem($obj1);
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
					$temp_obj6->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItems();
				$obj6->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getBudget(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptExpenseCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + sfGuardUserPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVendor(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByExpenseValidateBy();
				$obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByCreatedBy();
				$obj6->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByUpdatedBy();
				$obj7->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItemsRelatedByDeletedBy();
				$obj8->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getReimbursement(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ExpenseCategoryPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + ReimbursementPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVendor(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByExpenseValidateBy();
				$obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByCreatedBy();
				$obj6->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByUpdatedBy();
				$obj7->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItemsRelatedByDeletedBy();
				$obj8->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getReimbursement(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + PaymentMethodPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVendor(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByExpenseValidateBy();
				$obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByCreatedBy();
				$obj6->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByUpdatedBy();
				$obj7->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItemsRelatedByDeletedBy();
				$obj8->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
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

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + VendorPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + ReimbursementPeer::NUM_COLUMNS;

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ExpenseItemPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByExpensePurchaseBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initExpenseItemsRelatedByExpensePurchaseBy();
				$obj2->addExpenseItemRelatedByExpensePurchaseBy($obj1);
			}

			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getProject(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItems();
				$obj3->addExpenseItem($obj1);
			}

			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getVendor(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItems();
				$obj4->addExpenseItem($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByExpenseValidateBy();
				$obj5->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByCreatedBy();
				$obj6->addExpenseItemRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItemRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItemsRelatedByUpdatedBy();
				$obj7->addExpenseItemRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addExpenseItemRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItemsRelatedByDeletedBy();
				$obj8->addExpenseItemRelatedByDeletedBy($obj1);
			}

			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}

			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getReimbursement(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
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
		return ExpenseItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExpenseItemPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseExpenseItemPeer', $values, $con);
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

		$criteria->remove(ExpenseItemPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseExpenseItemPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseExpenseItemPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseExpenseItemPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseExpenseItemPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ExpenseItemPeer::ID);
			$selectCriteria->add(ExpenseItemPeer::ID, $criteria->remove(ExpenseItemPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseExpenseItemPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseExpenseItemPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ExpenseItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ExpenseItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ExpenseItem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ExpenseItemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ExpenseItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ExpenseItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ExpenseItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ExpenseItemPeer::DATABASE_NAME, ExpenseItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ExpenseItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ExpenseItemPeer::DATABASE_NAME);

		$criteria->add(ExpenseItemPeer::ID, $pk);


		$v = ExpenseItemPeer::doSelect($criteria, $con);

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
			$criteria->add(ExpenseItemPeer::ID, $pks, Criteria::IN);
			$objs = ExpenseItemPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('ExpenseItem', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseExpenseItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ExpenseItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ExpenseItemMapBuilder');
}

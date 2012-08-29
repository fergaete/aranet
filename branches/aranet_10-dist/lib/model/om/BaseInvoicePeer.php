<?php


abstract class BaseInvoicePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_invoice';

	
	const CLASS_DEFAULT = 'lib.model.Invoice';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_invoice.ID';

	
	const INVOICE_PREFIX = 'aranet_invoice.INVOICE_PREFIX';

	
	const INVOICE_NUMBER = 'aranet_invoice.INVOICE_NUMBER';

	
	const INVOICE_DATE = 'aranet_invoice.INVOICE_DATE';

	
	const INVOICE_CLIENT_ID = 'aranet_invoice.INVOICE_CLIENT_ID';

	
	const INVOICE_PROJECT_ID = 'aranet_invoice.INVOICE_PROJECT_ID';

	
	const INVOICE_BUDGET_ID = 'aranet_invoice.INVOICE_BUDGET_ID';

	
	const INVOICE_CATEGORY_ID = 'aranet_invoice.INVOICE_CATEGORY_ID';

	
	const INVOICE_KIND_OF_INVOICE_ID = 'aranet_invoice.INVOICE_KIND_OF_INVOICE_ID';

	
	const INVOICE_TITLE = 'aranet_invoice.INVOICE_TITLE';

	
	const INVOICE_COMMENTS = 'aranet_invoice.INVOICE_COMMENTS';

	
	const INVOICE_PRINT_COMMENTS = 'aranet_invoice.INVOICE_PRINT_COMMENTS';

	
	const INVOICE_TAX_RATE = 'aranet_invoice.INVOICE_TAX_RATE';

	
	const INVOICE_FREIGHT_CHARGE = 'aranet_invoice.INVOICE_FREIGHT_CHARGE';

	
	const INVOICE_PAYMENT_CONDITION_ID = 'aranet_invoice.INVOICE_PAYMENT_CONDITION_ID';

	
	const INVOICE_PAYMENT_METHOD_ID = 'aranet_invoice.INVOICE_PAYMENT_METHOD_ID';

	
	const INVOICE_PAYMENT_CHECK = 'aranet_invoice.INVOICE_PAYMENT_CHECK';

	
	const INVOICE_PAYMENT_DATE = 'aranet_invoice.INVOICE_PAYMENT_DATE';

	
	const INVOICE_PAYMENT_STATUS_ID = 'aranet_invoice.INVOICE_PAYMENT_STATUS_ID';

	
	const INVOICE_LATE_FEE_PERCENT = 'aranet_invoice.INVOICE_LATE_FEE_PERCENT';

	
	const INVOICE_TOTAL_AMOUNT = 'aranet_invoice.INVOICE_TOTAL_AMOUNT';

	
	const CREATED_AT = 'aranet_invoice.CREATED_AT';

	
	const CREATED_BY = 'aranet_invoice.CREATED_BY';

	
	const UPDATED_AT = 'aranet_invoice.UPDATED_AT';

	
	const UPDATED_BY = 'aranet_invoice.UPDATED_BY';

	
	const DELETED_AT = 'aranet_invoice.DELETED_AT';

	
	const DELETED_BY = 'aranet_invoice.DELETED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'InvoicePrefix', 'InvoiceNumber', 'InvoiceDate', 'InvoiceClientId', 'InvoiceProjectId', 'InvoiceBudgetId', 'InvoiceCategoryId', 'InvoiceKindOfInvoiceId', 'InvoiceTitle', 'InvoiceComments', 'InvoicePrintComments', 'InvoiceTaxRate', 'InvoiceFreightCharge', 'InvoicePaymentConditionId', 'InvoicePaymentMethodId', 'InvoicePaymentCheck', 'InvoicePaymentDate', 'InvoicePaymentStatusId', 'InvoiceLateFeePercent', 'InvoiceTotalAmount', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', ),
		BasePeer::TYPE_COLNAME => array (InvoicePeer::ID, InvoicePeer::INVOICE_PREFIX, InvoicePeer::INVOICE_NUMBER, InvoicePeer::INVOICE_DATE, InvoicePeer::INVOICE_CLIENT_ID, InvoicePeer::INVOICE_PROJECT_ID, InvoicePeer::INVOICE_BUDGET_ID, InvoicePeer::INVOICE_CATEGORY_ID, InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, InvoicePeer::INVOICE_TITLE, InvoicePeer::INVOICE_COMMENTS, InvoicePeer::INVOICE_PRINT_COMMENTS, InvoicePeer::INVOICE_TAX_RATE, InvoicePeer::INVOICE_FREIGHT_CHARGE, InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, InvoicePeer::INVOICE_PAYMENT_METHOD_ID, InvoicePeer::INVOICE_PAYMENT_CHECK, InvoicePeer::INVOICE_PAYMENT_DATE, InvoicePeer::INVOICE_PAYMENT_STATUS_ID, InvoicePeer::INVOICE_LATE_FEE_PERCENT, InvoicePeer::INVOICE_TOTAL_AMOUNT, InvoicePeer::CREATED_AT, InvoicePeer::CREATED_BY, InvoicePeer::UPDATED_AT, InvoicePeer::UPDATED_BY, InvoicePeer::DELETED_AT, InvoicePeer::DELETED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'invoice_prefix', 'invoice_number', 'invoice_date', 'invoice_client_id', 'invoice_project_id', 'invoice_budget_id', 'invoice_category_id', 'invoice_kind_of_invoice_id', 'invoice_title', 'invoice_comments', 'invoice_print_comments', 'invoice_tax_rate', 'invoice_freight_charge', 'invoice_payment_condition_id', 'invoice_payment_method_id', 'invoice_payment_check', 'invoice_payment_date', 'invoice_payment_status_id', 'invoice_late_fee_percent', 'invoice_total_amount', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'InvoicePrefix' => 1, 'InvoiceNumber' => 2, 'InvoiceDate' => 3, 'InvoiceClientId' => 4, 'InvoiceProjectId' => 5, 'InvoiceBudgetId' => 6, 'InvoiceCategoryId' => 7, 'InvoiceKindOfInvoiceId' => 8, 'InvoiceTitle' => 9, 'InvoiceComments' => 10, 'InvoicePrintComments' => 11, 'InvoiceTaxRate' => 12, 'InvoiceFreightCharge' => 13, 'InvoicePaymentConditionId' => 14, 'InvoicePaymentMethodId' => 15, 'InvoicePaymentCheck' => 16, 'InvoicePaymentDate' => 17, 'InvoicePaymentStatusId' => 18, 'InvoiceLateFeePercent' => 19, 'InvoiceTotalAmount' => 20, 'CreatedAt' => 21, 'CreatedBy' => 22, 'UpdatedAt' => 23, 'UpdatedBy' => 24, 'DeletedAt' => 25, 'DeletedBy' => 26, ),
		BasePeer::TYPE_COLNAME => array (InvoicePeer::ID => 0, InvoicePeer::INVOICE_PREFIX => 1, InvoicePeer::INVOICE_NUMBER => 2, InvoicePeer::INVOICE_DATE => 3, InvoicePeer::INVOICE_CLIENT_ID => 4, InvoicePeer::INVOICE_PROJECT_ID => 5, InvoicePeer::INVOICE_BUDGET_ID => 6, InvoicePeer::INVOICE_CATEGORY_ID => 7, InvoicePeer::INVOICE_KIND_OF_INVOICE_ID => 8, InvoicePeer::INVOICE_TITLE => 9, InvoicePeer::INVOICE_COMMENTS => 10, InvoicePeer::INVOICE_PRINT_COMMENTS => 11, InvoicePeer::INVOICE_TAX_RATE => 12, InvoicePeer::INVOICE_FREIGHT_CHARGE => 13, InvoicePeer::INVOICE_PAYMENT_CONDITION_ID => 14, InvoicePeer::INVOICE_PAYMENT_METHOD_ID => 15, InvoicePeer::INVOICE_PAYMENT_CHECK => 16, InvoicePeer::INVOICE_PAYMENT_DATE => 17, InvoicePeer::INVOICE_PAYMENT_STATUS_ID => 18, InvoicePeer::INVOICE_LATE_FEE_PERCENT => 19, InvoicePeer::INVOICE_TOTAL_AMOUNT => 20, InvoicePeer::CREATED_AT => 21, InvoicePeer::CREATED_BY => 22, InvoicePeer::UPDATED_AT => 23, InvoicePeer::UPDATED_BY => 24, InvoicePeer::DELETED_AT => 25, InvoicePeer::DELETED_BY => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'invoice_prefix' => 1, 'invoice_number' => 2, 'invoice_date' => 3, 'invoice_client_id' => 4, 'invoice_project_id' => 5, 'invoice_budget_id' => 6, 'invoice_category_id' => 7, 'invoice_kind_of_invoice_id' => 8, 'invoice_title' => 9, 'invoice_comments' => 10, 'invoice_print_comments' => 11, 'invoice_tax_rate' => 12, 'invoice_freight_charge' => 13, 'invoice_payment_condition_id' => 14, 'invoice_payment_method_id' => 15, 'invoice_payment_check' => 16, 'invoice_payment_date' => 17, 'invoice_payment_status_id' => 18, 'invoice_late_fee_percent' => 19, 'invoice_total_amount' => 20, 'created_at' => 21, 'created_by' => 22, 'updated_at' => 23, 'updated_by' => 24, 'deleted_at' => 25, 'deleted_by' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InvoiceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InvoiceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InvoicePeer::getTableMap();
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
		return str_replace(InvoicePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InvoicePeer::ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PREFIX);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_NUMBER);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_DATE);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_CLIENT_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PROJECT_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_BUDGET_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_CATEGORY_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_TITLE);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_COMMENTS);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PRINT_COMMENTS);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_TAX_RATE);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_FREIGHT_CHARGE);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_METHOD_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_CHECK);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_DATE);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_PAYMENT_STATUS_ID);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_LATE_FEE_PERCENT);

		$criteria->addSelectColumn(InvoicePeer::INVOICE_TOTAL_AMOUNT);

		$criteria->addSelectColumn(InvoicePeer::CREATED_AT);

		$criteria->addSelectColumn(InvoicePeer::CREATED_BY);

		$criteria->addSelectColumn(InvoicePeer::UPDATED_AT);

		$criteria->addSelectColumn(InvoicePeer::UPDATED_BY);

		$criteria->addSelectColumn(InvoicePeer::DELETED_AT);

		$criteria->addSelectColumn(InvoicePeer::DELETED_BY);

	}

	const COUNT = 'COUNT(aranet_invoice.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_invoice.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
		$objects = InvoicePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InvoicePeer::populateObjects(InvoicePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseInvoicePeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseInvoicePeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseInvoicePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseInvoicePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InvoicePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InvoicePeer::getOMClass();
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinKindOfInvoice(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPaymentStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ClientPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ProjectPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InvoiceCategoryPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinKindOfInvoice(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		KindOfInvoicePeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = KindOfInvoicePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentConditionPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentMethodPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPaymentStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaymentStatusPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PaymentStatusPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInvoice($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoiceRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoicesRelatedByCreatedBy();
				$obj2->addInvoiceRelatedByCreatedBy($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoiceRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoicesRelatedByUpdatedBy();
				$obj2->addInvoiceRelatedByUpdatedBy($obj1); 			}
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

		InvoicePeer::addSelectColumns($c);
		$startcol = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
										$temp_obj2->addInvoiceRelatedByDeletedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoicesRelatedByDeletedBy();
				$obj2->addInvoiceRelatedByDeletedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();


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
					$temp_obj2->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}


					
			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}


					
			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}


					
			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}


					
			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}


					
			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoice($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoices();
				$obj9->addInvoice($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByCreatedBy();
				$obj10->addInvoiceRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11 = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByUpdatedBy();
				$obj11->addInvoiceRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12 = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
					$newObject = false;
					$temp_obj12->addInvoiceRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj12->initInvoicesRelatedByDeletedBy();
				$obj12->addInvoiceRelatedByDeletedBy($obj1);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptKindOfInvoice(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPaymentStatus(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(InvoicePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoicePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$criteria->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$rs = InvoicePeer::doSelectRS($criteria, $con);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ProjectPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudget(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
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
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
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
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudget(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
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
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
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
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
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
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
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
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
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
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptKindOfInvoice(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
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
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentStatusPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPaymentStatus(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(InvoicePeer::DELETED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoiceRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoicesRelatedByCreatedBy();
				$obj9->addInvoiceRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10  = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addInvoiceRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj10->initInvoicesRelatedByUpdatedBy();
				$obj10->addInvoiceRelatedByUpdatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11  = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addInvoiceRelatedByDeletedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj11->initInvoicesRelatedByDeletedBy();
				$obj11->addInvoiceRelatedByDeletedBy($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentStatusPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoices();
				$obj9->addInvoice($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentStatusPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoices();
				$obj9->addInvoice($obj1);
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

		InvoicePeer::addSelectColumns($c);
		$startcol2 = (InvoicePeer::NUM_COLUMNS - InvoicePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ClientPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ClientPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + BudgetPeer::NUM_COLUMNS;

		InvoiceCategoryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + InvoiceCategoryPeer::NUM_COLUMNS;

		KindOfInvoicePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + KindOfInvoicePeer::NUM_COLUMNS;

		PaymentConditionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + PaymentConditionPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		PaymentStatusPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + PaymentStatusPeer::NUM_COLUMNS;

		$c->addJoin(InvoicePeer::INVOICE_CLIENT_ID, ClientPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PROJECT_ID, ProjectPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_CATEGORY_ID, InvoiceCategoryPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, KindOfInvoicePeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, PaymentConditionPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_METHOD_ID, PaymentMethodPeer::ID);

		$c->addJoin(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, PaymentStatusPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoicePeer::getOMClass();

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
					$temp_obj2->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoices();
				$obj2->addInvoice($obj1);
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
					$temp_obj3->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoices();
				$obj3->addInvoice($obj1);
			}

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getBudget(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initInvoices();
				$obj4->addInvoice($obj1);
			}

			$omClass = InvoiceCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getInvoiceCategory(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initInvoices();
				$obj5->addInvoice($obj1);
			}

			$omClass = KindOfInvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getKindOfInvoice(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initInvoices();
				$obj6->addInvoice($obj1);
			}

			$omClass = PaymentConditionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getPaymentCondition(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initInvoices();
				$obj7->addInvoice($obj1);
			}

			$omClass = PaymentMethodPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8  = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getPaymentMethod(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj8->initInvoices();
				$obj8->addInvoice($obj1);
			}

			$omClass = PaymentStatusPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9  = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getPaymentStatus(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addInvoice($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj9->initInvoices();
				$obj9->addInvoice($obj1);
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
		return InvoicePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoicePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseInvoicePeer', $values, $con);
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

		$criteria->remove(InvoicePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseInvoicePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseInvoicePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoicePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseInvoicePeer', $values, $con);
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
			$comparison = $criteria->getComparison(InvoicePeer::ID);
			$selectCriteria->add(InvoicePeer::ID, $criteria->remove(InvoicePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseInvoicePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseInvoicePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(InvoicePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InvoicePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Invoice) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InvoicePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Invoice $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InvoicePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InvoicePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InvoicePeer::DATABASE_NAME, InvoicePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InvoicePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InvoicePeer::DATABASE_NAME);

		$criteria->add(InvoicePeer::ID, $pk);


		$v = InvoicePeer::doSelect($criteria, $con);

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
			$criteria->add(InvoicePeer::ID, $pks, Criteria::IN);
			$objs = InvoicePeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('Invoice', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseInvoicePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InvoiceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InvoiceMapBuilder');
}

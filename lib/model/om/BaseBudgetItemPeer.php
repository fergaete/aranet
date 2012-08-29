<?php


abstract class BaseBudgetItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_budget_item';

	
	const CLASS_DEFAULT = 'lib.model.BudgetItem';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_budget_item.ID';

	
	const ITEM_ORDER = 'aranet_budget_item.ITEM_ORDER';

	
	const ITEM_TYPE_ID = 'aranet_budget_item.ITEM_TYPE_ID';

	
	const ITEM_IS_OPTIONAL = 'aranet_budget_item.ITEM_IS_OPTIONAL';

	
	const ITEM_DESCRIPTION = 'aranet_budget_item.ITEM_DESCRIPTION';

	
	const ITEM_QUANTITY = 'aranet_budget_item.ITEM_QUANTITY';

	
	const MILESTONE_TASK_ID = 'aranet_budget_item.MILESTONE_TASK_ID';

	
	const ITEM_TASK_ID = 'aranet_budget_item.ITEM_TASK_ID';

	
	const ITEM_COST = 'aranet_budget_item.ITEM_COST';

	
	const ITEM_MARGIN = 'aranet_budget_item.ITEM_MARGIN';

	
	const ITEM_RETAIL_PRICE = 'aranet_budget_item.ITEM_RETAIL_PRICE';

	
	const ITEM_TAX_RATE = 'aranet_budget_item.ITEM_TAX_RATE';

	
	const ITEM_BUDGET_ID = 'aranet_budget_item.ITEM_BUDGET_ID';

	
	const ITEM_BUDGET_TYPE_ID = 'aranet_budget_item.ITEM_BUDGET_TYPE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ItemOrder', 'ItemTypeId', 'ItemIsOptional', 'ItemDescription', 'ItemQuantity', 'MilestoneTaskId', 'ItemTaskId', 'ItemCost', 'ItemMargin', 'ItemRetailPrice', 'ItemTaxRate', 'ItemBudgetId', 'ItemBudgetTypeId', ),
		BasePeer::TYPE_COLNAME => array (BudgetItemPeer::ID, BudgetItemPeer::ITEM_ORDER, BudgetItemPeer::ITEM_TYPE_ID, BudgetItemPeer::ITEM_IS_OPTIONAL, BudgetItemPeer::ITEM_DESCRIPTION, BudgetItemPeer::ITEM_QUANTITY, BudgetItemPeer::MILESTONE_TASK_ID, BudgetItemPeer::ITEM_TASK_ID, BudgetItemPeer::ITEM_COST, BudgetItemPeer::ITEM_MARGIN, BudgetItemPeer::ITEM_RETAIL_PRICE, BudgetItemPeer::ITEM_TAX_RATE, BudgetItemPeer::ITEM_BUDGET_ID, BudgetItemPeer::ITEM_BUDGET_TYPE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'item_order', 'item_type_id', 'item_is_optional', 'item_description', 'item_quantity', 'milestone_task_id', 'item_task_id', 'item_cost', 'item_margin', 'item_retail_price', 'item_tax_rate', 'item_budget_id', 'item_budget_type_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ItemOrder' => 1, 'ItemTypeId' => 2, 'ItemIsOptional' => 3, 'ItemDescription' => 4, 'ItemQuantity' => 5, 'MilestoneTaskId' => 6, 'ItemTaskId' => 7, 'ItemCost' => 8, 'ItemMargin' => 9, 'ItemRetailPrice' => 10, 'ItemTaxRate' => 11, 'ItemBudgetId' => 12, 'ItemBudgetTypeId' => 13, ),
		BasePeer::TYPE_COLNAME => array (BudgetItemPeer::ID => 0, BudgetItemPeer::ITEM_ORDER => 1, BudgetItemPeer::ITEM_TYPE_ID => 2, BudgetItemPeer::ITEM_IS_OPTIONAL => 3, BudgetItemPeer::ITEM_DESCRIPTION => 4, BudgetItemPeer::ITEM_QUANTITY => 5, BudgetItemPeer::MILESTONE_TASK_ID => 6, BudgetItemPeer::ITEM_TASK_ID => 7, BudgetItemPeer::ITEM_COST => 8, BudgetItemPeer::ITEM_MARGIN => 9, BudgetItemPeer::ITEM_RETAIL_PRICE => 10, BudgetItemPeer::ITEM_TAX_RATE => 11, BudgetItemPeer::ITEM_BUDGET_ID => 12, BudgetItemPeer::ITEM_BUDGET_TYPE_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'item_order' => 1, 'item_type_id' => 2, 'item_is_optional' => 3, 'item_description' => 4, 'item_quantity' => 5, 'milestone_task_id' => 6, 'item_task_id' => 7, 'item_cost' => 8, 'item_margin' => 9, 'item_retail_price' => 10, 'item_tax_rate' => 11, 'item_budget_id' => 12, 'item_budget_type_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BudgetItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BudgetItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BudgetItemPeer::getTableMap();
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
		return str_replace(BudgetItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BudgetItemPeer::ID);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_ORDER);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_TYPE_ID);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_IS_OPTIONAL);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_DESCRIPTION);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_QUANTITY);

		$criteria->addSelectColumn(BudgetItemPeer::MILESTONE_TASK_ID);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_TASK_ID);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_COST);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_MARGIN);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_RETAIL_PRICE);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_TAX_RATE);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_BUDGET_ID);

		$criteria->addSelectColumn(BudgetItemPeer::ITEM_BUDGET_TYPE_ID);

	}

	const COUNT = 'COUNT(aranet_budget_item.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_budget_item.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
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
		$objects = BudgetItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BudgetItemPeer::populateObjects(BudgetItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseBudgetItemPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseBudgetItemPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseBudgetItemPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseBudgetItemPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BudgetItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BudgetItemPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTypeOfInvoiceItem(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTypeOfHour(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTypeOfInvoiceItem(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetItemPeer::addSelectColumns($c);
		$startcol = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TypeOfInvoiceItemPeer::addSelectColumns($c);

		$c->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TypeOfInvoiceItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTypeOfInvoiceItem(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBudgetItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1); 			}
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

		BudgetItemPeer::addSelectColumns($c);
		$startcol = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		BudgetPeer::addSelectColumns($c);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

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
										$temp_obj2->addBudgetItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTypeOfHour(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetItemPeer::addSelectColumns($c);
		$startcol = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TypeOfHourPeer::addSelectColumns($c);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TypeOfHourPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addBudgetItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
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

		BudgetItemPeer::addSelectColumns($c);
		$startcol2 = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TypeOfInvoiceItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TypeOfInvoiceItemPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TypeOfInvoiceItemPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTypeOfInvoiceItem(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudgetItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getBudget(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetItems();
				$obj3->addBudgetItem($obj1);
			}


					
			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addBudgetItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initBudgetItems();
				$obj4->addBudgetItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTypeOfInvoiceItem(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTypeOfHour(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BudgetItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$criteria->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$rs = BudgetItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTypeOfInvoiceItem(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetItemPeer::addSelectColumns($c);
		$startcol2 = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		BudgetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + BudgetPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getBudget(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetItems();
				$obj3->addBudgetItem($obj1);
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

		BudgetItemPeer::addSelectColumns($c);
		$startcol2 = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TypeOfInvoiceItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TypeOfInvoiceItemPeer::NUM_COLUMNS;

		TypeOfHourPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TypeOfHourPeer::NUM_COLUMNS;

		$c->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_TYPE_ID, TypeOfHourPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TypeOfInvoiceItemPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTypeOfInvoiceItem(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1);
			}

			$omClass = TypeOfHourPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTypeOfHour(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetItems();
				$obj3->addBudgetItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTypeOfHour(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		BudgetItemPeer::addSelectColumns($c);
		$startcol2 = (BudgetItemPeer::NUM_COLUMNS - BudgetItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TypeOfInvoiceItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TypeOfInvoiceItemPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + BudgetPeer::NUM_COLUMNS;

		$c->addJoin(BudgetItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$c->addJoin(BudgetItemPeer::ITEM_BUDGET_ID, BudgetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = BudgetItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TypeOfInvoiceItemPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTypeOfInvoiceItem(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initBudgetItems();
				$obj2->addBudgetItem($obj1);
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
					$temp_obj3->addBudgetItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initBudgetItems();
				$obj3->addBudgetItem($obj1);
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
		return BudgetItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetItemPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseBudgetItemPeer', $values, $con);
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

		$criteria->remove(BudgetItemPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseBudgetItemPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseBudgetItemPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseBudgetItemPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseBudgetItemPeer', $values, $con);
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
			$comparison = $criteria->getComparison(BudgetItemPeer::ID);
			$selectCriteria->add(BudgetItemPeer::ID, $criteria->remove(BudgetItemPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseBudgetItemPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseBudgetItemPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(BudgetItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BudgetItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof BudgetItem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BudgetItemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(BudgetItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BudgetItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BudgetItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BudgetItemPeer::DATABASE_NAME, BudgetItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BudgetItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BudgetItemPeer::DATABASE_NAME);

		$criteria->add(BudgetItemPeer::ID, $pk);


		$v = BudgetItemPeer::doSelect($criteria, $con);

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
			$criteria->add(BudgetItemPeer::ID, $pks, Criteria::IN);
			$objs = BudgetItemPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('BudgetItem', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseBudgetItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BudgetItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BudgetItemMapBuilder');
}

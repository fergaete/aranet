<?php


abstract class BaseInvoiceItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'aranet_invoice_item';

	
	const CLASS_DEFAULT = 'lib.model.InvoiceItem';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'aranet_invoice_item.ID';

	
	const ITEM_TYPE_ID = 'aranet_invoice_item.ITEM_TYPE_ID';

	
	const ITEM_DESCRIPTION = 'aranet_invoice_item.ITEM_DESCRIPTION';

	
	const ITEM_QUANTITY = 'aranet_invoice_item.ITEM_QUANTITY';

	
	const ITEM_COST = 'aranet_invoice_item.ITEM_COST';

	
	const ITEM_TAX_RATE = 'aranet_invoice_item.ITEM_TAX_RATE';

	
	const ITEM_INVOICE_ID = 'aranet_invoice_item.ITEM_INVOICE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ItemTypeId', 'ItemDescription', 'ItemQuantity', 'ItemCost', 'ItemTaxRate', 'ItemInvoiceId', ),
		BasePeer::TYPE_COLNAME => array (InvoiceItemPeer::ID, InvoiceItemPeer::ITEM_TYPE_ID, InvoiceItemPeer::ITEM_DESCRIPTION, InvoiceItemPeer::ITEM_QUANTITY, InvoiceItemPeer::ITEM_COST, InvoiceItemPeer::ITEM_TAX_RATE, InvoiceItemPeer::ITEM_INVOICE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'item_type_id', 'item_description', 'item_quantity', 'item_cost', 'item_tax_rate', 'item_invoice_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ItemTypeId' => 1, 'ItemDescription' => 2, 'ItemQuantity' => 3, 'ItemCost' => 4, 'ItemTaxRate' => 5, 'ItemInvoiceId' => 6, ),
		BasePeer::TYPE_COLNAME => array (InvoiceItemPeer::ID => 0, InvoiceItemPeer::ITEM_TYPE_ID => 1, InvoiceItemPeer::ITEM_DESCRIPTION => 2, InvoiceItemPeer::ITEM_QUANTITY => 3, InvoiceItemPeer::ITEM_COST => 4, InvoiceItemPeer::ITEM_TAX_RATE => 5, InvoiceItemPeer::ITEM_INVOICE_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'item_type_id' => 1, 'item_description' => 2, 'item_quantity' => 3, 'item_cost' => 4, 'item_tax_rate' => 5, 'item_invoice_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InvoiceItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InvoiceItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InvoiceItemPeer::getTableMap();
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
		return str_replace(InvoiceItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InvoiceItemPeer::ID);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_TYPE_ID);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_DESCRIPTION);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_QUANTITY);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_COST);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_TAX_RATE);

		$criteria->addSelectColumn(InvoiceItemPeer::ITEM_INVOICE_ID);

	}

	const COUNT = 'COUNT(aranet_invoice_item.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT aranet_invoice_item.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
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
		$objects = InvoiceItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InvoiceItemPeer::populateObjects(InvoiceItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

        foreach (sfMixer::getCallables('BaseInvoiceItemPeer:doSelectRS:doSelectRS') as $callable)
        {
          call_user_func($callable, 'BaseInvoiceItemPeer', $criteria, $con);
        }

    

    foreach (sfMixer::getCallables('BaseInvoiceItemPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseInvoiceItemPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InvoiceItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InvoiceItemPeer::getOMClass();
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
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinInvoice(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
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

		InvoiceItemPeer::addSelectColumns($c);
		$startcol = (InvoiceItemPeer::NUM_COLUMNS - InvoiceItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TypeOfInvoiceItemPeer::addSelectColumns($c);

		$c->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoiceItemPeer::getOMClass();

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
										$temp_obj2->addInvoiceItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoiceItems();
				$obj2->addInvoiceItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinInvoice(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoiceItemPeer::addSelectColumns($c);
		$startcol = (InvoiceItemPeer::NUM_COLUMNS - InvoiceItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InvoicePeer::addSelectColumns($c);

		$c->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoiceItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InvoicePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInvoice(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInvoiceItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInvoiceItems();
				$obj2->addInvoiceItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$criteria->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
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

		InvoiceItemPeer::addSelectColumns($c);
		$startcol2 = (InvoiceItemPeer::NUM_COLUMNS - InvoiceItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TypeOfInvoiceItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TypeOfInvoiceItemPeer::NUM_COLUMNS;

		InvoicePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + InvoicePeer::NUM_COLUMNS;

		$c->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$c->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoiceItemPeer::getOMClass();


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
					$temp_obj2->addInvoiceItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoiceItems();
				$obj2->addInvoiceItem($obj1);
			}


					
			$omClass = InvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getInvoice(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInvoiceItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInvoiceItems();
				$obj3->addInvoiceItem($obj1);
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
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptInvoice(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InvoiceItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);

		$rs = InvoiceItemPeer::doSelectRS($criteria, $con);
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

		InvoiceItemPeer::addSelectColumns($c);
		$startcol2 = (InvoiceItemPeer::NUM_COLUMNS - InvoiceItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InvoicePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InvoicePeer::NUM_COLUMNS;

		$c->addJoin(InvoiceItemPeer::ITEM_INVOICE_ID, InvoicePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoiceItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InvoicePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInvoice(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInvoiceItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoiceItems();
				$obj2->addInvoiceItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptInvoice(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InvoiceItemPeer::addSelectColumns($c);
		$startcol2 = (InvoiceItemPeer::NUM_COLUMNS - InvoiceItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TypeOfInvoiceItemPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TypeOfInvoiceItemPeer::NUM_COLUMNS;

		$c->addJoin(InvoiceItemPeer::ITEM_TYPE_ID, TypeOfInvoiceItemPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InvoiceItemPeer::getOMClass();

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
					$temp_obj2->addInvoiceItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInvoiceItems();
				$obj2->addInvoiceItem($obj1);
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
		return InvoiceItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoiceItemPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseInvoiceItemPeer', $values, $con);
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

		$criteria->remove(InvoiceItemPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseInvoiceItemPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseInvoiceItemPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseInvoiceItemPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseInvoiceItemPeer', $values, $con);
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
			$comparison = $criteria->getComparison(InvoiceItemPeer::ID);
			$selectCriteria->add(InvoiceItemPeer::ID, $criteria->remove(InvoiceItemPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseInvoiceItemPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseInvoiceItemPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(InvoiceItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InvoiceItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof InvoiceItem) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InvoiceItemPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(InvoiceItem $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InvoiceItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InvoiceItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InvoiceItemPeer::DATABASE_NAME, InvoiceItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InvoiceItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InvoiceItemPeer::DATABASE_NAME);

		$criteria->add(InvoiceItemPeer::ID, $pk);


		$v = InvoiceItemPeer::doSelect($criteria, $con);

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
			$criteria->add(InvoiceItemPeer::ID, $pks, Criteria::IN);
			$objs = InvoiceItemPeer::doSelect($criteria, $con);
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

                        $pager = new sfPropelPager('InvoiceItem', $max_items_per_page);
            $pager->setCriteria($c);
            $pager->setPage($page);
            $pager->init();

            return $pager;
         }
        
} 
if (Propel::isInit()) {
			try {
		BaseInvoiceItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InvoiceItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InvoiceItemMapBuilder');
}

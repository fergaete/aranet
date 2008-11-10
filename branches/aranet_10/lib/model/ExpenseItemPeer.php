<?php

/**
 * Subclass for performing query and update operations on the 'aranet_expense_item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ExpenseItemPeer extends BaseExpenseItemPeer
{
    	public static function doSelectJoinAllIncludeNulls(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ExpenseItemPeer::addSelectColumns($c);
		$startcol2 = (ExpenseItemPeer::NUM_COLUMNS - ExpenseItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + sfGuardUserPeer::NUM_COLUMNS;

		ExpenseCategoryPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + ExpenseCategoryPeer::NUM_COLUMNS;

		PaymentMethodPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + PaymentMethodPeer::NUM_COLUMNS;

		ReimbursementPeer::addSelectColumns($c);
		$startcol10 = $startcol9 + ReimbursementPeer::NUM_COLUMNS;

		ProjectPeer::addSelectColumns($c);
		$startcol11 = $startcol10 + ProjectPeer::NUM_COLUMNS;

		BudgetPeer::addSelectColumns($c);
		$startcol12 = $startcol11 + BudgetPeer::NUM_COLUMNS;

		VendorPeer::addSelectColumns($c);
		$startcol13 = $startcol12 + VendorPeer::NUM_COLUMNS;

        $c->addAlias("alias1", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(ExpenseItemPeer::DELETED_BY, sfGuardUserPeer::alias("alias1", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

        $c->addAlias("alias2", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(ExpenseItemPeer::EXPENSE_VALIDATE_BY, sfGuardUserPeer::alias("alias2", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

        $c->addAlias("alias3", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(ExpenseItemPeer::UPDATED_BY, sfGuardUserPeer::alias("alias3", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

        $c->addAlias("alias4", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(ExpenseItemPeer::CREATED_BY, sfGuardUserPeer::alias("alias4", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_PURCHASE_BY, sfGuardUserPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, ExpenseCategoryPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, ProjectPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_BUDGET_ID, BudgetPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, VendorPeer::ID, Criteria::LEFT_JOIN);

        $rs = ExpenseItemPeer::doSelectRS($c, $con);
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


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByExpenseValidateBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addExpenseItemRelatedByExpenseValidateBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initExpenseItemsRelatedByExpenseValidateBy();
				$obj3->addExpenseItemRelatedByExpenseValidateBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addExpenseItemRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initExpenseItemsRelatedByCreatedBy();
				$obj4->addExpenseItemRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addExpenseItemRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initExpenseItemsRelatedByUpdatedBy();
				$obj5->addExpenseItemRelatedByUpdatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getsfGuardUserRelatedByDeletedBy(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addExpenseItemRelatedByDeletedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initExpenseItemsRelatedByDeletedBy();
				$obj6->addExpenseItemRelatedByDeletedBy($obj1);
			}


					
			$omClass = ExpenseCategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getExpenseCategory(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initExpenseItems();
				$obj7->addExpenseItem($obj1);
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
					$temp_obj8->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initExpenseItems();
				$obj8->addExpenseItem($obj1);
			}


					
			$omClass = ReimbursementPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj9 = new $cls();
			$obj9->hydrate($rs, $startcol9);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj9 = $temp_obj1->getReimbursement(); 				if ($temp_obj9->getPrimaryKey() === $obj9->getPrimaryKey()) {
					$newObject = false;
					$temp_obj9->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj9->initExpenseItems();
				$obj9->addExpenseItem($obj1);
			}


					
			$omClass = ProjectPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj10 = new $cls();
			$obj10->hydrate($rs, $startcol10);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj10 = $temp_obj1->getProject(); 				if ($temp_obj10->getPrimaryKey() === $obj10->getPrimaryKey()) {
					$newObject = false;
					$temp_obj10->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj10->initExpenseItems();
				$obj10->addExpenseItem($obj1);
			}


					
			$omClass = BudgetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj11 = new $cls();
			$obj11->hydrate($rs, $startcol11);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj11 = $temp_obj1->getBudget(); 				if ($temp_obj11->getPrimaryKey() === $obj11->getPrimaryKey()) {
					$newObject = false;
					$temp_obj11->addExpenseItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj11->initExpenseItems();
				$obj11->addExpenseItem($obj1);
			}


					
			$omClass = VendorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj12 = new $cls();
			$obj12->hydrate($rs, $startcol12);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj12 = $temp_obj1->getVendor(); 				if ($temp_obj12->getPrimaryKey() === $obj12->getPrimaryKey()) {
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
}

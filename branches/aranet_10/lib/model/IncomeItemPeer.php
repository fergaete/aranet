<?php

/**
 * Subclass for performing query and update operations on the 'aranet_income_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: IncomeItemPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class IncomeItemPeer extends BaseIncomeItemPeer
{
	public static function doSelectJoinAllIncludeNulls(Criteria $c, $con = null)
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

        $c->addAlias("alias1", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(IncomeItemPeer::CREATED_BY, sfGuardUserPeer::alias("alias1", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

        $c->addAlias("alias2", sfGuardUserPeer::TABLE_NAME);
	 	$c->addJoin(IncomeItemPeer::UPDATED_BY, sfGuardUserPeer::alias("alias2", sfGuardUserPeer::ID), Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::DELETED_BY, sfGuardUserPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, IncomeCategoryPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, PaymentMethodPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_REIMBURSEMENT_ID, ReimbursementPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, ProjectPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_BUDGET_ID, BudgetPeer::ID, Criteria::LEFT_JOIN);

		$c->addJoin(IncomeItemPeer::INCOME_ITEM_VENDOR_ID, VendorPeer::ID, Criteria::LEFT_JOIN);

        $rs = IncomeItemPeer::doSelectRS($c, $con);
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
}

<?php


/**
 * This class adds structure of 'aranet_expense_item' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ExpenseItemMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ExpenseItemMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ExpenseItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ExpenseItemPeer::TABLE_NAME);
		$tMap->setPhpName('ExpenseItem');
		$tMap->setClassname('ExpenseItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('EXPENSE_ITEM_NAME', 'ExpenseItemName', 'VARCHAR', true, 128);

		$tMap->addColumn('EXPENSE_ITEM_COMMENTS', 'ExpenseItemComments', 'LONGVARCHAR', false, null);

		$tMap->addColumn('EXPENSE_PURCHASE_DATE', 'ExpensePurchaseDate', 'DATE', true, null);

		$tMap->addForeignKey('EXPENSE_PURCHASE_BY', 'ExpensePurchaseBy', 'INTEGER', 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('EXPENSE_ITEM_CATEGORY_ID', 'ExpenseItemCategoryId', 'INTEGER', 'aranet_expense_category', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_PAYMENT_METHOD_ID', 'ExpenseItemPaymentMethodId', 'INTEGER', 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('EXPENSE_ITEM_PAYMENT_CHECK', 'ExpenseItemPaymentCheck', 'VARCHAR', false, 64);

		$tMap->addForeignKey('EXPENSE_ITEM_REIMBURSEMENT_ID', 'ExpenseItemReimbursementId', 'INTEGER', 'aranet_reimbursement', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_PROJECT_ID', 'ExpenseItemProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_BUDGET_ID', 'ExpenseItemBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('EXPENSE_ITEM_AMOUNT', 'ExpenseItemAmount', 'DOUBLE', true, null);

		$tMap->addColumn('EXPENSE_ITEM_BASE', 'ExpenseItemBase', 'DOUBLE', false, null);

		$tMap->addColumn('EXPENSE_ITEM_TAX_RATE', 'ExpenseItemTaxRate', 'FLOAT', false, null);

		$tMap->addColumn('EXPENSE_ITEM_IRPF', 'ExpenseItemIrpf', 'DOUBLE', false, null);

		$tMap->addColumn('EXPENSE_ITEM_INVOICE_NUMBER', 'ExpenseItemInvoiceNumber', 'VARCHAR', false, 128);

		$tMap->addForeignKey('EXPENSE_ITEM_VENDOR_ID', 'ExpenseItemVendorId', 'INTEGER', 'aranet_vendor', 'ID', false, null);

		$tMap->addColumn('EXPENSE_VALIDATE_DATE', 'ExpenseValidateDate', 'DATE', false, null);

		$tMap->addForeignKey('EXPENSE_VALIDATE_BY', 'ExpenseValidateBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // ExpenseItemMapBuilder

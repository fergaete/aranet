<?php


/**
 * This class adds structure of 'aranet_income_item' table to 'propel' DatabaseMap object.
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
class IncomeItemMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.IncomeItemMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(IncomeItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(IncomeItemPeer::TABLE_NAME);
		$tMap->setPhpName('IncomeItem');
		$tMap->setClassname('IncomeItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('INCOME_ITEM_NAME', 'IncomeItemName', 'VARCHAR', true, 128);

		$tMap->addColumn('INCOME_ITEM_COMMENTS', 'IncomeItemComments', 'LONGVARCHAR', false, null);

		$tMap->addColumn('INCOME_DATE', 'IncomeDate', 'DATE', true, null);

		$tMap->addForeignKey('INCOME_ITEM_CATEGORY_ID', 'IncomeItemCategoryId', 'INTEGER', 'aranet_income_category', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_PAYMENT_METHOD_ID', 'IncomeItemPaymentMethodId', 'INTEGER', 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('INCOME_ITEM_PAYMENT_CHECK', 'IncomeItemPaymentCheck', 'VARCHAR', false, 64);

		$tMap->addForeignKey('INCOME_ITEM_REIMBURSEMENT_ID', 'IncomeItemReimbursementId', 'INTEGER', 'aranet_reimbursement', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_PROJECT_ID', 'IncomeItemProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_BUDGET_ID', 'IncomeItemBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('INCOME_ITEM_AMOUNT', 'IncomeItemAmount', 'DOUBLE', true, null);

		$tMap->addColumn('INCOME_ITEM_BASE', 'IncomeItemBase', 'DOUBLE', false, null);

		$tMap->addColumn('INCOME_ITEM_TAX_RATE', 'IncomeItemTaxRate', 'FLOAT', false, null);

		$tMap->addColumn('INCOME_ITEM_IRPF', 'IncomeItemIrpf', 'DOUBLE', false, null);

		$tMap->addColumn('INCOME_ITEM_INVOICE_NUMBER', 'IncomeItemInvoiceNumber', 'VARCHAR', false, 128);

		$tMap->addForeignKey('INCOME_ITEM_VENDOR_ID', 'IncomeItemVendorId', 'INTEGER', 'aranet_vendor', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // IncomeItemMapBuilder

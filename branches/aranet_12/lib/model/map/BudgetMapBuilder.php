<?php


/**
 * This class adds structure of 'aranet_budget' table to 'propel' DatabaseMap object.
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
class BudgetMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.BudgetMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(BudgetPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(BudgetPeer::TABLE_NAME);
		$tMap->setPhpName('Budget');
		$tMap->setClassname('Budget');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('BUDGET_PREFIX', 'BudgetPrefix', 'VARCHAR', false, 8);

		$tMap->addColumn('BUDGET_NUMBER', 'BudgetNumber', 'VARCHAR', true, 11);

		$tMap->addColumn('BUDGET_REVISION', 'BudgetRevision', 'INTEGER', true, null);

		$tMap->addColumn('BUDGET_DATE', 'BudgetDate', 'DATE', true, null);

		$tMap->addColumn('BUDGET_VALID_DATE', 'BudgetValidDate', 'DATE', true, null);

		$tMap->addColumn('BUDGET_APPROVED_DATE', 'BudgetApprovedDate', 'DATE', false, null);

		$tMap->addForeignKey('BUDGET_CLIENT_ID', 'BudgetClientId', 'INTEGER', 'aranet_client', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_PROJECT_ID', 'BudgetProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_CATEGORY_ID', 'BudgetCategoryId', 'INTEGER', 'aranet_invoice_category', 'ID', false, null);

		$tMap->addColumn('BUDGET_TITLE', 'BudgetTitle', 'VARCHAR', false, 255);

		$tMap->addColumn('BUDGET_COMMENTS', 'BudgetComments', 'LONGVARCHAR', false, null);

		$tMap->addColumn('BUDGET_PRINT_COMMENTS', 'BudgetPrintComments', 'BOOLEAN', false, 1);

		$tMap->addColumn('BUDGET_TAX_RATE', 'BudgetTaxRate', 'FLOAT', false, null);

		$tMap->addColumn('BUDGET_FREIGHT_CHARGE', 'BudgetFreightCharge', 'FLOAT', false, null);

		$tMap->addColumn('BUDGET_TOTAL_COST', 'BudgetTotalCost', 'FLOAT', false, null);

		$tMap->addColumn('BUDGET_TOTAL_AMOUNT', 'BudgetTotalAmount', 'FLOAT', false, null);

		$tMap->addForeignKey('BUDGET_PAYMENT_CONDITION_ID', 'BudgetPaymentConditionId', 'INTEGER', 'aranet_payment_condition', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_STATUS_ID', 'BudgetStatusId', 'INTEGER', 'aranet_budget_status', 'ID', false, null);

		$tMap->addColumn('BUDGET_IS_LAST', 'BudgetIsLast', 'BOOLEAN', false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // BudgetMapBuilder

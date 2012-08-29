<?php


/**
 * This class adds structure of 'aranet_budget_item' table to 'propel' DatabaseMap object.
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
class BudgetItemMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.BudgetItemMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(BudgetItemPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(BudgetItemPeer::TABLE_NAME);
		$tMap->setPhpName('BudgetItem');
		$tMap->setClassname('BudgetItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('ITEM_ORDER', 'ItemOrder', 'INTEGER', true, null);

		$tMap->addForeignKey('ITEM_TYPE_ID', 'ItemTypeId', 'INTEGER', 'aranet_type_of_invoice_item', 'ID', false, null);

		$tMap->addColumn('ITEM_IS_OPTIONAL', 'ItemIsOptional', 'BOOLEAN', false, 1);

		$tMap->addColumn('ITEM_DESCRIPTION', 'ItemDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('ITEM_QUANTITY', 'ItemQuantity', 'FLOAT', false, null);

		$tMap->addColumn('MILESTONE_TASK_ID', 'MilestoneTaskId', 'INTEGER', false, null);

		$tMap->addColumn('ITEM_TASK_ID', 'ItemTaskId', 'INTEGER', false, null);

		$tMap->addColumn('ITEM_COST', 'ItemCost', 'DOUBLE', false, null);

		$tMap->addColumn('ITEM_MARGIN', 'ItemMargin', 'DOUBLE', false, null);

		$tMap->addColumn('ITEM_RETAIL_PRICE', 'ItemRetailPrice', 'DOUBLE', false, null);

		$tMap->addColumn('ITEM_TAX_RATE', 'ItemTaxRate', 'FLOAT', false, null);

		$tMap->addForeignKey('ITEM_BUDGET_ID', 'ItemBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('ITEM_BUDGET_TYPE_ID', 'ItemBudgetTypeId', 'INTEGER', 'aranet_type_of_hour', 'ID', false, null);

	} // doBuild()

} // BudgetItemMapBuilder

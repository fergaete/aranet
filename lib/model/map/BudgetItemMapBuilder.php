<?php



class BudgetItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BudgetItemMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('aranet_budget_item');
		$tMap->setPhpName('BudgetItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ITEM_ORDER', 'ItemOrder', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ITEM_TYPE_ID', 'ItemTypeId', 'int', CreoleTypes::INTEGER, 'aranet_type_of_invoice_item', 'ID', false, null);

		$tMap->addColumn('ITEM_IS_OPTIONAL', 'ItemIsOptional', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('ITEM_DESCRIPTION', 'ItemDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('ITEM_QUANTITY', 'ItemQuantity', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('MILESTONE_TASK_ID', 'MilestoneTaskId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ITEM_TASK_ID', 'ItemTaskId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ITEM_COST', 'ItemCost', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ITEM_MARGIN', 'ItemMargin', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ITEM_RETAIL_PRICE', 'ItemRetailPrice', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ITEM_TAX_RATE', 'ItemTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('ITEM_BUDGET_ID', 'ItemBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('ITEM_BUDGET_TYPE_ID', 'ItemBudgetTypeId', 'int', CreoleTypes::INTEGER, 'aranet_type_of_hour', 'ID', false, null);

	} 
} 
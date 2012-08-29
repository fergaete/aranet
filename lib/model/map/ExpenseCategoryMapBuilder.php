<?php



class ExpenseCategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ExpenseCategoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_expense_category');
		$tMap->setPhpName('ExpenseCategory');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CATEGORY_TITLE', 'CategoryTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
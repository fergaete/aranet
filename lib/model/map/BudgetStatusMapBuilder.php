<?php



class BudgetStatusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BudgetStatusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_budget_status');
		$tMap->setPhpName('BudgetStatus');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BUDGET_STATUS_TITLE', 'BudgetStatusTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
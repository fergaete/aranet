<?php



class ReimbursementMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ReimbursementMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_reimbursement');
		$tMap->setPhpName('Reimbursement');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REIMBURSEMENT_TITLE', 'ReimbursementTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
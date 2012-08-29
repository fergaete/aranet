<?php



class KindOfCompanyMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KindOfCompanyMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_kind_of_company');
		$tMap->setPhpName('KindOfCompany');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('KIND_OF_COMPANY_TITLE', 'KindOfCompanyTitle', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('KIND_OF_COMPANY_DESCRIPTION', 'KindOfCompanyDescription', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 
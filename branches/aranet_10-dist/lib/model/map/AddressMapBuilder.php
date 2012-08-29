<?php



class AddressMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AddressMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_address');
		$tMap->setPhpName('Address');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ADDRESS_LINE1', 'AddressLine1', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADDRESS_LINE2', 'AddressLine2', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ADDRESS_LOCATION', 'AddressLocation', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('ADDRESS_STATE', 'AddressState', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('ADDRESS_POSTAL_CODE', 'AddressPostalCode', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('ADDRESS_COUNTRY', 'AddressCountry', 'string', CreoleTypes::VARCHAR, false, 2);

	} 
} 
<?php



class ObjectAddressMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ObjectAddressMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_objectaddress');
		$tMap->setPhpName('ObjectAddress');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBJECTADDRESS_NAME', 'ObjectaddressName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addForeignKey('OBJECTADDRESS_ADDRESS_ID', 'ObjectaddressAddressId', 'int', CreoleTypes::INTEGER, 'aranet_address', 'ID', true, null);

		$tMap->addColumn('OBJECTADDRESS_OBJECT_ID', 'ObjectaddressObjectId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBJECTADDRESS_OBJECT_CLASS', 'ObjectaddressObjectClass', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('OBJECTADDRESS_TYPE', 'ObjectaddressType', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('OBJECTADDRESS_IS_DEFAULT', 'ObjectaddressIsDefault', 'boolean', CreoleTypes::BOOLEAN, false, 1);

	} 
} 
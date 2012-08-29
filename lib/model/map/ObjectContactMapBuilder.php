<?php



class ObjectContactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ObjectContactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_objectcontact');
		$tMap->setPhpName('ObjectContact');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('OBJECTCONTACT_CONTACT_ID', 'ObjectcontactContactId', 'int', CreoleTypes::INTEGER, 'aranet_contact', 'ID', true, null);

		$tMap->addColumn('OBJECTCONTACT_OBJECT_ID', 'ObjectcontactObjectId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('OBJECTCONTACT_OBJECT_CLASS', 'ObjectcontactObjectClass', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('OBJECTCONTACT_ROL', 'ObjectcontactRol', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('OBJECTCONTACT_IS_DEFAULT', 'ObjectcontactIsDefault', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
<?php



class ContactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ContactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_contact');
		$tMap->setPhpName('Contact');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CONTACT_SALUTATION', 'ContactSalutation', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CONTACT_FIRST_NAME', 'ContactFirstName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CONTACT_LAST_NAME', 'ContactLastName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CONTACT_EMAIL', 'ContactEmail', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CONTACT_PHONE', 'ContactPhone', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CONTACT_FAX', 'ContactFax', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CONTACT_MOBILE', 'ContactMobile', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CONTACT_BIRTHDAY', 'ContactBirthday', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CONTACT_ORG_UNIT', 'ContactOrgUnit', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
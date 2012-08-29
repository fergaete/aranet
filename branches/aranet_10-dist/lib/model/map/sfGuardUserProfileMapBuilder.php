<?php



class sfGuardUserProfileMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.sfGuardUserProfileMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_user_profile');
		$tMap->setPhpName('sfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PUBLIC_TITLE', 'PublicTitle', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PUBLIC_FIRST_NAME', 'PublicFirstName', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('LAST_NAME', 'LastName', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PUBLIC_LAST_NAME', 'PublicLastName', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('GENDER', 'Gender', 'int', CreoleTypes::INTEGER, false, 1);

		$tMap->addColumn('PUBLIC_GENDER', 'PublicGender', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PUBLIC_EMAIL', 'PublicEmail', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('URL', 'Url', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PUBLIC_URL', 'PublicUrl', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('OPENID_URL', 'OpenidUrl', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('STREET', 'Street', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PUBLIC_STREET', 'PublicStreet', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PUBLIC_CITY', 'PublicCity', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PUBLIC_STATE', 'PublicState', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CODE', 'Code', 'int', CreoleTypes::INTEGER, false, 5);

		$tMap->addColumn('PUBLIC_CODE', 'PublicCode', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PUBLIC_COUNTRY', 'PublicCountry', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('TIMEZONE', 'Timezone', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PUBLIC_TIMEZONE', 'PublicTimezone', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('BIRTHDAY', 'Birthday', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PUBLIC_BIRTHDAY', 'PublicBirthday', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('COMPANY', 'Company', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('PUBLIC_COMPANY', 'PublicCompany', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CIF', 'Cif', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('PUBLIC_CIF', 'PublicCif', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('PHONE1', 'Phone1', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PUBLIC_PHONE1', 'PublicPhone1', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('PHONE2', 'Phone2', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PUBLIC_PHONE2', 'PublicPhone2', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PUBLIC_FAX', 'PublicFax', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('NOTES', 'Notes', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('GRAVATAR', 'Gravatar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AVATAR', 'Avatar', 'string', CreoleTypes::BLOB, false, null);

		$tMap->addColumn('AVATAR_FILETYPE', 'AvatarFiletype', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addForeignKey('OWNER_USER_ID', 'OwnerUserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('USER_NEWSLETTER', 'UserNewsletter', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('PREFERRED_LANGUAGE', 'PreferredLanguage', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
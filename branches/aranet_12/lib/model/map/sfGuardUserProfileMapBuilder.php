<?php


/**
 * This class adds structure of 'sf_guard_user_profile' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class sfGuardUserProfileMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.sfGuardUserProfileMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(sfGuardUserProfilePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfGuardUserProfilePeer::TABLE_NAME);
		$tMap->setPhpName('sfGuardUserProfile');
		$tMap->setClassname('sfGuardUserProfile');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', false, 4);

		$tMap->addColumn('PUBLIC_TITLE', 'PublicTitle', 'BOOLEAN', false, 1);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 50);

		$tMap->addColumn('PUBLIC_FIRST_NAME', 'PublicFirstName', 'BOOLEAN', false, 1);

		$tMap->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 100);

		$tMap->addColumn('PUBLIC_LAST_NAME', 'PublicLastName', 'BOOLEAN', false, 1);

		$tMap->addColumn('GENDER', 'Gender', 'INTEGER', false, 1);

		$tMap->addColumn('PUBLIC_GENDER', 'PublicGender', 'BOOLEAN', false, 1);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 128);

		$tMap->addColumn('PUBLIC_EMAIL', 'PublicEmail', 'BOOLEAN', false, 1);

		$tMap->addColumn('URL', 'Url', 'VARCHAR', false, 255);

		$tMap->addColumn('PUBLIC_URL', 'PublicUrl', 'BOOLEAN', false, 1);

		$tMap->addColumn('OPENID_URL', 'OpenidUrl', 'VARCHAR', false, 255);

		$tMap->addColumn('STREET', 'Street', 'VARCHAR', false, 255);

		$tMap->addColumn('PUBLIC_STREET', 'PublicStreet', 'BOOLEAN', false, 1);

		$tMap->addColumn('CITY', 'City', 'VARCHAR', false, 50);

		$tMap->addColumn('PUBLIC_CITY', 'PublicCity', 'BOOLEAN', false, 1);

		$tMap->addColumn('STATE', 'State', 'VARCHAR', false, 50);

		$tMap->addColumn('PUBLIC_STATE', 'PublicState', 'BOOLEAN', false, 1);

		$tMap->addColumn('CODE', 'Code', 'INTEGER', false, 5);

		$tMap->addColumn('PUBLIC_CODE', 'PublicCode', 'BOOLEAN', false, 1);

		$tMap->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 2);

		$tMap->addColumn('PUBLIC_COUNTRY', 'PublicCountry', 'BOOLEAN', false, 1);

		$tMap->addColumn('TIMEZONE', 'Timezone', 'INTEGER', false, null);

		$tMap->addColumn('PUBLIC_TIMEZONE', 'PublicTimezone', 'BOOLEAN', false, 1);

		$tMap->addColumn('BIRTHDAY', 'Birthday', 'DATE', false, null);

		$tMap->addColumn('PUBLIC_BIRTHDAY', 'PublicBirthday', 'BOOLEAN', false, 1);

		$tMap->addColumn('COMPANY', 'Company', 'VARCHAR', false, 128);

		$tMap->addColumn('PUBLIC_COMPANY', 'PublicCompany', 'BOOLEAN', false, 1);

		$tMap->addColumn('CIF', 'Cif', 'VARCHAR', false, 12);

		$tMap->addColumn('PUBLIC_CIF', 'PublicCif', 'BOOLEAN', false, 1);

		$tMap->addColumn('PHONE1', 'Phone1', 'VARCHAR', false, 16);

		$tMap->addColumn('PUBLIC_PHONE1', 'PublicPhone1', 'BOOLEAN', false, 1);

		$tMap->addColumn('PHONE2', 'Phone2', 'VARCHAR', false, 16);

		$tMap->addColumn('PUBLIC_PHONE2', 'PublicPhone2', 'BOOLEAN', false, 1);

		$tMap->addColumn('FAX', 'Fax', 'VARCHAR', false, 16);

		$tMap->addColumn('PUBLIC_FAX', 'PublicFax', 'BOOLEAN', false, 1);

		$tMap->addColumn('NOTES', 'Notes', 'LONGVARCHAR', false, null);

		$tMap->addColumn('GRAVATAR', 'Gravatar', 'BOOLEAN', false, null);

		$tMap->addColumn('AVATAR', 'Avatar', 'BLOB', false, null);

		$tMap->addColumn('AVATAR_FILETYPE', 'AvatarFiletype', 'VARCHAR', false, 4);

		$tMap->addForeignKey('OWNER_USER_ID', 'OwnerUserId', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('USER_NEWSLETTER', 'UserNewsletter', 'BOOLEAN', false, 1);

		$tMap->addColumn('PREFERRED_LANGUAGE', 'PreferredLanguage', 'VARCHAR', false, 6);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // sfGuardUserProfileMapBuilder

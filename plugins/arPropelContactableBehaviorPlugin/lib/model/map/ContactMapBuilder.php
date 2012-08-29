<?php


/**
 * This class adds structure of 'aranet_contact' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.arPropelContactableBehaviorPlugin.lib.model.map
 */
class ContactMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.arPropelContactableBehaviorPlugin.lib.model.map.ContactMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ContactPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ContactPeer::TABLE_NAME);
		$tMap->setPhpName('Contact');
		$tMap->setClassname('Contact');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CONTACT_SALUTATION', 'ContactSalutation', 'VARCHAR', false, 6);

		$tMap->addColumn('CONTACT_FIRST_NAME', 'ContactFirstName', 'VARCHAR', false, 128);

		$tMap->addColumn('CONTACT_LAST_NAME', 'ContactLastName', 'VARCHAR', false, 128);

		$tMap->addColumn('CONTACT_EMAIL', 'ContactEmail', 'VARCHAR', false, 128);

		$tMap->addColumn('CONTACT_PHONE', 'ContactPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('CONTACT_FAX', 'ContactFax', 'VARCHAR', false, 16);

		$tMap->addColumn('CONTACT_MOBILE', 'ContactMobile', 'VARCHAR', false, 16);

		$tMap->addColumn('CONTACT_BIRTHDAY', 'ContactBirthday', 'DATE', false, null);

		$tMap->addColumn('CONTACT_ORG_UNIT', 'ContactOrgUnit', 'VARCHAR', false, 128);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // ContactMapBuilder

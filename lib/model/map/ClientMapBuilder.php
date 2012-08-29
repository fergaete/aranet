<?php


/**
 * This class adds structure of 'aranet_client' table to 'propel' DatabaseMap object.
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
class ClientMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ClientMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ClientPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ClientPeer::TABLE_NAME);
		$tMap->setPhpName('Client');
		$tMap->setClassname('Client');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('CLIENT_UNIQUE_NAME', 'ClientUniqueName', 'VARCHAR', true, 128);

		$tMap->addColumn('CLIENT_COMPANY_NAME', 'ClientCompanyName', 'VARCHAR', true, 255);

		$tMap->addColumn('CLIENT_CIF', 'ClientCif', 'VARCHAR', false, 12);

		$tMap->addForeignKey('CLIENT_KIND_OF_COMPANY_ID', 'ClientKindOfCompanyId', 'INTEGER', 'aranet_kind_of_company', 'ID', false, null);

		$tMap->addColumn('CLIENT_SINCE', 'ClientSince', 'DATE', false, null);

		$tMap->addColumn('CLIENT_WEBSITE', 'ClientWebsite', 'VARCHAR', false, 255);

		$tMap->addColumn('CLIENT_COMMENTS', 'ClientComments', 'LONGVARCHAR', false, null);

		$tMap->addColumn('CLIENT_HAS_TAGS', 'ClientHasTags', 'BOOLEAN', false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // ClientMapBuilder

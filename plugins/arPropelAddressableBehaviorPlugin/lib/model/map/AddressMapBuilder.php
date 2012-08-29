<?php


/**
 * This class adds structure of 'aranet_address' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.arPropelAddressableBehaviorPlugin.lib.model.map
 */
class AddressMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.arPropelAddressableBehaviorPlugin.lib.model.map.AddressMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AddressPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AddressPeer::TABLE_NAME);
		$tMap->setPhpName('Address');
		$tMap->setClassname('Address');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('ADDRESS_LINE1', 'AddressLine1', 'VARCHAR', false, 255);

		$tMap->addColumn('ADDRESS_LINE2', 'AddressLine2', 'VARCHAR', false, 255);

		$tMap->addColumn('ADDRESS_LOCATION', 'AddressLocation', 'VARCHAR', false, 128);

		$tMap->addColumn('ADDRESS_STATE', 'AddressState', 'VARCHAR', false, 64);

		$tMap->addColumn('ADDRESS_POSTAL_CODE', 'AddressPostalCode', 'VARCHAR', false, 5);

		$tMap->addColumn('ADDRESS_COUNTRY', 'AddressCountry', 'VARCHAR', false, 2);

	} // doBuild()

} // AddressMapBuilder

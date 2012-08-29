<?php


/**
 * This class adds structure of 'aranet_objectaddress' table to 'propel' DatabaseMap object.
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
class ObjectAddressMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.arPropelAddressableBehaviorPlugin.lib.model.map.ObjectAddressMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ObjectAddressPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ObjectAddressPeer::TABLE_NAME);
		$tMap->setPhpName('ObjectAddress');
		$tMap->setClassname('ObjectAddress');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('OBJECTADDRESS_NAME', 'ObjectaddressName', 'VARCHAR', false, 128);

		$tMap->addForeignKey('OBJECTADDRESS_ADDRESS_ID', 'ObjectaddressAddressId', 'INTEGER', 'aranet_address', 'ID', true, null);

		$tMap->addColumn('OBJECTADDRESS_OBJECT_ID', 'ObjectaddressObjectId', 'INTEGER', true, null);

		$tMap->addColumn('OBJECTADDRESS_OBJECT_CLASS', 'ObjectaddressObjectClass', 'VARCHAR', false, 64);

		$tMap->addColumn('OBJECTADDRESS_TYPE', 'ObjectaddressType', 'VARCHAR', false, 16);

		$tMap->addColumn('OBJECTADDRESS_IS_DEFAULT', 'ObjectaddressIsDefault', 'BOOLEAN', false, 1);

	} // doBuild()

} // ObjectAddressMapBuilder

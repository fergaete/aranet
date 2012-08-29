<?php


/**
 * This class adds structure of 'aranet_default_indicator' table to 'propel' DatabaseMap object.
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
class DefaultIndicatorMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DefaultIndicatorMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(DefaultIndicatorPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DefaultIndicatorPeer::TABLE_NAME);
		$tMap->setPhpName('DefaultIndicator');
		$tMap->setClassname('DefaultIndicator');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('INDICATOR_NAME', 'IndicatorName', 'VARCHAR', true, 255);

		$tMap->addColumn('INDICATOR_KEY', 'IndicatorKey', 'VARCHAR', true, 255);

		$tMap->addColumn('INDICATOR_DESCRIPTION', 'IndicatorDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('INDICATOR_BEAUTIFIER', 'IndicatorBeautifier', 'VARCHAR', false, 255);

		$tMap->addColumn('INDICATOR_UNIT', 'IndicatorUnit', 'VARCHAR', false, 10);

		$tMap->addColumn('INDICATOR_OBJECTS_CLASS', 'IndicatorObjectsClass', 'VARCHAR', false, 255);

	} // doBuild()

} // DefaultIndicatorMapBuilder

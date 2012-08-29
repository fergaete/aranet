<?php


/**
 * This class adds structure of 'aranet_plot' table to 'propel' DatabaseMap object.
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
class GPlotMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.GPlotMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(GPlotPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(GPlotPeer::TABLE_NAME);
		$tMap->setPhpName('GPlot');
		$tMap->setClassname('GPlot');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('PLOT_NAME', 'PlotName', 'VARCHAR', false, 128);

		$tMap->addColumn('PLOT_COLOR', 'PlotColor', 'VARCHAR', false, 64);

		$tMap->addColumn('PLOT_TYPE', 'PlotType', 'VARCHAR', false, 64);

		$tMap->addColumn('PLOT_CRITERIA', 'PlotCriteria', 'LONGVARCHAR', false, null);

		$tMap->addColumn('PLOT_DATE_VARIABLE', 'PlotDateVariable', 'VARCHAR', false, 128);

		$tMap->addColumn('PLOT_CLASS', 'PlotClass', 'VARCHAR', false, 128);

		$tMap->addColumn('PLOT_FUNCTION', 'PlotFunction', 'VARCHAR', false, 128);

		$tMap->addColumn('PLOT_CALLBACK', 'PlotCallback', 'VARCHAR', false, 128);

		$tMap->addColumn('PLOT_ACC_FUNCTION', 'PlotAccFunction', 'VARCHAR', false, 128);

	} // doBuild()

} // GPlotMapBuilder

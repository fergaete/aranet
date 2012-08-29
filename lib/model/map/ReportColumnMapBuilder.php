<?php


/**
 * This class adds structure of 'aranet_report_column' table to 'propel' DatabaseMap object.
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
class ReportColumnMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ReportColumnMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ReportColumnPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ReportColumnPeer::TABLE_NAME);
		$tMap->setPhpName('ReportColumn');
		$tMap->setClassname('ReportColumn');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('REPORT_ID', 'ReportId', 'INTEGER', 'aranet_report', 'ID', false, null);

		$tMap->addColumn('COLUMN_PHP_NAME', 'ColumnPhpName', 'VARCHAR', false, 255);

		$tMap->addColumn('COLUMN_NAME', 'ColumnName', 'VARCHAR', false, 128);

		$tMap->addColumn('COLUMN_ORDER', 'ColumnOrder', 'INTEGER', false, null);

		$tMap->addColumn('COLUMN_WIDTH', 'ColumnWidth', 'DOUBLE', true, null);

		$tMap->addColumn('COLUMN_EVAL_SCRIPT', 'ColumnEvalScript', 'LONGVARCHAR', true, null);

	} // doBuild()

} // ReportColumnMapBuilder

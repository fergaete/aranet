<?php



class ReportColumnMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ReportColumnMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_report_column');
		$tMap->setPhpName('ReportColumn');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('REPORT_ID', 'ReportId', 'int', CreoleTypes::INTEGER, 'aranet_report', 'ID', false, null);

		$tMap->addColumn('COLUMN_PHP_NAME', 'ColumnPhpName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COLUMN_NAME', 'ColumnName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('COLUMN_ORDER', 'ColumnOrder', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COLUMN_WIDTH', 'ColumnWidth', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('COLUMN_EVAL_SCRIPT', 'ColumnEvalScript', 'string', CreoleTypes::LONGVARCHAR, true, null);

	} 
} 
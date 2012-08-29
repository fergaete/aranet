<?php



class IndicatorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndicatorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_indicator');
		$tMap->setPhpName('Indicator');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('INDICATOR_ID', 'IndicatorId', 'int', CreoleTypes::INTEGER, 'aranet_default_indicator', 'ID', true, null);

		$tMap->addColumn('INDICATOR_VALUE', 'IndicatorValue', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('INDICATOR_BEAUTIFIER', 'IndicatorBeautifier', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INDICATOR_UNIT', 'IndicatorUnit', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('INDICATOR_OBJECT_ID', 'IndicatorObjectId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('INDICATOR_OBJECT_CLASS', 'IndicatorObjectClass', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
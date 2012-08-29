<?php



class DefaultIndicatorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DefaultIndicatorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_default_indicator');
		$tMap->setPhpName('DefaultIndicator');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('INDICATOR_NAME', 'IndicatorName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('INDICATOR_KEY', 'IndicatorKey', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('INDICATOR_DESCRIPTION', 'IndicatorDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INDICATOR_BEAUTIFIER', 'IndicatorBeautifier', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INDICATOR_UNIT', 'IndicatorUnit', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('INDICATOR_OBJECTS_CLASS', 'IndicatorObjectsClass', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 
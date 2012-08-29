<?php



class TypeOfHourMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TypeOfHourMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_type_of_hour');
		$tMap->setPhpName('TypeOfHour');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE_OF_HOUR_TITLE', 'TypeOfHourTitle', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('TYPE_OF_HOUR_DESCRIPTION', 'TypeOfHourDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TYPE_OF_HOUR_COST', 'TypeOfHourCost', 'double', CreoleTypes::FLOAT, false, null);

	} 
} 
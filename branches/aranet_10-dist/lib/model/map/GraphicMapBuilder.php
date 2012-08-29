<?php



class GraphicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GraphicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_graphic');
		$tMap->setPhpName('Graphic');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GRAPHIC_NAME', 'GraphicName', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('DATA_POINTS', 'DataPoints', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('START_DATE', 'StartDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('END_DATE', 'EndDate', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DEFAULT', 'IsDefault', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
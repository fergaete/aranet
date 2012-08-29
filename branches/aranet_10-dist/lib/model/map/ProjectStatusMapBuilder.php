<?php



class ProjectStatusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProjectStatusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_project_status');
		$tMap->setPhpName('ProjectStatus');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PROJECT_STATUS_TITLE', 'ProjectStatusTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
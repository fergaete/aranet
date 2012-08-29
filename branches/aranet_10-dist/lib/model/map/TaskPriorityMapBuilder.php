<?php



class TaskPriorityMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TaskPriorityMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_task_priority');
		$tMap->setPhpName('TaskPriority');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TASK_PRIORITY_TITLE', 'TaskPriorityTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
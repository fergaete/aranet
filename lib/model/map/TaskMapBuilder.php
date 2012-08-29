<?php



class TaskMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TaskMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_project_task');
		$tMap->setPhpName('Task');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TASK_TITLE', 'TaskTitle', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TASK_DESCRIPTION', 'TaskDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TASK_START_DATE', 'TaskStartDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TASK_FINISH_DATE', 'TaskFinishDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TASK_TOTAL_DURATION', 'TaskTotalDuration', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('TASK_PRIORITY_ID', 'TaskPriorityId', 'int', CreoleTypes::INTEGER, 'aranet_task_priority', 'ID', false, null);

		$tMap->addForeignKey('TASK_PROJECT_ID', 'TaskProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('TASK_MILESTONE_ID', 'TaskMilestoneId', 'int', CreoleTypes::INTEGER, 'aranet_project_milestone', 'ID', false, null);

		$tMap->addForeignKey('TASK_BUDGET_ID', 'TaskBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('TASK_ESTIMATED_HOURS', 'TaskEstimatedHours', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('TASK_TOTAL_HOURS', 'TaskTotalHours', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('TASK_TOTAL_HOUR_COSTS', 'TaskTotalHourCosts', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
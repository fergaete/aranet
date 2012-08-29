<?php



class TimesheetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TimesheetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_timesheet');
		$tMap->setPhpName('Timesheet');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TIMESHEET_DESCRIPTION', 'TimesheetDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TIMESHEET_HOURS', 'TimesheetHours', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('TIMESHEET_USER_ID', 'TimesheetUserId', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_PROJECT_ID', 'TimesheetProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_BUDGET_ID', 'TimesheetBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_MILESTONE_ID', 'TimesheetMilestoneId', 'int', CreoleTypes::INTEGER, 'aranet_project_milestone', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_TASK_ID', 'TimesheetTaskId', 'int', CreoleTypes::INTEGER, 'aranet_project_task', 'ID', false, null);

		$tMap->addColumn('TIMESHEET_IS_BILLABLE', 'TimesheetIsBillable', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addForeignKey('TIMESHEET_TYPE_ID', 'TimesheetTypeId', 'int', CreoleTypes::INTEGER, 'aranet_type_of_hour', 'ID', false, null);

		$tMap->addColumn('TIMESHEET_DATE', 'TimesheetDate', 'int', CreoleTypes::DATE, false, null);

	} 
} 
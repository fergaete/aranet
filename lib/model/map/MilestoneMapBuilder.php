<?php



class MilestoneMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MilestoneMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_project_milestone');
		$tMap->setPhpName('Milestone');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MILESTONE_TITLE', 'MilestoneTitle', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MILESTONE_DESCRIPTION', 'MilestoneDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('MILESTONE_START_DATE', 'MilestoneStartDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MILESTONE_FINISH_DATE', 'MilestoneFinishDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('MILESTONE_PROJECT_ID', 'MilestoneProjectId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('MILESTONE_BUDGET_ID', 'MilestoneBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('MILESTONE_ESTIMATED_HOURS', 'MilestoneEstimatedHours', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MILESTONE_TOTAL_HOURS', 'MilestoneTotalHours', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MILESTONE_TOTAL_HOUR_COSTS', 'MilestoneTotalHourCosts', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
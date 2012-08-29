<?php


/**
 * This class adds structure of 'aranet_project_task' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TaskMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TaskMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(TaskPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TaskPeer::TABLE_NAME);
		$tMap->setPhpName('Task');
		$tMap->setClassname('Task');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('TASK_TITLE', 'TaskTitle', 'VARCHAR', true, 255);

		$tMap->addColumn('TASK_DESCRIPTION', 'TaskDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('TASK_START_DATE', 'TaskStartDate', 'DATE', false, null);

		$tMap->addColumn('TASK_FINISH_DATE', 'TaskFinishDate', 'DATE', false, null);

		$tMap->addColumn('TASK_TOTAL_DURATION', 'TaskTotalDuration', 'FLOAT', false, null);

		$tMap->addForeignKey('TASK_PRIORITY_ID', 'TaskPriorityId', 'INTEGER', 'aranet_task_priority', 'ID', false, null);

		$tMap->addForeignKey('TASK_PROJECT_ID', 'TaskProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('TASK_MILESTONE_ID', 'TaskMilestoneId', 'INTEGER', 'aranet_project_milestone', 'ID', false, null);

		$tMap->addForeignKey('TASK_BUDGET_ID', 'TaskBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('TASK_ESTIMATED_HOURS', 'TaskEstimatedHours', 'DOUBLE', false, null);

		$tMap->addColumn('TASK_TOTAL_HOURS', 'TaskTotalHours', 'DOUBLE', false, null);

		$tMap->addColumn('TASK_TOTAL_HOUR_COSTS', 'TaskTotalHourCosts', 'DOUBLE', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // TaskMapBuilder

<?php


/**
 * This class adds structure of 'aranet_timesheet' table to 'propel' DatabaseMap object.
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
class TimesheetMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TimesheetMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(TimesheetPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TimesheetPeer::TABLE_NAME);
		$tMap->setPhpName('Timesheet');
		$tMap->setClassname('Timesheet');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('TIMESHEET_DESCRIPTION', 'TimesheetDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('TIMESHEET_HOURS', 'TimesheetHours', 'FLOAT', false, null);

		$tMap->addForeignKey('TIMESHEET_USER_ID', 'TimesheetUserId', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_PROJECT_ID', 'TimesheetProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_BUDGET_ID', 'TimesheetBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_MILESTONE_ID', 'TimesheetMilestoneId', 'INTEGER', 'aranet_project_milestone', 'ID', false, null);

		$tMap->addForeignKey('TIMESHEET_TASK_ID', 'TimesheetTaskId', 'INTEGER', 'aranet_project_task', 'ID', false, null);

		$tMap->addColumn('TIMESHEET_IS_BILLABLE', 'TimesheetIsBillable', 'BOOLEAN', false, 1);

		$tMap->addForeignKey('TIMESHEET_TYPE_ID', 'TimesheetTypeId', 'INTEGER', 'aranet_type_of_hour', 'ID', false, null);

		$tMap->addColumn('TIMESHEET_DATE', 'TimesheetDate', 'DATE', false, null);

	} // doBuild()

} // TimesheetMapBuilder

<?php


/**
 * This class adds structure of 'aranet_project_milestone' table to 'propel' DatabaseMap object.
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
class MilestoneMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MilestoneMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MilestonePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MilestonePeer::TABLE_NAME);
		$tMap->setPhpName('Milestone');
		$tMap->setClassname('Milestone');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('MILESTONE_TITLE', 'MilestoneTitle', 'VARCHAR', true, 255);

		$tMap->addColumn('MILESTONE_DESCRIPTION', 'MilestoneDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('MILESTONE_START_DATE', 'MilestoneStartDate', 'DATE', true, null);

		$tMap->addColumn('MILESTONE_FINISH_DATE', 'MilestoneFinishDate', 'DATE', true, null);

		$tMap->addForeignKey('MILESTONE_PROJECT_ID', 'MilestoneProjectId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('MILESTONE_BUDGET_ID', 'MilestoneBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('MILESTONE_ESTIMATED_HOURS', 'MilestoneEstimatedHours', 'DOUBLE', false, null);

		$tMap->addColumn('MILESTONE_TOTAL_HOURS', 'MilestoneTotalHours', 'DOUBLE', false, null);

		$tMap->addColumn('MILESTONE_TOTAL_HOUR_COSTS', 'MilestoneTotalHourCosts', 'DOUBLE', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // MilestoneMapBuilder

<?php


/**
 * This class adds structure of 'aranet_project' table to 'propel' DatabaseMap object.
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
class ProjectMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProjectMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ProjectPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ProjectPeer::TABLE_NAME);
		$tMap->setPhpName('Project');
		$tMap->setClassname('Project');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('PROJECT_PREFIX', 'ProjectPrefix', 'VARCHAR', false, 8);

		$tMap->addColumn('PROJECT_NUMBER', 'ProjectNumber', 'VARCHAR', false, 11);

		$tMap->addColumn('PROJECT_NAME', 'ProjectName', 'VARCHAR', true, 128);

		$tMap->addColumn('PROJECT_URL', 'ProjectUrl', 'VARCHAR', false, 255);

		$tMap->addForeignKey('PROJECT_CLIENT_ID', 'ProjectClientId', 'INTEGER', 'aranet_client', 'ID', false, null);

		$tMap->addColumn('PROJECT_COMMENTS', 'ProjectComments', 'LONGVARCHAR', false, null);

		$tMap->addForeignKey('PROJECT_CATEGORY_ID', 'ProjectCategoryId', 'INTEGER', 'aranet_project_category', 'ID', false, null);

		$tMap->addColumn('PROJECT_START_DATE', 'ProjectStartDate', 'DATE', false, null);

		$tMap->addColumn('PROJECT_FINISH_DATE', 'ProjectFinishDate', 'DATE', false, null);

		$tMap->addForeignKey('PROJECT_STATUS_ID', 'ProjectStatusId', 'INTEGER', 'aranet_project_status', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // ProjectMapBuilder

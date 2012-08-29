<?php



class ProjectMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProjectMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_project');
		$tMap->setPhpName('Project');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PROJECT_PREFIX', 'ProjectPrefix', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PROJECT_NUMBER', 'ProjectNumber', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('PROJECT_NAME', 'ProjectName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('PROJECT_URL', 'ProjectUrl', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('PROJECT_CLIENT_ID', 'ProjectClientId', 'int', CreoleTypes::INTEGER, 'aranet_client', 'ID', false, null);

		$tMap->addColumn('PROJECT_COMMENTS', 'ProjectComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('PROJECT_CATEGORY_ID', 'ProjectCategoryId', 'int', CreoleTypes::INTEGER, 'aranet_project_category', 'ID', false, null);

		$tMap->addColumn('PROJECT_START_DATE', 'ProjectStartDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PROJECT_FINISH_DATE', 'ProjectFinishDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('PROJECT_STATUS_ID', 'ProjectStatusId', 'int', CreoleTypes::INTEGER, 'aranet_project_status', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
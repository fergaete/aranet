<?php



class sfPropelFileStorageObjectMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageObjectMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_file_object');
		$tMap->setPhpName('sfPropelFileStorageObject');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FILE_OBJECT_ID', 'FileObjectId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE_OBJECT_CLASS', 'FileObjectClass', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addForeignKey('FILE_INFO_ID', 'FileInfoId', 'int', CreoleTypes::INTEGER, 'sf_file_info', 'FILE_ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

	} 
} 
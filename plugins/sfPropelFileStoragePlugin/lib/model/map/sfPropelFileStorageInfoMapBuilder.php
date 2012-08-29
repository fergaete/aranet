<?php



class sfPropelFileStorageInfoMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageInfoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_file_info');
		$tMap->setPhpName('sfPropelFileStorageInfo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FILE_ID', 'FileId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FILE_NAME', 'FileName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILE_TITLE', 'FileTitle', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILE_SIZE', 'FileSize', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE_MIME_TYPE', 'FileMimeType', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FILE_WIDTH', 'FileWidth', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE_HEIGHT', 'FileHeight', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FILE_IS_CACHED', 'FileIsCached', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user_profile', 'USER_ID', false, null);

	} 
} 
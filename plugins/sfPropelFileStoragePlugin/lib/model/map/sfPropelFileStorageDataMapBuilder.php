<?php



class sfPropelFileStorageDataMapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageDataMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_file_data');
		$tMap->setPhpName('sfPropelFileStorageData');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FILE_DATA_ID', 'FileDataId', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FILE_BINARY_DATA', 'FileBinaryData', 'string', CreoleTypes::BLOB, false, null);

		$tMap->addForeignKey('FILE_INFO_ID', 'FileInfoId', 'int', CreoleTypes::INTEGER, 'sf_file_info', 'FILE_ID', false, null);

	} 
} 
<?php


/**
 * This class adds structure of 'sf_file_info' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfPropelFileStoragePlugin.lib.model.map
 */
class sfPropelFileStorageInfoMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageInfoMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(sfPropelFileStorageInfoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfPropelFileStorageInfoPeer::TABLE_NAME);
		$tMap->setPhpName('sfPropelFileStorageInfo');
		$tMap->setClassname('sfPropelFileStorageInfo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FILE_ID', 'FileId', 'INTEGER', true, null);

		$tMap->addColumn('FILE_NAME', 'FileName', 'VARCHAR', false, 255);

		$tMap->addColumn('FILE_TITLE', 'FileTitle', 'VARCHAR', false, 255);

		$tMap->addColumn('FILE_SIZE', 'FileSize', 'INTEGER', false, null);

		$tMap->addColumn('FILE_MIME_TYPE', 'FileMimeType', 'VARCHAR', false, 100);

		$tMap->addColumn('FILE_WIDTH', 'FileWidth', 'INTEGER', false, null);

		$tMap->addColumn('FILE_HEIGHT', 'FileHeight', 'INTEGER', false, null);

		$tMap->addColumn('FILE_IS_CACHED', 'FileIsCached', 'BOOLEAN', false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

	} // doBuild()

} // sfPropelFileStorageInfoMapBuilder

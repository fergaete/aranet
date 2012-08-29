<?php


/**
 * This class adds structure of 'sf_file_object' table to 'propel' DatabaseMap object.
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
class sfPropelFileStorageObjectMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageObjectMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(sfPropelFileStorageObjectPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfPropelFileStorageObjectPeer::TABLE_NAME);
		$tMap->setPhpName('sfPropelFileStorageObject');
		$tMap->setClassname('sfPropelFileStorageObject');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('FILE_OBJECT_ID', 'FileObjectId', 'INTEGER', false, null);

		$tMap->addColumn('FILE_OBJECT_CLASS', 'FileObjectClass', 'VARCHAR', false, 64);

		$tMap->addForeignKey('FILE_INFO_ID', 'FileInfoId', 'INTEGER', 'sf_file_info', 'FILE_ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user_profile', 'USER_ID', false, null);

	} // doBuild()

} // sfPropelFileStorageObjectMapBuilder

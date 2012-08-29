<?php


/**
 * This class adds structure of 'sf_file_data' table to 'propel' DatabaseMap object.
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
class sfPropelFileStorageDataMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfPropelFileStoragePlugin.lib.model.map.sfPropelFileStorageDataMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(sfPropelFileStorageDataPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfPropelFileStorageDataPeer::TABLE_NAME);
		$tMap->setPhpName('sfPropelFileStorageData');
		$tMap->setClassname('sfPropelFileStorageData');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('FILE_DATA_ID', 'FileDataId', 'INTEGER', true, null);

		$tMap->addColumn('FILE_BINARY_DATA', 'FileBinaryData', 'BLOB', false, null);

		$tMap->addForeignKey('FILE_INFO_ID', 'FileInfoId', 'INTEGER', 'sf_file_info', 'FILE_ID', false, null);

	} // doBuild()

} // sfPropelFileStorageDataMapBuilder

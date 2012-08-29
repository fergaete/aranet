<?php



class sfAuditMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.sfPropelAuditPlugin.lib.model.map.sfAuditMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(sfAuditPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfAuditPeer::TABLE_NAME);
		$tMap->setPhpName('sfAudit');
		$tMap->setClassname('sfAudit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'ID', 'INTEGER', true, null);

		$tMap->addColumn('REMOTE_IP_ADDRESS', 'RemoteIpAddress', 'VARCHAR', false, 255);

		$tMap->addColumn('OBJECT', 'Object', 'VARCHAR', false, 255);

		$tMap->addColumn('OBJECT_KEY', 'ObjectKey', 'VARCHAR', false, 255);

		$tMap->addColumn('OBJECT_CHANGES', 'ObjectChanges', 'LONGVARCHAR', false, null);

		$tMap->addColumn('QUERY', 'Query', 'LONGVARCHAR', false, null);

		$tMap->addColumn('USER', 'User', 'VARCHAR', false, 255);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

	} 
} 
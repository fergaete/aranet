<?php



class ClientMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ClientMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_client');
		$tMap->setPhpName('Client');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CLIENT_UNIQUE_NAME', 'ClientUniqueName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CLIENT_COMPANY_NAME', 'ClientCompanyName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CLIENT_CIF', 'ClientCif', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addForeignKey('CLIENT_KIND_OF_COMPANY_ID', 'ClientKindOfCompanyId', 'int', CreoleTypes::INTEGER, 'aranet_kind_of_company', 'ID', false, null);

		$tMap->addColumn('CLIENT_SINCE', 'ClientSince', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CLIENT_WEBSITE', 'ClientWebsite', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CLIENT_COMMENTS', 'ClientComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CLIENT_HAS_TAGS', 'ClientHasTags', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
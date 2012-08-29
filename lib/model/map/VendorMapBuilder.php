<?php



class VendorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.VendorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_vendor');
		$tMap->setPhpName('Vendor');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('VENDOR_UNIQUE_NAME', 'VendorUniqueName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('VENDOR_COMPANY_NAME', 'VendorCompanyName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('VENDOR_CIF', 'VendorCif', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addForeignKey('VENDOR_KIND_OF_COMPANY_ID', 'VendorKindOfCompanyId', 'int', CreoleTypes::INTEGER, 'aranet_kind_of_company', 'ID', false, null);

		$tMap->addColumn('VENDOR_SINCE', 'VendorSince', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('VENDOR_WEBSITE', 'VendorWebsite', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('VENDOR_COMMENTS', 'VendorComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('VENDOR_HAS_TAGS', 'VendorHasTags', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
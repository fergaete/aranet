<?php



class KindOfInvoiceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.KindOfInvoiceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_kind_of_invoice');
		$tMap->setPhpName('KindOfInvoice');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('KIND_OF_INVOICE_TITLE', 'KindOfInvoiceTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
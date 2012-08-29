<?php



class TypeOfInvoiceItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TypeOfInvoiceItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_type_of_invoice_item');
		$tMap->setPhpName('TypeOfInvoiceItem');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE_OF_ITEM_TITLE', 'TypeOfItemTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
<?php



class InvoiceItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InvoiceItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_invoice_item');
		$tMap->setPhpName('InvoiceItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ITEM_TYPE_ID', 'ItemTypeId', 'int', CreoleTypes::INTEGER, 'aranet_type_of_invoice_item', 'ID', false, null);

		$tMap->addColumn('ITEM_DESCRIPTION', 'ItemDescription', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('ITEM_QUANTITY', 'ItemQuantity', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('ITEM_COST', 'ItemCost', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('ITEM_TAX_RATE', 'ItemTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('ITEM_INVOICE_ID', 'ItemInvoiceId', 'int', CreoleTypes::INTEGER, 'aranet_invoice', 'ID', false, null);

	} 
} 
<?php



class PaymentMethodMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PaymentMethodMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_payment_method');
		$tMap->setPhpName('PaymentMethod');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PAYMENT_METHOD_TITLE', 'PaymentMethodTitle', 'string', CreoleTypes::VARCHAR, false, 128);

	} 
} 
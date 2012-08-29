<?php



class PaymentStatusMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PaymentStatusMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_payment_status');
		$tMap->setPhpName('PaymentStatus');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PAYMENT_STATUS_TITLE', 'PaymentStatusTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
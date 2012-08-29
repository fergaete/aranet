<?php



class PaymentConditionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PaymentConditionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_payment_condition');
		$tMap->setPhpName('PaymentCondition');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PAYMENT_CONDITION_DAYS', 'PaymentConditionDays', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PAYMENT_CONDITION_PAYMENT_DAY', 'PaymentConditionPaymentDay', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PAYMENT_CONDITION_TITLE', 'PaymentConditionTitle', 'string', CreoleTypes::VARCHAR, false, 64);

	} 
} 
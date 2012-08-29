<?php



class CashItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CashItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_cash_item');
		$tMap->setPhpName('CashItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CASH_ITEM_NAME', 'CashItemName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CASH_ITEM_COMMENTS', 'CashItemComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CASH_ITEM_DATE', 'CashItemDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CASH_ITEM_AMOUNT', 'CashItemAmount', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
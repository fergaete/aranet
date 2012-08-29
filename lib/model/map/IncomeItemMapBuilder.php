<?php



class IncomeItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IncomeItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_income_item');
		$tMap->setPhpName('IncomeItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('INCOME_ITEM_NAME', 'IncomeItemName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('INCOME_ITEM_COMMENTS', 'IncomeItemComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INCOME_DATE', 'IncomeDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('INCOME_ITEM_CATEGORY_ID', 'IncomeItemCategoryId', 'int', CreoleTypes::INTEGER, 'aranet_income_category', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_PAYMENT_METHOD_ID', 'IncomeItemPaymentMethodId', 'int', CreoleTypes::INTEGER, 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('INCOME_ITEM_PAYMENT_CHECK', 'IncomeItemPaymentCheck', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addForeignKey('INCOME_ITEM_REIMBURSEMENT_ID', 'IncomeItemReimbursementId', 'int', CreoleTypes::INTEGER, 'aranet_reimbursement', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_PROJECT_ID', 'IncomeItemProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('INCOME_ITEM_BUDGET_ID', 'IncomeItemBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('INCOME_ITEM_AMOUNT', 'IncomeItemAmount', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('INCOME_ITEM_BASE', 'IncomeItemBase', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('INCOME_ITEM_TAX_RATE', 'IncomeItemTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('INCOME_ITEM_IRPF', 'IncomeItemIrpf', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('INCOME_ITEM_INVOICE_NUMBER', 'IncomeItemInvoiceNumber', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addForeignKey('INCOME_ITEM_VENDOR_ID', 'IncomeItemVendorId', 'int', CreoleTypes::INTEGER, 'aranet_vendor', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
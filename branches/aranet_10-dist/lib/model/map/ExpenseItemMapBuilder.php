<?php



class ExpenseItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ExpenseItemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_expense_item');
		$tMap->setPhpName('ExpenseItem');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('EXPENSE_ITEM_NAME', 'ExpenseItemName', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('EXPENSE_ITEM_COMMENTS', 'ExpenseItemComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('EXPENSE_PURCHASE_DATE', 'ExpensePurchaseDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('EXPENSE_PURCHASE_BY', 'ExpensePurchaseBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignKey('EXPENSE_ITEM_CATEGORY_ID', 'ExpenseItemCategoryId', 'int', CreoleTypes::INTEGER, 'aranet_expense_category', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_PAYMENT_METHOD_ID', 'ExpenseItemPaymentMethodId', 'int', CreoleTypes::INTEGER, 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('EXPENSE_ITEM_PAYMENT_CHECK', 'ExpenseItemPaymentCheck', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addForeignKey('EXPENSE_ITEM_REIMBURSEMENT_ID', 'ExpenseItemReimbursementId', 'int', CreoleTypes::INTEGER, 'aranet_reimbursement', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_PROJECT_ID', 'ExpenseItemProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('EXPENSE_ITEM_BUDGET_ID', 'ExpenseItemBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addColumn('EXPENSE_ITEM_AMOUNT', 'ExpenseItemAmount', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('EXPENSE_ITEM_BASE', 'ExpenseItemBase', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('EXPENSE_ITEM_TAX_RATE', 'ExpenseItemTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('EXPENSE_ITEM_IRPF', 'ExpenseItemIrpf', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('EXPENSE_ITEM_INVOICE_NUMBER', 'ExpenseItemInvoiceNumber', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addForeignKey('EXPENSE_ITEM_VENDOR_ID', 'ExpenseItemVendorId', 'int', CreoleTypes::INTEGER, 'aranet_vendor', 'ID', false, null);

		$tMap->addColumn('EXPENSE_VALIDATE_DATE', 'ExpenseValidateDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('EXPENSE_VALIDATE_BY', 'ExpenseValidateBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
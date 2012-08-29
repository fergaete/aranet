<?php



class InvoiceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InvoiceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_invoice');
		$tMap->setPhpName('Invoice');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('INVOICE_PREFIX', 'InvoicePrefix', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('INVOICE_NUMBER', 'InvoiceNumber', 'string', CreoleTypes::VARCHAR, true, 11);

		$tMap->addColumn('INVOICE_DATE', 'InvoiceDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('INVOICE_CLIENT_ID', 'InvoiceClientId', 'int', CreoleTypes::INTEGER, 'aranet_client', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_PROJECT_ID', 'InvoiceProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_BUDGET_ID', 'InvoiceBudgetId', 'int', CreoleTypes::INTEGER, 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_CATEGORY_ID', 'InvoiceCategoryId', 'int', CreoleTypes::INTEGER, 'aranet_invoice_category', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_KIND_OF_INVOICE_ID', 'InvoiceKindOfInvoiceId', 'int', CreoleTypes::INTEGER, 'aranet_kind_of_invoice', 'ID', true, null);

		$tMap->addColumn('INVOICE_TITLE', 'InvoiceTitle', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('INVOICE_COMMENTS', 'InvoiceComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('INVOICE_PRINT_COMMENTS', 'InvoicePrintComments', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('INVOICE_TAX_RATE', 'InvoiceTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('INVOICE_FREIGHT_CHARGE', 'InvoiceFreightCharge', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_CONDITION_ID', 'InvoicePaymentConditionId', 'int', CreoleTypes::INTEGER, 'aranet_payment_condition', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_METHOD_ID', 'InvoicePaymentMethodId', 'int', CreoleTypes::INTEGER, 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('INVOICE_PAYMENT_CHECK', 'InvoicePaymentCheck', 'string', CreoleTypes::VARCHAR, false, 64);

		$tMap->addColumn('INVOICE_PAYMENT_DATE', 'InvoicePaymentDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_STATUS_ID', 'InvoicePaymentStatusId', 'int', CreoleTypes::INTEGER, 'aranet_payment_status', 'ID', false, null);

		$tMap->addColumn('INVOICE_LATE_FEE_PERCENT', 'InvoiceLateFeePercent', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('INVOICE_TOTAL_AMOUNT', 'InvoiceTotalAmount', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
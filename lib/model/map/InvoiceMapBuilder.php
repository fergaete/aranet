<?php


/**
 * This class adds structure of 'aranet_invoice' table to 'propel' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class InvoiceMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.InvoiceMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(InvoicePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(InvoicePeer::TABLE_NAME);
		$tMap->setPhpName('Invoice');
		$tMap->setClassname('Invoice');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('INVOICE_PREFIX', 'InvoicePrefix', 'VARCHAR', false, 8);

		$tMap->addColumn('INVOICE_NUMBER', 'InvoiceNumber', 'VARCHAR', true, 11);

		$tMap->addColumn('INVOICE_DATE', 'InvoiceDate', 'DATE', true, null);

		$tMap->addForeignKey('INVOICE_CLIENT_ID', 'InvoiceClientId', 'INTEGER', 'aranet_client', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_PROJECT_ID', 'InvoiceProjectId', 'INTEGER', 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_BUDGET_ID', 'InvoiceBudgetId', 'INTEGER', 'aranet_budget', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_CATEGORY_ID', 'InvoiceCategoryId', 'INTEGER', 'aranet_invoice_category', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_KIND_OF_INVOICE_ID', 'InvoiceKindOfInvoiceId', 'INTEGER', 'aranet_kind_of_invoice', 'ID', true, null);

		$tMap->addColumn('INVOICE_TITLE', 'InvoiceTitle', 'VARCHAR', false, 255);

		$tMap->addColumn('INVOICE_COMMENTS', 'InvoiceComments', 'LONGVARCHAR', false, null);

		$tMap->addColumn('INVOICE_PRINT_COMMENTS', 'InvoicePrintComments', 'BOOLEAN', false, 1);

		$tMap->addColumn('INVOICE_TAX_RATE', 'InvoiceTaxRate', 'FLOAT', false, null);

		$tMap->addColumn('INVOICE_FREIGHT_CHARGE', 'InvoiceFreightCharge', 'FLOAT', false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_CONDITION_ID', 'InvoicePaymentConditionId', 'INTEGER', 'aranet_payment_condition', 'ID', false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_METHOD_ID', 'InvoicePaymentMethodId', 'INTEGER', 'aranet_payment_method', 'ID', false, null);

		$tMap->addColumn('INVOICE_PAYMENT_CHECK', 'InvoicePaymentCheck', 'VARCHAR', false, 64);

		$tMap->addColumn('INVOICE_PAYMENT_DATE', 'InvoicePaymentDate', 'DATE', false, null);

		$tMap->addForeignKey('INVOICE_PAYMENT_STATUS_ID', 'InvoicePaymentStatusId', 'INTEGER', 'aranet_payment_status', 'ID', false, null);

		$tMap->addColumn('INVOICE_LATE_FEE_PERCENT', 'InvoiceLateFeePercent', 'FLOAT', false, null);

		$tMap->addColumn('INVOICE_TOTAL_AMOUNT', 'InvoiceTotalAmount', 'DOUBLE', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null);

	} // doBuild()

} // InvoiceMapBuilder

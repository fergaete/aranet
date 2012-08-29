<?php



class BudgetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BudgetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aranet_budget');
		$tMap->setPhpName('Budget');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BUDGET_PREFIX', 'BudgetPrefix', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('BUDGET_NUMBER', 'BudgetNumber', 'string', CreoleTypes::VARCHAR, true, 11);

		$tMap->addColumn('BUDGET_REVISION', 'BudgetRevision', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('BUDGET_DATE', 'BudgetDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('BUDGET_VALID_DATE', 'BudgetValidDate', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('BUDGET_APPROVED_DATE', 'BudgetApprovedDate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('BUDGET_CLIENT_ID', 'BudgetClientId', 'int', CreoleTypes::INTEGER, 'aranet_client', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_PROJECT_ID', 'BudgetProjectId', 'int', CreoleTypes::INTEGER, 'aranet_project', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_CATEGORY_ID', 'BudgetCategoryId', 'int', CreoleTypes::INTEGER, 'aranet_invoice_category', 'ID', false, null);

		$tMap->addColumn('BUDGET_TITLE', 'BudgetTitle', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('BUDGET_COMMENTS', 'BudgetComments', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('BUDGET_PRINT_COMMENTS', 'BudgetPrintComments', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('BUDGET_TAX_RATE', 'BudgetTaxRate', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('BUDGET_FREIGHT_CHARGE', 'BudgetFreightCharge', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('BUDGET_TOTAL_COST', 'BudgetTotalCost', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('BUDGET_TOTAL_AMOUNT', 'BudgetTotalAmount', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addForeignKey('BUDGET_PAYMENT_CONDITION_ID', 'BudgetPaymentConditionId', 'int', CreoleTypes::INTEGER, 'aranet_payment_condition', 'ID', false, null);

		$tMap->addForeignKey('BUDGET_STATUS_ID', 'BudgetStatusId', 'int', CreoleTypes::INTEGER, 'aranet_budget_status', 'ID', false, null);

		$tMap->addColumn('BUDGET_IS_LAST', 'BudgetIsLast', 'boolean', CreoleTypes::BOOLEAN, false, 1);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('DELETED_AT', 'DeletedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('DELETED_BY', 'DeletedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 
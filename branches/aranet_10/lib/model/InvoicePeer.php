<?php

/**
 * Subclass for performing query and update operations on the 'aranet_invoice' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: InvoicePeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class InvoicePeer extends BaseInvoicePeer
{
  
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'InvoicePrefix', 'InvoiceNumber', 'InvoiceDate', 'InvoiceClientId', 'InvoiceProjectId', 'InvoiceBudgetId', 'InvoiceCategoryId', 'InvoiceKindOfInvoiceId', 'InvoiceTitle', 'InvoiceComments', 'InvoicePrintComments', 'InvoiceTaxRate', 'InvoiceFreightCharge', 'InvoicePaymentConditionId', 'InvoicePaymentMethodId', 'InvoicePaymentCheck', 'InvoicePaymentDate', 'InvoicePaymentStatusId', 'InvoiceLateFeePercent', 'InvoiceTotalAmount', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'DeletedAt', 'DeletedBy', 'InvoiceFullNumber',),
		BasePeer::TYPE_COLNAME => array (InvoicePeer::ID, InvoicePeer::INVOICE_PREFIX, InvoicePeer::INVOICE_NUMBER, InvoicePeer::INVOICE_DATE, InvoicePeer::INVOICE_CLIENT_ID, InvoicePeer::INVOICE_PROJECT_ID, InvoicePeer::INVOICE_BUDGET_ID, InvoicePeer::INVOICE_CATEGORY_ID, InvoicePeer::INVOICE_KIND_OF_INVOICE_ID, InvoicePeer::INVOICE_TITLE, InvoicePeer::INVOICE_COMMENTS, InvoicePeer::INVOICE_PRINT_COMMENTS, InvoicePeer::INVOICE_TAX_RATE, InvoicePeer::INVOICE_FREIGHT_CHARGE, InvoicePeer::INVOICE_PAYMENT_CONDITION_ID, InvoicePeer::INVOICE_PAYMENT_METHOD_ID, InvoicePeer::INVOICE_PAYMENT_CHECK, InvoicePeer::INVOICE_PAYMENT_DATE, InvoicePeer::INVOICE_PAYMENT_STATUS_ID, InvoicePeer::INVOICE_LATE_FEE_PERCENT, InvoicePeer::INVOICE_TOTAL_AMOUNT, InvoicePeer::CREATED_AT, InvoicePeer::CREATED_BY, InvoicePeer::UPDATED_AT, InvoicePeer::UPDATED_BY, InvoicePeer::DELETED_AT, InvoicePeer::DELETED_BY, InvoicePeer::INVOICE_FULL_NUMBER, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'invoice_prefix', 'invoice_number', 'invoice_date', 'invoice_client_id', 'invoice_project_id', 'invoice_budget_id', 'invoice_category_id', 'invoice_kind_of_invoice_id', 'invoice_title', 'invoice_comments', 'invoice_print_comments', 'invoice_tax_rate', 'invoice_freight_charge', 'invoice_payment_condition_id', 'invoice_payment_method_id', 'invoice_payment_check', 'invoice_payment_date', 'invoice_payment_status_id', 'invoice_late_fee_percent', 'invoice_total_amount', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'invoice_full_number', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);
  	
	public static function alias($alias, $column)
	{
		return str_replace(InvoicePeer::TABLE_NAME, $alias, $column);
	}
	
	public static function retrieveNextNumber($prefix = null) {
	    $c = new Criteria();
	    if ($prefix) {
            $c->add(InvoicePeer::INVOICE_PREFIX, $prefix);
	    }
	    $c->addDescendingOrderByColumn(InvoicePeer::INVOICE_DATE);
        $invoice = self::doSelectOne($c);
        if ($invoice) {
            return sprintf(INVOICE_NUMBER_FORMAT, $invoice->getInvoiceNumber()+1);
        } else {
            return sprintf(INVOICE_NUMBER_FORMAT, INVOICE_FIST_NUMBER);
        }
	}

}

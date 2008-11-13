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

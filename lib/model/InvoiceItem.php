<?php

/**
 * Subclass for representing a row from the 'aranet_invoice_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: InvoiceItem.php 3 2008-08-06 07:48:19Z pablo $
 */

class InvoiceItem extends BaseInvoiceItem
{
    public function postSave($v) {
        // Update invoice
        $v->getInvoice()->save();
    }

    public function postDelete($v) {
        // Update invoice
        $v->getInvoice()->save();
    }

}
sfMixer::register('BaseInvoiceItem:delete:post', array('InvoiceItem', 'postDelete'));
sfMixer::register('BaseInvoiceItem:save:post', array('InvoiceItem', 'postSave'));
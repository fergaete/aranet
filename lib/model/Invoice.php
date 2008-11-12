<?php

/**
 * Subclass for representing a row from the 'aranet_invoice' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Invoice.php 3 2008-08-06 07:48:19Z pablo $
 */

class Invoice extends BaseInvoice
{

    public function __toString() {
        return $this->getInvoicePrefix() . $this->getInvoiceNumber();
    }

    // update invoice
    private function updateInvoice($con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BudgetPeer::DATABASE_NAME);
        }
        //Update invoice stats
        $amount = 0;
        $c = new Criteria();
        $c->add(InvoiceItemPeer::ITEM_INVOICE_ID, $this->getId());
        $rs = InvoiceItemPeer::doSelectRS($c);
        while ($rs->next()) {
            $amount += ($rs->getString(4) * $rs->getString(5));
        }
        $this->setInvoiceTotalAmount($amount);
    }

    public function copyFrom($object)
    {
        if ($object instanceof Budget) {
            $c = new Criteria();
            $c->addDescendingOrderByColumn(InvoicePeer::INVOICE_DATE);
            $invoice = InvoicePeer::doSelectOne($c);
            if ($invoice) {
                $this->setInvoiceNumber(sprintf(INVOICE_NUMBER_FORMAT, $invoice->getInvoiceNumber()+1));
            } else {
                $this->setInvoiceNumber(sprintf(INVOICE_NUMBER_FORMAT, INVOICE_FIRST_NUMBER));
            }
            $this->setInvoiceDate(date('Y-m-d'));
            $this->setInvoiceClientId($object->getBudgetClientId());
            $this->setInvoiceProjectId($object->getBudgetProjectId());
            $this->setInvoiceBudgetId($object->getId());
            $this->setInvoiceCategoryId($object->getBudgetCategoryId());
            $this->setInvoiceTitle($object->getBudgetTitle());
            $this->setInvoiceComments($object->getBudgetComments());
            $this->setInvoicePrintComments($object->getBudgetPrintComments());
            $this->setInvoiceTaxRate($object->getBudgetTaxRate());
            $this->setInvoiceFreightCharge($object->getBudgetFreightCharge());
            $this->setInvoicePaymentConditionId($object->getBudgetPaymentConditionId());
            //TODO: Move contact
            
            $this->initInvoiceItems();
            foreach ($object->getBudgetItems() as $item) {
                if (!$item->getItemIsOptional()) {
                    $new_item = new InvoiceItem();
                    $new_item->setItemTypeId($item->getItemTypeId());
                    $new_item->setItemDescription($item->getItemDescription());
                    $new_item->setItemQuantity($item->getItemQuantity());
                    $new_item->setItemCost($item->getItemRetailPrice());
                    $new_item->setItemTaxRate($item->getItemTaxRate());
                    $this->addInvoiceItem($new_item);
                }
            }
        }
    }

    public function postSave($v) {
        if ($v->collObjectContacts) {
            foreach($v->collObjectContacts as $ocontact) {
                $ocontact->setObjectcontactObjectId($v->getId());
                $ocontact->save();
            }
            if ($v->getInvoiceProjectId()) {
                foreach($v->collContacts as $contact) {
                    // Save to project
                    $contact->saveTo('Project', $v->getInvoiceProjectId(), $contact->getContactRol());
                }
            }
            if ($v->getInvoiceClientId()) {
                foreach($v->collContacts as $contact) {
                    // Save to client
                    $contact->saveTo('Client', $v->getInvoiceClientId(), $contact->getContactRol());
                }
            }
        }

    }

    public function preSave($v) {
        $v->updateInvoice();
    }

}
sfMixer::register('BaseInvoice:save:pre', array('Invoice', 'preSave'));
sfMixer::register('BaseInvoice:delete:post', array('Invoice', 'postDelete'));
sfMixer::register('BaseInvoice:save:post', array('Invoice', 'postSave'));

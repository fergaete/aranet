<?php

/**
 * Subclass for representing a row from the 'aranet_kind_of_invoice' table.
 *
 * 
 *
 * @package lib.model
 */ 
class KindOfInvoice extends BaseKindOfInvoice
{
    public function __toString() {
        return $this->getKindOfInvoiceTitle();
    }
}

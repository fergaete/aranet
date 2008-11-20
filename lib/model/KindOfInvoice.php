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
  
  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getKindOfInvoiceTitle();
  }
}

<?php

/**
 * Subclass for representing a row from the 'aranet_invoice_category' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class InvoiceCategory extends BaseInvoiceCategory
{
    /**
     * returns a string that represent the object
     *
     * @return string
     * @author Pablo Sánchez <pablo.sanchez@aranova.es>
     */
    public function __toString() {
        return $this->getCategoryTitle();
    }
}

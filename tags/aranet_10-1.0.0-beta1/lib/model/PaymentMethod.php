<?php

/**
 * Subclass for representing a row from the 'aranet_payment_method' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: PaymentMethod.php 3 2008-08-06 07:48:19Z pablo $
 */

class PaymentMethod extends BasePaymentMethod
{
    public function __toString() {
        return $this->getPaymentMethodTitle();
    }
}

<?php

/**
 * Subclass for representing a row from the 'aranet_payment_condition' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: PaymentCondition.php 3 2008-08-06 07:48:19Z pablo $
 */

class PaymentCondition extends BasePaymentCondition
{
    public function __toString() {
        return $this->getPaymentConditionTitle();
    }
}

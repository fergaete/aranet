<?php

/**
 * Subclass for representing a row from the 'aranet_payment_condition' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class PaymentCondition extends BasePaymentCondition
{
    /**
     * returns a string that represent the object
     *
     * @return string
     * @author Pablo Sánchez <pablo.sanchez@aranova.es>
     */
    public function __toString() {
        return $this->getPaymentConditionTitle();
    }
}

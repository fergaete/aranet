<?php

/**
 * Subclass for representing a row from the 'aranet_cash_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: CashItem.php 3 2008-08-06 07:48:19Z pablo $
 */

class CashItem extends BaseCashItem
{
    public function __toString() {
        return $this->getCashItemName();
    }
}

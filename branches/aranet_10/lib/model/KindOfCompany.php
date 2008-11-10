<?php

/**
 * Subclass for representing a row from the 'aranet_kind_of_company' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: KindOfCompany.php 3 2008-08-06 07:48:19Z pablo $
 */

class KindOfCompany extends BaseKindOfCompany
{
    public function __toString() {
        return $this->getKindOfCompanyTitle();
    }
}

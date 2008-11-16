<?php

/**
 * Subclass for representing a row from the 'aranet_kind_of_company' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class KindOfCompany extends BaseKindOfCompany
{

    public function __construct()
	  {
			  parent::__construct();
	  }

    public function __toString() {
        return $this->getKindOfCompanyTitle();
    }
}

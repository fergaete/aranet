<?php

/**
 * Subclass for representing a row from the 'aranet_reimbursement' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Reimbursement.php 3 2008-08-06 07:48:19Z pablo $
 */

class Reimbursement extends BaseReimbursement
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getReimbursementTitle();
  }
}

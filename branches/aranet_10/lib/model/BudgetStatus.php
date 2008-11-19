<?php

/**
 * Subclass for representing a row from the 'aranet_budget_status' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: BudgetStatus.php 3 2008-08-06 07:48:19Z pablo $
 */

class BudgetStatus extends BaseBudgetStatus
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getBudgetStatusTitle();
  }
}

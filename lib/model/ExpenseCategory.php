<?php

/**
 * Subclass for representing a row from the 'aranet_expense_category' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ExpenseCategory.php 3 2008-08-06 07:48:19Z pablo $
 */

class ExpenseCategory extends BaseExpenseCategory
{
  
  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getCategoryTitle();
  }
}

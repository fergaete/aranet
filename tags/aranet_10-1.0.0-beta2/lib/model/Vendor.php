<?php

/**
 * Subclass for representing a row from the 'aranet_vendor' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Vendor.php 3 2008-08-06 07:48:19Z pablo $
 */

class Vendor extends BaseVendor
{

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getVendorUniqueName();
  }

  /**
   * returns full vendor name
   *
   * @param  boolean $include_span
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullName($include_span = true) {
    $span_open_tag = $include_span ? '<span class="informal"> (' : ' (';
    $span_close_tag = $include_span ? ')</span>' : ')';
    return ($this->getVendorUniqueName() != $this->getVendorCompanyName()) ? $this->getVendorUniqueName() . $span_open_tag . $this->getVendorCompanyName() . $span_close_tag : $this->getVendorUniqueName();
  }

  /**
   * returns expense items ordered by date
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getExpenseItemsOrderedByDate()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(ExpenseItemPeer::EXPENSE_PURCHASE_DATE);
    return parent::getExpenseItemsJoinExpenseCategory($c);
  }

  /**
   * returns income items ordered by date
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getIncomeItemsOrderedByDate()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(IncomeItemPeer::INCOME_DATE);
    return parent::getIncomeItemsJoinIncomeCategory($c);
  }

  /**
   * preDelete process
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preDelete($v) {
    // First set null associated objects
    $c = new Criteria();
    $c->add(ExpenseItemPeer::EXPENSE_ITEM_VENDOR_ID, $v->getId());
    sfPropelParanoidBehavior::disable();
    $expenses = ExpenseItemPeer::doSelect($c);
    foreach ($expenses as $expense) {
      $expense->setExpenseItemVendorId(null);
      $expense->save();
    }
  }
}

sfMixer::register('BaseVendor:delete:post', array('Vendor', 'postDelete'));
sfMixer::register('BaseVendor:delete:pre', array('Vendor', 'preDelete'));
sfMixer::register('BaseVendor:save:post', array('Vendor', 'postSave'));
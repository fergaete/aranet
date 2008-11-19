<?php

/**
 * Subclass for representing a row from the 'aranet_budget_item' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: BudgetItem.php 3 2008-08-06 07:48:19Z pablo $
 */

class BudgetItem extends BaseBudgetItem
{

  /**
   * sets the margin rounding amounts
   *
   * @param  double $margin
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setItemMargin($margin) {
    sfLoader::loadHelpers('NumberExtended');
    parent::setItemMargin(round_amount($margin));
    if ($this->getItemCost() && !$this->getItemRetailPrice()) {
      // Calculate retail
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemRetailPrice(round_amount($this->getItemCost() * (100 + $this->getItemMargin()) / 100));
      } else {
        // Margen sobre ventas
        parent::setItemRetailPrice(round_amount($this->getItemCost() / (100 - $this->getItemMargin()) * 100));
      }
    }
    elseif ($this->getItemRetailPrice()) {
      // Calculate cost
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemCost(round_amount($this->getItemRetailPrice() / (100 + $this->getItemMargin()) * 100));
      } else {
        // Margen sobre ventas
        parent::setItemCost(round_amount($this->getItemRetailPrice() * (100 - $this->getItemMargin()) / 100));
      }
    }
  }

  /**
   * sets the cost rounding amounts
   *
   * @param  double $margin
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setItemCost($cost) {
    sfLoader::loadHelpers('NumberExtended');
    parent::setItemCost(round_amount($cost));
    if ($this->getItemMargin() && !$this->getItemRetailPrice()) {
      // Calculate retail
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemRetailPrice(round_amount($this->getItemCost() * (100 + $this->getItemMargin()) / 100));
      } else {
        // Margen sobre ventas
        parent::setItemRetailPrice(round_amount($this->getItemCost() / (100 - $this->getItemMargin()) * 100));
      }
    }
    elseif ($this->getItemRetailPrice()) {
      // Calculate or recalculate margin
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemMargin(round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemCost()*100));
      } else {
        // Margen sobre ventas
        parent::setItemMargin(round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemRetailPrice()*100));
      }
    }

  }

  /**
   * sets the retail price rounding amounts
   *
   * @param  double $margin
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setItemRetailPrice($price) {
    sfLoader::loadHelpers('NumberExtended');
    parent::setItemRetailPrice(round_amount($price));
    if (!$this->getItemCost() && $this->getItemMargin()) {
      // Calculate or recalculate margin
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemCost(round_amount($this->getItemRetailPrice() / (100 + $this->getItemMargin()) * 100));
      } else {
        // Margen sobre ventas
        parent::setItemCost(round_amount($this->getItemRetailPrice() * (100 - $this->getItemMargin()) / 100));
      }
    }
    elseif ($this->getItemCost()) { // Prioridad del coste sobre el margen
      // Calculate or recalculate margin
      if (MARGIN_MODEL == 'costs') {
        // Margen sobre costes
        parent::setItemMargin(round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemCost()*100));
      } else {
        // Margen sobre ventas
        parent::setItemMargin(round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemRetailPrice()*100));
      }
    }
  }
}

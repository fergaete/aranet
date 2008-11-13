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

    protected static function round_amount($amount, $decimals = 2, $div = 1) {
        $tempd = $amount/$div*pow(10,$decimals);
        $tempd1 = round($tempd);
        $amount = $tempd1/pow(10,$decimals);
        return $amount;
    }

    public function setItemMargin($margin) {
        parent::setItemMargin(self::round_amount($margin));
        if ($this->getItemCost() && !$this->getItemRetailPrice()) {
            // Calculate retail
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemRetailPrice(self::round_amount($this->getItemCost() * (100 + $this->getItemMargin()) / 100));
            } else {
                // Margen sobre ventas
                parent::setItemRetailPrice(self::round_amount($this->getItemCost() / (100 - $this->getItemMargin()) * 100));
            }
        }
        elseif ($this->getItemRetailPrice()) {
            // Calculate cost
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemCost(self::round_amount($this->getItemRetailPrice() / (100 + $this->getItemMargin()) * 100));
            } else {
                // Margen sobre ventas
                parent::setItemCost(self::round_amount($this->getItemRetailPrice() * (100 - $this->getItemMargin()) / 100));
            }
        }
    }

    public function setItemCost($cost) {
        parent::setItemCost(self::round_amount($cost));
        if ($this->getItemMargin() && !$this->getItemRetailPrice()) {
            // Calculate retail
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemRetailPrice(self::round_amount($this->getItemCost() * (100 + $this->getItemMargin()) / 100));
            } else {
                // Margen sobre ventas
                parent::setItemRetailPrice(self::round_amount($this->getItemCost() / (100 - $this->getItemMargin()) * 100));
            }
        }
        elseif ($this->getItemRetailPrice()) {
            // Calculate or recalculate margin
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemMargin(self::round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemCost()*100));
            } else {
                // Margen sobre ventas
                parent::setItemMargin(self::round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemRetailPrice()*100));
            }
        }

    }

    public function setItemRetailPrice($price) {
        parent::setItemRetailPrice(self::round_amount($price));
        if (!$this->getItemCost() && $this->getItemMargin()) {
            // Calculate or recalculate margin
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemCost(self::round_amount($this->getItemRetailPrice() / (100 + $this->getItemMargin()) * 100));
            } else {
                // Margen sobre ventas
                parent::setItemCost(self::round_amount($this->getItemRetailPrice() * (100 - $this->getItemMargin()) / 100));
            }
        }
        elseif ($this->getItemCost()) { // Prioridad del coste sobre el margen
            // Calculate or recalculate margin
            if (MARGIN_MODEL == 'costs') {
                // Margen sobre costes
                parent::setItemMargin(self::round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemCost()*100));
            } else {
                // Margen sobre ventas
                parent::setItemMargin(self::round_amount(($this->getItemRetailPrice() - $this->getItemCost()) / $this->getItemRetailPrice()*100));
            }
        }
    }

    public function postSave($v) {
        // Update budget
        //$v->getBudget()->save();
    }

    public function postDelete($v) {
        // Update budget
        //$v->getBudget()->save();
    }

}
//sfMixer::register('BaseBudgetItem:delete:post', array('BudgetItem', 'postDelete'));
//sfMixer::register('BaseBudgetItem:save:post', array('BudgetItem', 'postSave'));

<?php

/**
 * Subclass for performing query and update operations on the 'aranet_budget' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: BudgetPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class BudgetPeer extends BaseBudgetPeer
{

  /**
   * returns budgets like name
   *
   * @param string  $name
   * @param integer  $max
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getBudgetsLike($name, $max = 10)
  {
    $c = new Criteria();
    $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_NUMBER, "%${name}%", Criteria::LIKE);
    $criterion->addOr($c->getNewCriterion(BudgetPeer::BUDGET_TITLE, "%${name}%", Criteria::LIKE));
    $c->add($criterion);
    $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
    $c->setLimit($max);
    $budgets = BudgetPeer::doSelect($c);
    return $budgets;
  }
  
  /**
   * returns approved budgets
   *
   * @param  string $peer_method
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
   public static function getApprovedBudgets($peer_method='doSelect')
   {
      $c = new Criteria();
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->add(BudgetPeer::BUDGET_STATUS_ID, 3); // Aceptado
      $c->add(BudgetPeer::BUDGET_APPROVED_DATE, null, Criteria::ISNOTNULL);
      $c->add(BudgetPeer::DELETED_AT, null, Criteria::ISNULL);
      $c->addJoin(BudgetPeer::ID, InvoicePeer::INVOICE_BUDGET_ID, Criteria::LEFT_JOIN);
      $c->add(InvoicePeer::INVOICE_BUDGET_ID, null, Criteria::ISNULL);
      $c->add(InvoicePeer::DELETED_AT, null, Criteria::ISNULL);
      return call_user_func('BudgetPeer::'.$peer_method, $c);
   }

  /**
   * returns active budgets
   *
   * @param  string $peer_method
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
   public static function getActiveBudgets($peer_method='doSelect')
   {
      $c = new Criteria();
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->add(BudgetPeer::BUDGET_STATUS_ID, 2); // Enviado
      $c->add(BudgetPeer::BUDGET_APPROVED_DATE, null, Criteria::ISNULL);
      $c->add(BudgetPeer::DELETED_AT, null, Criteria::ISNULL);
      $c->add(BudgetPeer::BUDGET_VALID_DATE, time(), Criteria::GREATER_THAN);
      return call_user_func('BudgetPeer::'.$peer_method, $c);
   }

  /**
   * returns last caducated budgets
   *
   * @param  string $peer_method
   * @param  integer $max
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
   public static function getLastCaducatedBudgets($peer_method='doSelect', $max = 5)
   {
      $c = new Criteria();
      $c->setLimit($max);
      $c->addDescendingOrderByColumn(BudgetPeer::BUDGET_VALID_DATE);
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->add(BudgetPeer::BUDGET_STATUS_ID, 5); // Caducado
      $c->add(BudgetPeer::BUDGET_APPROVED_DATE, null, Criteria::ISNULL);
      $c->add(BudgetPeer::DELETED_AT, null, Criteria::ISNULL);
      return call_user_func('BudgetPeer::'.$peer_method, $c);
   }
}

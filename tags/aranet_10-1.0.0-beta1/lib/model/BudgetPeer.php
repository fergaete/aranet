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
}

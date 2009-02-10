<?php

/**
 * Subclass for representing a row from the 'aranet_client' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class Client extends BaseClient
{
    protected $_indicators = array();

    public function __construct()
	  {
			  parent::__construct();
	  }

    public function __toString() {
        return $this->getClientUniqueName();
    }

    public function setIndicator($ind)
    {
        $this->_indicators[$ind->getDefaultIndicator()->getIndicatorKey()] = $ind;
    }

    public function getIndicator($key)
    {
        return $this->_indicators[$key];
    }
    
    public function getInvoicesJoinPaymentStatusOrderByNumber($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->addAscendingOrderByColumn(InvoicePeer::INVOICE_NUMBER);
        $criteria->add(InvoicePeer::DELETED_AT, null, Criteria::ISNULL);
        return parent::getInvoicesJoinPaymentStatus($criteria);
    }

    public function getClientAverageMargin() {
//        return ($this->getClientTotalExpenses() || $this->getClientTotalCosts()) ? $this->getClientTotalInvoices()/($this->getClientTotalExpenses() + $this->getClientTotalCosts())*100-100 : 0;
        return 0;//($this->getClientTotalExpenses() || $this->getClientTotalCosts()) ? ($this->getClientTotalInvoices() - $this->getClientTotalExpenses() - $this->getClientTotalCosts())*100 / $this->getClientTotalInvoices() : 0;
    }

    public function getFullName($include_span = true) {
        $span_open_tag = $include_span ? '<span class="informal"> (' : ' (';
        $span_close_tag = $include_span ? ')</span>' : ')';
        return ($this->getClientUniqueName() != $this->getClientCompanyName()) ? $this->getClientUniqueName() . $span_open_tag . $this->getClientCompanyName() . $span_close_tag : $this->getClientUniqueName();
    }

    public function getBudgetsOrderedByDate($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
        $criteria->add(BudgetPeer::DELETED_AT, null, Criteria::ISNULL);
        return parent::getBudgetsJoinBudgetStatus($criteria);
    }

    public function getLastBudgetsOrderedByDate($criteria = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->add(BudgetPeer::BUDGET_IS_LAST, true);
        return $this->getBudgetsOrderedByDate($criteria);
    }

    public function preDelete($v) {
        // First set null associated objects
        $c = new Criteria();
        $c->add(ProjectPeer::PROJECT_CLIENT_ID, $v->getId());
        sfPropelParanoidBehavior::disable();
        $projects = ProjectPeer::doSelect($c);
        foreach ($projects as $project) {
            $project->setProjectClientId(null);
            $project->save();
        }
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_CLIENT_ID, $v->getId());
        sfPropelParanoidBehavior::disable();
        $budgets = BudgetPeer::doSelect($c);
        foreach ($budgets as $budget) {
            $budget->setBudgetClientId(null);
            $budget->save();
        }
    }

}

sfPropelBehavior::add('Client', array('audit', 'arPropelContactableBehavior', 'arPropelAddressableBehavior', 'sfPropelActAsTaggableBehavior', 'paranoid' => array('column' => 'deleted_at')));



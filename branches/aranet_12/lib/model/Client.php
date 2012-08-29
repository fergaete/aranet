<?php

/**
 * Subclass for representing a row from the 'aranet_client' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Client.php 3 2008-08-06 07:48:19Z pablo $
 */

class Client extends BaseClient
{
  
  /**
   * collection of indicators
   *
   * @var array
   **/
  protected $_indicators = array();

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getClientUniqueName();
  }

  /**
   * sets an indicator
   *
   * @param Indicator $ind  the indicator
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setIndicator($ind)
  {
    $this->_indicators[$ind->getDefaultIndicator()->getIndicatorKey()] = $ind;
  }

  /**
   * returns an indicator for given key if exists
   *
   * @param string $key
   * @return Indicator
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getIndicator($key)
  {
    return $this->_indicators[$key];
  }

  /**
   * returns related invoices
   *
   * @param Criteria  $criteria propel criteria
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * returns average margin
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getClientAverageMargin() {
    // TODO implement getClientAverageMargin
    return 0;//($this->getClientTotalExpenses() || $this->getClientTotalCosts()) ? $this->getClientTotalInvoices()/($this->getClientTotalExpenses() + $this->getClientTotalCosts())*100-100 : 0;
    return 0;//($this->getClientTotalExpenses() || $this->getClientTotalCosts()) ? ($this->getClientTotalInvoices() - $this->getClientTotalExpenses() - $this->getClientTotalCosts())*100 / $this->getClientTotalInvoices() : 0;
  }

  /**
   * returns a string that represent the object
   *
   * @param boolean  $include_span
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullName($include_span = true) {
    $span_open_tag = $include_span ? '<span class="informal"> (' : ' (';
    $span_close_tag = $include_span ? ')</span>' : ')';
    return ($this->getClientUniqueName() != $this->getClientCompanyName()) ? $this->getClientUniqueName() . $span_open_tag . $this->getClientCompanyName() . $span_close_tag : $this->getClientUniqueName();
  }

  /**
   * returns related budgets
   *
   * @param Criteria  $criteria propel criteria
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * returns last related budgets
   *
   * @param Criteria  $criteria propel criteria
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * preDelete function
   *
   * @param   Client  $v  the client to process
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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
         
#sfMixer::register('BaseClient:delete:post', array('Client', 'postDelete'));
#sfMixer::register('BaseClient:delete:pre', array('Client', 'preDelete'));
#sfMixer::register('BaseClient:save:post', array('Client', 'postSave'));

<?php

/**
 * income actions.
 *
 * @package    aranet
 * @subpackage income
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class incomeActions extends anActions
{

 /* returns expense_item from params
   *
   * @return ExpenseItem
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getIncomeItem()
  {
    if ($request->getParameter('id')) {
      $income_item = IncomeItemPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($income_item);
    } else {
      $income_item = new IncomeItem();
    }
    return $income_item;
  }

  /**
   * executes create action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate()
  {
    if (!$this->getUser()->getFlash('income_item')) {
      $this->income_item = $this->getIncomeItem();
    } else {
      $this->income_item = $this->getUser()->getFlash('income_item');
    }  
    if ($this->hasRequestParameter('id')) {
      // Copy items
      $new_income_item = new IncomeItem();
      $this->income_item->copyInto($new_income_item);
      $this->income_item = $new_income_item;
    }
    $this->setTemplate('edit');
    $this->budgets = array();
    if ($this->income_item->getIncomeItemProjectId()) {
      $project_id = $this->income_item->getIncomeItemProjectId();
    } else {
      $project_id = $request->getParameter('income_item_project_id');
    }
    $c = new Criteria();
    if ($project_id) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $project_id);
      $this->projects = ProjectPeer::doSelect(new Criteria());
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
    }
    return sfView::SUCCESS;
  }

  /**
   * executes edit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit()
  {
    $this->income_item = $this->getIncomeItem();
    if ($request->getParameter('id')) {
      $c = new Criteria();
      $this->projects = ProjectPeer::doSelect($c);
      if ($this->income_item->getIncomeItemProjectId()) {
        $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->income_item->getIncomeItemProjectId());
        $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
        $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
        $this->budgets = BudgetPeer::doSelect($c);
      }
    }
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $income_item = $this->getIncomeItem();
    if ($request->getParameter('income_item_vendor_id', -1) == -1) {
      $vendor = new Vendor();
      $vendor->setVendorCompanyName($request->getParameter('vendor_name'));
      $vendor->setVendorUniqueName($request->getParameter('vendor_name'));
      $vendor->save();
      $vendor_id = $vendor->getId();
    } else {
      $vendor_id = $request->getParameter('income_item_vendor_id');
    }
    $income_item->setIncomeItemVendorId($vendor_id);
    $income_item->setId($request->getParameter('id'));
    $income_item->setIncomeItemName($request->getParameter('income_item_name'));
    $income_item->setIncomeItemComments($request->getParameter('income_item_comments'));
    if ($request->getParameter('income_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('income_date'), $this->getUser()->getCulture());
      $income_item->setIncomeDate("$y-$m-$d");
    }
    $income_item->setIncomeItemCategoryId($request->getParameter('income_item_category_id') ? $request->getParameter('income_item_category_id') : null);
    $income_item->setIncomeItemPaymentMethodId($request->getParameter('income_item_payment_method_id') ? $request->getParameter('income_item_payment_method_id') : null);
    $income_item->setIncomeItemPaymentCheck($request->getParameter('income_item_payment_check'));
    $income_item->setIncomeItemReimbursementId($request->getParameter('income_item_reimbursement_id') ? $request->getParameter('income_item_reimbursement_id') : null);
    $income_item->setIncomeItemProjectId($request->getParameter('income_item_project_id') ? $request->getParameter('income_item_project_id') : null);
    $income_item->setIncomeItemBudgetId($request->getParameter('income_item_budget_id') ? $request->getParameter('income_item_budget_id') : null);
    $income_item->setIncomeItemAmount($request->getParameter('income_item_amount'));
    $income_item->setIncomeItemBase($request->getParameter('income_item_base'));
    $income_item->setIncomeItemTaxRate($request->getParameter('income_item_tax_rate'));
    $income_item->setIncomeItemIrpf($request->getParameter('income_item_irpf'));
    $income_item->setIncomeItemInvoiceNumber($request->getParameter('income_item_invoice_number'));
    $income_item->removeAllTags();
    $income_item->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);
    $income_item->save();
    return $this->redirect('income/show?id='.$income_item->getId());
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortField()
  {
    return 'income_date';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['income_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '');
      $criterion->addOr($c->getNewCriterion(IncomeItemPeer::INCOME_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['income_from']) && $this->filters['income_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['income_from'], $this->getUser()->getCulture());
      $criterion = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['income_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, '');
      $criterion2->addOr($c->getNewCriterion(IncomeItemPeer::INCOME_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['income_to']) && $this->filters['income_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['income_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(IncomeItemPeer::INCOME_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
      if (isset($criterion)) {
        $criterion->addAnd($criterion2);
      }
      else
      {
        $criterion = $criterion2;
      }
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
    if (isset($this->filters['project_name_is_empty']))
    {
      $criterion = $c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, '');
      $criterion->addOr($c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_PROJECT_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['project_name']) && $this->filters['project_name'] !== sfContext::getInstance()->getI18N()->__('Project') . '...' && $this->filters['project_name'] !== '')
    {
      $c->add(ProjectPeer::PROJECT_NAME, $this->filters['project_name']);
      $c->addJoin(ProjectPeer::ID, IncomeItemPeer::INCOME_ITEM_PROJECT_ID);
    }
    if (isset($this->filters['income_item_payment_method_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, '');
      $criterion->addOr($c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['income_item_payment_method_id']) && $this->filters['income_item_payment_method_id'] !== '')
    {
      $c->add(IncomeItemPeer::INCOME_ITEM_PAYMENT_METHOD_ID, $this->filters['income_item_payment_method_id']);
    }
    if (isset($this->filters['income_item_category_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, '');
      $criterion->addOr($c->getNewCriterion(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['income_item_category_id']) && $this->filters['income_item_category_id'] !== '')
    {
      $c->add(IncomeItemPeer::INCOME_ITEM_CATEGORY_ID, $this->filters['income_item_category_id']);
    }
    if (isset($this->filters['income_name']) && $this->filters['income_name'] && $this->filters['income_name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
    {
      $c->add(IncomeItemPeer::INCOME_ITEM_NAME, "%".$this->filters['income_name']."%", Criteria::LIKE);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }
}

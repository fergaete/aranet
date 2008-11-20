<?php

/**
 * expense actions.
 *
 * @package    aranet
 * @subpackage expense
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class expenseActions extends myActions
{

  /**
   * returns expense_item from params
   *
   * @return ExpenseItem
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getExpenseItem()
  {
    if ($this->getRequestParameter('id')) {
      $expense_item = ExpenseItemPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($expense_item);
    } else {
      $expense_item = new ExpenseItem();
    }
    return $expense_item;
  }
  
  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preExecute() {
    $this->referer = $this->getRequest()->getReferer();
    if (!($expense_categories = $this->getUser()->getAttribute('expense_categories'))) {
      $expense_categories = ExpenseCategoryPeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('expense_categories', $expense_categories);
    }
    if (in_array($this->getActionName(), array('index', 'list', 'listByTag'))) {
      $this->expense_categories = $this->getUser()->getAttribute('expense_categories');
    }
    if (!($payment_methods = $this->getUser()->getAttribute('payment_methods'))) {
      $payment_methods = PaymentMethodPeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('payment_methods', $payment_methods);
    }
    if (in_array($this->getActionName(), array('index', 'list', 'listByTag'))) {
      $this->payment_methods = $this->getUser()->getAttribute('payment_methods');
    }
    if (!($members = $this->getUser()->getAttribute('members'))) {
      $members = sfGuardUserPeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('members', $members);
    }
    if (in_array($this->getActionName(), array('index', 'list', 'listByTag'))) {
      $this->members = $this->getUser()->getAttribute('members');
    }
  }

  /**
   * executes create action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate()
  {
    if (!$this->getFlash('expense_item')) {
      $this->expense_item = $this->getExpenseItem();
    } else {
      $this->expense_item = $this->getFlash('expense_item');
    }
    if ($this->hasRequestParameter('id')) {
      // Copy items
      $new_expense_item = new ExpenseItem();
      $this->expense_item->copyInto($new_expense_item);
      $this->expense_item = $new_expense_item;
    }
    $this->setTemplate('edit');
    $this->budgets = array();
    if ($this->expense_item->getExpenseItemProjectId()) {
      $project_id = $this->expense_item->getExpenseItemProjectId();
    } else {
      $project_id = $this->getRequestParameter('project_id');
    }
    $c = new Criteria();
    if ($project_id) {
      $this->projects = ProjectPeer::doSelect(new Criteria());
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $project_id);
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
    }
    if ($this->getRequestParameter('budget_id')) {
      $this->budget_id = $this->getRequestParameter('budget_id');
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
    $this->expense_item = $this->getExpenseItem();
    $this->projects = ProjectPeer::doSelect(new Criteria());
    $c = new Criteria();
    if ($this->expense_item->getExpenseItemProjectId()) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->expense_item->getExpenseItemProjectId());
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
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
    $expense_item = $this->getExpenseItem();
    if ($this->getRequestParameter('expense_item_vendor_id', -1) == -1) {
      $vendor = new Vendor();
      $vendor->setVendorCompanyName($this->getRequestParameter('vendor_name'));
      $vendor->setVendorUniqueName($this->getRequestParameter('vendor_name'));
      $vendor->save();
      $vendor_id = $vendor->getId();
    } else {
      $vendor_id = $this->getRequestParameter('expense_item_vendor_id');
      $name = $this->getRequestParameter('vendor_name');
      $vendor = VendorPeer::retrieveByPK($vendor_id);
      if (!$vendor || $vendor->getVendorUniqueName() != $name) {
        $vendor = new Vendor();
        $vendor->setVendorCompanyName($this->getRequestParameter('vendor_name'));
        $vendor->setVendorUniqueName($this->getRequestParameter('vendor_name'));
        $vendor->save();
        $vendor_id = $vendor->getId();
      }
    }
    $expense_item->setExpenseItemVendorId($vendor_id);
    $expense_item->setId($this->getRequestParameter('id'));
    $expense_item->setExpenseItemName($this->getRequestParameter('expense_item_name'));
    $expense_item->setExpenseItemInvoiceNumber($this->getRequestParameter('expense_item_invoice_number'));
    $expense_item->setExpenseItemComments($this->getRequestParameter('expense_item_comments'));
    $expense_item->setExpensePurchaseBy($this->getRequestParameter('expense_purchase_by') ? $this->getRequestParameter('expense_purchase_by') : null);
    if ($this->getRequestParameter('expense_purchase_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('expense_purchase_date'), $this->getUser()->getCulture());
      $expense_item->setExpensePurchaseDate("$y-$m-$d");
    }
    $expense_item->setExpenseItemCategoryId($this->getRequestParameter('expense_item_category_id') ? $this->getRequestParameter('expense_item_category_id') : null);
    $expense_item->setExpenseItemPaymentMethodId($this->getRequestParameter('expense_item_payment_method_id') ? $this->getRequestParameter('expense_item_payment_method_id') : null);
    $expense_item->setExpenseItemPaymentCheck($this->getRequestParameter('expense_item_payment_check'));
    $expense_item->setExpenseItemReimbursementId($this->getRequestParameter('expense_item_reimbursement_id') ? $this->getRequestParameter('expense_item_reimbursement_id') : null);
    $expense_item->setExpenseItemProjectId($this->getRequestParameter('expense_item_project_id') ? $this->getRequestParameter('expense_item_project_id') : null);
    $expense_item->setExpenseItemBudgetId($this->getRequestParameter('expense_item_budget_id') ? $this->getRequestParameter('expense_item_budget_id') : null);
    $expense_item->setExpenseItemBase($this->getRequestParameter('expense_item_base'));
    $expense_item->setExpenseItemTaxRate($this->getRequestParameter('expense_item_tax_rate'));
    $expense_item->setExpenseItemIrpf($this->getRequestParameter('expense_item_irpf'));

    $expense_item->removeAllTags();
    $expense_item->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);
    $expense_item->save();
    $referer = $this->getRequestParameter('referer', 'expense/show?id='.$expense_item->getId());
    return $this->redirect($referer);
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortColumn()
  {
    // TODO
    return 'expense_purchase_date';//ExpenseItemPeer::EXPENSE_PURCHASE_DATE;
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['expense_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURSACHE_DATE, '');
      $criterion->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURSACHE_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['expense_from']) && $this->filters['expense_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['expense_from'], $this->getUser()->getCulture());
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['expense_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURSACHE_DATE, '');
      $criterion2->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURSACHE_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['expense_to']) && $this->filters['expense_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['expense_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
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
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, '');
      $criterion->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['project_name']) && $this->filters['project_name'] != sfI18N::getInstance()->__('Project') . '...' && $this->filters['project_name'] !== '')
    {
      $c->add(ProjectPeer::PROJECT_NAME, $this->filters['project_name']);
      $c->addJoin(ProjectPeer::ID, ExpenseItemPeer::EXPENSE_ITEM_PROJECT_ID);
    }
    if (isset($this->filters['expense_item_payment_method_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, '');
      $criterion->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['expense_item_payment_method_id']) && $this->filters['expense_item_payment_method_id'] !== '')
    {
      $c->add(ExpenseItemPeer::EXPENSE_ITEM_PAYMENT_METHOD_ID, $this->filters['expense_item_payment_method_id']);
    }
    if (isset($this->filters['expense_item_validation_id']) && $this->filters['expense_item_validation_id'] !== '')
    {
      if ($this->filters['expense_item_validation_id'] == 1) {
        $c->add(ExpenseItemPeer::EXPENSE_VALIDATE_DATE, null, Criteria::ISNULL);
      } else {
        $c->add(ExpenseItemPeer::EXPENSE_VALIDATE_DATE, null, Criteria::ISNOTNULL);
      }
    }
    if (isset($this->filters['expense_purchase_by_is_empty']))
    {
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_BY, '');
      $criterion->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_PURCHASE_BY, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['expense_purchase_by']) && $this->filters['expense_purchase_by'] !== '')
    {
      $c->add(ExpenseItemPeer::EXPENSE_PURCHASE_BY, $this->filters['expense_purchase_by']);
    }
    if (isset($this->filters['expense_item_category_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, '');
      $criterion->addOr($c->getNewCriterion(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['expense_item_category_id']) && $this->filters['expense_item_category_id'] !== '')
    {
      $c->add(ExpenseItemPeer::EXPENSE_ITEM_CATEGORY_ID, $this->filters['expense_item_category_id']);
    }
    if (isset($this->filters['expense_name']) && $this->filters['expense_name'] && $this->filters['expense_name'] != sfI18N::getInstance()->__('Name') . '...')
    {
      $c->add(ExpenseItemPeer::EXPENSE_ITEM_NAME, "%".$this->filters['expense_name']."%", Criteria::LIKE);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * executes editvalidation action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditvalidation ()
  {
    $this->expense_item = $this->getExpenseItem();
  }

  /**
   * executes editvalidation action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatevalidation ()
  {
    $this->expense_item = $this->getExpenseItem();
    if ($this->getRequestParameter('expense_item_validation_id') == 2) {
      // Update date
      $expense_item->setExpenseValidateDate(date('Y-m-d'));
      $expense_item->setExpenseValidateBy($this->getUser()->getGuardUser()->getId());
    } else {
      $expense_item->setExpenseValidateDate(null);
      $expense_item->setExpenseValidateBy($this->getUser()->getGuardUser()->getId());
    }
    $expense_item->save();
    $this->expense_item = $expense_item;
    return sfView::SUCCESS;
  }

  /**
   * executes print action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executePrint ()
  {
    $c = new Criteria();
    $c->add(ReportPeer::ID, $this->getRequestParameter('report'));
    $c->addJoin(ReportPeer::ID, ReportColumnPeer::REPORT_ID);
    $c->addAscendingOrderByColumn(ReportColumnPeer::COLUMN_ORDER);
    $reports = ReportPeer::doSelect($c);
    $this->forward404Unless($reports);
    $this->report = $reports[0];
    $this->executeList();
    $update_filters = false;
    if (isset($this->filters['project_name']) && $this->filters['project_name'] == sfI18N::getInstance()->__('Project') . '...') {
      unset($this->filters['project_name']);
      $update_filters = true;
    }
    if (isset($this->filters['expense_item_payment_method_id']) && ($this->filters['expense_item_payment_method_id'] == '' || $this->filters['expense_item_payment_method_id'] == sfI18N::getInstance()->__('Paid with') . '...')) {
      unset($this->filters['expense_item_payment_method_id']);
      $update_filters = true;
    }
    if ($update_filters) {
      $this->getUser()->getAttributeHolder()->removeNamespace('expense/filters');
      $this->getUser()->getAttributeHolder()->add($this->filters, 'expense/filters');
    }
    $this->getContext()->getResponse()->setTitle('Expense list');
    $this->setViewClass('sfFop');
    $this->setLayout('landscape.fo');
    return sfView::SUCCESS;
  }

  /**
   * executes downloadfiles action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDownloadFiles ()
  {
    $this->executeList();
    $this->getResponse()->setTitle('Expense list');
    $this->getResponse()->setContentType('application/zip');
    $zip = new ZipArchive();
    $filename = "/tmp/expense_list_files.zip";
    if ($zip->open($filename, ZIPARCHIVE::CREATE) !== true) {
      exit("cannot open <$filename>\n");
    }
    $zip->addFromString("readme.txt", "This package content all files associated with the current expense list.\n");
    foreach ($this->pager->getResults() as $expense_item) {
      $sf_propel_file_storage_infos = $expense_item->getFiles();
      foreach ($sf_propel_file_storage_infos as $sf_propel_file_storage_info) {
        file_put_contents('/tmp/'.$sf_propel_file_storage_info->getFileName(), $sf_propel_file_storage_info->getFileData()->getFileBinaryData());
        $zip->addFile('/tmp/'.$sf_propel_file_storage_info->getFileName(), $sf_propel_file_storage_info->getFileName());
        unlink('/tmp/'.$sf_propel_file_storage_info->getFileName());
      }
    }
    $zip->close();
    $this->getResponse()->setContent(file_get_contents($filename));
    unlink($filename);
    return sfView::NONE;
  }

}

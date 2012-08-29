<?php

/**
 * invoice actions.
 *
 * @package    aranet
 * @subpackage invoice
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class invoiceActions extends anActions
{

  /**
   * returns invoice from params
   *
   * @return Invoice
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getInvoice()
  {
    if ($request->getParameter('id')) {
      $invoice = InvoicePeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($invoice);
    } else {
      $invoice = new Invoice();
    }
    return $invoice;
  }
  
  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preExecute() {
    $this->referer = $this->getRequest()->getReferer();
    if (!($payment_status = $this->getUser()->getAttribute('payment_status'))) {
      $payment_status = PaymentStatusPeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('payment_status', $payment_status);
    }
    if (in_array($this->getActionName(), array('index', 'list', 'listByTag'))) {
      $this->payment_status = $this->getUser()->getAttribute('payment_status');
    }
  }

  /**
   * executes create action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate()
  {
    $this->getUser()->setAttribute('index', 0);
    if (!$this->getUser()->getFlash('invoice')) {
      $this->invoice = $this->getInvoice();
    } else {
      $this->invoice = $this->getUser()->getFlash('invoice');
    }
    $this->setTemplate('edit');
    $this->budgets = array();
    $project_id = $request->getParameter('project_id') ? $request->getParameter('project_id') : $request->getParameter('invoice_project_id', $this->invoice->getInvoiceProjectId());
    if ($project_id) {
      $c = new Criteria();
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $project_id);
      if ($request->getParameter('client_id')) {
        $c->add(BudgetPeer::BUDGET_CLIENT_ID, $request->getParameter('client_id'));
      }
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
      $this->projects = ProjectPeer::doSelect(new Criteria());
    }
    if (!$project_id) {
      $c = new Criteria();
      $c->add(ProjectPeer::PROJECT_CLIENT_ID, $request->getParameter('client_id', $this->invoice->getInvoiceClientId()));
      $this->projects = ProjectPeer::doSelect($c);
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
    $this->getUser()->setAttribute('index', 0);
    if (!$this->getUser()->getFlash('invoice')) {
      $this->invoice = $this->getInvoice();
    } else {
      $this->invoice = $this->getUser()->getFlash('invoice');
    }
    $c = new Criteria();
    if ($request->getParameter('id')) {
      $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->invoice->getInvoiceClientId());
    }
    $this->projects = ProjectPeer::doSelect($c);
    $c = new Criteria();
    $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->invoice->getInvoiceProjectId());
    $c->add(BudgetPeer::BUDGET_IS_LAST, true);
    $this->budgets = BudgetPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $invoice = $this->getInvoice();
    // Process Client
    if ($request->getParameter('invoice_client_id', -1) == -1 || !$request->getParameter('invoice_client_id', -1)) {
      $client_name = $request->getParameter('client_name');
      if ($client_name && $client_name != $this->getContext()->getI18N()->__('Client') . '...') {
        $client = new Client();
        $client->setClientCompanyName($client_name);
        $client->setClientUniqueName($client_name);
        $client->save();
        $client_id = $client->getId();
      } else {
        $client_id = null;
      }
    } else {
      $client_id = $request->getParameter('invoice_client_id');
    }
    // Process Project
    if ($request->getParameter('invoice_project_id', -1) == -1 || !$request->getParameter('invoice_project_id', -1)) {
      $project_name = $request->getParameter('project_name');
      if ($project_name && $project_name != $this->getContext()->getI18N()->__('Project') . '...') {
        $project = new Project();
        $project->setProjectName($project_name);
        $project->setProjectClientId($client_id);
        $project->save();
        $project_id = $project->getId();
      } else {
        $project_id = null;
      }
    } else {
      $project_id = $request->getParameter('invoice_project_id');
    }
    // Process Budget
    if ($request->getParameter('invoice_budget_id', -1) == -1 || !$request->getParameter('invoice_budget_id', -1)) {
      $budget_name = $request->getParameter('budget_name');
      if ($budget_name && $budget_name != $this->getContext()->getI18N()->__('Budget') . '...') {
        $budget = new Budget();
        $budget->setBudgetTitle($budget_name);
        $budget->setBudgetProjectId($project_id);
        $budget->setBudgetClientId($client_id);
        $budget->save();
        $budget_id = $budget->getId();
      } else {
        $budget_id = null;
      }
    } else {
      $budget_id = $request->getParameter('invoice_budget_id');
    }
    // Process contacts
    $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
    $i = 0;
    if ($contacts) {
      foreach($contacts as $contact) {
        $invoice->addContact($contact, ($i == 0));
        $i++;
      }
    }
    $invoice->setId($request->getParameter('id'));
    $invoice->setInvoicePrefix($request->getParameter('invoice_prefix'));
    $invoice->setInvoiceNumber($request->getParameter('invoice_number'));
    if ($request->getParameter('invoice_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('invoice_date'), $this->getUser()->getCulture());
      $invoice->setInvoiceDate("$y-$m-$d");
    }
    $invoice->setInvoiceClientId($client_id);
    $invoice->setInvoiceProjectId($project_id);
    $invoice->setInvoiceBudgetId($budget_id); $invoice->setInvoiceCategoryId($request->getParameter('invoice_category_id') ? $request->getParameter('invoice_category_id') : null);
    $invoice->setInvoiceKindOfInvoiceId($request->getParameter('invoice_kind_of_invoice_id') ? $request->getParameter('invoice_kind_of_invoice_id') : 1);
    $invoice->setInvoiceTitle($request->getParameter('invoice_title'));
    $invoice->setInvoiceComments($request->getParameter('invoice_comments'));
    $invoice->setInvoicePrintComments($request->getParameter('invoice_print_comments', 0));
    $invoice->setInvoiceTaxRate($request->getParameter('invoice_tax_rate'));
    $invoice->setInvoiceFreightCharge($request->getParameter('invoice_freight_charge'));
    $invoice->setInvoicePaymentConditionId($request->getParameter('invoice_payment_condition_id') ? $request->getParameter('invoice_payment_condition_id') : null);
    $invoice->setInvoicePaymentMethodId($request->getParameter('invoice_payment_method_id') ? $request->getParameter('invoice_payment_method_id') : null);
    $invoice->setInvoicePaymentCheck($request->getParameter('invoice_payment_check'));
    if ($request->getParameter('invoice_payment_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('invoice_payment_date'), $this->getUser()->getCulture());
      $invoice->setInvoicePaymentDate("$y-$m-$d");
    }
    $invoice->setInvoicePaymentStatusId($request->getParameter('invoice_payment_status_id') ? $request->getParameter('invoice_payment_status_id') : null);
    $invoice->setInvoiceLateFeePercent($request->getParameter('invoice_late_fee_percent'));
    $invoice->setInvoiceTotalAmount($request->getParameter('invoice_total_amount'));

    // Process invoice item information
    if ($items = $request->getParameter('items') ) {
      foreach($items as $item) {
        if (!$item['id'])
        {
          $itm = new InvoiceItem();
        }
        else
        {
          $itm = InvoiceItemPeer::retrieveByPk($item['id']);
          $this->forward404Unless($itm);
        }
        if ($item['description'] || $item['quantity'] || $item['cost'] ) {
          $itm->setItemDescription($item['description']);
          if ($item['type_id'])
            $itm->setItemTypeId($item['type_id']);
          else
            $itm->setItemTypeId(null);
          $itm->setItemQuantity($item['quantity']);
          $itm->setItemCost($item['cost']);
          $itm->setItemTaxRate($invoice->getInvoiceTaxRate());
          $itm->setInvoice($invoice);
          $itm->save();
        }
      }
    }
    $invoice->removeAllTags();
    $invoice->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);

    $invoice->save();

    return $this->redirect('invoice/show?id='.$invoice->getId());
  }

  /**
   * executes deleteitem action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDeleteitem()
  {
    $invoice_item = InvoiceItemPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($invoice_item);
    $invoice_item->delete();
    return sfView::NONE;
  }

  /**
   * executes create_item action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreateitem()
  {
    $i = $request->getParameter('index');
    $i++;
    $this->i = $i;
    return sfView::INPUT;
  }

  /**
   * executes edititems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdititems()
  {
    $this->invoice = $this->getInvoice();
    return sfView::SUCCESS;
  }

  /**
   * executes listitems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeListitems()
  {
    $this->invoice = $this->getInvoice();
    return sfView::SUCCESS;
  }

  /**
   * executes updateitems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdateitems()
  {
    $invoice = $this->getInvoice();
    $this->forward404Unless($invoice);
    // Process invoice item information
    if ($items = $request->getParameter('items') ) {
      foreach($items as $item) {
        if (!$item['id'])
        {
          $itm = new InvoiceItem();
        }
        else
        {
          $itm = InvoiceItemPeer::retrieveByPk($item['id']);
          $this->forward404Unless($itm);
        }
        if ($item['description'] || $item['quantity'] || $item['cost'] ) {
          $itm->setItemDescription($item['description']);
          if ($item['type_id'])
            $itm->setItemTypeId($item['type_id']);
          else
            $itm->setItemTypeId(null);
          $itm->setItemQuantity($item['quantity']);
          $itm->setItemCost($item['cost']);
          $itm->setItemTaxRate($invoice->getInvoiceTaxRate());
          $itm->setInvoice($invoice);
          $itm->save();
        }
      }
    }

    $this->invoice = $invoice;
    //return $this->redirect('invoice/show?id='.$invoice->getId());
    $this->setTemplate('listitems');
    return sfView::SUCCESS;
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getSortColumn()
  {
    // TODO
    return 'invoice_number';
    //return 'CONCAT(' . InvoicePeer::INVOICE_PREFIX.", ' ', " . InvoicePeer::INVOICE_NUMBER.')';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['invoice_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '');
      $criterion->addOr($c->getNewCriterion(InvoicePeer::INVOICE_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['invoice_from']) && $this->filters['invoice_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['invoice_from'], $this->getUser()->getCulture());
      if (strlen($y) == 2) $y = '20' . $y;
      $criterion = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['invoice_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, '');
      $criterion2->addOr($c->getNewCriterion(InvoicePeer::INVOICE_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['invoice_to']) && $this->filters['invoice_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['invoice_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(InvoicePeer::INVOICE_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
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
    if (isset($this->filters['invoice_payment_status_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, '');
      $criterion->addOr($c->getNewCriterion(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['invoice_payment_status_id']) && $this->filters['invoice_payment_status_id'])
    {
      $c->add(InvoicePeer::INVOICE_PAYMENT_STATUS_ID, $this->filters['invoice_payment_status_id']);
    }
    if (isset($this->filters['invoice_name']) && $this->filters['invoice_name'] && $this->filters['invoice_name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(InvoicePeer::INVOICE_NUMBER, "%".$this->filters['invoice_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(InvoicePeer::INVOICE_TITLE, "%".$this->filters['invoice_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * executes editstatus action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditstatus ()
  {
    $this->invoice = $this->getInvoice();
    return sfView::SUCCES;
  }

  /**
   * executes updatestatus action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatestatus ()
  {
    $this->invoice = $this->getInvoice();
    // Process invoice status information
    $this->invoice->setInvoicePaymentMethodId($request->getParameter('invoice_payment_method_id') ? $request->getParameter('invoice_payment_method_id') : null);
    $this->invoice->setInvoicePaymentCheck($request->getParameter('invoice_payment_check'));
    if ($date = $request->getParameter('invoice_payment_date'))
    {
      $this->invoice->setInvoicePaymentDate($date['year'] . '-' . sprintf('%02d', $date['month']) . '-' . sprintf('%02d', $date['day']));
    }
    $this->invoice->setInvoicePaymentStatusId($request->getParameter('invoice_payment_status_id') ? $request->getParameter('invoice_payment_status_id') : null);
    $this->invoice->save();
    return sfView::SUCCESS;
  }

  /**
   * executes print action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executePrint() {
    $this->invoice = $this->getInvoice();
    $this->getContext()->getResponse()->setTitle($this->invoice->__toString());
    $this->setViewClass('sfFop');
    $this->setLayout('invoice.fo');
    return sfView::SUCCESS;
  }
}

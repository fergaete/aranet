<?php

/**
 * invoice actions.
 *
 * @package    aranet
 * @subpackage invoice
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class invoiceActions extends myActions
{

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

    public function executeList() {
        $c = new Criteria();
        $this->processList($c, 'doSelect');
        return sfView::SUCCESS;
    }

    public function executeShow()
    {
        $c = new Criteria();
        $c->add(InvoicePeer::ID, $this->getRequestParameter('id'));
        $invoices = InvoicePeer::doSelect($c);
        if (isset($invoices[0])) {
            $this->invoice = $invoices[0];
        } else {
            $this->forward404();
        }
        return sfView::SUCCESS;


        $this->invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->invoice);
    }

    public function executeCreate()
    {
        $this->getUser()->setAttribute('index', 0);
        $invoice = $this->getUser()->getFlash('invoice');
        if ($invoice instanceof Invoice) {
            $this->invoice = $invoice;
        } else {
            $this->invoice = new Invoice();
        }
        $this->setTemplate('edit');
        $this->budgets = array();
        $project_id = $this->getRequestParameter('invoice_project_id', $this->invoice->getInvoiceProjectId());
        if ($project_id) {
            $c = new Criteria();
            $c->add(BudgetPeer::BUDGET_PROJECT_ID, $project_id);
            $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
            $c->add(BudgetPeer::BUDGET_IS_LAST, true);
            $this->budgets = BudgetPeer::doSelect($c);
            $this->projects = ProjectPeer::doSelect(new Criteria());
        }
        if (!$project_id && $this->getRequestParameter('client_id', $this->invoice->getInvoiceClientId())) {
            $c = new Criteria();
            $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getRequestParameter('client_id', $this->invoice->getInvoiceClientId()));
            $this->projects = ProjectPeer::doSelect($c);
        }
        return sfView::SUCCESS;
    }

    public function executeEdit()
    {
        $this->getUser()->setAttribute('index', 0);
        $c = new Criteria();
        $c->add(InvoicePeer::ID, $this->getRequestParameter('id'));
        $invoices = InvoicePeer::doSelect($c);
        if (isset($invoices[0])) {
            $this->invoice = $invoices[0];
        } else {
            $this->invoice = new Invoice();
        }
        $c = new Criteria();
        if ($this->getRequestParameter('id')) {
            $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->invoice->getInvoiceClientId());
        }
        $this->projects = ProjectPeer::doSelect($c);
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->invoice->getInvoiceProjectId());
        $c->add(BudgetPeer::BUDGET_IS_LAST, true);
        $this->budgets = BudgetPeer::doSelect($c);
        return sfView::SUCCESS;
    }

    public function handleErrorUpdate()
    {
        $this->forward('invoice', 'edit');
    }

    public function handleErrorEdit()
    {
        $this->executeEdit();
        return sfView::SUCCESS;
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $invoice = new Invoice();
        }
        else
        {
            $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($invoice);
        }
        // Process Client
        if ($this->getRequestParameter('invoice_client_id', -1) == -1 || !$this->getRequestParameter('invoice_client_id', -1)) {
            $client_name = $this->getRequestParameter('client_name');
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
            $client_id = $this->getRequestParameter('invoice_client_id');
        }
        // Process Project
        if ($this->getRequestParameter('invoice_project_id', -1) == -1 || !$this->getRequestParameter('invoice_project_id', -1)) {
            $project_name = $this->getRequestParameter('project_name');
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
            $project_id = $this->getRequestParameter('invoice_project_id');
        }
        // Process Budget
        if ($this->getRequestParameter('invoice_budget_id', -1) == -1 || !$this->getRequestParameter('invoice_budget_id', -1)) {
            $budget_name = $this->getRequestParameter('budget_name');
            if ($budget_name && $budget_name != $this->getContext()->getI18N()->__('Budget') . '...') {
                $budget = new Budget();
                $budget->setBudgetName($budget_name);
                $budget->setBudgetProjectId($project_id);
                $budget->setBudgetClientId($client_id);
                $budget->save();
                $budget_id = $budget->getId();
            } else {
                $budget_id = null;
            }
        } else {
            $budget_id = $this->getRequestParameter('invoice_budget_id');
        }
        $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
        $i = 0;
        if ($contacts) {
            foreach($contacts as $contact) {
                $invoice->addContact($contact, ($i == 0));
                $i++;
            }
        }
        $invoice->setId($this->getRequestParameter('id'));
        $invoice->setInvoicePrefix($this->getRequestParameter('invoice_prefix'));
        $invoice->setInvoiceNumber($this->getRequestParameter('invoice_number'));
        if ($this->getRequestParameter('invoice_date'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('invoice_date'), $this->getUser()->getCulture());
            $invoice->setInvoiceDate("$y-$m-$d");
        }
        $invoice->setInvoiceClientId($client_id);
        $invoice->setInvoiceProjectId($project_id);
        $invoice->setInvoiceBudgetId($budget_id); $invoice->setInvoiceCategoryId($this->getRequestParameter('invoice_category_id') ? $this->getRequestParameter('invoice_category_id') : null);
        $invoice->setInvoiceKindOfInvoiceId($this->getRequestParameter('invoice_kind_of_invoice_id') ? $this->getRequestParameter('invoice_kind_of_invoice_id') : 1);
        $invoice->setInvoiceTitle($this->getRequestParameter('invoice_title'));
        $invoice->setInvoiceComments($this->getRequestParameter('invoice_comments'));
        $invoice->setInvoicePrintComments($this->getRequestParameter('invoice_print_comments', 0));
        $invoice->setInvoiceTaxRate($this->getRequestParameter('invoice_tax_rate'));
        $invoice->setInvoiceFreightCharge($this->getRequestParameter('invoice_freight_charge'));
        $invoice->setInvoicePaymentConditionId($this->getRequestParameter('invoice_payment_condition_id') ? $this->getRequestParameter('invoice_payment_condition_id') : null);
        $invoice->setInvoicePaymentMethodId($this->getRequestParameter('invoice_payment_method_id') ? $this->getRequestParameter('invoice_payment_method_id') : null);
        $invoice->setInvoicePaymentCheck($this->getRequestParameter('invoice_payment_check'));
        if ($this->getRequestParameter('invoice_payment_date'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('invoice_payment_date'), $this->getUser()->getCulture());
            $invoice->setInvoicePaymentDate("$y-$m-$d");
        }
        $invoice->setInvoicePaymentStatusId($this->getRequestParameter('invoice_payment_status_id') ? $this->getRequestParameter('invoice_payment_status_id') : null);
        $invoice->setInvoiceLateFeePercent($this->getRequestParameter('invoice_late_fee_percent'));
        $invoice->setInvoiceTotalAmount($this->getRequestParameter('invoice_total_amount'));

        // Process invoice item information
        if ($items = $this->getRequestParameter('items') ) {
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
        $invoice->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

        $invoice->save();

        return $this->redirect('invoice/show?id='.$invoice->getId());
    }

    public function executeDelete()
    {
        $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($invoice);

        $invoice->delete();

        return $this->redirect('invoice/list');
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $invoice = InvoicePeer::retrieveByPk($item);
                    $invoice->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    public function executeDeleteitem()
    {
        $invoice_item = InvoiceItemPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($invoice_item);

        $invoice_item->delete();

        return sfView::NONE;
    }

    public function executeCreateitem()
    {
        $i = $this->getRequestParameter('index');
        $i++;
        $this->i = $i;

        return sfView::INPUT;
    }

    public function executeEdititems()
    {
        $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($invoice);
        $this->invoice = $invoice;

        return sfView::SUCCESS;
    }

    public function executeListitems()
    {
        $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($invoice);
        $this->invoice = $invoice;

        return sfView::SUCCESS;
    }

    public function executeUpdateitems()
    {
        $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('invoice_id'));

        $this->forward404Unless($invoice);
        // Process invoice item information
        if ($items = $this->getRequestParameter('items') ) {
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

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('invoice/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'invoice/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'invoice/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'invoice/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'invoice/sort'))
        {
            $this->getUser()->setAttribute('sort', 'invoice_number', 'invoice/sort');
            $this->getUser()->setAttribute('type', 'asc', 'invoice/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'invoice/sort'))
        {
            $sort_column = InvoicePeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'invoice/sort') == 'asc')
            {
                $c->addAscendingOrderByColumn($sort_column);
            }
            else
            {
                $c->addDescendingOrderByColumn($sort_column);
            }
        }
    }

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

    public function executeEditstatus ()
    {
        $this->invoice_id = $this->getRequestParameter('id');
        $this->invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));
    }

    public function executeUpdatestatus ()
    {
        $invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($invoice);
        // Process invoice status information
        $invoice->setInvoicePaymentMethodId($this->getRequestParameter('invoice_payment_method_id') ? $this->getRequestParameter('invoice_payment_method_id') : null);
        $invoice->setInvoicePaymentCheck($this->getRequestParameter('invoice_payment_check'));
        if ($date = $this->getRequestParameter('invoice_payment_date'))
        {
            $invoice->setInvoicePaymentDate($date['year'] . '-' . sprintf('%02d', $date['month']) . '-' . sprintf('%02d', $date['day']));
        }
        $invoice->setInvoicePaymentStatusId($this->getRequestParameter('invoice_payment_status_id') ? $this->getRequestParameter('invoice_payment_status_id') : null);
        $invoice->save();
        $this->invoice = $invoice;
        return sfView::SUCCESS;
    }

    public function executePrint() {
        $this->invoice = InvoicePeer::retrieveByPk($this->getRequestParameter('id'));
        $this->getContext()->getResponse()->setTitle($this->invoice->__toString());
        $this->setViewClass('sfFop');
        $this->setLayout('invoice.fo');
        return sfView::SUCCESS;
    }
}

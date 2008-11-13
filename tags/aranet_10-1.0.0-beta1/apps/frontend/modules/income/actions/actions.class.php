<?php

/**
 * income actions.
 *
 * @package    aranet
 * @subpackage income
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class incomeActions extends myActions
{

    public function preExecute() {
        $this->referer = $this->getRequest()->getReferer();
        if (!($income_categories = $this->getUser()->getAttribute('income_categories'))) {
            $income_categories = IncomeCategoryPeer::doSelect(new Criteria());
            $this->getUser()->setAttribute('income_categories', $income_categories);
        }
        if (in_array($this->getActionName(), array('index', 'list', 'listByTag'))) {
            $this->income_categories = $this->getUser()->getAttribute('income_categories');
        }
    }

    public function executeList()
    {
        $this->processList(new Criteria(), 'doSelectJoinAllIncludeNulls');
        return sfView::SUCCESS;
    }

    public function executeShow()
    {
        $c = new Criteria();
        $c->add(IncomeItemPeer::ID, $this->getRequestParameter('id'));
        $income_items = IncomeItemPeer::doSelectJoinAllIncludeNulls($c);
        if (isset($income_items[0])) {
            $this->income_item = $income_items[0];
        } else {
            $this->forward404();
        }
        return sfView::SUCCESS;
    }

    public function executeCreate()
    {
        if (!$this->getFlash('income_item')) {
            if ($this->getRequestParameter('copy_id')) {
                $this->income_item = IncomeItemPeer::retrieveByPk($this->getRequestParameter('copy_id'));
            } else {
                $this->income_item = new IncomeItem();
            }
        } else {
            $this->income_item = $this->getFlash('income_item');
        }
        if ($this->getRequestParameter('copy_id')) {
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
            $project_id = $this->getRequestParameter('income_item_project_id');
        }
        $c = new Criteria();
        if ($project_id) {
            $c->add(BudgetPeer::BUDGET_PROJECT_ID, $project_id);
            $this->projects = ProjectPeer::doSelect(new Criteria());
        }
        $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
        $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
        $this->budgets = BudgetPeer::doSelect($c);
        return sfView::SUCCESS;
    }

    public function executeEdit()
    {
        $c = new Criteria();
        $c->add(IncomeItemPeer::ID, $this->getRequestParameter('id'));
        $income_items = IncomeItemPeer::doSelect($c);
        if (isset($income_items[0])) {
            $this->income_item = $income_items[0];
        } else {
            $this->income_item = new IncomeItem();
        }

        $this->projects = ProjectPeer::doSelect(new Criteria());
        $c = new Criteria();
        if ($this->getRequestParameter('id')) {
            $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->income_item->getIncomeItemProjectId());
            $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
        }
        $this->budgets = BudgetPeer::doSelect($c);
        return sfView::SUCCESS;
    }

    public function handleErrorUpdate()
    {
        $this->forward('income', 'edit');
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
            $income_item = new IncomeItem();
        }
        else
        {
            $income_item = IncomeItemPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($income_item);
        }
        if ($this->getRequestParameter('income_item_vendor_id', -1) == -1) {
            $vendor = new Vendor();
            $vendor->setVendorCompanyName($this->getRequestParameter('vendor_name'));
            $vendor->setVendorUniqueName($this->getRequestParameter('vendor_name'));
            $vendor->save();
            $vendor_id = $vendor->getId();
        } else {
            $vendor_id = $this->getRequestParameter('income_item_vendor_id');
        }
        $income_item->setIncomeItemVendorId($vendor_id);
        $income_item->setId($this->getRequestParameter('id'));
        $income_item->setIncomeItemName($this->getRequestParameter('income_item_name'));
        $income_item->setIncomeItemComments($this->getRequestParameter('income_item_comments'));
        if ($this->getRequestParameter('income_date'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('income_date'), $this->getUser()->getCulture());
            $income_item->setIncomeDate("$y-$m-$d");
        }
        $income_item->setIncomeItemCategoryId($this->getRequestParameter('income_item_category_id') ? $this->getRequestParameter('income_item_category_id') : null);
        $income_item->setIncomeItemPaymentMethodId($this->getRequestParameter('income_item_payment_method_id') ? $this->getRequestParameter('income_item_payment_method_id') : null);
        $income_item->setIncomeItemPaymentCheck($this->getRequestParameter('income_item_payment_check'));
        $income_item->setIncomeItemReimbursementId($this->getRequestParameter('income_item_reimbursement_id') ? $this->getRequestParameter('income_item_reimbursement_id') : null);
        $income_item->setIncomeItemProjectId($this->getRequestParameter('income_item_project_id') ? $this->getRequestParameter('income_item_project_id') : null);
        $income_item->setIncomeItemBudgetId($this->getRequestParameter('income_item_budget_id') ? $this->getRequestParameter('income_item_budget_id') : null);
        $income_item->setIncomeItemAmount($this->getRequestParameter('income_item_amount'));
        $income_item->setIncomeItemBase($this->getRequestParameter('income_item_base'));
        $income_item->setIncomeItemTaxRate($this->getRequestParameter('income_item_tax_rate'));
        $income_item->setIncomeItemIrpf($this->getRequestParameter('income_item_irpf'));
        $income_item->setIncomeItemInvoiceNumber($this->getRequestParameter('income_item_invoice_number'));
        $income_item->removeAllTags();
        $income_item->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);
        $income_item->save();
        return $this->redirect('income/show?id='.$income_item->getId());
    }

    public function executeDelete()
    {
        $income_item = IncomeItemPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($income_item);

        $income_item->delete();

        if (!$this->getRequest()->isXmlHttpRequest())
            return $this->redirect('income/list');
        else
            return sfView::SUCCESS;
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $income_item = IncomeItemPeer::retrieveByPk($item);
                    $income_item->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('income/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'income/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'income/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'income/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'income/sort'))
        {
            $this->getUser()->setAttribute('sort', 'income_date', 'income/sort');
            $this->getUser()->setAttribute('type', 'asc', 'income/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'income/sort'))
        {
            $sort_column = IncomeItemPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'income/sort') == 'asc')
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
        else if (isset($this->filters['project_name']) && $this->filters['project_name'] !== sfI18N::getInstance()->__('Project') . '...' && $this->filters['project_name'] !== '')
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
        if (isset($this->filters['income_name']) && $this->filters['income_name'] && $this->filters['income_name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $c->add(IncomeItemPeer::INCOME_ITEM_NAME, "%".$this->filters['income_name']."%", Criteria::LIKE);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }
}

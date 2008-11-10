<?php

/**
 * budget actions.
 *
 * @package    aranet
 * @subpackage budget
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class budgetActions extends myActions
{
    public function preExecute() {
        $this->referer = $this->getRequest()->getReferer();
        if (!($budget_status = $this->getUser()->getAttribute('budget_status'))) {
            $budget_status = BudgetStatusPeer::doSelect(new Criteria());
            $this->getUser()->setAttribute('budget_status', $budget_status);
        }
        if (in_array($this->getActionName(), array('list', 'listByTag'))) {
            $this->budget_status = $this->getUser()->getAttribute('budget_status');
        }
    }

    public function executeStats()
    {
        $this->budget = BudgetPeer::retrieveByPk($this->getRequestParameter('budget_id'));
        $this->forward404Unless($this->budget);
        return sfView::SUCCESS;
    }

    public function executeVersions() {
        $c = new Criteria();
        $c->add(BudgetPeer::ID, $this->getRequestParameter('budget_id'));
        $budget = BudgetPeer::doSelectOne($c);
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_PREFIX, $budget->getBudgetPrefix());
        $c->add(BudgetPeer::BUDGET_NUMBER, $budget->getBudgetNumber());
        $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
        $this->budgets = BudgetPeer::doSelect($c);
        return sfView::SUCCESS;
    }

    public function executeList() {
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_IS_LAST, true);
        $this->processList($c, 'doSelect');
        return sfView::SUCCESS;
    }

    public function executeOrderitems() {
        $new_order = $this->getRequestParameter('order');
        for($i = 1; $i <= count($new_order); $i++) {
            $budget_item = BudgetItemPeer::retrieveByPK($new_order[$i-1]);
            $budget_item->setItemOrder($i);
            $budget_item->save();
        }
        return sfView::NONE;
    }

    public function executeGetTypesOfHour() {
        if ($this->getRequestParameter('id') == 1) {
            if (!($types_of_hour = $this->getUser()->getAttribute('types_of_hour'))) {
                $types_of_hour = TypeOfHourPeer::doSelect(new Criteria());
                $this->getUser()->setAttribute('types_of_hour', $types_of_hour);
            }
            $this->types_of_hour = $types_of_hour;
            $this->hour = $this->getRequestParameter('hour');
        }
        $this->i = $this->getRequestParameter('i');
        $this->cost = $this->getRequestParameter('cost');
        return sfView::SUCCESS;
    }

    public function executeShow()
    {
        $c = new Criteria();
        $c->add(BudgetPeer::ID, $this->getRequestParameter('id'));
        $budgets = BudgetPeer::doSelect($c);
        if (isset($budgets[0])) {
            $this->budget = $budgets[0];
        } else {
            $this->forward404();
        }
        return sfView::SUCCESS;
    }

    public function executeCreate()
    {
        $this->getUser()->setAttribute('index', 0);
        if ($this->getRequestParameter('copy_id')) {
            $c = new Criteria();
            $c->add(BudgetPeer::ID, $this->getRequestParameter('copy_id'));
            $budgets = BudgetPeer::doSelect($c);
            $new_budget = new Budget();
            if (isset($budgets[0])) {
                // Copy items
                $new_budget->copyFrom($budgets[0]);
            }
            $this->budget = $new_budget;
        } else {
            $this->budget = new Budget();
        }

        $this->setTemplate('edit');
        $c = new Criteria();
        if ($this->getRequestParameter('client_id')) {
            $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getRequestParameter('client_id'));
            $this->projects = ProjectPeer::doSelect($c);
        }
        if ($this->getRequestParameter('project_id')) {
            $this->projects = ProjectPeer::doSelect($c);
        }
        return sfView::SUCCESS;
    }

    public function executeCreateinvoice()
    {
        if ($this->getRequestParameter('id')) {
            $c = new Criteria();
            $c->add(BudgetPeer::ID, $this->getRequestParameter('id'));
            $budgets = BudgetPeer::doSelect($c);
            $new_invoice = new Invoice();
            if (isset($budgets[0])) {
                // Copy items
                $new_invoice->copyFrom($budgets[0]);
            }
        }
        $this->setFlash('invoice', $new_invoice);
        $this->forward('invoice', 'create');
    }

    public function executeEdit()
    {
        $this->getUser()->setAttribute('index', 0);
        $c = new Criteria();
        $c->add(BudgetPeer::ID, $this->getRequestParameter('id'));
        $budgets = BudgetPeer::doSelect($c);
        if (isset($budgets[0])) {
            $this->budget = $budgets[0];
        } else {
            $this->budget = new Budget();
        }
        $c = new Criteria();
        if ($this->getRequestParameter('id') || $this->getRequestParameter('budget_client_id')) {
            $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->budget->getBudgetClientId());
        }
        $this->projects = ProjectPeer::doSelect($c);
        return sfView::SUCCESS;
    }


    public function handleErrorUpdate()
    {
        $this->forward('budget', 'edit');
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
            $budget = new Budget();
        }
        else
        {
            $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($budget);
        }
        // Process Client
        if ($this->getRequestParameter('budget_client_id', -1) == -1 || !$this->getRequestParameter('budget_client_id', -1)) {
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
            $client_id = $this->getRequestParameter('budget_client_id');
        }
        // Process Project
        if ($this->getRequestParameter('budget_project_id', -1) == -1 || !$this->getRequestParameter('budget_project_id', -1)) {
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
            $project_id = $this->getRequestParameter('budget_project_id');
        }
        $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
        if ($contacts) {
            $i = 0;
            foreach($contacts as $contact) {
                $budget->addContact($contact, ($i==0));
                if ($client_id || $project_id) {
                    if ($contact->isNew()) {
                        $contact->save();
                    }
                }
                $contact->saveTo('Client', $client_id);
                $contact->saveTo('Project', $project_id);
                $i++;
            }
        }
        $budget->setId($this->getRequestParameter('id'));
        $budget->setBudgetPrefix($this->getRequestParameter('budget_prefix'));
        $budget->setBudgetNumber($this->getRequestParameter('budget_number'));
        $budget->setBudgetRevision($this->getRequestParameter('budget_revision'));
        if ($this->getRequestParameter('budget_date'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('budget_date'), $this->getUser()->getCulture());
            $budget->setBudgetDate("$y-$m-$d");
        }
        if ($this->getRequestParameter('budget_status_id') == 3 && !$budget->getBudgetApprovedDate()) // Accepted
        {
            $budget->setBudgetApprovedDate(date("Y-m-d"));
        }
        if ($this->getRequestParameter('budget_valid_date'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('budget_valid_date'), $this->getUser()->getCulture());
            $budget->setBudgetValidDate("$y-$m-$d");
        }
        $budget->setBudgetClientId($client_id);
        $budget->setBudgetProjectId($project_id);
        $budget->setBudgetCategoryId($this->getRequestParameter('budget_category_id') ? $this->getRequestParameter('budget_category_id') : null);
        $budget->setBudgetTitle($this->getRequestParameter('budget_title'));
        $budget->setBudgetComments($this->getRequestParameter('budget_comments'));
        $budget->setBudgetPrintComments($this->getRequestParameter('budget_print_comments', 0));
        $budget->setBudgetTaxRate($this->getRequestParameter('budget_tax_rate'));
        $budget->setBudgetFreightCharge($this->getRequestParameter('budget_freight_charge'));
        $budget->setBudgetPaymentConditionId($this->getRequestParameter('budget_payment_condition_id') ? $this->getRequestParameter('budget_payment_condition_id') : null);
        $budget->setBudgetStatusId($this->getRequestParameter('budget_status_id') ? $this->getRequestParameter('budget_status_id') : null);

        // Process budget item information
        if ($items = $this->getRequestParameter('items') ) {
            $this->saveItems($items, $budget);
        }

        $budget->removeAllTags();
        $budget->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

        // Last
        /*
        $c = new Criteria();
        $c->add(BudgetPeer::BUDGET_NUMBER, $budget->getBudgetNumber());
        $c->add(BudgetPeer::BUDGET_PREFIX, $budget->getBudgetPrefix());
        $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
        $budgets = BudgetPeer::doSelect($c);
        if ($budgets) {
            if ($budget->isNew()) {
                $last = count($budgets);
            }
            else
            {
                $last = count($budgets)-1;
            }
            for($i = 0; $i < $last; $i++) {
                if ($budgets[$i]->getBudgetIsLast()) {
                    $budgets[$i]->setBudgetIsLast(false);
                    $budgets[$i]->save();
                }
            }
        } else {
            $budget->setBudgetIsLast(true);
        }
        */
        $budget->save();
        return $this->redirect('budget/show?id='.$budget->getId());
    }

    public function executeDelete()
    {
        $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($budget);

        $budget->delete();

        if (!$this->getRequest()->isXmlHttpRequest())
            return $this->redirect('budget/list');
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
                    $budget = BudgetPeer::retrieveByPk($item);
                    $budget->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    public function executeDeleteitem()
    {
        if ($this->getRequestParameter('id')) {
            $budget_item = BudgetItemPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($budget_item);
            $budget_item->delete();
        }
        return sfView::SUCCESS;
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
        $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($budget);
        $this->budget = $budget;

        return sfView::SUCCESS;
    }

    public function executeListitems()
    {
        $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($budget);
        $this->budget = $budget;

        return sfView::SUCCESS;
    }

    protected function saveItems(&$items, $budget) {
        if (!$budget->isNew()) {
            // Delete old items
            $c = new Criteria();
            $c->add(BudgetItemPeer::ITEM_BUDGET_ID, $budget->getId());
            BudgetItemPeer::doDelete($c);
            $budget->initBudgetItems();
        }
        $k = -1;
        foreach($items as $item) {
            if ($item['description'] || $item['quantity'] || $item['cost'] ) {
                $k++;
                $itm[$k] = new BudgetItem();
                $itm[$k]->setItemDescription($item['description']);
                if ($item['type_id']) {
                    $itm[$k]->setItemTypeId($item['type_id']);
                } else {
                    $itm[$k]->setItemTypeId(null);
                }
                $itm[$k]->setItemIsOptional(isset($item['is_optional']) ? $item['is_optional'] : '0');
                $itm[$k]->setItemQuantity($item['quantity']);
                if (isset($item['type_of_hour'])) {
                    $itm[$k]->setItemBudgetTypeId($item['type_of_hour']);
                    $hour = TypeOfHourPeer::retrieveByPK($item['type_of_hour']);
                    $item['cost'] = $hour->getTypeOfHourCost();
                    if (!$item['margin'] && $item['retail_price']) {
                        $item['margin'] = ($item['cost']) ? 100-($item['cost']*100/$item['retail_price']) : 0;
                    }
                    elseif (!$item['retail_price'] && $item['margin']) {
                        $item['retail_price'] = 100*$item['cost']/(100-$item['margin']);
                    } else {
                        $item['retail_price'] = $item['cost'];
                    }
                }
                else
                {
                    $itm[$k]->setItemBudgetTypeId(null);
                    if (!$item['margin'] && $item['retail_price']) {
                        $item['margin'] = ($item['cost']) ? 100-($item['cost']*100/$item['retail_price']) : 0;
                    }
                    elseif (!$item['retail_price'] && $item['margin']) {
                        $item['retail_price'] = 100*$item['cost']/(100-$item['margin']);
                    }
                    elseif ($item['margin'] && $item['retail_price']) {
                        $item['cost'] = $item['retail_price']*(100-$item['margin'])/100;
                    }
                    else
                    {
                        $item['margin'] = 0;
                        $item['retail_price'] = $item['cost'];
                    }
                }
                $itm[$k]->setItemCost($item['cost']);
                $itm[$k]->setItemMargin($item['margin']);
                $itm[$k]->setItemRetailPrice($item['retail_price']);
                $itm[$k]->setItemTaxRate($budget->getBudgetTaxRate());
                if ($budget->isNew()) {
                    $budget->addBudgetItem($itm[$k]);
                } else {
                    $itm[$k]->setItemBudgetId($budget->getId());
                    $itm[$k]->save();
                }
            }
        }
    }

    public function executeUpdateitems()
    {
        $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('budget_id'));

        $this->forward404Unless($budget);
        // Process budget item information
        if ($items = $this->getRequestParameter('items') ) {
            $this->saveItems($items, $budget);
        }
        $budget->save();
        $this->budget = $budget;
        $this->setTemplate('listitems');
        return sfView::SUCCESS;
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('budget/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'budget/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'budget/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'budget/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'budget/sort'))
        {
            $this->getUser()->setAttribute('sort', 'budget_date', 'budget/sort');
            $this->getUser()->setAttribute('type', 'asc', 'budget/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'budget/sort'))
        {
            $sort_column = BudgetPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'budget/sort') == 'asc')
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
        if (isset($this->filters['budget_from_is_empty']))
        {
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_DATE, '');
            $criterion->addOr($c->getNewCriterion(BudgetPeer::BUDGET_DATE, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['budget_from']) && $this->filters['budget_from'] !== '') {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['budget_from'], $this->getUser()->getCulture());
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
        }
        if (isset($this->filters['budget_to_is_empty']))
        {
            $criterion2 = $c->getNewCriterion(BudgetPeer::BUDGET_DATE, '');
            $criterion2->addOr($c->getNewCriterion(BudgetPeer::BUDGET_DATE, null, Criteria::ISNULL));
            $c->add($criterion2);
        }
        else if (isset($this->filters['budget_to']) && $this->filters['budget_to'] !== '') {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['budget_to'], $this->getUser()->getCulture());
            $criterion2 = $c->getNewCriterion(BudgetPeer::BUDGET_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
            if (isset($criterion)) {
                $criterion->addAnd($criterion2);
            }
            else
            {
                $criterion = $criterion2;
            }
        }
        if (isset($this->filters['budget_status_id_is_empty']))
        {
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_STATUS_ID, '');
            $criterion->addOr($c->getNewCriterion(BudgetPeer::BUDGET_STATUS_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['budget_status_id']) && $this->filters['budget_status_id'] !== '0' && $this->filters['budget_status_id'] !== '')
        {
            $c->add(BudgetPeer::BUDGET_STATUS_ID, $this->filters['budget_status_id']);
        }
        if (isset($this->filters['project_name_is_empty']))
        {
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_PROJECT_ID, '');
            $criterion->addOr($c->getNewCriterion(BudgetPeer::BUDGET_PROJECT_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['project_name']) && $this->filters['project_name'] && $this->filters['project_name'] != sfI18N::getInstance()->__('Project') . '...')
        {
            $c->add(ProjectPeer::PROJECT_NAME, '%'.$this->filters['project_name'].'%', Criteria::LIKE);
            $c->addJoin(ProjectPeer::ID, BudgetPeer::BUDGET_PROJECT_ID);
        }
        if (isset($this->filters['client_name_is_empty']))
        {
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_CLIENT_ID, '');
            $criterion->addOr($c->getNewCriterion(BudgetPeer::BUDGET_CLIENT_ID, null, Criteria::ISNULL));
            $c->add($criterion);
        }
        else if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfI18N::getInstance()->__('Client') . '...')
        {
            $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
            $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
            $criterion->addOr($crit2);
            $c->add($criterion);
            $c->addJoin(ClientPeer::ID, BudgetPeer::BUDGET_CLIENT_ID);
        }
        if (isset($this->filters['budget_name']) && $this->filters['budget_name'] && $this->filters['budget_name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $criterion = $c->getNewCriterion(BudgetPeer::BUDGET_NUMBER, "%".$this->filters['budget_name']."%", Criteria::LIKE);
            $criterion2 = $c->getNewCriterion(BudgetPeer::BUDGET_TITLE, "%".$this->filters['budget_name']."%", Criteria::LIKE);
            $criterion->addOr($criterion2);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }

    public function executeEditstatus ()
    {
        $this->budget_id = $this->getRequestParameter('id');
        $this->budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));
    }

    public function executeUpdatestatus ()
    {
        $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($budget);
        // Process budget status information
        $budget->setBudgetStatusId($this->getRequestParameter('budget_status_id') ? $this->getRequestParameter('budget_status_id') : null);
        if ($this->getRequestParameter('budget_status_id') == 2) {
            // Update date
            $budget->setBudgetDate(date('Y-m-d'));
        }
        if ($this->getRequestParameter('budget_status_id') == 3 && !$budget->getBudgetApprovedDate()) // Acepted
        {
            $budget->setBudgetApprovedDate(date("Y-m-d"));
        }

        $budget->save();
        $this->budget = $budget;
        return sfView::SUCCESS;
    }

    public function executePrint ()
    {
        $this->budget = BudgetPeer::retrieveByPK($this->getRequestParameter('id'));
        $this->forward404Unless($this->budget);
        $this->getContext()->getResponse()->setTitle($this->budget->getFullNumber());
        $this->setViewClass('sfFop');
        $this->setLayout('invoice.fo');
        return sfView::SUCCESS;
    }

    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $budget_name = $this->getRequestParameter('filters[budget_name]');
        if (!$budget_name) {
            $budget_name = $this->getRequestParameter('budget_name');
        }
        $this->budgets = BudgetPeer::getBudgetsLike($budget_name);
    }
}

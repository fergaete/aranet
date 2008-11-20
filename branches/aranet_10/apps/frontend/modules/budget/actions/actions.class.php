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

  /**
   * returns budget from params
   *
   * @return Budget
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getBudget()
  {
    if ($this->getRequestParameter('id')) {
      $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($budget);
    } else {
      $budget = new Budget();
    }
    return $budget;
  }

  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes stats action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeStats()
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * executes versions action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeVersions() {
    $budget = $this->getBudget();
    $c = new Criteria();
    $c->add(BudgetPeer::BUDGET_PREFIX, $budget->getBudgetPrefix());
    $c->add(BudgetPeer::BUDGET_NUMBER, $budget->getBudgetNumber());
    $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
    $this->budgets = BudgetPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes list action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeList() {
    $c = new Criteria();
    $c->add(BudgetPeer::BUDGET_IS_LAST, true);
    $this->processList($c);
    return sfView::SUCCESS;
  }

  /**
   * executes orderitems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeOrderitems() {
    $new_order = $this->getRequestParameter('order');
    for($i = 1; $i <= count($new_order); $i++) {
      $budget_item = BudgetItemPeer::retrieveByPK($new_order[$i-1]);
      $budget_item->setItemOrder($i);
      $budget_item->save();
    }
    return sfView::NONE;
  }

  /**
   * executes getTypeOfHours action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes create action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate()
  {
    $this->getUser()->setAttribute('index', 0);
    if (!$this->getFlash('budget')) {
      $this->budget = $this->getBudget();
    } else {
      $this->budget = $this->getFlash('budget');
    }
    if ($this->hasRequestParameter('id')) {
      // Copy object
      $new_budget = new Budget();
      $this->budget->copyInto($new_budget, true); // Include items
      $new_budget->setBudgetRevision($new_budget->getBudgetRevision()+1);
      $this->budget = $new_budget;
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

  /**
   * executes createinvoice action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreateinvoice()
  {
    if ($this->getRequestParameter('id')) {
      $budget = $this->getBudget();
      $new_invoice = new Invoice();
      // Copy items
      $new_invoice->copyFrom($budget);
    }
    $this->getUser()->setFlash('invoice', $new_invoice);
    $this->forward('invoice', 'create');
  }

  /**
   * executes edit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit()
  {
    $this->getUser()->setAttribute('index', 0);
    $this->budget = $this->getBudget();
    $c = new Criteria();
    if ($this->getRequestParameter('id') || $this->getRequestParameter('budget_client_id')) {
      $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->budget->getBudgetClientId());
    }
    $this->projects = ProjectPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $budget = $this->getBudget();
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

    $budget->save();
    return $this->redirect('budget/show?id='.$budget->getId());
  }

  /**
   * executes deleteitem action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDeleteitem()
  {
    if ($this->getRequestParameter('id')) {
      $budget_item = BudgetItemPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($budget_item);
      $budget_item->delete();
    }
    return sfView::SUCCESS;
  }

  /**
   * executes createitem action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreateitem()
  {
    $i = $this->getRequestParameter('index');
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
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * executes listitems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeListitems()
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * save budget items
   *
   * @param array $items
   * @param Budget $budget
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes updateitems action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdateitems()
  {
    $this->budget = $this->getBudget();
    // Process budget item information
    if ($items = $this->getRequestParameter('items') ) {
      $this->saveItems($items, $this->budget);
    }
    $this->budget->save();
    $this->setTemplate('listitems');
    return sfView::SUCCESS;
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes editstatus action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditstatus ()
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * executes updatestatus action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatestatus ()
  {
    $this->budget = $this->getBudget();
    // Process budget status information
    $this->budget->setBudgetStatusId($this->getRequestParameter('budget_status_id') ? $this->getRequestParameter('budget_status_id') : null);
    if ($this->getRequestParameter('budget_status_id') == 2) {
      // Update date
      $this->budget->setBudgetDate(date('Y-m-d'));
    }
    if ($this->getRequestParameter('budget_status_id') == 3 && !$this->budget->getBudgetApprovedDate()) // Acepted
    {
      $this->budget->setBudgetApprovedDate(date("Y-m-d"));
    }

    $this->budget->save();
    return sfView::SUCCESS;
  }

  /**
   * executes print action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executePrint ()
  {
    $this->budget = $this->getBudget();
    $this->getContext()->getResponse()->setTitle($this->budget->getFullNumber());
    $this->setViewClass('sfFop');
    $this->setLayout('invoice.fo');
    return sfView::SUCCESS;
  }

  /**
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

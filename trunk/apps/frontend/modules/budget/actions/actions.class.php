<?php

/**
 * budget actions.
 *
 * @package    ARANet
 * @subpackage budget
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class budgetActions extends anActions
{

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
   * returns budget from params
   *
   * @return Budget
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getBudget()
  {
    if ($request->getParameter('id')) {
      $budget = BudgetPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($budget);
    } else {
      $budget = new Budget();
    }
    return $budget;
  }

  /**
   * excute minilist from related class
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeMinilist($request)
  {
    $class_peer = $request->getParameter('related') . 'Peer';
    if (class_exists($class_peer)) {
      $object = call_user_func($class_peer.'::retrieveByPK', $request->getParameter('id'));
      if ($object) {
        $this->addresses = $object->getBudgets();
        $this->object = $object;
      }
    }
    return sfView::SUCCESS;
  }

  /**
   * excute stats action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeStats($request)
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * excute versions action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeVersions($request) {
    $budget = $this->getBudget();
    $c->add(BudgetPeer::BUDGET_PREFIX, $budget->getBudgetPrefix());
    $c->add(BudgetPeer::BUDGET_NUMBER, $budget->getBudgetNumber());
    $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_REVISION);
    $this->budgets = BudgetPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * excute list action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeList($request) {
    $c = new Criteria();
    $c->add(BudgetPeer::BUDGET_IS_LAST, true);
    $this->processList($c);
    return sfView::SUCCESS;
  }

  /**
   * excute orderitems action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeOrderitems($request) {
    $new_order = $request->getParameter('order');
    for($i = 1; $i <= count($new_order); $i++) {
      $budget_item = BudgetItemPeer::retrieveByPK($new_order[$i-1]);
      $budget_item->setItemOrder($i);
      $budget_item->save();
    }
    return sfView::NONE;
  }

  /**
   * excute getTypeOfHours action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeGetTypesOfHour($request) {
    if ($request->getParameter('id') == 1) {
      if (!($types_of_hour = $this->getUser()->getAttribute('types_of_hour'))) {
        $types_of_hour = TypeOfHourPeer::doSelect(new Criteria());
        $this->getUser()->setAttribute('types_of_hour', $types_of_hour);
      }
      $this->types_of_hour = $types_of_hour;
      $this->hour = $request->getParameter('hour');
    }
    $this->i = $request->getParameter('i');
    $this->cost = $request->getParameter('cost');
    return sfView::SUCCESS;
  }

  /**
   * excute show action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeShow($request)
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * excute create action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeCreate($request)
  {
    $this->getUser()->setAttribute('index', 0);
    if ($request->getParameter('copy_id')) {
      $c = new Criteria();
      $c->add(BudgetPeer::ID, $request->getParameter('copy_id'));
      $budget = BudgetPeer::doSelectOne($c);
      $new_budget = new Budget();
      if ($budget) {
        // Copy items
        $new_budget->copyFrom($budget);
      }
      $this->budget = $new_budget;
    } else {
      $this->budget = new Budget();
    }

    $this->setTemplate('edit');
    $c = new Criteria();
    if ($request->getParameter('client_id')) {
      $c->add(ProjectPeer::PROJECT_CLIENT_ID, $request->getParameter('client_id'));
      $this->projects = ProjectPeer::doSelect($c);
    }
    if ($request->getParameter('project_id')) {
      $this->projects = ProjectPeer::doSelect($c);
    }
    return sfView::SUCCESS;
  }

  /**
   * excute createinvoice action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeCreateinvoice($request)
  {
    if ($request->getParameter('id')) {
      $budget = $this->getBudget();
      $new_invoice = new Invoice();
      // Copy items
      $new_invoice->copyFrom($budget);
    }
    $this->getUser()->setFlash('invoice', $new_invoice);
    $this->forward('invoice', 'create');
  }

  /**
   * excute edit action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeEdit($request)
  {
    $this->getUser()->setAttribute('index', 0);
    $this->budget = $this->getBudget();
    $c = new Criteria();
    if ($request->getParameter('id') || $request->getParameter('budget_client_id')) {
      $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->budget->getBudgetClientId());
    }
    $this->projects = ProjectPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * excute edit action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeUpdate($request)
  {
    $budget = $this->getBudget();
    // Process Client
    if ($request->getParameter('budget_client_id', -1) == -1 || !$request->getParameter('budget_client_id', -1)) {
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
      $client_id = $request->getParameter('budget_client_id');
    }
    // Process Project
    if ($request->getParameter('budget_project_id', -1) == -1 || !$request->getParameter('budget_project_id', -1)) {
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
      $project_id = $request->getParameter('budget_project_id');
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
    $budget->setId($request->getParameter('id'));
    $budget->setBudgetPrefix($request->getParameter('budget_prefix'));
    $budget->setBudgetNumber($request->getParameter('budget_number'));
    $budget->setBudgetRevision($request->getParameter('budget_revision'));
    if ($request->getParameter('budget_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('budget_date'), $this->getUser()->getCulture());
      $budget->setBudgetDate("$y-$m-$d");
    }
    if ($request->getParameter('budget_status_id') == 3 && !$budget->getBudgetApprovedDate()) // Accepted
    {
      $budget->setBudgetApprovedDate(date("Y-m-d"));
    }
    if ($request->getParameter('budget_valid_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('budget_valid_date'), $this->getUser()->getCulture());
      $budget->setBudgetValidDate("$y-$m-$d");
    }
    $budget->setBudgetClientId($client_id);
    $budget->setBudgetProjectId($project_id);
    $budget->setBudgetCategoryId($request->getParameter('budget_category_id') ? $request->getParameter('budget_category_id') : null);
    $budget->setBudgetTitle($request->getParameter('budget_title'));
    $budget->setBudgetComments($request->getParameter('budget_comments'));
    $budget->setBudgetPrintComments($request->getParameter('budget_print_comments', 0));
    $budget->setBudgetTaxRate($request->getParameter('budget_tax_rate'));
    $budget->setBudgetFreightCharge($request->getParameter('budget_freight_charge'));
    $budget->setBudgetPaymentConditionId($request->getParameter('budget_payment_condition_id') ? $request->getParameter('budget_payment_condition_id') : null);
    $budget->setBudgetStatusId($request->getParameter('budget_status_id') ? $request->getParameter('budget_status_id') : null);

    // Process budget item information
    if ($items = $request->getParameter('items') ) {
      $this->saveItems($items, $budget);
    }

    $budget->removeAllTags();
    $budget->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);

    $budget->save();
    return $this->redirect('budget/show?id='.$budget->getId());
  }

  /**
   * excute deleteitem action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeDeleteitem($request)
  {
    if ($request->getParameter('id')) {
      $budget_item = BudgetItemPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($budget_item);
      $budget_item->delete();
    }
    return sfView::SUCCESS;
  }

  /**
   * excute createitem action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeCreateitem($equest)
  {
    $i = $request->getParameter('index');
    $i++;
    $this->i = $i;
    return sfView::INPUT;
  }

  /**
   * excute edititems action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeEdititems($request)
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * excute listitems action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeListitems()
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * excute saveitems action
   *
   * @param array $items
   * @param Budget $budget
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
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
   * excute updateitems action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeUpdateitems($request)
  {
    $this->budget = $this->getBudget();
    // Process budget item information
    if ($items = $request->getParameter('items') ) {
      $this->saveItems($items, $this->budget);
    }
    $budget->save();
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
    else if (isset($this->filters['project_name']) && $this->filters['project_name'] && $this->filters['project_name'] != sfContext::getInstance()->getI18N()->__('Project') . '...')
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
    else if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfContext::getInstance()->getI18N()->__('Client') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
      $c->addJoin(ClientPeer::ID, BudgetPeer::BUDGET_CLIENT_ID);
    }
    if (isset($this->filters['budget_name']) && $this->filters['budget_name'] && $this->filters['budget_name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
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
   * excute editstatus action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeEditstatus ($request)
  {
    $this->budget = $this->getBudget();
    return sfView::SUCCESS;
  }

  /**
   * excute updatestatus action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeUpdatestatus ($request)
  {
    $this->budget = $this->getBudget();
    // Process budget status information
    $this->budget->setBudgetStatusId($request->getParameter('budget_status_id') ? $request->getParameter('budget_status_id') : null);
    if ($request->getParameter('budget_status_id') == 2) {
      // Update date
      $this->budget->setBudgetDate(date('Y-m-d'));
    }
    if ($request->getParameter('budget_status_id') == 3 && !$this->budget->getBudgetApprovedDate()) // Acepted
    {
      $this->budget->setBudgetApprovedDate(date("Y-m-d"));
    }

    $this->budget->save();
    return sfView::SUCCESS;
  }

  /**
   * excute print action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executePrint ($request)
  {
    $this->budget = $this->getBudget
    $this->forward404Unless($this->budget);
    $this->getContext()->getResponse()->setTitle($this->budget->getFullNumber());
    $this->setViewClass('sfFop');
    $this->setLayout('invoice.fo');
    return sfView::SUCCESS;
  }

  /**
   * excute print action
   *
   * @param sfWebRequest $request
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeAutocomplete($request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->budgets = ClientPeer::getBudgetsLike($name);
  }
}

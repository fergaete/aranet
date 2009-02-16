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
   * executes edit action
   *
   * @param sfWebRequest $request A request object
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeEdit($request)
  {
    if ($edit = $request->hasParameter('id'))
    {
      $this->budget = $this->getObject();
    }
    else
    {
      $this->budget = new Budget();
    }
    $this->form = new BudgetForm($this->budget);
    
    //TODO
    $f = new sfForm();
    $b = new BudgetItem();
    $b->setItemBudgetId($this->budget->getId());
    $b->setItemOrder(1);
    $test = new BudgetItemForm($b);
    $f->embedForm("0", $test);
    $this->form->embedForm("budget_item", $f);
    
    if ($request->isMethod('post'))
    {
      $bud = $request->getParameter('budget');
      $this->form->bind($bud);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $budget = $this->form->getObject();
        if ($bud['budget_client_id']) {
          if ($bud['budget_client_id']['ids']) {
            $client = ClientPeer::retrieveByPk($bud['budget_client_id']['ids']);
          }
          if (!isset($client) || !$client) {
            $client = new Client();
            $client->setClientCompanyName($bud['budget_client_id']['name']);
            $client->setClientUniqueName($bud['budget_client_id']['name']);
            $client->save();
          }
          $budget->setClient($client);
        }
        
        if ($bud['budget_project_id']) {
          if ($bud['budget_project_id']['ids']) {
            $project = ProjectPeer::retrieveByPk($bud['budget_project_id']['ids']);
          }
          if (!isset($project) || !$project) {
            $project = new Project();
            $project->setProjectName($bud['budget_client_id']['name']);
            $project->save();
          }
          $budget->setProject($project);
        }
        
        $test->bind($bud['budget_item'][0]);
        $test->save();
        $this->form->saveEmbeddedForms();

        $budget->setTags($bud['tags']['name']);
        if ($bud['tags']['name']) {
          $budget->setProjectHasTags(true);
        }
        $budget->setContacts($bud['contact']);
        
        //unset($bud['budget_project_id'], $bud['budget_client_id'], $bud['contact'], $bud['tags']);
        echo "<pre>";
        $budget->fromArray($bud, true);
        print_r($budget);
                
        

        


        $budget->save();
        
        $this->setFlash('success', $this->__($edit ? 'Budget edited.' : 'Budget created.'));

        return $this->redirect('@budget_show_by_id?id='.$budget->getId());
      }
    }
  }

  /**
   * executes versions action
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
   * add custom criteria
   *
   * @param Criteria $c A criteria object
   */
  protected function addCustomCriteria($c)
  {
    $c->add(BudgetPeer::BUDGET_IS_LAST, true);
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    //TODO
  }

  /**
   * executes autocomplete action
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
  
  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'budget_date';
  }
  
  /**
   * Returns the table columns
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'actions', 'label' => $this->__('Actions')),
        array('name' => 'number', 'label' => $this->__('Number')),
        array('name' => 'title', 'label' => $this->__('Title')),
        array('name' => 'client', 'label' => $this->__('Client')),
        array('name' => 'project', 'label' => $this->__('Project')),
        array('name' => 'date', 'label' => $this->__('Date')),
        array('name' => 'status', 'label' => $this->__('Status')),
        array('name' => 'expenses', 'label' => $this->__('Expenses')),
        array('name' => 'incomes', 'label' => $this->__('Incomes'))
        );
    return $keys;
  }
}

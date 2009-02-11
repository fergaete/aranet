<?php

/**
 * project actions.
 *
 * @package    ARANet
 * @subpackage project
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class projectActions extends anActions
{

  /**
   * executes edit action
   *
   * @param $request
   */
  public function executeEdit($request)
  {
    if ($edit = $request->hasParameter('id'))
    {
      $this->project = $this->getObject();
    }
    else
    {
      $this->project = new Project();
    }
    
    $this->form = new ProjectForm($this->project);
    
    if ($request->isMethod('post'))
    {
      $pro = $request->getParameter('project');
      $this->form->bind($pro);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $project = $this->form->getObject();

        if ($pro['project_client_id']) {
          if ($pro['project_client_id']['ids']) {
            $client = ClientPeer::retrieveByPk($pro['project_client_id']['ids']);
          }
          if (!$client) {
            $client = new Client();
            $client->setClientCompanyName($pro['project_client_id']['name']);
            $client->setClientCommonName($pro['project_client_id']['name']);
            //$client->save();
          }
          $project->setClient($client);
        }
        $project->setTags($pro['tags']['name']);
        if ($pro['tags']['name']) {
          $project->setProjectHasTags(true);
        }
        $project->setContacts($pro['contact']);
        $project->save();
        
        $this->setFlash('success', $this->__($edit ? 'Project edited.' : 'Project created.'));

        return $this->redirect('@project_show_by_id?id='.$project->getId());
      }
    }
  }
  
  /**
   * executes autocomplete action
   *
   * @param $request
   */
  public function executeAutocomplete($request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->projects = ProjectPeer::getProjectsLike($name);
  }

  public function executeCreatemilestone()
  {
    $project = ProjectPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($project);
    $this->project_id = $project->getId();
    return sfView::INPUT;
  }

  public function executeCreatetask()
  {
    $project = ProjectPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($project);
    $this->project_id = $project->getId();
    $this->milestones = $project->getMilestones();
    return sfView::INPUT;
  }

  public function executeDeletetask()
  {
    $task = TaskPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($task);

    $task->delete();
    $this->setTemplate('delete');
    return sfView::SUCCESS;
  }

  public function executeEdittask()
  {
    $this->task = TaskPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->task);
    $project = ProjectPeer::retrieveByPk($this->task->getTaskProjectId());
    $this->forward404Unless($project);
    $this->project_id = $project->getId();
    $this->milestones = $project->getMilestones();
    $this->setTemplate('createtask');
    return sfView::INPUT;
  }

  public function executeDeletemilestone()
  {
    $milestone = MilestonePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($milestone);

    $milestone->delete();
    $this->setTemplate('delete');
    return sfView::SUCCESS;
  }

  public function executeEditmilestone()
  {
    $this->milestone = MilestonePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->milestone);
    $project = ProjectPeer::retrieveByPk($this->milestone->getMilestoneProjectId());
    $this->forward404Unless($project);
    $this->project_id = $project->getId();
    $this->setTemplate('createmilestone');
    return sfView::INPUT;
  }


  public function executeUpdatemilestone()
  {
    if (!$this->getRequestParameter('id'))
    {
      $milestone = new Milestone();
    }
    else
    {
      $milestone = MilestonePeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($milestone);
    }

    $milestone->setId($this->getRequestParameter('id'));
    $milestone->setMilestoneTitle($this->getRequestParameter('milestone_title'));
    $milestone->setMilestoneDescription($this->getRequestParameter('milestone_description'));
    if ($this->getRequestParameter('milestone_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('milestone_start_date'), $this->getUser()->getCulture());
      $milestone->setMilestoneStartDate("$y-$m-$d");
    }
    if ($this->getRequestParameter('milestone_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('milestone_finish_date'), $this->getUser()->getCulture());
      $milestone->setMilestoneFinishDate("$y-$m-$d");
    }
    $milestone->setMilestoneProjectId($this->getRequestParameter('milestone_project_id') ? $this->getRequestParameter('milestone_project_id') : null);
    $milestone->setMilestoneEstimatedHours($this->getRequestParameter('milestone_estimated_hours') ? $this->getRequestParameter('milestone_estimated_hours') : 0);

    $milestone->save();

    $c = new Criteria();
    $c->add(ProjectPeer::ID, $this->getRequestParameter('milestone_project_id'));
    $this->project = ProjectPeer::doSelectOne($c);
    $this->forward404Unless($this->project);

    return sfView::SUCCESS;
  }

  public function executeUpdatetask()
  {
    if (!$this->getRequestParameter('id'))
    {
      $task = new Task();
    }
    else
    {
      $task = TaskPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($task);
    }

    $task->setId($this->getRequestParameter('id'));
    $task->setTaskTitle($this->getRequestParameter('task_title'));
    $task->setTaskDescription($this->getRequestParameter('task_description'));
    if ($this->getRequestParameter('task_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('task_start_date'), $this->getUser()->getCulture());
      $task->setTaskStartDate("$y-$m-$d");
    }
    if ($this->getRequestParameter('task_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('task_finish_date'), $this->getUser()->getCulture());
      $task->setTaskFinishDate("$y-$m-$d");
    }
    $task->setTaskPriorityId($this->getRequestParameter('task_priority_id') ? $this->getRequestParameter('task_priority_id') : null);
    $task->setTaskProjectId($this->getRequestParameter('task_project_id') ? $this->getRequestParameter('task_project_id') : null);
    $task->setTaskMilestoneId($this->getRequestParameter('task_milestone_id') ? $this->getRequestParameter('task_milestone_id') : null);
    $task->setTaskEstimatedHours($this->getRequestParameter('task_estimated_hours') ? $this->getRequestParameter('task_estimated_hours') : 0);

    $task->save();

    // Process frequently task
    if ($this->getRequestParameter('task_is_frequently')) {
      $ftask = new FrequentlyTask();
      $ftask->setTaskTitle($this->getRequestParameter('task_title'));
      $ftask->setTaskDescription($this->getRequestParameter('task_description'));
      $ftask->setTaskPriorityId($this->getRequestParameter('task_priority_id') ? $this->getRequestParameter('task_priority_id') : null);
      $ftask->save();
    }

    $c = new Criteria();
    $c->add(ProjectPeer::ID, $this->getRequestParameter('task_project_id'));
    $this->project = ProjectPeer::doSelectOne($c);
    $this->forward404Unless($this->project);

    $this->setTemplate('updatemilestone');

    return sfView::SUCCESS;
  }

  public function executeGetFrecuentlyTaskTitle()
  {
    if ($this->getRequestParameter('id'))
    {
      $this->ftask = FrequentlyTaskPeer::retrieveByPk($this->getRequestParameter('id'));
    }
    return sfView::SUCCESS;
  }

  public function executeUpdatestatus()
  {
    if ($status_id = $this->getRequestParameter('project_status_id')) {
      $this->project = ProjectPeer::retrieveByPk($this->getRequestParameter('project_id'));
      if ($this->project) {
        $this->project->setProjectStatusId($status_id);
        switch ($status_id) {
          case 3:
          $this->project->setProjectFinishdate(date('Y-m-d'));
          break;
        }
        $this->project->save();
      }
    }
  }

  /**
   * add filter criteria
   *
   * @param Criteria $c
   */
  protected function addFiltersCriteria ($c)
  {
    /*
    if (isset($this->filters['project_from_is_empty']))
    {
      $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, '');
      $criterion->addOr($c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['project_from']) && $this->filters['project_from'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['project_from'], $this->getUser()->getCulture());
      $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
    }
    if (isset($this->filters['project_to_is_empty']))
    {
      $criterion2 = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, '');
      $criterion2->addOr($c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, null, Criteria::ISNULL));
      $c->add($criterion2);
    }
    else if (isset($this->filters['project_to']) && $this->filters['project_to'] !== '') {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->filters['project_to'], $this->getUser()->getCulture());
      $criterion2 = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
      if (isset($criterion)) {
        $criterion->addAnd($criterion2);
      }
      else
      {
        $criterion = $criterion2;
      }
    }
    if (isset($this->filters['client_name_is_empty']))
    {
      $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_CLIENT_ID, '');
      $criterion->addOr($c->getNewCriterion(ProjectPeer::PROJECT_CLIENT_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfContext::getInstance()->getI18N()->__('Client') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
      $c->addJoin(ClientPeer::ID, ProjectPeer::PROJECT_CLIENT_ID);
    }
    */
    if (isset($this->filters['name']))
    {
      if (isset($this->filters['name']['text']) && $this->filters['name']['text'] && $this->filters['name']['text'] != $this->__('Name') . '...')
      {
        $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_NUMBER, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $crit2 = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $criterion->addOr($crit2);   
        $c->add($criterion);
      }
      if (isset($this->filters['name']['is_empty']) && $this->filters['name']['is_empty'])
      {
        $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, null, Criteria::ISNULL);
        $crit2 = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, null, Criteria::ISNULL);
        $crit3 = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, "");
        $crit4 = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, "");
        $crit3->addOr($crit4);
        $criterion->addOr($crit2);
        $criterion->addOr($crit3);
        $c->add($criterion);
      }
    }
    $criterion = null;
    if (isset($this->filters['project_start_date_from'])) {
      list($d, $m, $y) = array($this->filters['project_start_date_from']['day'], $this->filters['project_start_date_from']['month'], $this->filters['project_start_date_from']['year']);
      if ($d && $m && $y) {
        $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
      }
    }
    if (isset($this->filters['project_start_date_to'])) {
      list($d, $m, $y) = array($this->filters['project_start_date_to']['day'], $this->filters['project_start_date_to']['month'], $this->filters['project_start_date_to']['year']);
      if ($d && $m && $y) {
        $crit1 = $c->getNewCriterion(ProjectPeer::PROJECT_START_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
        if ($criterion) {
          $criterion->addAnd($crit1);
        } else {
          $criterion = $crit1;
        }
      }
    }
    if (isset($criterion)) $c->add($criterion);
    $criterion = null;
    if (isset($this->filters['project_finish_date_from'])) {
      list($d, $m, $y) = array($this->filters['project_finish_date_from']['day'], $this->filters['project_finish_date_from']['month'], $this->filters['project_finish_date_from']['year']);
      if ($d && $m && $y) {
        $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_FINISH_DATE, $y.'-'.$m.'-'.$d, Criteria::GREATER_EQUAL);
      }
    }
    if (isset($this->filters['project_finish_date_to'])) {
      list($d, $m, $y) = array($this->filters['project_finish_date_to']['day'], $this->filters['project_finish_date_to']['month'], $this->filters['project_finish_date_to']['year']);
      if ($d && $m && $y) {
        $crit1 = $c->getNewCriterion(ProjectPeer::PROJECT_FINISH_DATE, $y.'-'.$m.'-'.$d, Criteria::LESS_EQUAL);
        if ($criterion) {
          $criterion->addAnd($crit1);
        } else {
          $criterion = $crit1;
        }
      }
    }
    if (isset($criterion)) $c->add($criterion);
    $criterion = null;
    if (isset($this->filters['project_status_id']) && !empty($this->filters['project_status_id']))
    {
      $c->add(ProjectPeer::PROJECT_STATUS_ID, $this->filters['project_status_id']);
    }
    if (isset($this->filters['project_category_id']) && !empty($this->filters['project_category_id']))
    {
      $c->add(ProjectPeer::PROJECT_CATEGORY_ID, $this->filters['project_category_id']);
    }
    if (isset($this->filters['project_client_id']))
    {
      if ($this->filters['project_client_id']['ids'] != '')
      {
        $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->filters['project_client_id']['ids']);
      } else {
        $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['project_client_id']['name']."%", Criteria::LIKE);
        $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['project_client_id']['name']."%", Criteria::LIKE);
        $criterion->addOr($crit2);
        $c->addJoin(ProjectPeer::PROJECT_CLIENT_ID, ClientPeer::ID);
      }
    }    
    if (isset($criterion)) $c->add($criterion);
  }

  public function executeGetClientSelect() {
    $c = new Criteria();
    $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getRequestParameter('client_id'));
    $this->projects = ProjectPeer::doSelect($c);
  }

  public function executeGetBudgetSelect() {
    $c = new Criteria();
    if ($this->getRequestParameter('project_id')) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getRequestParameter('project_id'));
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
    }
    return sfView::SUCCESS;
  }

  public function executeGetMilestones() {
    $c = new Criteria();
    $c->add(ProjectPeer::ID, $this->getRequestParameter('project_id'));
    $projects = ProjectPeer::doSelectJoinAllExceptsfGuardUserRelatedByDeletedBy($c);
    if (isset($projects[0])) {
      $this->project = $projects[0];
    } else {
      $this->project = new Project();
    }
    return sfView::SUCCESS;
  }

  public function executeGetTaskSelect() {
    $c = new Criteria();
    $c->add(TaskPeer::TASK_MILESTONE_ID, $this->getRequestParameter('milestone_id'));
    $c->addAscendingOrderByColumn(TaskPeer::TASK_START_DATE);
    $c->addAscendingOrderByColumn(TaskPeer::ID);
    $this->tasks = TaskPeer::doSelect($c);
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'project_number';
  }
  
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'actions', 'label' => $this->__('Actions')),
        array('name' => 'project_number', 'label' => $this->__('Number')),
        array('name' => 'project_name', 'label' => $this->__('Title'), 'sortable' => true, 'editor' => 'textbox'),
        array('name' => 'client', 'label' => $this->__('Client')),
        array('name' => 'project_start_date', 'label' => $this->__('Start'), 'sortable' => true),
        array('name' => 'project_end_date', 'label' => $this->__('End')),
        array('name' => 'project_status', 'label' => $this->__('Status')),
        array('name' => 'project_total_hours', 'label' => $this->__('Hours')),
        array('name' => 'project_total_incomes', 'label' => $this->__('Incomes')),
        array('name' => 'project_total_expenses', 'label' => $this->__('Expenses')),
        );
    return $keys;
  }
  
}

<?php

/**
 * project actions.
 *
 * @package    aranet
 * @subpackage project
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class projectActions extends anActions
{

  /**
   * returns project from params
   *
   * @return Project
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getProject()
  {
    if ($request->getParameter('id')) {
      $project = ProjectPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($project);
    } else {
      $project = new Project();
    }
    return $project;
  }
  
  /**
   * returns task from params
   *
   * @return Task
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getTask()
  {
    if ($request->getParameter('id')) {
      $task = TaskPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($task);
    } else {
      $task = new Task();
    }
    return $task;
  }
  
  /**
   * returns milestone from params
   *
   * @return Milestone
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getMilestone()
  {
    if ($request->getParameter('id')) {
      $milestone = MilestonePeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($milestone);
    } else {
      $milestone = new Milestone();
    }
    return $milestone;
  }
  
  /**
   * pre executes this action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function preExecute() {
    $this->referer = $this->getRequest()->getReferer();
    if (!($project_status = $this->getUser()->getAttribute('project_status'))) {
      $project_status = ProjectStatusPeer::doSelect(new Criteria());
      $this->getUser()->setAttribute('project_status', $project_status);
    }
    if (in_array($this->getActionName(), array('list', 'listByTag'))) {
      $this->project_status = $this->getUser()->getAttribute('project_status');
    }
  }
  
  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $project = $this->getProject();
    if ($request->getParameter('project_client_id', -1) == -1) {
      $client = new Client();
      $client->setClientCompanyName($request->getParameter('client_name'));
      $client->setClientUniqueName($request->getParameter('client_name'));
      $client->save();
      $client_id = $client->getId();
    } else {
      $client_id = $request->getParameter('project_client_id');
    }
    // Process contacts
    $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
    if ($contacts) {
      $i = 0;
      foreach($contacts as $contact) {
        $project->addContact($contact, ($i == 0));
        $i++;
      }
    }
    $project->setId($request->getParameter('id'));
    $project->setProjectPrefix($request->getParameter('project_prefix'));
    $project->setProjectNumber($request->getParameter('project_number'));
    $project->setProjectName($request->getParameter('project_name'));
    $project->setProjectUrl($request->getParameter('project_url'));
    $project->setProjectClientId($client_id);
    $project->setProjectComments($request->getParameter('project_comments'));
    $project->setProjectCategoryId($request->getParameter('project_category_id') ? $request->getParameter('project_category_id') : null);
    if ($request->getParameter('project_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('project_start_date'), $this->getUser()->getCulture());
      $project->setProjectStartDate("$y-$m-$d");
    }
    if ($request->getParameter('project_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('project_finish_date'), $this->getUser()->getCulture());
      $project->setProjectFinishDate("$y-$m-$d");
    }
    $project->setProjectStatusId($request->getParameter('project_status_id') ? $request->getParameter('project_status_id') : null);
    $project->removeAllTags();
    $project->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);

    $project->save();

    return $this->redirect('project/show?id='.$project->getId());
  }

  /**
   * executes createmilestone action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreatemilestone()
  {
    $this->project = $this->getProject();
    return sfView::INPUT;
  }

  /**
   * executes createtask action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreatetask()
  {
    $this->project = $this->getProject();
    $this->milestones = $this->project->getMilestones();
    return sfView::INPUT;
  }

  /**
   * executes createtask action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDeletetask()
  {
    $task = $this->getTask();
    $task->delete();
    $this->setTemplate('delete');
    return sfView::SUCCESS;
  }

  /**
   * executes edittask action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdittask()
  {
    $this->task = $this->getTask();
    if ($this->task->getTaskProjectId()) {
      $this->project = ProjectPeer::retrieveByPk($this->task->getTaskProjectId());
    }
    $this->forward404Unless($this->project);
    $this->setTemplate('createtask');
    return sfView::INPUT;
  }

  /**
   * executes deletemilestone action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDeletemilestone()
  {
    $milestone = $this->getMilestone();
    $milestone->delete();
    $this->setTemplate('delete');
    return sfView::SUCCESS;
  }

  /**
   * executes editmilestone action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditmilestone()
  {
    $this->milestone = $this->getMilestone();
    if ($this->milestone->getMilestoneProjectId()) {
      $this->project = ProjectPeer::retrieveByPk($this->milestone->getMilestoneProjectId());
    }
    $this->forward404Unless($this->project);
    $this->setTemplate('createmilestone');
    return sfView::INPUT;
  }

  /**
   * executes updatemilestone action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatemilestone()
  {
    $milestone = $this->getMilestone();
    $milestone->setId($request->getParameter('id'));
    $milestone->setMilestoneTitle($request->getParameter('milestone_title'));
    $milestone->setMilestoneDescription($request->getParameter('milestone_description'));
    if ($request->getParameter('milestone_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('milestone_start_date'), $this->getUser()->getCulture());
      $milestone->setMilestoneStartDate("$y-$m-$d");
    }
    if ($request->getParameter('milestone_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('milestone_finish_date'), $this->getUser()->getCulture());
      $milestone->setMilestoneFinishDate("$y-$m-$d");
    }
    $milestone->setMilestoneProjectId($request->getParameter('milestone_project_id') ? $request->getParameter('milestone_project_id') : null);
    $milestone->setMilestoneEstimatedHours($request->getParameter('milestone_estimated_hours') ? $request->getParameter('milestone_estimated_hours') : 0);

    $milestone->save();

    $c = new Criteria();
    $c->add(ProjectPeer::ID, $request->getParameter('milestone_project_id'));
    $this->project = ProjectPeer::doSelectOne($c);
    $this->forward404Unless($this->project);

    return sfView::SUCCESS;
  }

  /**
   * executes updatetask action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatetask()
  {
    $task = $this->getTask();
    $task->setId($request->getParameter('id'));
    $task->setTaskTitle($request->getParameter('task_title'));
    $task->setTaskDescription($request->getParameter('task_description'));
    if ($request->getParameter('task_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('task_start_date'), $this->getUser()->getCulture());
      $task->setTaskStartDate("$y-$m-$d");
    }
    if ($request->getParameter('task_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('task_finish_date'), $this->getUser()->getCulture());
      $task->setTaskFinishDate("$y-$m-$d");
    }
    $task->setTaskPriorityId($request->getParameter('task_priority_id') ? $request->getParameter('task_priority_id') : null);
    $task->setTaskProjectId($request->getParameter('task_project_id') ? $request->getParameter('task_project_id') : null);
    $task->setTaskMilestoneId($request->getParameter('task_milestone_id') ? $request->getParameter('task_milestone_id') : null);
    $task->setTaskEstimatedHours($request->getParameter('task_estimated_hours') ? $request->getParameter('task_estimated_hours') : 0);

    $task->save();

    // Process frequently task
    if ($request->getParameter('task_is_frequently')) {
      $ftask = new FrequentlyTask();
      $ftask->setTaskTitle($request->getParameter('task_title'));
      $ftask->setTaskDescription($request->getParameter('task_description'));
      $ftask->setTaskPriorityId($request->getParameter('task_priority_id') ? $request->getParameter('task_priority_id') : null);
      $ftask->save();
    }

    $this->project = ProjectPeer::retrieveByPk($request->getParameter('task_project_id'));
    $this->forward404Unless($this->project);

    $this->setTemplate('updatemilestone');

    return sfView::SUCCESS;
  }

  /**
   * executes stats action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeStats(sfWebRequest $request)
  {
    $this->project = $this->getProject();
    return sfView::SUCCESS;
  }

  /**
   * executes getFrecuentlyTaskTitle action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetFrecuentlyTaskTitle()
  {
    if ($request->getParameter('id'))
    {
      $this->ftask = FrequentlyTaskPeer::retrieveByPk($request->getParameter('id'));
    }
    return sfView::SUCCESS;
  }

  /**
   * executes updatestatus action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatestatus()
  {
    if ($status_id = $request->getParameter('project_status_id')) {
      $this->project = $this->getProject();
      $this->project->setProjectStatusId($status_id);
      switch ($status_id) {
        case 3:
          $this->project->setProjectFinishdate(date('Y-m-d'));
          break;
      }
      $this->project->save();
    }
    return sfView::SUCCESS;
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortField()
  {
    return 'project_number';
    // TODO
    //return 'CONCAT(' . ProjectPeer::PROJECT_PREFIX.", ' ', " . ProjectPeer::PROJECT_NUMBER.')';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
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
    if (isset($this->filters['project_status_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_STATUS_ID, '');
      $criterion->addOr($c->getNewCriterion(ProjectPeer::PROJECT_STATUS_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['project_status_id']) && $this->filters['project_status_id'] !== '0' && $this->filters['project_status_id'] !== '')
    {
      $c->add(ProjectPeer::PROJECT_STATUS_ID, $this->filters['project_status_id']);
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
    if (isset($this->filters['project_name']) && $this->filters['project_name'] && $this->filters['project_name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(ProjectPeer::PROJECT_NUMBER, "%".$this->filters['project_name']."%", Criteria::LIKE);
      $criterion2 = $c->getNewCriterion(ProjectPeer::PROJECT_NAME, "%".$this->filters['project_name']."%", Criteria::LIKE);
      $criterion->addOr($criterion2);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete()
  {
    sfConfig::set('sf_web_debug', false);
    $project_name = $request->getParameter('filters[project_name]');
    if (!$project_name) {
      $project_name = $request->getParameter('project_name');
    }
    $this->projects = ProjectPeer::getProjectsLike($project_name);
    return sfView::SUCCESS;
  }

  /**
   * executes getClientSelect action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetClientSelect() {
    $c = new Criteria();
    $c->add(ProjectPeer::PROJECT_CLIENT_ID, $request->getParameter('client_id'));
    $this->projects = ProjectPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes getBudgetSelect action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetBudgetSelect() {
    $c = new Criteria();
    if ($request->getParameter('project_id')) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $request->getParameter('project_id'));
      $c->add(BudgetPeer::BUDGET_IS_LAST, 1);
      $c->addAscendingOrderByColumn(BudgetPeer::BUDGET_DATE);
      $this->budgets = BudgetPeer::doSelect($c);
    }
    return sfView::SUCCESS;
  }

  /**
   * executes getMilestones action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetMilestones() {
    $c = new Criteria();
    $c->add(ProjectPeer::ID, $request->getParameter('project_id'));
    $this->project = ProjectPeer::doSelectOne($c);
    return sfView::SUCCESS;
  }

  /**
   * executes getTaskSelect action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetTaskSelect() {
    $c = new Criteria();
    $c->add(TaskPeer::TASK_MILESTONE_ID, $request->getParameter('milestone_id'));
    $c->addAscendingOrderByColumn(TaskPeer::TASK_START_DATE);
    $c->addAscendingOrderByColumn(TaskPeer::ID);
    $this->tasks = TaskPeer::doSelect($c);
    return sfView::SUCCESS;
  }

}

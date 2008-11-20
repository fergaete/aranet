<?php

/**
 * project actions.
 *
 * @package    aranet
 * @subpackage project
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class projectActions extends myActions
{

  /**
   * returns project from params
   *
   * @return Project
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getProject()
  {
    if ($this->getRequestParameter('id')) {
      $project = ProjectPeer::retrieveByPk($this->getRequestParameter('id'));
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
    if ($this->getRequestParameter('id')) {
      $task = TaskPeer::retrieveByPk($this->getRequestParameter('id'));
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
    if ($this->getRequestParameter('id')) {
      $milestone = MilestonePeer::retrieveByPk($this->getRequestParameter('id'));
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
    if (!$this->getRequestParameter('project_client_id')) {
      $client = new Client();
      $client->setClientCompanyName($this->getRequestParameter('client_name'));
      $client->setClientUniqueName($this->getRequestParameter('client_name'));
      $client->save();
      $client_id = $client->getId();
    } else {
      $client_id = $this->getRequestParameter('project_client_id');
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
    $project->setId($this->getRequestParameter('id'));
    $project->setProjectPrefix($this->getRequestParameter('project_prefix'));
    $project->setProjectNumber($this->getRequestParameter('project_number'));
    $project->setProjectName($this->getRequestParameter('project_name'));
    $project->setProjectUrl($this->getRequestParameter('project_url'));
    $project->setProjectClientId($client_id);
    $project->setProjectComments($this->getRequestParameter('project_comments'));
    $project->setProjectCategoryId($this->getRequestParameter('project_category_id') ? $this->getRequestParameter('project_category_id') : null);
    if ($this->getRequestParameter('project_start_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('project_start_date'), $this->getUser()->getCulture());
      $project->setProjectStartDate("$y-$m-$d");
    }
    if ($this->getRequestParameter('project_finish_date'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('project_finish_date'), $this->getUser()->getCulture());
      $project->setProjectFinishDate("$y-$m-$d");
    }
    $project->setProjectStatusId($this->getRequestParameter('project_status_id') ? $this->getRequestParameter('project_status_id') : null);
    $project->removeAllTags();
    $project->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

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
    $this->milestones = $project->getMilestones();
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
    $this->project = ProjectPeer::retrieveByPk($this->task->getTaskProjectId());
    $this->forward404Unless($this->project);
    $this->milestones = $project->getMilestones();
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
    $project = ProjectPeer::retrieveByPk($this->milestone->getMilestoneProjectId());
    $this->forward404Unless($project);
    $this->project_id = $project->getId();
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

  /**
   * executes updatetask action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdatetask()
  {
    $task = $this->getTask();
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

  /**
   * executes stats action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeStats()
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
    if ($this->getRequestParameter('id'))
    {
      $this->ftask = FrequentlyTaskPeer::retrieveByPk($this->getRequestParameter('id'));
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
    if ($status_id = $this->getRequestParameter('project_status_id')) {
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
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getSortColumn()
  {
    // TODO
    return 'project_number';
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
    else if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfI18N::getInstance()->__('Client') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
      $c->addJoin(ClientPeer::ID, ProjectPeer::PROJECT_CLIENT_ID);
    }
    if (isset($this->filters['project_name']) && $this->filters['project_name'] && $this->filters['project_name'] != sfI18N::getInstance()->__('Name') . '...')
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
    $project_name = $this->getRequestParameter('filters[project_name]');
    if (!$project_name) {
      $project_name = $this->getRequestParameter('project_name');
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
    $c->add(ProjectPeer::PROJECT_CLIENT_ID, $this->getRequestParameter('client_id'));
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
    if ($this->getRequestParameter('project_id')) {
      $c->add(BudgetPeer::BUDGET_PROJECT_ID, $this->getRequestParameter('project_id'));
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
    $c->add(ProjectPeer::ID, $this->getRequestParameter('project_id'));
    $this->project = ProjectPeer::doSelect($c);
    return sfView::SUCCESS;
  }

  /**
   * executes getTaskSelect action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeGetTaskSelect() {
    $c = new Criteria();
    $c->add(TaskPeer::TASK_MILESTONE_ID, $this->getRequestParameter('milestone_id'));
    $c->addAscendingOrderByColumn(TaskPeer::TASK_START_DATE);
    $c->addAscendingOrderByColumn(TaskPeer::ID);
    $this->tasks = TaskPeer::doSelect($c);
    return sfView::SUCCESS;
  }

}

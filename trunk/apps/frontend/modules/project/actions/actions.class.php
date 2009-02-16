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
   * @param sfWebRequest $request A request object
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
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
          if (!isset($client) || !$client) {
            $client = new Client();
            $client->setClientCompanyName($pro['project_client_id']['name']);
            $client->setClientUniqueName($pro['project_client_id']['name']);
            $client->save();
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
   * @param sfWebRequest $request A reques object
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  public function executeAutocomplete($request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->projects = ProjectPeer::getProjectsLike($name);
  }

  /**
   * add filter criteria
   *
   * @param  Criteria $c a criteria object
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  protected function addFiltersCriteria ($c)
  {
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

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  protected function getDefaultSortField()
  {
    return 'project_number';
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

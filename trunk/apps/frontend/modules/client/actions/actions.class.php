<?php

/**
  * client actions.
  *
  * @package    ARANet
  * @subpackage client
  * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
  * @version    SVN: $Id$
  */
class clientActions extends anActions
{

  /**
   * executes edit action
   *
   * @param $request
   */
  public function executeEdit($request)
  {
    $this->client = $this->getObject();
    $edit = $request->hasParameter('id');
    $this->form = new ClientForm($this->client);
    
    if ($request->isMethod('post'))
    {
      $cli = $request->getParameter('client');
      $this->form->bind($cli);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $client = $this->form->getObject();

        $client->setTags($cli['tags']['name']);
        if ($cli['tags']['name']) {
          $client->setClientHasTags(true);
        }
        $client->setContacts($cli['contacts']);    
        $client->setAddresses($cli['address']);
        $client->save();
        
        $this->setFlash('success', $this->__($edit ? 'Client edited.' : 'Client created.'));

        return $this->redirect('@client_show_by_id?id='.$client->getId());
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
    $this->clients = ClientPeer::getClientsLike($name);
  }

  /**
   * add filter criteria
   *
   * @param Criteria $c
   */
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['name']) && $this->filters['name'] && $this->filters['name'] != $this->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'client_company_name';
  }
  
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'actions', 'label' => $this->__('Actions')),
        array('name' => 'client_company_name', 'label' => $this->__('Company'), 'sortable' => true, 'editor' => true),
        array('name' => 'contact', 'label' => $this->__('Main contact')),
        array('name' => 'phone', 'label' => $this->__('Phone')),
        array('name' => 'nb_projects', 'label' => $this->__('Projects')),
        array('name' => 'revenue', 'label' => $this->__('Revenue'))
        );
    return $keys;
  }
  

}
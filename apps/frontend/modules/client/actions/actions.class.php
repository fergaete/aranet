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
    if ($edit = $request->hasParameter('id'))
    {
      $this->client = $this->getClient();
    }
    else
    {
      $this->client = new Client();
    }
    
    $this->form = new anClientEditForm($this->client);
    
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
   * executes show action
   *
   * @param $request
   */
  public function executeShow($request)
  {
    $this->client = $this->getClient();
    return sfView::SUCCESS;
  }

  /**
   * executes stats action
   *
   * @param $request
   */
  public function executeStats($request)
  {
    $this->client = $this->getClient();
    return sfView::SUCCESS;
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
   * executes delete action
   *
   * @param $request
   */
  public function executeDelete($request)
  {
    $select = $request->getParameter('select', array());
    if ($id = $request->getParameter('id')) {
      $select[] = $id;
    }
    foreach ($select as $item) {
      if ($item != 0) {
        $client = ClientPeer::retrieveByPk($item);
        $this->forward404Unless($client);
        $client->delete();
      }
    }

    if ($request->isXmlHttpRequest()) {
      return sfView::SUCCESS;
    } else {
      $this->redirect('@client_list');
    }
  }

  /**
   * add filter criteria
   *
   * @param Criteria $c
   */
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['name']) && $this->filters['name'] && $this->filters['name'] != __('Name') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * Returns the client from the request parameter "id"
   *
   * @return Client
   */
  private function getClient()
  {
    $c = new Criteria();
    $c->add(ClientPeer::ID, $this->getRequestParameter('id'));

    $clients = ClientPeer::doSelectJoinKindOfCompany($c);

    $this->forward404Unless(isset($clients[0]) && $clients[0]);

    return $clients[0];
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getSortColumn()
  {
    return ClientPeer::CLIENT_COMPANY_NAME;
  }
}
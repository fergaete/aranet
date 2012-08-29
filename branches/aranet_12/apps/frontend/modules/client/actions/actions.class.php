<?php

/**
 * client actions.
 *
 * @package    aranet
 * @subpackage client
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class clientActions extends anActions
{

  /**
   * executes edit action
   *
   * @param $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $this->client = $this->getObject();
    $edit = $request->hasParameter('id');
    $this->form = new ClientForm($this->client, array('url' => $this->getController()->genUrl('contact/autocomplete')));
    
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
   * returns client from params
   *
   * @return Client
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getClient()
  {
    if ($this->hasRequestParameter('id')) {
      $client = ClientPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($client);
    } else {
      $client = new Client();
    }
    return $client;
  }

  /**
   * executes stats action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeStats(sfWebRequest $request)
  {
    $this->client = $this->getClient();
    return sfView::SUCCESS;
  }

  /**
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    $client_name = $request->getParameter('filters[client_name]', $request->getParameter('client_name'));
    if (!$client_name) {
      $client_name = $request->getParameter('company_name');
    }
    $this->clients = ClientPeer::getClientsLike($client_name);
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate(sfWebRequest $request)
  {
    $client = $this->getClient();
    // Process contacts
    $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
    if ($contacts) {
      $i = 0;
      foreach($contacts as $contact) {
        $client->addContact($contact, ($i==0));
        $i++;
      }
    }
    // Process addresses
    $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
    if ($addresses) {
      if (count($addresses)) {
        $addresses[0]->setAddressIsDefault(true);
      }
      foreach($addresses as $address) {
        $client->addAddress($address);
      }
    }

    $client->setClientUniqueName($request->getParameter('client_unique_name'));
    $client->setClientCompanyName($request->getParameter('client_company_name'));
    $client->setClientCif($request->getParameter('client_cif'));
    $client->setClientKindOfCompanyId($request->getParameter('client_kind_of_company_id') ? $request->getParameter('client_kind_of_company_id') : null);
    if ($request->getParameter('client_since'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('client_since'), $this->getUser()->getCulture());
      $client->setClientSince("$y-$m-$d");
    }
    $client->setClientWebsite($request->getParameter('client_website'));
    $client->setClientComments($request->getParameter('client_comments'));
    $client->removeAllTags();
    $client->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);

    $client->save();

    return $this->redirect('@client_show_by_id?id='.$client->getId());
  }

  /**
   * executes editbusiness action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditbusiness(sfWebRequest $request)
  {
    $this->business = KindOfCompanyPeer::doSelect(new Criteria());
    return sfView::SUCCESS;
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortField()
  {
    return 'client_unique_name';
  }

  /**
   * add filter criteria
   * 
   * @param Criteria $c
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['name']))
    {
      if (isset($this->filters['name']['text']) && $this->filters['name']['text'] && $this->filters['name']['text'] != $this->__('Name') . '...')
      {
        $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $criterion->addOr($crit2);   
      }
      if (isset($this->filters['name']['is_empty']) && $this->filters['name']['is_empty'])
      {
        
        $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, null, Criteria::ISNULL);
        
        $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, null, Criteria::ISNULL);
        $crit3 = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "");
        $crit4 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "");
        $crit3->addOr($crit4);
        $criterion->addOr($crit2);
        $criterion->addOr($crit3);
      }
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

}

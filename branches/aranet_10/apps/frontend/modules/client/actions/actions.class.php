<?php

/**
 * client actions.
 *
 * @package    aranet
 * @subpackage client
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class clientActions extends myActions
{

  /**
   * returns client from params
   *
   * @return Client
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getClient()
  {
    if ($this->getRequestParameter('id')) {
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
  public function executeStats()
  {
    $this->client = $this->getClient();
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
    $client_name = $this->getRequestParameter('filters[client_name]', $this->getRequestParameter('client_name'));
    if (!$client_name) {
      $client_name = $this->getRequestParameter('company_name');
    }
    $this->clients = ClientPeer::getClientsLike($client_name);
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
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

    $client->setClientUniqueName($this->getRequestParameter('client_unique_name'));
    $client->setClientCompanyName($this->getRequestParameter('client_company_name'));
    $client->setClientCif($this->getRequestParameter('client_cif'));
    $client->setClientKindOfCompanyId($this->getRequestParameter('client_kind_of_company_id') ? $this->getRequestParameter('client_kind_of_company_id') : null);
    if ($this->getRequestParameter('client_since'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('client_since'), $this->getUser()->getCulture());
      $client->setClientSince("$y-$m-$d");
    }
    $client->setClientWebsite($this->getRequestParameter('client_website'));
    $client->setClientComments($this->getRequestParameter('client_comments'));
    $client->removeAllTags();
    $client->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

    $client->save();

    return $this->redirect('@show_client_by_id?id='.$client->getId());
  }

  /**
   * executes editbusiness action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEditbusiness()
  {
    $this->business = KindOfCompanyPeer::doSelect(new Criteria());
    return sfView::SUCCESS;
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortColumn()
  {
    return ClientPeer::CLIENT_COMMON_NAME;
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['client_name']) && $this->filters['client_name'] && $this->filters['client_name'] != sfI18N::getInstance()->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(ClientPeer::CLIENT_COMPANY_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ClientPeer::CLIENT_UNIQUE_NAME, "%".$this->filters['client_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

}

<?php

/**
 * contact actions.
 *
 * @package    ARANet
 * @subpackage contact
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class contactActions extends anActions
{

  /**
   * executes minilist action
   *
   * @param $request
   */
  public function executeMinilist($request)
  {
    $class_peer = $request->getParameter('related') . 'Peer';
    if (class_exists($class_peer)) {
      $object = call_user_func($class_peer.'::retrieveByPK', $request->getParameter('id'));
      if ($object) {
        $this->contacts = $object->getContacts();
        $this->object = $object;
      }
    }
    $this->setLayout(false);
    return sfView::SUCCESS;
  }

  /**
   * executes history action
   *
   * @param $request
   */
  public function executeHistory($request)
  {
    $this->contact = $this->getObject();
    return sfView::SUCCESS;
  }

  /**
   * executes edit action
   *
   * @param $request
   */
  public function executeEdit($request)
  {
    if ($edit = $request->hasParameter('id'))
    {
      $this->contact = $this->getObject();
    }
    else
    {
      $this->contact = new Contact();
    }
    
    $this->form = new ContactForm($this->contact);
    
    if ($request->isMethod('post'))
    {
      $con = $request->getParameter('contact');

      $this->form->bind($con);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $contact = $this->form->getObject();

        $contact->setTags($con['tags']['name']);
        $contact->setAddresses($con['address']);
        $contact->save();
        
        $this->setFlash('success', $this->__($edit ? 'Contact edited.' : 'Contact created.'));

        return $this->redirect('@contact_show_by_id?id='.$contact->getId());
      }
    }
  }
  /**
   * executes miniedit action
   *
   * @param $request
   */
  public function executeMiniedit($request)
  {
    return sfView::SUCCESS;
  }

  /**
   * executes deleteObject action
   *
   * @param $request
   */
  public function executeDeleteObject($request)
  {
    $c = new Criteria();
    $class = $request->getParameter('related');
    $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
    $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
    $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
    $contact = ObjectContactPeer::doDelete($c);
    return sfView::SUCCESS;
  }

  /**
   * executes autocomplete action
   *
   * @param $request
   */
  public function executeAutocomplete()
  {
    sfConfig::set('sf_web_debug', false);
    $name = $this->getRequestParameter('query');
    $this->setLayout(false);
    $this->contacts = ContactPeer::getContactsLike($name);
  }

  /**
   * executes getCompanies action
   *
   * @param $request
   */
  public function executeGetCompanies()
  {
    sfConfig::set('sf_web_debug', false);
    $company_name = $this->getRequestParameter('company_name');
    if ($company_name) {
      $clients = ClientPeer::getClientsLike($company_name);
      $vendors = VendorPeer::getVendorsLike($company_name);
      $this->companies = array_merge($clients, $vendors);
      return sfView::SUCCESS;
    }
    return sfView::NONE;
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
      $concatField = 'CONCAT(' . ContactPeer::CONTACT_FIRST_NAME.", ' ', " . ContactPeer::CONTACT_LAST_NAME.')';
      $c->add(ContactPeer::ID, $concatField." LIKE '%".$this->filters['name']['text']."%'", Criteria::CUSTOM);
    }
  }
  
  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'name';
  }
  
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'actions', 'label' => $this->__('Actions')),
        array('name' => 'name', 'label' => $this->__('Name'), 'sortable' => true, 'editor' => 'textbox'),
        array('name' => 'contact_email', 'label' => $this->__('E-Mail'), 'sortable' => true, 'editor' => 'textbox', 'parser' => 'email'),
        array('name' => 'contact_phone', 'label' => $this->__('Phone')),
        array('name' => 'contact_fax', 'label' => $this->__('Fax')),
        array('name' => 'contact_mobile', 'label' => $this->__('Mobile'), 'editor' => 'textbox'),
        array('name' => 'contact_address', 'label' => $this->__('Address'))
        );
    return $keys;
  }

}

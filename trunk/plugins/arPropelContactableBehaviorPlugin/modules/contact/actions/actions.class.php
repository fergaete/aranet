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
    switch ($request->getParameter('related')) {
      case "Vendor":
      case "vendor":
        $object = VendorPeer::retrieveByPK($this->getRequestParameter('id'));
        break;
      case "Client":
      case "client":
        $object = ClientPeer::retrieveByPK($this->getRequestParameter('id'));
        break;
      case "Project":
      case "project":
        $object = ProjectPeer::retrieveByPK($this->getRequestParameter('id'));
        break;
      case "Budget":
      case "budget":
        $object = BudgetPeer::retrieveByPK($this->getRequestParameter('id'));
        break;
      default:
        $object = null;
        $this->contacts = null;
    }
    if ($object) {
      $this->contacts = $object->getContacts();
    }
    $this->object = $object;
    $this->setLayout(false);
    return sfView::SUCCESS;
  }

  /**
   * executes stats action
   *
   * @param $request
   */
  public function executeStats($request)
  {
    $this->contact = $this->getContact();
    return sfView::SUCCESS;
  }

  /**
   * executes history action
   *
   * @param $request
   */
  public function executeHistory($request)
  {
    $this->contact = $this->getContact();
    return sfView::SUCCESS;
  }

  /**
   * executes show action
   *
   * @param $request
   */
  public function executeShow($request)
  {
    $this->executeStats($request);
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
      $this->contact = $this->getContact();
    }
    else
    {
      $this->contact = new Contact();
    }
    
    $this->form = new anContactEditForm($this->contact);
    
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
        $contact = ContactPeer::retrieveByPk($item);
        $this->forward404Unless($contact);
        $contact->delete();
      }
    }

    if ($request->isXmlHttpRequest()) {
      return sfView::SUCCESS;
    } else {
      $this->redirect('@contact_list');
    }
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
    //$contact = array_pop($contacts);
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
      $c->add(ContactPeer::ID, $concatField." LIKE '%".$this->filters['name']."%'", Criteria::CUSTOM);
    }
  }
  
  /**
   * Returns the contact from the request parameter "id"
   *
   * @return Contact
   */
  private function getContact()
  {
    $c = new Criteria();
    $c->add(ContactPeer::ID, $this->getRequestParameter('id'));

    $contacts = ContactPeer::doSelect($c);

    $this->forward404Unless(isset($contacts[0]) && $contacts[0]);

    return $contacts[0];
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getSortColumn()
  {
    return 'CONCAT(' . ContactPeer::CONTACT_FIRST_NAME.", ' ', " . ContactPeer::CONTACT_LAST_NAME.')';
  }
}

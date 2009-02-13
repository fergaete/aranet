<?php

/**
 * contact actions.
 *
 * @package    aranet
 * @subpackage contact
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class contactActions extends myActions
{
  
  /**
   * returns contact from params
   *
   * @return Contact
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getContact()
  {
    if ($this->getRequestParameter('id')) {
      $contact = ContactPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($contact);
    } else {
      $contact = new Contact();
    }
    return $contact;
  }

  /**
   * executes minilist action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeMinilist()
  {
    $class_peer = $this->getRequestParameter('class') . 'Peer';
    if (class_exists($class_peer)) {
      $object = call_user_func($class_peer.'::retrieveByPK', $this->getRequestParameter('id'));
      if ($object) {
        $this->contacts = $object->getContacts();
        $this->object = $object;
      }
    }
    $this->setLayout(false);
    return sfView::SUCCESS;
  }

  /**
   * executes minicreate action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeMinicreate()
  {
    $this->contact = new Contact();
    $index = $this->getUser()->getAttribute('index', -1);
    $index++;
    $this->getUser()->setAttribute('index', $index);
    $this->index = $index;
    $this->setTemplate('miniedit');
    return sfView::SUCCESS;
  }

  /**
   * executes miniedit action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeMiniedit()
  {
    $this->contact = $this->getContact();
    $this->index = 0;
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $contact = $this->getContact();
    // Process addresses
    $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
    if ($addresses) {
      if (count($addresses)) {
        $addresses[0]->setAddressIsDefault(true);
      }
      foreach($addresses as $address) {
        $contact->addAddress($address);
      }
    }
    $class = $this->getRequestParameter('company_class');
    if (strpos($class, ' ') !== false)
      $class = substr($class, 0, strpos($class, ' '));
    // Eliminar los objectos asociados al cliente    
    if ($class == 'Client') {
      $company_id = $this->getRequestParameter('company_id');
      $company = ClientPeer::retrieveByPk($company_id);
      $contact->setClient($company);
      } elseif ($class == 'Vendor') {
        $company_id = $this->getRequestParameter('company_id');
        $company = VendorPeer::retrieveByPk($company_id);
        $contact->setVendor($company);
      } else {
        // Undefined
        $company_name = $this->getRequestParameter('company_name');
        if ($company_name && $company_name != $this->getContext()->getI18N()->__('Company') . '...') {
          $company = new Vendor();
          $company->setVendorCompanyName($this->getRequestParameter('company_name'));
          $company->setVendorUniqueName($this->getRequestParameter('company_name'));
          $company->save();
          $company_id = $company->getId();
          $contact->setVendor($company);
        } else {
          $company_id = null;
        }

      }

      $contact->setId($this->getRequestParameter('id'));
      $contact->setContactSalutation($this->getRequestParameter('contact_salutation'));
      $contact->setContactFirstName($this->getRequestParameter('contact_first_name'));
      $contact->setContactLastName($this->getRequestParameter('contact_last_name'));
      $contact->setContactOrgUnit($this->getRequestParameter('contact_org_unit'));
      $contact->setContactEmail($this->getRequestParameter('contact_email'));
      $contact->setContactPhone($this->getRequestParameter('contact_phone'));
      $contact->setContactFax($this->getRequestParameter('contact_fax'));
      $contact->setContactMobile($this->getRequestParameter('contact_mobile'));
      if ($this->getRequestParameter('contact_birthday'))
      {
        list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('contact_birthday'), $this->getUser()->getCulture());
        $contact->setContactBirthday("$y-$m-$d");
      }
      $contact->removeAllTags();
      $contact->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);
      $contact->save();
      return $this->redirect('@contact_show_by_id?id='.$contact->getId());
    }

  /**
   * executes deleteobject action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDeleteobject()
  {
    $c = new Criteria();
    $class = $this->getRequestParameter('class');
    switch ($class) {
      case 'Budget':
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
      $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
      $contacts = ObjectContactPeer::doDelete($c);
      break;
      case 'Project':
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
      $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
      $crit1 = $c->getNewCriterion(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
      $crit2 = $c->getNewCriterion(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
      $crit1->addOr($crit2);
      $c->addAnd($crit1);
      $contacts = ObjectContactPeer::doDelete($c);
      break;
      default:
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $this->getRequestParameter('oid'));
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
      $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getRequestParameter('id'));
      $contact = ObjectContactPeer::doDelete($c);
    }
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
    $contacts = $this->getRequestParameter('contact');
    $contact_name = $contacts[count($contacts)-1]['name'];
    $this->contacts = ContactPeer::getContactsLike($contact_name);
  }

  /**
   * executes getCompanies action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getSortColumn()
  {
    // TODO
    return 'contact_first_name';
    //return 'CONCAT(' . ContactPeer::CONTACT_FIRST_NAME.", ' ', " . ContactPeer::CONTACT_LAST_NAME.')';
  }
  
  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['contact_name']) && $this->filters['contact_name'] && $this->filters['contact_name'] != sfI18N::getInstance()->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, "%".$this->filters['contact_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, "%".$this->filters['contact_name']."%", Criteria::LIKE);
      $criterion->addOr($crit2);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }
}

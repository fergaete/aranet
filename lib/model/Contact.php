<?php

/**
 * Subclass for representing a row from the 'aranet_contact' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Contact.php 3 2008-08-06 07:48:19Z pablo $
 */

class Contact extends BaseContact
{

  /**
   * array of clients
   *
   * @var array
   **/
  protected $collClients = null;

  /**
   * default client
   *
   * @var Client
   **/
  protected $collDefaultClient = null;

  /**
   * array of ObjectClients
   *
   * @var array
   **/
  protected $collObjectClients = null;

  /**
   * array of Vendors
   *
   * @var array
   **/
  protected $collVendors = null;

  /**
   * default Vendor
   *
   * @var Vendor
   **/
  protected $collDefaultVendor = null;

  /**
   * array of ObjectVendors
   *
   * @var array
   **/
  protected $collObjectVendors = null;

  /**
   * rol
   *
   * @var string
   **/
  protected $rol;

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return trim($this->getContactFirstName() . ' ' . $this->getContactLastName());
  }

  /**
   * returns fullname of contact
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullName() {
    $salutation = ($this->getContactSalutation()) ? $this->getContactSalutation() . ' ' : '';
    return $salutation . $this->getContactFirstName() . ' ' . $this->getContactLastName();
  }

  /**
   * returns contact rol
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getContactRol() {
    return $this->rol;
  }

  /**
   * sets contact rol
   *
   * @param   string $rol
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setContactRol($rol) {
    return $this->rol = $rol;
  }

  /**
   * returns contact full rol (contact_rol + rol)
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getContactFullRol() {
    $rol = '';
    if ($this->getContactRol() && $this->getRol() != $this->getContactRol()) {
      $rol = '/' . $this->getContactRol();
    }
    return $this->getRol() . $rol;
  }

  /**
   * returns default client
   *
   * @return Client
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getClient() {
    if (!$this->getDefaultClient()) {
      $clients = $this->getClients();
      if ($clients && isset($clients[0])) {
        return ($this->collObjectClients[0]->getObjectcontactIsDefault()) ? $clients[0] : null;
      }
    } else {
      return $this->getDefaultClient();
    }
  }

  /**
   * returns an array of ObjectContacts
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getObjectClients() {
    if ($this->collObjectClients === null) {
      if ($this->isNew()) {
        $this->collObjectClients = array();
      } else {
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $c->addDescendingOrderByColumn(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT);
        $collObjectClients = ObjectContactPeer::doSelect($c);
        $this->collObjectClients = $collObjectClients;
      }
    }
    return $this->collObjectClients;
  }

  /**
   * returns an array of clients
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getClients() {
    if ($this->collClients === null) {
      if ($this->isNew()) {
        $this->collClients = array();
      } else {
        if ($oclients = $this->getObjectClients()) {
          foreach ($oclients as $oclient) {
            $client = ClientPeer::retrieveByPk($oclient->getObjectcontactObjectId());
            $this->collClients[] = $client;
          }
        }
      }
    }
    return $this->collClients;
  }

  /**
   * returns the default client
   *
   * @return Client
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getDefaultClient() {
    if ($this->collDefaultClient === null) {
      if ($this->isNew()) {
        $this->collDefaultClient = null;
      } else {
        if ($oconts = $this->getObjectClients()) {
          foreach ($oconts as $ocont) {
            if ($ocont->getObjectcontactIsDefault()) {
              $this->collDefaultClient = ClientPeer::retrieveByPk($ocont->getObjectcontactObjectId());
            }
          }
        } else {
          $this->collDefaultClient = null;
        }
      }
    }
    return $this->collDefaultClient;
  }

  /**
   * adds a client
   *
   * @param Client $client
   * @param boolean $default
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function addClient($client, $default = false) {
    if (!$client->getId()) {
      $client->save();
    }
    $found = false;
    $i = 0;
    foreach ($this->getObjectClients() as $oclient) {
      if ($oclient->getObjectcontactObjectId() == $client->getId()) {
        $found = true;
        $this->collObjectClients[$i]->setObjectcontactIsDefault($default);
        $this->collObjectClients[$i]->setObjectcontactRol($this->getContactRol());
      }
      $i++;
    }
    if (!$found) {
      $object = new ObjectContact();
      $object->setObjectcontactObjectClass('Client');
      $object->setObjectcontactObjectId($client->getId());
      $object->setObjectcontactContactId($this->getId());
      $object->setObjectcontactIsDefault($default);
      $object->setObjectcontactRol($this->getContactRol());
      $this->collObjectContacts[] = $object;
      $this->collClients[] = $client;
    }
    if ($default)
      $this->collDefaultClients = $client;
  }

  /**
   * sets the client
   *
   * @param Client $v
   * @param boolean $default
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setClient($v, $default = true) {
    if ($v !== null) {
      $v->addContact($this, $default);
      $this->addClient($v, true);
    }
    // Delete vendor asociation?
    $this->collDefaultVendor = null;
    for ($i = 0; $i < count($this->getObjectVendors()); $i++) {
      $this->collObjectVendors[$i]->setObjectcontactIsDefault(false);
    }
  }

  /**
   * returns the company (from client or vendor)
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getCompany() {
    return ($this->getClient()) ? $this->getClient() : $this->getVendor();
  }

  /**
   * returns default vendor
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getVendor() {
    if (!$this->getDefaultVendor()) {
      $vendors = $this->getVendors();
      if ($vendors && isset($vendors[0])) {
        return ($this->collObjectVendors[0]->getObjectcontactIsDefault()) ? $vendors[0] : null;
      }
    } else {
      return $this->getDefaultVendor();
    }
  }

  /**
   * returns an array of ObjectContacts
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getObjectVendors() {
    if ($this->collObjectVendors === null) {
      if ($this->isNew()) {
        $this->collObjectVendors = array();
      } else {
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $this->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Vendor');
        $c->addDescendingOrderByColumn(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT);
        $collObjectVendors = ObjectContactPeer::doSelect($c);
        $this->collObjectVendors = $collObjectVendors;
      }
    }
    return $this->collObjectVendors;
  }

  /**
   * returns an array of vendors
   *
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getVendors() {
    if ($this->collVendors === null) {
      if ($this->isNew()) {
        $this->collVendors = array();
      } else {
        if ($ovendors = $this->getObjectVendors()) {
          foreach ($ovendors as $ovendor) {
            $vendor = VendorPeer::retrieveByPk($ovendor->getObjectcontactObjectId());
            $this->collVendors[] = $vendor;
          }
        }
      }
    }
    return $this->collVendors;
  }

  /**
   * returns the default vendor
   *
   * @return Vendor
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getDefaultVendor() {
    if ($this->collDefaultVendor === null) {
      if ($this->isNew()) {
        $this->collDefaultVendor = null;
      } else {
        if ($oconts = $this->getObjectVendors()) {
          foreach ($oconts as $ocont) {
            if ($ocont->getObjectcontactIsDefault()) {
              $this->collDefaultVendor = VendorPeer::retrieveByPk($ocont->getObjectcontactObjectId());
            }
          }
        } else {
          $this->collDefaultVendor = null;
        }
      }
    }
    return $this->collDefaultVendor;
  }

  /**
   * adds a vendor
   *
   * @param  Vendor $vendor
   * @param  boolean $default
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function addVendor($vendor, $default = false) {
    if (!$vendor->getId()) {
      $vendor->save();
    }
    $found = false;
    $i = 0;
    foreach ($this->getObjectVendors() as $ovendor) {
      if ($ovendor->getObjectcontactObjectId() == $vendor->getId()) {
        $found = true;
        $this->collObjectVendors[$i]->setObjectcontactIsDefault($default);
        $this->collObjectVendors[$i]->setObjectcontactRol($this->getContactRol());
      }
      $i++;
    }
    if (!$found) {
      $object = new ObjectContact();
      $object->setObjectcontactObjectClass('Vendor');
      $object->setObjectcontactObjectId($vendor->getId());
      $object->setObjectcontactContactId($this->getId());
      $object->setObjectcontactIsDefault($default);
      $object->setObjectcontactRol($this->getContactRol());
      $this->collObjectContacts[] = $object;
      $this->collVendors[] = $vendor;
    }
    if ($default)
      $this->collDefaultVendors = $vendor;
  }

  /**
   * sets a vendor
   *
   * @param  Vendor $vendor
   * @param  boolean $default
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setVendor($v, $default = true) {
    if ($v !== null) {
      $v->addContact($this, $default);
      $this->addVendor($v, true);
    }
    // Delete client asociation?
    $this->collDefaultClient = null;
    for ($i = 0; $i < count($this->getObjectClients()); $i++) {
      $this->collObjectClients[$i]->setObjectcontactIsDefault(false);
    }
  }

  /**
   * returns contact rol
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getRol() {
    if ($this->getContactOrgUnit()) {
      return $this->getContactOrgUnit();
    } else {
      // Search ObjectContact records
      if ($this->getObjectContacts()) {
        return $this->collObjectContacts[0]->getObjectcontactRol();   
      }
    }
    return '';
  }

  /**
   * associated contact with...
   *
   * @param  string $class
   * @param  integer $object_id
   * @param  string $rol
   * @return ObjectContact
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function saveTo($class, $object_id = -1, $rol = null) {
    if ($object_id && $object_id != -1) {
      if (!$ocontact = ObjectContact::checkRecord($this->getId(), $class, $object_id)) {
        // Object contact not exists
        $ocontact = ObjectContact::newObjectContact($this->getId(), $class, $object_id);
      }
      $ocontact->setObjectcontactRol($this->getContactRol());
      $ocontact->save();
      return $ocontact;
    }
  }

  /**
   * returns line 1 of address
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressLine1()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressLine1();
    } else {
      return '';
    }
  }

  /**
   * returns address type
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressType()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressType();
    } else {
      return '';
    }
  }

  /**
   * returns address location
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressLocation()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressLocation();
    } else {
      return '';
    }
  }

  /**
   * returns address state
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressState()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressState();
    } else {
      return '';
    }
  }

  /**
   * returns address phone
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressPhone()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressPhone();
    } else {
      return '';
    }
  }

  /**
   * returns address postal code
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressPostalCode()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressPostalCode();
    } else {
      return '';
    }
  }

  /**
   * returns address country
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressCountry()
  {
    if ($this->getContactAddressId()) {
      parent::getAddress();
      return $this->aAddress->getAddressCountry();
    } else {
      return '';
    }
  }

  /**
   * postSave function
   *
   * @param   Contact  $v  the contact to process
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function postSave($v) {
    if ($v->getObjectAddresses()) {
      foreach($v->collObjectAddresses as $oaddress) {
        $oaddress->setObjectaddressObjectId($v->getId());
        $oaddress->save();
      }
    }
    if ($v->getObjectClients()) {
      foreach($v->collObjectClients as $oclient) {
        $oclient->save();
      }
    }
    if ($v->getObjectVendors()) {
      foreach($v->collObjectVendors as $ovendor) {
        $ovendor->save();
      }
    }
  }

}

sfMixer::register('BaseContact:delete:post', array('Contact', 'postDelete'));
sfMixer::register('BaseContact:save:post', array('Contact', 'postSave'));
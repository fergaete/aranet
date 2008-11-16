<?php

/**
 * Subclass for representing a row from the 'aranet_contact' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class Contact extends BaseContact
{

    protected $collClients = null;
    protected $collDefaultClient = null;
    protected $collObjectClients = null;
    protected $collVendors = null;
    protected $collDefaultVendor = null;
    protected $collObjectVendors = null;
    protected $rol;
    public $need_save = false;
    protected $is_default;

    public function __toString() {
        return trim($this->getContactFirstName() . ' ' . $this->getContactLastName());
    }

    public function setName($name)
    {
      $names = explode(' ', $name);
      if (count($names) == 1) {
        $contact_first_name = $names[0];
        $contact_last_name = null;
      } elseif (count($names) == 2) {
        $contact_first_name = $names[0];
        $contact_last_name = $names[1];
      } elseif (count($names) == 3) {
        if (strlen($names[1]) > 8) {
          $contact_first_name = $names[0];
          $contact_last_name = $names[1] + " " + $names[2];
        } else {
          $contact_first_name = $names[0] + " " + $names[1];
          $contact_last_name = $names[2];
        }
      }
      $this->setContactFirstName($contact_first_name);
      $this->setContactLastName($contact_last_name);
    }
    
    public function getFullName() {
        $salutation = ($this->getContactSalutation()) ? $this->getContactSalutation() . ' ' : '';
        return $salutation . $this->getContactFirstName() . ' ' . $this->getContactLastName();
    }

    public function getContactIsDefault() {
        return $this->is_default;
    }

    public function setContactIsDefault($is_default) {
        return $this->is_default = $is_default;
    }

    public function getContactRol() {
        return $this->rol;
    }

    public function setContactRol($rol) {
        return $this->rol = $rol;
    }

    public function getContactFullRol() {
        $rol = '';
        if ($this->getContactRol() && $this->getRol() != $this->getContactRol()) {
            $rol = '/' . $this->getContactRol();
        }
        return $this->getRol() . $rol;
    }

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
    
    public function getCompany() {
        return ($this->getClient()) ? $this->getClient() : $this->getVendor();
    }
    
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


    public function getAddressLine1()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressLine1();
        } else {
            return '';
        }
    }

    public function getAddressType()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressType();
        } else {
            return '';
        }
    }

    public function getAddressLocation()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressLocation();
        } else {
            return '';
        }
    }

    public function getAddressState()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressState();
        } else {
            return '';
        }
    }

    public function getAddressPhone()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressPhone();
        } else {
            return '';
        }
    }

    public function getAddressPostalCode()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressPostalCode();
        } else {
            return '';
        }
    }

    public function getAddressCountry()
    {
        if ($this->getContactAddressId()) {
            parent::getAddress();
            return $this->aAddress->getAddressCountry();
        } else {
            return '';
        }
    }

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
sfPropelBehavior::add('Contact', array('sfPropelActAsTaggableBehavior', 'arPropelAddressableBehavior'));
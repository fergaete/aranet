<?php

class arPropelContactableBehavior
{
  /**
   * parameterHolder access methods
   */
  private static function getContactsHolder(BaseObject $object)
  {
    if ((!isset($object->_contacts)) || ($object->_contacts == null))
    {
      if (class_exists('sfNamespacedParameterHolder'))
      {
        // Symfony 1.1
        $parameter_holder = 'sfNamespacedParameterHolder';
      }
      else
      {
        // Symfony 1.0
        $parameter_holder = 'sfParameterHolder';
      }

      $object->_contacts = new $parameter_holder();
    }

    return $object->_contacts;
  }

  private static function add_contact(BaseObject $object, $contact)
  {
    $contact_name = arPropelContactableToolkit::cleanContactName($contact['name']);

    if (strlen($contact_name) > 0)
    {
      self::getContactsHolder($object)->set($contact_name, $contact, 'contacts');
    }
  }

  private static function clear_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->removeNamespace('contacts');
  }

  private static function get_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->getAll('contacts');
  }

  private static function set_contacts(BaseObject $object, $contacts)
  {
    self::clear_contacts($object);
    self::getContactsHolder($object)->add($contacts, 'contacts');
  }

  private static function add_saved_contact(BaseObject $object, $contact)
  {
    self::getContactsHolder($object)->set($contact['name'], $contact, 'saved_contacts');
  }

  private static function clear_saved_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->removeNamespace('saved_contacts');
  }

  private static function get_saved_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->getAll('saved_contacts');
  }

  private static function set_saved_contacts(BaseObject $object, $contacts)
  {
    self::clear_saved_contacts($object);
    self::getContactsHolder($object)->add($contacts, 'saved_contacts');
  }

  private static function add_removed_contact(BaseObject $object, $contact)
  {
    self::getContactsHolder($object)->set($contact->getId(), $contact, 'removed_contacts');
  }

  private static function clear_removed_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->removeNamespace('removed_contacts');
  }

  private static function get_removed_contacts(BaseObject $object)
  {
    return self::getContactsHolder($object)->getAll('removed_contacts');
  }

  private static function set_removed_contacts(BaseObject $object, $contacts)
  {
    self::clear_removed_contacts($object);
    self::getContactsHolder($object)->add($contacts, 'removed_contacts');
  }

  private function get_default_contact(BaseObject $object)
  {
    return self::getContactsHolder($object)->getAll('default_contact');
  }
  
  public function getDefaultContact(BaseObject $object)
  {
    $contacts = $this->getContacts($object);
    $contact = self::get_default_contact($object);
    if (is_array($contact) && count($contact) > 0) {
      return array_pop($contact);
    } elseif (is_array($contacts) && count($contacts) > 0) {
      return array_pop($contacts);
    }
    return $contact;
  }

  public function hasContacts(BaseObject $object, $contact)
  {
    # code...
  }
  
  /**
   * Adds a contact to the object. The "contact" param can be a string or an array
   * of strings. These 2 code sequences are possible :
   *
   * 1- $object->addContact(array('name' => 'contact1,contact2,contact3', 'ids' => '1,2,'));
   * 2- $object->addContact(array('name' => 'contact1', 'ids' => '1,'));
   *    $object->addContact(array('name' => 'contact2', 'ids' => '')); // Will create a new contact
   * @param      BaseObject  $object
   * @param      mixed       $contactname
   */
  public function addContact(BaseObject $object, $contact)
  {

    $contact_names = arPropelContactableToolkit::explodeContactString($contact['name']);

    if (is_array($contact_names))
    {
      for ($i = 0; $i < count($contact_names); $i++)
      {
        $this->addContact($object, array('name' => $contact_names[$i], 'ids' => $contact['ids']));
      }
    }
    else
    {
      
      $removed_contacts = self::get_removed_contacts($object);
      if (isset($removed_contacts[$contact['name']]))
      {
        unset($removed_contacts[$contact['name']]);
        self::set_removed_contacts($object, $removed_contacts);
        self::add_saved_contact($object, $contact);
      }
      else
      {
        $saved_contacts = $this->getSavedContacts($object);

        if (!isset($saved_contacts[$contact['name']]))
        {
          self::add_contact($object, $contact);
        }
      }
    }
  }

  /**
   * Retrieves from the database contacts that have been atached to the object.
   * Once loaded, this saved contacts list is cached and updated in memory.
   *
   * @param      BaseObject  $object
   */
  private function getSavedContacts(BaseObject $object)
  {
    if (!isset($object->_contacts) || !$object->_contacts->hasNamespace('saved_contacts'))
    {
      $c = new Criteria();
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $object->getPrimaryKey());
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, get_class($object));
      $c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);
      $saved_ocontacts = ObjectContactPeer::doSelectJoinContact($c);
      $contacts = array();
      foreach ($saved_ocontacts as $ocontact)
      {
        $contact = $ocontact->getContact();
        $contact->setContactRol($ocontact->getObjectcontactRol());
        $contact->setContactIsDefault($ocontact->getObjectcontactIsDefault());
        $contacts[$contact->__toString()] = $contact;//array('name' => $contact->__toString(), 'ids' => $contact->getId());
        if ($ocontact->getObjectcontactIsDefault()) {
            self::getContactsHolder($object)->set(0, $contact, 'default_contact');
        }
      }

      self::set_saved_contacts($object, $contacts);
      return $contacts;
    }
    else
    {
      return self::get_saved_contacts($object);
    }
  }

  /**
   * Returns the list of the contacts attached to the object, whatever they have
   * already been saved or not.
   *
   * @param      BaseObject  $object
   */
  public function getContacts(BaseObject $object, $options = array())
  {
    $contacts = array_merge(self::get_contacts($object), $this->getSavedContacts($object));

    ksort($contacts);

    if (isset($options['serialized']) && (true === $options['serialized']))
    {
      $contacts = implode(', ', $contacts);
    }

    return $contacts;
  }

  /**
   * contacts saving logic, runned after the object himself has been saved
   *
   * @param      BaseObject  $object
   */
  public function postSave(BaseObject $object)
  {
    $contacts = self::get_contacts($object);

    $removed_contacts = self::get_removed_contacts($object);

    // Delete all ocontacts
    /*
    $c = new Criteria();
    $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $object->getPrimaryKey());
    $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, get_class($object));
    ObjectContactPeer::doDelete($c);
    */
    
    // save new contacts
    foreach ($contacts as $c)
    {
      $contact = ContactPeer::retrieveOrCreateByName($c['name']);
      $contact->save();
      $ocontact = new ObjectContact();
      $ocontact->setObjectcontactContactId($contact->getId());
      $ocontact->setObjectcontactRol($contact->getContactRol());
      $ocontact->setObjectcontactIsDefault($contact->getContactIsDefault());
      $ocontact->setObjectcontactObjectId($object->getPrimaryKey());
      $ocontact->setObjectcontactObjectClass(get_class($object));
      $ocontact->save();
    }

    // remove removed contacts
    if ($removed_contacts) {
      $c = new Criteria();
      $concatField = 'CONCAT(' . ContactPeer::CONTACT_FIRST_NAME.", ' ', " . ContactPeer::CONTACT_LAST_NAME.')';
      foreach ($removed_contacts as $removed_contact) {
        $c->addOr($c->getNewCriterion(ContactPeer::ID, $concatField."='".$removed_contact."'", Criteria::CUSTOM));
      }
      //$c->add(ContactPeer::ID, $removed_contacts, Criteria::IN);
      $rs = ContactPeer::doSelectStmt($c);
      $removed_contact_ids = array();

      while($row = $rs->fetch(PDO::FETCH_NUM)) {
        $removed_contact_ids[] = $row[0];
      }

      $c = new Criteria();
      $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $removed_contact_ids, Criteria::IN);
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $object->getPrimaryKey());
      $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, get_class($object));
      ObjectContactPeer::doDelete($c);
    }
    
    $contacts = array_merge(self::get_contacts($object), $this->getSavedContacts($object));
    self::set_saved_contacts($object, $contacts);
    self::clear_contacts($object);
    self::clear_removed_contacts($object);
  }

  /**
   * Removes all the contacts associated to the object.
   *
   * @param      BaseObject  $object
   */
  public function removeAllContacts(BaseObject $object)
  {
    $saved_contacts = self::getSavedContacts($object);

    self::set_saved_contacts($object, array());
    self::set_contacts($object, array());
    self::set_removed_contacts($object, $saved_contacts);
  }

  /**
   * Removes a tag or a set of contacts from the object. As usual, the second
   * parameter might be an array of contacts or a comma-separated string.
   *
   * @param      BaseObject  $object
   * @param      mixed       $contactname
   */
  public function removeContact(BaseObject $object, $contact)
  {
    if (is_array($contact))
    {
      foreach ($contact as $c)
      {
        $this->removeContact($object, $c);
      }
    }
    else
    {
      $contacts = self::get_contacts($object);
      $saved_contacts = $this->getSavedContacts($object);

      if (isset($contacts[$contact->getId()]))
      {
        unset($contacts[$contact->getId()]);
        self::set_contacts($object, $contacts);
      }

      if (isset($saved_contacts[$contact->getId()]))
      {
        unset($saved_contacts[$contact->getId()]);
        self::set_saved_contacts($object, $saved_contacts);
        self::add_removed_contact($object, $contact);
      }
    }
  }

  /**
   * Sets the contacts of an object. As usual, the second parameter might be an
   * array of contacts or a comma-separated string.
   *
   * @param      BaseObject  $object
   * @param      mixed       $contacts
   */
  public function setContacts(BaseObject $object, $contacts)
  {
    $this->removeAllContacts($object);
    $this->addContact($object, $contacts);
  }
}
<?php
/*
 * This file is part of the arPropelAddressableBehavior package.
 *
 * (c) 2008 Pablo Sánchez <pablo.sanchez@aranova.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * This behavior permits to attach addresses to Propel objects. Some more bits about
 * the philosophy of the stuff:
 *
 * - taggable objects must have a primary key
 *
 * - addresses are saved when the object is saved, not before
 *
 * - one object cannot be tagged twice with the same tag. When trying to use
 *   twice the same tag on one object, the second tagging will be ignored
 *
 * - the addresses associated to one taggable object are only loaded when necessary.
 *   Then they are cached.
 *
 * - once created, addresses never change in the Tag table. When using replaceTag(),
 *   a new tag is created id necessary, but the old one is not deleted.
 *
 *
 * The plugin associates a parameterHolder to Propel objects, with 3 namespaces:
 *
 * - addresses:
 *     addresses that have been attached to the object, but not yet saved.
 *     Contract: addresses are disjoin of (saved_addresses union removed_addresses)
 *
 * - saved_addresses:
 *     addresses that are presently saved in the database
 *
 * - removed_addresses:
 *     addresses that are presently saved in the database, but which will be removed
 *     at the next save()
 *     Contract: removed_addresses are disjoin of (addresses union saved_addresses)
 *
 *
 * @author   Xavier Lacot <xavier@lacot.org>
 * @see      http://www.symfony-project.com/trac/wiki/arPropelAddressableBehaviorPlugin
 */

class arPropelAddressableBehavior
{
  /**
   * parameterHolder access methods
   */
  private static function getAddressesHolder(BaseObject $object)
  {
    if ((!isset($object->_addresses)) || ($object->_addresses == null))
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

      $object->_addresses = new $parameter_holder();
    }

    return $object->_addresses;
  }

  private static function add_address(BaseObject $object, $address, $default = false)
  {
    $address_name = $address['name'];//arPropelAddressableToolkit::cleanAddressName($address['name']);

    if (strlen($address_name) > 0)
    {
      self::getAddressesHolder($object)->set($address_name, $address, 'addresses');
    }
  }

  private static function clear_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->removeNamespace('addresses');
    return self::getAddressesHolder($object)->removeNamespace('default_address');
  }

  private static function get_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->getAll('addresses');
  }

  private static function set_addresses(BaseObject $object, $addresses)
  {
    self::clear_addresses($object);
    self::getAddressesHolder($object)->add($addresses, 'addresses');
  }

  private static function add_saved_address(BaseObject $object, $address)
  {
    self::getAddressesHolder($object)->set($address['name'], $address, 'saved_addresses');
  }

  private static function clear_saved_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->removeNamespace('saved_addresses');
    return self::getAddressesHolder($object)->removeNamespace('default_address');
  }

  private static function get_saved_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->getAll('saved_addresses');
  }

  private static function set_saved_addresses(BaseObject $object, $addresses)
  {
    self::clear_saved_addresses($object);
    self::getAddressesHolder($object)->add($addresses, 'saved_addresses');
  }

  private static function add_removed_address(BaseObject $object, $address)
  {
    self::getAddressesHolder($object)->set($address->getId(), $address, 'removed_addresses');
  }

  private static function clear_removed_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->removeNamespace('removed_addresses');
  }

  private static function get_removed_addresses(BaseObject $object)
  {
    return self::getAddressesHolder($object)->getAll('removed_addresses');
  }

  private static function set_removed_addresses(BaseObject $object, $addresses)
  {
    self::clear_removed_addresses($object);
    self::getAddressesHolder($object)->add($addresses, 'removed_addresses');
  }


  /**
   * Adds a address to the object. The "address" param can be a string or an array
   * of strings.
   *
   * 1- $object->addAddress(array('name' => 'address_line 1 | code - city (state)', 'ids' => '1,'));
   * 1- $object->addAddress(array('name' => 'address_line 1 | code - city (state)', 'ids' => '')); // Will create a new address
   * @param      BaseObject  $object
   * @param      mixed       $address
   */
  public function addAddress(BaseObject $object, $address)
  {

    $address_names = $address['name'];//arPropelAddressableToolkit::explodeAddressString($address['name']);

    if (is_array($address_names))
    {
      for ($i = 0; $i < count($address_names); $i++)
      {
        $this->addAddress($object, array('name' => $address_names[$i], 'ids' => $address['ids']));
      }
    }
    else
    {
      
      $removed_addresses = self::get_removed_addresses($object);
      if (isset($removed_addresses[$address['name']]))
      {
        unset($removed_addresses[$address['name']]);
        self::set_removed_addresses($object, $removed_addresses);
        self::add_saved_address($object, $address);
      }
      else
      {
        $saved_addresses = $this->getSavedAddresses($object);

        if (!isset($saved_addresses[$address['name']]))
        {
          self::add_address($object, $address);
        }
      }
    }
  }

  /**
   * Retrieves from the database addresses that have been atached to the object.
   * Once loaded, this saved addresses list is cached and updated in memory.
   *
   * @param      BaseObject  $object
   */
  private function getSavedAddresses(BaseObject $object)
  {
    if (!isset($object->_addresses) || !$object->_addresses->hasNamespace('saved_addresses'))
    {
      $c = new Criteria();
      $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $object->getPrimaryKey());
      $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, get_class($object));
      $c->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);
      $saved_addresses = AddressPeer::doSelect($c);
      $addresses = array();

      foreach ($saved_addresses as $address)
      {
        $objects = $address->getObjectAddresss();		
        if (count($objects) > 0) {
          $address->setAddressType($objects[0]->getObjectaddressType());
          $address->setAddressIsDefault($objects[0]->getObjectaddressIsDefault());
          $address->setAddressName($objects[0]->getObjectaddressName());
          if ($objects[0]->getObjectaddressIsDefault()) {
              self::getAddressesHolder($object)->set(0, $address, 'default_address');
          }
        }
        $addresses[$address->__toString(true)] = $address;//array('name' => $address->__toString(true), 'ids' => $address->getId());
      }

      self::set_saved_addresses($object, $addresses);
      return $addresses;
    }
    else
    {
      return self::get_saved_addresses($object);
    }
  }

  /**
   * Returns the list of the addresses attached to the object, whatever they have
   * already been saved or not.
   *
   * @param      BaseObject  $object
   */
  public function getAddresses(BaseObject $object, $options = array())
  {
    $addresses = array_merge(self::get_addresses($object), $this->getSavedAddresses($object));

    ksort($addresses);

    return $addresses;
  }

  /**
   * Returns true if the object has a tag. If a tag ar an array of addresses is
   * passed in second parameter, checks if these addresses are attached to the object
   *
   * These 3 calls are equivalent :
   * 1- $object->hasTag('tag1')
   *    && $object->hasTag('tag2')
   *    && $object->hasTag('tag3');
   * 2- $object->hasTag('tag1,tag2,tag3');
   * 3- $object->hasTag(array('tag1', 'tag2', 'tag3'));
   *
   * @param      BaseObject  $object
   * @param      mixed       $addresses
   */
  public function hasAddresses(BaseObject $object, $addresses_array = null)
  {

    if (is_array($addresses_array))
    {
      $result = true;

      foreach ($addresses_array as $address)
      {
        $result = $result && $this->hasAddress($object, $address);
      }

      return $result;
    }
    else
    {
      $addresses = self::get_addresses($object);

      if ($addresses === null)
      {
        return (count($addresses) > 0) || (count($this->getSavedAddressses($object)) > 0);
      }
      elseif (is_integer($addresses_array->getId()))
      {
        if (isset($addresses[$addresses_array->getId()]))
        {
          return true;
        }
        else
        {
          $saved_addresses = $this->getSavedAddresses($object);
          $removed_addresses = self::get_removed_addresses($object);
          return isset($saved_addresses[$addresses_array->getId()]) && !isset($removed_addresses[$addresses_array->getId()]);
        }
      }
      else
      {
        $msg = sprintf('hasAddress() does not support this type of argument : %s.', get_class($addresses_array));
        throw new Exception($msg);
      }
    }
  }

  private function get_default_address(BaseObject $object)
  {
    return self::getAddressesHolder($object)->getAll('default_address');
  }
  
  public function getDefaultAddress(BaseObject $object)
  {
    $addresses = $this->getAddresses($object);
    $address = self::get_default_address($object);
    if (is_array($address) && count($address) > 0) {
      return array_pop($address);
    } elseif (is_array($addresses) && count($addresses) > 0) {
      return array_pop($addresses);
    }
    return $address;
  }

  /**
   * addresses saving logic, runned after the object himself has been saved
   *
   * @param      BaseObject  $object
   */
  public function postSave(BaseObject $object)
  {
    $addresses = self::get_addresses($object);
    $removed_addresses = self::get_removed_addresses($object);

    // Delete all oaddresses
    /*
    $c = new Criteria();
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $object->getPrimaryKey());
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, get_class($object));
    ObjectAddressPeer::doDelete($c);
    */
    
    // save new addresses
    foreach ($addresses as $a)
    {
      if ($a['ids']) {
        $address = AddressPeer::retrieveByPK(arPropelAddressableToolkit::cleanAddressName($a['ids']));
      } else {
        $address = AddressPeer::retrieveOrCreateByName($a['name']);
        $address->save();
      }
      
      $addressing = new ObjectAddress();
      $addressing->setObjectAddressAddressId($address->getId());
      $addressing->setObjectAddressObjectId($object->getPrimaryKey());
      $addressing->setObjectAddressObjectClass(get_class($object));
      $addressing->setObjectAddressName($address->getAddressName());
      $addressing->setObjectAddressType($address->getAddressType());
      $addressing->setObjectAddressIsDefault($address->getAddressIsDefault());
      $addressing->save();
    }

    // remove removed addresses
    $c = new Criteria();
    $c->add(AddressPeer::ID, array_keys($removed_addresses), Criteria::IN);
    $rs = AddressPeer::doSelectStmt($c);
    $removed_addresses_ids = array();

    while($row = $rs->fetch(PDO::FETCH_NUM)) {
      $removed_addresses_ids[] = $row[1];
    }

    $c = new Criteria();
    $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $removed_addresses_ids, Criteria::IN);
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $object->getPrimaryKey());
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, get_class($object));
    ObjectAddressPeer::doDelete($c);


    $addresses = array_merge(self::get_addresses($object), $this->getSavedAddresses($object));
    self::set_saved_addresses($object, $addresses);
    self::clear_addresses($object);
    self::clear_removed_addresses($object);
  }

  /**
   * Removes all the addresses associated to the object.
   *
   * @param      BaseObject  $object
   */
  public function removeAllAddresses(BaseObject $object)
  {
    $saved_addresses = self::getSavedAddresses($object);

    self::set_saved_addresses($object, array());
    self::set_addresses($object, array());
    self::set_removed_addresses($object, $saved_addresses);
  }

  /**
   * Removes a tag or a set of addresses from the object. As usual, the second
   * parameter might be an array of addresses or a comma-separated string.
   *
   * @param      BaseObject  $object
   * @param      mixed       $addresses_array
   */
  public function removeAddress(BaseObject $object, $addresses_array)
  {
    if (is_array($addresses_array))
    {
      foreach ($addresses_array as $address)
      {
        $this->removeAddress($object, $address);
      }
    }
    else
    {
      $addresses = self::get_addresses($object);
      $saved_addresses = $this->getSavedAddresses($object);

      if (isset($addresses[$addresses_array->getId()]))
      {
        unset($addresses[$addresses_array->getId()]);
        self::set_addresses_array($object, $addresses);
      }

      if (isset($saved_addresses[$addresses_array->getId()]))
      {
        unset($saved_addresses[$addresses_array->getId()]);
        self::set_saved_addresses($object, $saved_addresses);
        self::add_removed_addresses($object, $addresses_array->getId());
      }
    }
  }

  /**
   * Sets the addresses of an object. As usual, the second parameter might be an
   * array of addresses or a comma-separated string.
   *
   * @param      BaseObject  $object
   * @param      mixed       $addresses
   */
  public function setAddresses(BaseObject $object, $addresses)
  {
    $this->removeAllAddresses($object);
    foreach ($addresses as $address) {
      $this->addAddress($object, $address);
    }
  }
}
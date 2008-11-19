<?php

/**
 * Subclass for performing query and update operations on the 'aranet_address' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: AddressPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class AddressPeer extends BaseAddressPeer
{
  
  /**
   * returns addresses objects like given street
   *
   * @param  string $line1 the main street name
   * @param  integer $max maximun number of results
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getAddressesLikeStreet($line1, $max = 10)
  {
    $c = new Criteria();
    $c->add(AddressPeer::ADDRESS_LINE1, "%${line1}%", Criteria::LIKE);
    $c->setLimit($max);
    $addresses = AddressPeer::doSelect($c);
    return $addresses;
  }

  /**
   * returns the address matching given street
   *
   * @param  string $line1 the main street name
   * @return Address
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getAddressByStreet($line1)
  {
    $c = new Criteria();
    $c->add(AddressPeer::ADDRESS_LINE1, $line1);
    $address = AddressPeer::doSelectOne($c);
    if (!$address) {
      $address = new Address();
    }
    return $address;
  }

  /**
   * returns address with primary key
   *
   * @param  integer $pk the primary key
   * @return Address
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function retrieveOrCreateByPk($pk) {
    $address = parent::retrieveByPK($pk);
    if (!$address) {
      $address = new Address();
    }
    return $address;
  }

  /**
   * process addresses from params
   *
   * @param  mixed $params array of request params
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function processAddress($params) {
    $addresses = null;
    if (isset($params['address'])) {
      foreach($params['address'] as $address) {
        // Process address information
        if (isset($address['id']) && $address['id'] ) {
          $add = AddressPeer::retrieveByPK($address['id']);
        }
        elseif (isset($address['line1']) && $address['line1']) {
          $add = AddressPeer::getAddressByStreet($address['line1']);
        } else {
          $add = null;
        }
        if ($add instanceof Address) {
          if ($add->getAddressLine1() != $address['line1']) {
            $add->setAddressLine1($address['line1']);
          }
          if (isset($address['line2']) && $address['line2'] && $add->getAddressLine2() != $address['line2']) {
            $add->setAddressLine2($address['line2']);
          }
          if (isset($address['country']) && $address['country'] && $add->getAddressCountry() != $address['country']) {
            $add->setAddressCountry($address['country']);
          }
          if (isset($address['location']) && $address['location'] && $add->getAddressLocation() != $address['location']) {
            $add->setAddressLocation($address['location']);
          }
          if (isset($address['state']) && $address['state'] && $add->getAddressState() != $address['state']) {
            $add->setAddressState($address['state']);
          }
          if (isset($address['postal_code']) && $address['postal_code'] && $add->getAddressPostalCode() != $address['state']) {
            $add->setAddressPostalCode($address['postal_code']);
          }
          if (isset($address['type']) && $address['type'] && $add->getAddressType() != $address['type']) {
            $add->setAddressType($address['type']);
          }
          if (isset($address['is_default']) && $address['is_default'] && $add->getAddressType() != $address['is_default']) {
            $add->setAddressIsDefault($address['is_default']);
          }
          if (isset($address['name']) && $address['name'] && $add->getAddressName() != $address['name']) {
            $add->setAddressName($address['name']);
          }
          $add->save();
          $addresses[] = $add;
        }
      }
    }
    return $addresses;
  }

}

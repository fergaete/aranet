<?php

/**
 * Subclass for performing query and update operations on the 'aranet_contact' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ContactPeer.php 3 2008-08-06 07:48:19Z pablo $
 */

class ContactPeer extends BaseContactPeer
{
  
  /**
   * returns contacts like name
   *
   * @param string  $name
   * @param integer  $max
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getContactsLike($name, $max = 10)
  {
    $c = new Criteria();
    $name = explode(' ', $name);
    $last_name = (isset($name[1])) ? $name[1] : $name[0];
    $first_name = $name[0];
    $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, "%".$first_name."%", Criteria::LIKE);
    $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, "%".$last_name."%", Criteria::LIKE);
    if (isset($name[1])) {
      $crit1->addAnd($crit2);
    } else {
      $crit1->addOr($crit2);
    }
    $c->add($crit1);
    $c->setLimit($max);
    $contacts = ContactPeer::doSelect($c);
    return $contacts;
  }

  /**
   * returns the contact matching given name
   *
   * @param  string $name contact name
   * @return Contact
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getContactByName($name)
  {
    $contact = null;
    if ($name) {
      $c = new Criteria();
      $names = explode(' ', $name);
      // Ir probando distints combinaciones
      switch (count($names)) {
        case (1):
          $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0]);
          $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, null, Criteria::ISNULL);
          $crit1->addAnd($crit2);
          $c->add($crit1);
          $contact = ContactPeer::doSelectOne($c);
          break;
        case (2):
          $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0]);
          $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[1]);
          $crit1->addAnd($crit2);
          $c->add($crit1);
          $contact = ContactPeer::doSelectOne($c);
          break;
        case (3):
          $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0] . " " . $names[1]);
          $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[2]);
          $crit1->addAnd($crit2);
          $c->add($crit1);
          $contact = ContactPeer::doSelectOne($c);
          if (!$contact) {
            $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0]);
            $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[1] . " " . $names[2]);
            $crit1->addAnd($crit2);
            $c->add($crit1);
            $contact = ContactPeer::doSelectOne($c);   
          }
          break;
        case (4):
          $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0] . " " . $names[1]);
          $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[2] . " " . $names[3]);
          $crit1->addAnd($crit2);
          $c->add($crit1);
          $contact = ContactPeer::doSelectOne($c);
          if (!$contact) {
            $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0]);
            $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[1] . " " . $names[2] . ' ' . $names[3]);
            $crit1->addAnd($crit2);
            $c->add($crit1);
            $contact = ContactPeer::doSelectOne($c);
            if (!$contact) {
              $crit1 = $c->getNewCriterion(ContactPeer::CONTACT_FIRST_NAME, $names[0] . " " . $names[1]);
              $crit2 = $c->getNewCriterion(ContactPeer::CONTACT_LAST_NAME, $names[2] . " " . $names[3]);
              $crit1->addAnd($crit2);
              $c->add($crit1);
              $contact = ContactPeer::doSelectOne($c);
            }
          }
          break;
      }
    }
    return $contact;
  }

  /**
   * process contacts from params
   *
   * @param  mixed $params array of request params
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function processContact($params) {
    $contacts = null;
    if (isset($params['contact'])) {
      foreach($params['contact'] as $contact) {
        // Process contact information
        $save_contact = false;
        $con = null;
        if (isset($contact['id']) && $contact['id'] ) {
          $con = ContactPeer::retrieveByPK($contact['id']);
        }
        elseif (isset($contact['name']) && $contact['name']) {
          $contact['name'] = trim($contact['name']);
          $con = ContactPeer::getContactByName($contact['name'], 1);
          if (!$con) 
            $con = new Contact();
          $pos = strpos($contact['name'], ' ');
          if ($pos !== false) {
            $contact_first_name = substr($contact['name'], 0, $pos);
            $contact_last_name = substr($contact['name'], $pos+1);
          } else {
            $contact_first_name = $contact['name'];
            $contact_last_name = '';
          }
          $con->setContactFirstName($contact_first_name);
          $con->setContactLastName($contact_last_name);
          $save_contact = true;
        }
        if (isset($con) && $con instanceof Contact) {
          if ($con->__toString() != $contact['name']) {

          }
          if (isset($contact['email']) && $con->getContactEmail() != $contact['email']) {
            $con->setContactEmail($contact['email']);
            $save_contact = true;
          }
          if (isset($contact['phone']) && $con->getContactPhone() != $contact['phone']) {
            $con->setContactPhone($contact['phone']);
            $save_contact = true;
          }
          if (isset($contact['fax']) && $con->getContactFax() != $contact['fax']) {
            $con->setContactFax($contact['fax']);
            $save_contact = true;
          }
          if (isset($contact['mobile']) && $con->getContactMobile() != $contact['mobile']) {
            $con->setContactMobile($contact['mobile']);
            $save_contact = true;
          }
          if (isset($contact['rol']) && $con->getContactRol() != $contact['rol']) {
            $con->setContactRol($contact['rol']);
            $save_contact = true;
          }
          if (isset($params['address']) && !$con->getAddresses()) {
            $addresses = AddressPeer::processAddress($params);
            if ($addresses) {
              foreach ($addresses as $address) {
                $con->addAddress($address);
                $save_contact = true;
              }
            }
          }
          if ($save_contact) {
            $con->save();
          }
          $contacts[] = $con;
        }
      }
    }
    return $contacts;
  }

}

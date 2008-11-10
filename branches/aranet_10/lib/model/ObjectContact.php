<?php

/**
 * Subclass for representing a row from the 'aranet_objectcontact' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ObjectContact.php 3 2008-08-06 07:48:19Z pablo $
 */

class ObjectContact extends BaseObjectContact
{

    public static function newObjectContact($contact_id, $class, $object_id) {
        $ocontact = new ObjectContact();
        $ocontact->setObjectcontactObjectClass($class);
        $ocontact->setObjectcontactObjectId($object_id);
        $ocontact->setObjectcontactContactId($contact_id);
        return $ocontact;
    }

    public static function checkRecord($contact_id, $class, $object_id) {
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, $class);
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $object_id);
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact_id);
        $ocontact = ObjectContactPeer::doSelectOne($c);
        return $ocontact;
    }
}

<?php
/* I recomend put this class out Symfony Folder.
*  If you put this class in some project folder
* you can use include_once 'symfony/addon/propel/builder/SfObjectBuilder.php'
* @author     Boris Duin
 */
include_once dirname(__FILE__).'/vendor/symfony/lib/addon/propel/builder/SfObjectBuilder.php';
class SfObjectAdvBuilder extends SfObjectBuilder
{

  protected function addAttributes(&$script)
  {
    parent::addAttributes($script);

    if (in_array($this->getClassname(), array('BaseContact', 'BaseClient', 'BaseVendor')))
    {
      $script .= '
  /**
   * The value for associated address
   * @var array
   */
  protected $collAddresses;

  /**
   * The value for associated default address
   * @var object
   */
  protected $collDefaultAddress;

  /**
   * The value for associated object address
   * @var array
   */
  protected $collObjectAddresses;
';
    }
    if (in_array($this->getClassname(), array('BaseBudget', 'BaseClient', 'BaseVendor', 'BaseProject', 'BaseInvoice')))
    {
      $script .= '
  /**
   * The value for associated contacts
   * @var array
   */
  protected $collContacts;

  /**
   * The value for associated default contact
   * @var object
   */
  protected $collDefaultContact;

  /**
   * The value for associated object contacts
   * @var array
   */
  protected $collObjectContacts;
';
    }
  }

  protected function addCall(&$script)
  {
    parent::addCall($script);
    if (in_array($this->getClassname(), array('BaseContact', 'BaseClient', 'BaseVendor')))
    {

    $script .= "
    public function getDefaultAddress() {
        if (\$this->collObjectAddresses === null) {
            if (\$this->isNew()) {
               \$this->collDefaultAddress = null;
            } else {
                if (\$oaddrs = \$this->getObjectAddresses()) {
                    foreach (\$oaddrs as \$oadd) {
                        if (\$oadd->getObjectaddressIsDefault()) {
                            \$this->collDefaultAddress = \$oadd->getAddress();
                            \$this->collDefaultAddress->setAddressName(\$oadd->getObjectaddressName());
                        }
                    }
                } else {
                    \$this->collDefaultAddress = null;
                }
            }
        }
        return \$this->collDefaultAddress;
    }

    protected function getObjectAddresses() {
        if (\$this->collObjectAddresses === null) {
            if (\$this->isNew()) {
               \$this->collObjectAddresses = array();
            } else {
                \$c = new Criteria();
                \$c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, \$this->getId());
                \$c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, '".substr($this->getClassname(),4)."');
                \$c->addDescendingOrderByColumn(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT);
                \$c->addJoin(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, AddressPeer::ID);
                \$collObjectAddresses = ObjectAddressPeer::doSelectJoinAddress(\$c);
                \$this->collObjectAddresses = \$collObjectAddresses;
            }
        }
        return \$this->collObjectAddresses;
    }

    public function getAddresses() {
        if (\$this->collAddresses === null) {
            if (\$this->isNew()) {
               \$this->collAddresses = array();
            } else {
                if (\$oaddrs = \$this->getObjectAddresses()) {
                    foreach (\$oaddrs as \$oadd) {
                        \$add = \$oadd->getAddress();
                        \$add->setAddressType(\$oadd->getObjectaddressType());
                        \$add->setAddressIsDefault(\$oadd->getObjectaddressIsDefault());
                        \$add->setAddressName(\$oadd->getObjectaddressName());
                        \$this->collAddresses[] = \$add;
                    }
                }
            }
        }
        return \$this->collAddresses;
    }

    public function addAddress(\$address, \$default = false) {
        if (!\$address->getId()) {
            \$address->save();
        }
        if (\$address->getAddressIsDefault()) {
            \$default = true;
        }
        // Check if address exists
        \$found = false;
            \$i = 0;
            foreach (\$this->getObjectAddresses() as \$oaddress) {
                if (\$oaddress->getObjectaddressAddressId() == \$address->getId()) {
                    // Exists, check default
                    \$found = true;
                    \$this->collObjectAddresses[\$i]->setObjectaddressIsDefault(\$default);
                    \$this->collObjectAddresses[\$i]->setObjectaddressName(\$address->getAddressName());
                }
                \$i++;
            }
        if (!\$found) {
            \$object = new ObjectAddress();
            \$object->setObjectaddressType(\$address->getAddressType());
            \$object->setObjectaddressObjectClass('".substr($this->getClassname(),4)."');
            \$object->setObjectaddressObjectId(\$this->getId());
            \$object->setObjectaddressAddressId(\$address->getId());
            \$object->setObjectaddressIsDefault(\$default);
            \$object->setObjectaddressName(\$address->getAddressName());
            \$this->collObjectAddresses[] = \$object;
            \$this->collAddresses[] = \$address;
        }
        if (\$default)
            \$this->collDefaultAddress = \$address;
    }

    public function setAddress(\$v)
    {
        if (\$v !== null) {
            \$this->addAddress(\$v, true);
        }
    }

    public function getAddress()
    {
        return \$this->getDefaultAddress();
    }

    public function postSave(\$v) {
        //Update ObjectAddresses
        if (\$v->collObjectAddresses) {
            foreach(\$v->collObjectAddresses as \$oaddress) {
                \$oaddress->setObjectaddressObjectId(\$v->getId());
                \$oaddress->save();
            }
        }";
    if (in_array($this->getClassname(), array('BaseBudget', 'BaseClient', 'BaseVendor', 'BaseProject', 'BaseInvoice')))
    {
        $script .= "
        //Update ObjectContacts
        if (\$v->collObjectContacts) {
            foreach(\$v->collObjectContacts as \$ocontact) {
                \$ocontact->setObjectcontactObjectId(\$v->getId());
                \$ocontact->save();
            }
        }";
    }
        $script .= "
    }

    public function postDelete(\$v) {
        \$c = new Criteria();
        \$c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, \$v->getId());
        \$c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, '".substr($this->getClassname(),4)."');
        ObjectAddressPeer::doDelete(\$c);
        \$v->collObjectAddresses = array();
        \$v->collAddresses = array();
        \$v->collDefaultAddress = null;";
    if (in_array($this->getClassname(), array('BaseContact')))
    {
        $script .= "
        //Delete associated ObjectContacts
        \$c = new Criteria();
        \$c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, \$v->getId());
        ObjectContactPeer::doDelete(\$c);";
    }
    if (in_array($this->getClassname(), array('BaseBudget', 'BaseClient', 'BaseVendor', 'BaseProject', 'BaseInvoice')))
    {
        $script .= "
        //Delete associated ObjectContacts
        \$c = new Criteria();
        \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, \$v->getId());
        \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, '".substr($this->getClassname(),4)."');
        ObjectContactPeer::doDelete(\$c);
        \$v->collObjectContacts = array();
        \$v->collContacts = array();
        \$v->collDefaultContact = null;";
    }
        $script .= "
    }
";
    }

    if (in_array($this->getClassname(), array('BaseBudget', 'BaseProject', 'BaseInvoice')))
    {
      $script .= "
    public function postSave(\$v) {
        //Update ObjectContacts
        if (\$v->collObjectContacts) {
            foreach(\$v->collObjectContacts as \$ocontact) {
                \$ocontact->setObjectcontactObjectId(\$v->getId());
                \$ocontact->save();
            }
        }
    }

    public function postDelete(\$v) {
        //Delete associated ObjectContacts
        \$c = new Criteria();
        \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, \$v->getId());
        \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, '".substr($this->getClassname(),4)."');
        ObjectContactPeer::doDelete(\$c);
        \$v->collObjectContacts = array();
        \$v->collContacts = array();
        \$v->collDefaultContact = null;
    }
";
    }

    if (in_array($this->getClassname(), array('BaseBudget', 'BaseClient', 'BaseVendor', 'BaseProject', 'BaseInvoice')))
    {
      $script .= "
    public function getDefaultContact() {
        if (\$this->collDefaultContact === null) {
            if (\$this->isNew()) {
               \$this->collDefaultContact = null;
            } else {
                if (\$oconts = \$this->getObjectContacts()) {
                    foreach (\$oconts as \$ocont) {
                        if (\$ocont->getObjectcontactIsDefault()) {
                            \$this->collDefaultContact = \$ocont->getContact();
                            \$this->collDefaultContact->setContactRol(\$ocont->getObjectcontactRol());
                        }
                    }
                } else {
                    \$this->collDefaultContact = null;
                }
            }
        }
        return \$this->collDefaultContact;
    }

    public function getContact() {
        return \$this->getDefaultContact();
    }

    protected function getObjectContacts() {
        if (\$this->collObjectContacts === null) {
            if (\$this->isNew()) {
               \$this->collObjectContacts = array();
            } else {
                \$c = new Criteria();
                \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, \$this->getId());
                \$c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, '".substr($this->getClassname(),4)."');
                \$c->addDescendingOrderByColumn(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT);
                \$c->addJoin(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, ContactPeer::ID);
                \$collObjectContacts = ObjectContactPeer::doSelectJoinContact(\$c);
                \$this->collObjectContacts = \$collObjectContacts;
            }
        }
        return \$this->collObjectContacts;
    }

    public function getContacts() {
        if (\$this->collContacts === null) {
            if (\$this->isNew()) {
               \$this->collContacts = array();
            } else {
                if (\$oconts = \$this->getObjectContacts()) {
                    foreach (\$oconts as \$ocont) {
                        \$cont = \$ocont->getContact();
                        \$cont->setContactRol(\$ocont->getObjectcontactRol());
                        \$this->collContacts[] = \$cont;
                    }
                }
            }
        }
        return \$this->collContacts;
    }

    public function addContact(\$contact, \$default = false) {
        if (!\$contact->getId()) {
            \$contact->save();
        }
        // Check if contact exists
        \$found = false;
            \$i = 0;
            foreach (\$this->getObjectContacts() as \$ocontact) {
                if (\$ocontact->getObjectcontactContactId() == \$contact->getId()) {
                    \$found = true;
                    \$this->collObjectContacts[\$i]->setObjectcontactIsDefault(\$default);
                }
                \$i++;
            }
        if (!\$found) {
            \$object = new ObjectContact();
            \$object->setObjectcontactObjectClass('".substr($this->getClassname(),4)."');
            \$object->setObjectcontactObjectId(\$this->getId());
            \$object->setObjectcontactContactId(\$contact->getId());
            \$object->setObjectcontactIsDefault(\$default);
            \$object->setObjectcontactRol(\$contact->getContactRol());
            \$this->collObjectContacts[] = \$object;
        }
        \$this->collContacts[] = \$contact;
        if (\$default)
            \$this->collDefaultContact = \$contact;
    }

    public function setContact(\$v)
    {
        if (\$v !== null) {
            \$this->addContact(\$v, true);
        }
    }
    ";
    }
  }


    //Extend Method addDelete
    protected function addDelete(&$script)
    {
        $tmp = '';
        parent::addDelete($tmp);

        $date_script = '';

        $user_deleted = false;
        foreach ($this->getTable()->getColumns() as $col)
        {
            $clo = strtolower($col->getName());

            if (!$user_deleted && $clo == 'deleted_by')
            {
                $user_deleted = true;
                $date_script .= "
                    if (!\$this->isColumnModified('deleted_by'))
                    {
                        \$user = sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setDeletedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setDeletedBy(null);
                        }
                    }
                ";
            }
        }

        $tmp = preg_replace('/{/', '{'.$date_script, $tmp, 1);
        $script .= $tmp;
    }

    //Extend Method addSave
    protected function addSave(&$script)
    {
        $tmp = '';
        parent::addSave($tmp);

        $date_script = '';

        $user_updated = false;
        $user_created = false;
        $user_deleted = false;
        foreach ($this->getTable()->getColumns() as $col)
        {
            $clo = strtolower($col->getName());

            if (!$user_created && $clo == 'created_by')
            {
                $user_created = true;
                $date_script .= "
                    if (\$this->isNew() && !\$this->isColumnModified('created_by'))
                    {
                        \$user = sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setCreatedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setCreatedBy(null);
                        }
                    }
                ";
            }
            else if (!$user_updated && $clo == 'updated_by')
            {
                $user_updated = true;
                $date_script .= "
                    if (\$this->isModified() && !\$this->isColumnModified('updated_by'))
                    {
                        \$user = sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setUpdatedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setUpdatedBy(null);
                        }
                    }
                ";
            }
        }

        $tmp = preg_replace('/{/', '{'.$date_script, $tmp, 1);
        $script .= $tmp;
    }

}

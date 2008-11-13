<?php

class Migration018 extends sfMigration {
  public function up()
  {
    // Step 1: Create objectaddress for contacts and regularize default address
    $contacts = ContactPeer::doSelect(new Criteria());
    foreach ($contacts as $contact) {
        if ($contact->getContactAddressId()) {
            $c = new Criteria();
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $contact->getId());
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $contact->getContactAddressId());
            $c1 = clone($c);
            $c1->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
            $doaddress = ObjectAddressPeer::doSelect($c1);
            if ($doaddress) {
                foreach ($doaddress as $doaddr) {
                    $doaddr->setObjectaddressIsDefault(false);
                    $doaddr->save();
                }
            }
            $oaddress = ObjectAddressPeer::doSelect($c);
            if (count($oaddress) > 1) {
                for ($i=1; $i<count($oaddress); $i++) {
                    $addr = $oaddress[$i];
                    $addr->delete();
                }
                $oaddress = $oaddress[0];
            } elseif (!$oaddress) {
                $oaddress = new ObjectAddress();
                $oaddress->setObjectaddressObjectId($contact->getId());
                $oaddress->setObjectaddressObjectClass('Contact');
                $oaddress->setObjectaddressAddressId($contact->getContactAddressId());
            } else {
                $oaddress = $oaddress[0];
            }
            $oaddress->setObjectaddressIsDefault(true);
            $oaddress->save();
            $contact->setContactAddressId(null);
            $contact->save();
        }
    }
    // Step 2: Create objectaddress for clients and regularize default address
    $clients = ClientPeer::doSelect(new Criteria());
    foreach ($clients as $client) {
        if ($client->getClientAddressId()) {
            $c = new Criteria();
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $client->getClientAddressId());
            $c1 = clone($c);
            $c1->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
            $doaddress = ObjectAddressPeer::doSelect($c1);
            if ($doaddress) {
                foreach ($doaddress as $doaddr) {
                    $doaddr->setObjectaddressIsDefault(false);
                    $doaddr->save();
                }
            }
            $oaddress = ObjectAddressPeer::doSelect($c);
            if (count($oaddress) > 1) {
                for ($i=1; $i<count($oaddress); $i++) {
                    $addr = $oaddress[$i];
                    $addr->delete();
                }
                $oaddress = $oaddress[0];
            } elseif (!$oaddress) {
                $oaddress = new ObjectAddress();
                $oaddress->setObjectaddressObjectId($client->getId());
                $oaddress->setObjectaddressObjectClass('Client');
                $oaddress->setObjectaddressAddressId($client->getClientAddressId());
            } else {
                $oaddress = $oaddress[0];
            }
            $oaddress->setObjectaddressIsDefault(true);
            $oaddress->save();
            $client->setClientAddressId(null);
            $client->save();
        }
    }
    // Step 3: Create objectaddress for vendors and regularize default address
    $vendors = VendorPeer::doSelect(new Criteria());
    foreach ($vendors as $vendor) {
        if ($vendor->getVendorAddressId()) {
            $c = new Criteria();
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $vendor->getId());
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $vendor->getVendorAddressId());
            $c1 = clone($c);
            $c1->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
            $doaddress = ObjectAddressPeer::doSelect($c1);
            if ($doaddress) {
                foreach ($doaddress as $doaddr) {
                    $doaddr->setObjectaddressIsDefault(false);
                    $doaddr->save();
                }
            }
            $oaddress = ObjectAddressPeer::doSelect($c);
            if (count($oaddress) > 1) {
                for ($i=1; $i<count($oaddress); $i++) {
                    $addr = $oaddress[$i];
                    $addr->delete();
                }
                $oaddress = $oaddress[0];
            } elseif (!$oaddress) {
                $oaddress = new ObjectAddress();
                $oaddress->setObjectaddressObjectId($vendor->getId());
                $oaddress->setObjectaddressObjectClass('Vendor');
                $oaddress->setObjectaddressAddressId($vendor->getVendorAddressId());
            } else {
                $oaddress = $oaddress[0];
            }
            $oaddress->setObjectaddressIsDefault(true);
            $oaddress->save();
            $vendor->setVendorAddressId(null);
            $vendor->save();
        }
    }
    // Step 4: Regularize ObjectAddress type
    $oaddresses = ObjectAddressPeer::doSelect(new Criteria());
    foreach ($oaddresses as $oaddress) {
        if (!$oaddress->getObjectaddressType()) {
            $oaddress->setObjectaddressType('work');
            $oaddress->save();
        }
    }
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    // Do it manually
    /*
    $this->executeSQL("ALTER TABLE `aranet_contact` DROP COLUMN `contact_address_id`");
    $this->executeSQL("ALTER TABLE `aranet_client` DROP COLUMN `client_address_id`");
    $this->executeSQL("ALTER TABLE `aranet_vendor` DROP COLUMN `vendor_address_id`");
    $this->executeSQL("ALTER TABLE `aranet_objectcontact` DROP COLUMN `delete_at`");
    $this->executeSQL("ALTER TABLE `aranet_objectcontact` DROP COLUMN `delete_by`");
    * */
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down()
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

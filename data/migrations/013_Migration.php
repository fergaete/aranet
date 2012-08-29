<?php

class Migration013 extends sfMigration {
  public function up() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("CREATE TABLE `aranet_objectaddress`
      (
          `id` INTEGER  NOT NULL AUTO_INCREMENT,
          `objectaddress_name` VARCHAR(128) NULL,
          `objectaddress_address_id` INTEGER,
          `objectaddress_object_id` INTEGER,
          `objectaddress_object_class` VARCHAR(64),
          `objectaddress_type` VARCHAR(16),
          `objectaddress_is_default` INTEGER(1) default 0,
          PRIMARY KEY (`id`),
          UNIQUE KEY `objectaddress_unique_idx` (`objectaddress_address_id`, `objectaddress_object_id`, `objectaddress_object_class`),
          KEY `objectaddress_address_id_idx2`(`objectaddress_address_id`),
          KEY `objectaddress_object_id_idx2`(`objectaddress_object_id`),
          CONSTRAINT `objectaddress_address_id_idx`
              FOREIGN KEY (`objectaddress_address_id`)
              REFERENCES `aranet_address` (`id`)
              ON DELETE CASCADE
      )Type=InnoDB;");
    // Move data from contact
    $c = new Criteria();
    $c->add(ContactPeer::CONTACT_ADDRESS_ID, null, Criteria::ISNOTNULL);
    $contacts = ContactPeer::doSelect($c);
    foreach ($contacts as $contact) {
        $addc = new ObjectAddress();
        $addc->setObjectaddressObjectClass('Contact');
        $addc->setObjectaddressObjectId($contact->getId());
        $addc->setObjectaddressType($contact->getAddress()->getAddressType());
        $addc->setObjectaddressAddressId($contact->getContactAddressId());
        $addc->setObjectaddressIsDefault(true);
        $addc->save();
    }
    // Move data from client
    $c = new Criteria();
    $c->add(ClientPeer::CLIENT_ADDRESS_ID, null, Criteria::ISNOTNULL);
    $clients = ClientPeer::doSelect($c);
    foreach ($clients as $client) {
        $addc = new ObjectAddress();
        $addc->setObjectaddressObjectClass('Client');
        $addc->setObjectaddressObjectId($client->getId());
        $addc->setObjectaddressType($client->getAddress()->getAddressType());
        $addc->setObjectaddressAddressId($client->getClientAddressId());
        $addc->setObjectaddressIsDefault(true);
        $addc->save();
    }
    // Move data from vendor
    $c = new Criteria();
    $c->add(VendorPeer::VENDOR_ADDRESS_ID, null, Criteria::ISNOTNULL);
    $vendors = VendorPeer::doSelect($c);
    foreach ($vendors as $vendor) {
        $addc = new ObjectAddress();
        $addc->setObjectaddressObjectClass('Vendor');
        $addc->setObjectaddressObjectId($vendor->getId());
        $addc->setObjectaddressType($vendor->getAddress()->getAddressType());
        $addc->setObjectaddressAddressId($vendor->getVendorAddressId());
        $addc->setObjectaddressIsDefault(true);
        $addc->save();
    }
    $this->executeSQL("ALTER TABLE `aranet_address` DROP COLUMN `address_type`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down() 
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    $this->executeSQL("DROP TABLE IF EXISTS `aranet_objectaddress`;");
    $this->executeSQL("ALTER TABLE `aranet_address` ADD COLUMN `address_type` VARCHAR(16) DEFAULT AFTER `id`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }
}

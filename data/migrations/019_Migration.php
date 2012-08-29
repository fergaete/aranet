<?php

class Migration019 extends sfMigration {
  public function up()
  {
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    //$this->executeSQL("ALTER TABLE `aranet_objectcontact` ADD COLUMN `objectcontact_is_default` INTEGER(1) default 0 AFTER `objectcontact_rol`");
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
    // Step 1: Create objectcontact for client
    $clients = ClientPeer::doSelect(new Criteria());
    foreach ($clients as $client) {
        if ($client->getClientContactPersonId()) {
            $c = new Criteria();
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $client->getId());
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $client->getClientContactPersonId());
            $ocontact = ObjectContactPeer::doSelect($c);
            if ($ocontact) {
                for ($i=0; $i<count($ocontact); $i++) {
                    $ocont = $ocontact[$i];
                    $ocont->delete();
                }
            }
            $ocontact = new ObjectContact();
            $ocontact->setObjectcontactObjectId($client->getId());
            $ocontact->setObjectcontactObjectClass('Client');
            $ocontact->setObjectcontactContactId($client->getClientContactPersonId());
            $ocontact->save();
            $this->executeSQL("UPDATE `aranet_objectcontact` SET `objectcontact_is_default` = 1 WHERE `id` = " . $ocontact->getId());
            $client->setClientContactPersonId(null);
            $client->save();
        }
    }
    // Step 2: Create objectcontact for vendor
    $vendors = VendorPeer::doSelect(new Criteria());
    foreach ($vendors as $vendor) {
        if ($vendor->getVendorContactPersonId()) {
            $c = new Criteria();
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Vendor');
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $vendor->getId());
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $vendor->getVendorContactPersonId());
            $ocontact = ObjectContactPeer::doSelect($c);
            if ($ocontact) {
                for ($i=0; $i<count($ocontact); $i++) {
                    $ocont = $ocontact[$i];
                    $ocont->delete();
                }
            }
            $ocontact = new ObjectContact();
            $ocontact->setObjectcontactObjectId($vendor->getId());
            $ocontact->setObjectcontactObjectClass('Vendor');
            $ocontact->setObjectcontactContactId($vendor->getVendorContactPersonId());
            $ocontact->save();
            $this->executeSQL("UPDATE `aranet_objectcontact` SET `objectcontact_is_default` = 1 WHERE `id` = " . $ocontact->getId());
            $vendor->setVendorContactPersonId(null);
            $vendor->save();
        }
    }
    // Step 3: Create objectcontact for project
    $projects = ProjectPeer::doSelect(new Criteria());
    foreach ($projects as $project) {
        if ($project->getProjectContactPersonId()) {
            $c = new Criteria();
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
            $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $project->getId());
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $project->getProjectContactPersonId());
            $ocontact = ObjectContactPeer::doSelect($c);
            if ($ocontact) {
                for ($i=0; $i<count($ocontact); $i++) {
                    $ocont = $ocontact[$i];
                    $ocont->delete();
                }
            }
            $ocontact = new ObjectContact();
            $ocontact->setObjectcontactObjectId($project->getId());
            $ocontact->setObjectcontactObjectClass('Project');
            $ocontact->setObjectcontactContactId($project->getProjectContactPersonId());
            $ocontact->save();
            $this->executeSQL("UPDATE `aranet_objectcontact` SET `objectcontact_is_default` = 1 WHERE `id` = " . $ocontact->getId());
            $project->setProjectContactPersonId(null);
            $project->save();
        }
    }
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 0;");
    // Do it manually
    /*
    $this->executeSQL("ALTER TABLE `aranet_client` DROP COLUMN `client_contact_person_id`");
    $this->executeSQL("ALTER TABLE `aranet_vendor` DROP COLUMN `vendor_contact_person_id`");
    $this->executeSQL("ALTER TABLE `aranet_project` DROP COLUMN `project_contact_person_id`");
    $this->executeSQL("ALTER TABLE `aranet_invoice` DROP COLUMN `invoice_contact_person_id`");
    $this->executeSQL("ALTER TABLE `aranet_budget` DROP COLUMN `budget_contact_person_id`");
    $this->executeSQL("ALTER TABLE `aranet_objectcontact` DROP COLUMN `delete_at`");
    $this->executeSQL("ALTER TABLE `aranet_objectcontact` DROP COLUMN `delete_by`");
    * */
    $this->executeSQL("SET FOREIGN_KEY_CHECKS = 1;");
  }

  public function down()
  {

  }
}

<?php
if (!@constant('SF_APP')) {
    define('SF_APP', 'frontend');
}
include(dirname(__FILE__).'/../../plugins/sfModelTestPlugin/bootstrap/model-unit.php');

class basicTest extends sfPropelTest
{
    public function test_basic()
    {
        // User
        $user = new sfGuardUser();
        $user_profile = new sfGuardUserProfile();
        $user->addsfGuardUserProfileRelatedByUserId($user_profile);
        $user_profile->setFirstName('Joe');
        $user_profile->setLastName('Smith');
        $user->setUsername('bobbyjoe');
        $user->setPassword('bobbyjoe');
        $user->save();

        $joe = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        if ($joe->getProfile()) {
            $this->ok($joe, 'Joe exists!');
        } else {
            $this->fail($joe, 'Joe exists!');
        }

        // Address
        $address = new Address();
        $address->setAddressLine1('line1');
        $address->setAddressLine2('line2');
        $address->setAddressIsDefault(true);
        $address->save();
        $test_address = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1');
        if ($test_address) {
            $this->ok($test_address, 'Test address sucessfully created!');
        } else {
            $this->fail($test_address, 'Test address fails!');
        }

        // Address 2
        $address2 = new Address();
        $address2->setAddressLine1('line1 2');
        $address2->setAddressLine2('line2 2');
        $address2->save();
        $test_address2 = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1 2');
        if ($test_address2) {
            $this->ok($test_address2, 'Test address 2 sucessfully created!');
        } else {
            $this->fail($test_address2, 'Test address 2 fails!');
        }

        // Contact
        $contact = new Contact();
        $contact->setContactFirstName('Joe');
        $contact->setContactLastName('Smith');
        $contact->setContactEmail('smith@test.es');
        $contact->setContactBirthday('2007-09-10');
        $contact->setContactRol('test rol');
        $contact->save();
        $joeContact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        if ($joeContact) {
            $this->ok($joeContact, 'Contact Joe sucessfully created!');
        } else {
            $this->fail($joeContact, 'Contact Joe fails!');
        }

        $joeContact->setAddress($test_address);
        $joeContact->save();

        // Check if an objectAddress is created
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $address->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $joeContact->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
        $c->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
        $oAddress = ObjectAddressPeer::doSelect($c);
        if ($oAddress) {
            // Must be blank
            $this->ok($oAddress && count($oAddress) == 1, 'Test address associated with test contact!');
        } else {
            $this->fail($oAddress && count($oAddress) == 1, 'Test address association with contact fails!');
        }
        $joeContact->setAddress($address);
        $joeContact->save();

        // Check if an objectAddress is duplicated
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $test_address->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $joeContact->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
        $oAddress = ObjectAddressPeer::doSelect($c);
        if ($oAddress) {
            // Must be blank
            $this->ok($oAddress && count($oAddress) == 1, 'No duplicated for test address associated with test contact!');
        } else {
            $this->fail($oAddress && count($oAddress) == 1, 'No duplicated for test address association with contact fails!');
        }

        // Client
        $client = new Client();
        $client->setClientUniqueName('test client');
        $client->setClientCompanyName('test client');
        $client->save();
        $testClient = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        if ($testClient) {
            $this->ok($testClient, 'Test client sucessfully created!');
        } else {
            $this->fail($testClient, 'Test client fails!');
        }

        $client->setAddress($test_address);
        $client->save();
        // Check if an objectAddress is created
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $address->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        $c->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
        $oAddress = ObjectAddressPeer::doSelect($c);
        if ($oAddress) {
            // Must be blank
            $this->ok($oAddress && count($oAddress) == 1, 'Test address associated with test client!');
        } else {
            $this->fail($oAddress && count($oAddress) == 1, 'Test address association with client fails!');
        }

        $client->setAddress($test_address2); // New default test_address2
        $client->save();
        // Check if an objectAddress is created
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $test_address2->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        $c->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
        $oAddress2 = ObjectAddressPeer::doSelect($c);
        if ($oAddress2) {
            // Must be blank
            $this->ok($oAddress2 && count($oAddress2) == 1, 'Test address 2 associated with test client and move default value to test address 2!');
        } else {
            $this->fail($oAddress2 && count($oAddress2) == 1, 'Test address 2 association with client and move default value to test address 2 fails!');
        }

        $client->addAddress($address); // Address es la dirección por defecto
        $client->save();
        // Check if an objectAddress is created
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $address->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        $c->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
        $oAddress = ObjectAddressPeer::doSelect($c);
        if ($oAddress) {
            $this->ok($oAddress && count($oAddress) == 1, 'Test address associated with test client!');
        } else {
            $this->fail($oAddress && count($oAddress) == 1, 'Test address association with client fails!');
        }

        $client->setContact($contact);
        $client->save();
        // Check if an objectAddress is created
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $client->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $c->add(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT, true);
        $oContact = ObjectContactPeer::doSelectOne($c);
        if ($oContact) {
            // Must be blank
            $this->ok($oContact, 'Joe contact associated with test client!');
            $this->ok($oContact->getObjectcontactRol(), 'Test rol saved in object contact!');
        } else {
            $this->fail($oContact, 'Joe contact association with client fails!');
            $this->fail($oContact, 'Test rol saved in object contact!');
        }

        // Vendor
        $vendor = new Vendor();
        $vendor->setVendorUniqueName('test vendor');
        $vendor->setVendorCompanyName('test vendor');
        $vendor->save();
        $testVendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        if ($testVendor) {
            $this->ok($testVendor, 'Test vendor sucessfully created!');
        } else {
            $this->fail($testVendor, 'Tst vendor fails!');
        }

        $vendor->setAddress($test_address);
        $vendor->save();
        // Check if an objectAddress is created
        if ($test_address) {
            $c = new Criteria();
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $test_address->getId());
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $vendor->getId());
            $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
            $c->add(ObjectAddressPeer::OBJECTADDRESS_IS_DEFAULT, true);
            $oAddress = ObjectAddressPeer::doSelectOne($c);
        } else {
            $oAddress = null;
        }
        if ($oAddress) {
            // Must be blank
            $this->ok($oAddress, 'Test address associated with test vendor!');
        } else {
            $this->fail($oAddress, 'Test address association with vendor fails!');
        }

        // Project
        $project = new Project();
        $project->setProjectName('test project');
        $project->save();
        $testProject = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        if ($testProject) {
            $this->ok($testProject, 'Test project sucessfully created!');
        } else {
            $this->fail('Test project fails!');
        }

        $project->setClient($client);
        $project->save();

        // Contact 2
        $contact2 = new Contact();
        $contact2->setContactFirstName('Joe2');
        $contact2->setContactLastName('Smith2');
        $contact2->setContactEmail('smith2@test.es');
        $contact2->setContactBirthday('2007-09-10');
        $contact2->setContactRol('test rol');
        $contact2->save();
        $joeContact2 = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith2@test.es');
        if ($joeContact2) {
            $this->ok($joeContact2, 'Contact Joe sucessfully created!');
        } else {
            $this->fail($joeContact2, 'Contact Joe fails!');
        }

        $project->setContact($contact2);
        $project->save();
        // Check if an objectContact is created
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $joeContact2->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $project->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
        $c->add(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT, true);
        $oContact = ObjectContactPeer::doSelectOne($c);
        if ($oContact) {
            $this->ok($oContact, 'Joe contact associated with test project!');
            $this->ok($oContact->getObjectcontactRol(), 'Test rol saved in object contact!');
        } else {
            $this->fail($oContact, 'Joe contact association with project fails!');
            $this->fail($oContact, 'Test rol saved in object contact!');
        }
        $project->setClient($testClient);
        $project->save();
        // Check if an objectContact is created for client
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $joeContact2->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $testClient->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $oContact = ObjectContactPeer::doSelectOne($c);
        if ($oContact) {
            $this->ok($oContact, 'Joe contact associated with test client thorought project client asociation!');
        } else {
            $this->fail($oContact, 'Joe2 contact association with client throught project fails!');
        }
    }
    public function test_basicDelete()
    {
        // User
        $joe = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $user_id = $joe->getId();
        $joe->delete();
        $joe_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        sfPropelParanoidBehavior::disable();
        $joe2_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $this->ok(!$joe_del && $joe2_del, 'Test user tagged as deleted!');
        sfPropelParanoidBehavior::enable();
        // User Profile
        $joeProfile_del = sfGuardUserProfilePeer::getOneBy(sfGuardUserProfilePeer::USER_ID, $user_id);
        sfPropelParanoidBehavior::disable();
        $joe2Profile_del = sfGuardUserProfilePeer::getOneBy(sfGuardUserProfilePeer::USER_ID, $user_id);
        $this->ok(!$joeProfile_del && $joe2Profile_del, 'Test profile tagged as deleted!');
        sfPropelParanoidBehavior::enable();
        // Contact
        $contact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        $contact_id = $contact->getId();
        $contact->delete();
        $del_contact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        sfPropelParanoidBehavior::disable();
        $del2_contact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_contact && $del2_contact, 'Contact Joe sucessfully tagged as deleted!');
        // Contact2
        $contact2 = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith2@test.es');
        $contact2->delete();
        $del_contact2 = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith2@test.es');
        sfPropelParanoidBehavior::disable();
        $del2_contact2 = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith2@test.es');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_contact && $del2_contact2, 'Contact Joe2 sucessfully tagged as deleted!');
        // Client
        $client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $client->delete();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::disable();
        $del2_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_client && $del2_client, 'Test client sucessfully tagged as deleted!');

        // Project
        $project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $project->delete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::disable();
        $del2_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_project && $del2_project, 'Test project sucessfully tagged as deleted!');

        // Vendor
        $vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        $vendor->delete();
        $del_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        sfPropelParanoidBehavior::disable();
        $del2_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_vendor && $del2_vendor, 'Test vendor sucessfully tagged as deleted!');

        // Address
        $address = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1');
        $c = new Criteria();
        if ($address) {
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $address->getId());
        }
        $c1 = clone($c);
        $c2 = clone($c);
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $contact_id);
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
        $c1->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
        $c1->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        $c2->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $vendor->getId());
        $c2->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
        $oAddress = ObjectAddressPeer::doSelect($c);
        $this->ok(!$oAddress, 'Object Address associated with contact object sucessfully deleted!');
        $ocAddress = ObjectAddressPeer::doSelect($c1);
        $this->ok(!$ocAddress, 'Object Address associated with client object sucessfully deleted!');
        $ovAddress = ObjectAddressPeer::doSelect($c2);
        $this->ok(!$ovAddress, 'Object Address associated with vendor object sucessfully deleted!');

        $address->delete();
        $address = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1');
        $this->ok(!$address, 'Test address sucessfully deleted!');

        // Address 2
        $address2 = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1 2');
        $c = new Criteria();
        if ($address2) {
            $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $address2->getId());
        }
        $c1 = clone($c);
        $c2 = clone($c);
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $contact_id);
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Contact');
        $c1->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $client->getId());
        $c1->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Client');
        $c2->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $vendor->getId());
        $c2->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, 'Vendor');
        $oAddress2 = ObjectAddressPeer::doSelect($c);
        $this->ok(!$oAddress2, 'Object Address 2 associated with contact object sucessfully deleted!');
        $ocAddress2 = ObjectAddressPeer::doSelect($c1);
        $this->ok(!$ocAddress2, 'Object Address 2 associated with client object sucessfully deleted!');
        $ovAddress2 = ObjectAddressPeer::doSelect($c2);
        $this->ok(!$ovAddress2, 'Object Address 2 associated with vendor object sucessfully deleted!');

        $address2->delete();
        $address2 = AddressPeer::getOneBy(AddressPeer::ADDRESS_LINE1, 'line1 2');
        $this->ok(!$address2, 'Test address 2 sucessfully deleted!');

        // ObjectContact
        $c = new Criteria();
        if ($contact) {
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        }
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $client->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $oContact = ObjectContactPeer::doSelect($c);
        $this->ok(!$oContact, 'Object contact associated with client object sucessfully deleted!');

        if (!$joe_del && $joe2_del) {
            $joe->forceDelete();
        }
        sfPropelParanoidBehavior::disable();
        $joe_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $this->ok(!$joe_del, 'Test user sucessfully deleted!');

        $contact->forceDelete();
        $del_contact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        $this->ok(!$del_contact, 'Contact Joe sucessfully deleted!');

        $contact2->forceDelete();
        $del_contact2 = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith2@test.es');
        $this->ok(!$del_contact2, 'Contact Joe2 sucessfully deleted!');

        $client->forceDelete();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $this->ok(!$del_client, 'Test client sucessfully deleted!');

        $project->forceDelete();
        sfPropelParanoidBehavior::disable();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok(!$del_project, 'Test project sucessfully deleted!');

        $vendor->forceDelete();
        $del_vendor = VendorPeer::getOneBy(VendorPeer::VENDOR_UNIQUE_NAME, 'test vendor');
        $this->ok(!$del_vendor, 'Test vendor sucessfully deleted!');
    }

}

$test = new basicTest();
$test->execute();

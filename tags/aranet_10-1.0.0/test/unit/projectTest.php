<?php
if (!@constant('SF_APP')) {
    define('SF_APP', 'frontend');
}
include(dirname(__FILE__).'/../../plugins/sfModelTestPlugin/bootstrap/model-unit.php');

class projectTest extends sfPropelTest
{
    public function test_project()
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
            $this->fail('Joe exists!');
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
            $this->fail('Contact Joe fails!');
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
            $this->fail('Test client fails!');
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

        // Delete project
        $project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $project->delete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::disable();
        $del2_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_project && $del2_project, 'Test project sucessfully tagged as deleted!');
        $testClient = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');

        $project->forceDelete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok(!$del_project, 'Test project sucessfully deleted!');
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

        $project->setContact($contact);
        $project->save();
        // Check if an objectContact is created for Project
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $project->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
        $c->add(ObjectContactPeer::OBJECTCONTACT_IS_DEFAULT, true);
        $oContact = ObjectContactPeer::doSelectOne($c);
        if ($oContact) {
            $this->ok($oContact, 'Joe contact associated with test project!');
            $this->ok($oContact->getObjectcontactRol(), 'Test rol saved in object contact!');
        } else {
            $this->fail('Joe contact association with project fails!');
        }
        // Check if an objectContact is created for Client
        $c = new Criteria();
        $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $client->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $oContact = ObjectContactPeer::doSelectOne($c);
        if ($oContact) {
            $this->ok($oContact, 'Joe contact associated with test client throught association in project!');
            $this->ok($oContact->getObjectcontactRol(), 'Test rol saved in object contact!');
        } else {
            $this->fail('Joe contact association with client throught association in project fails!');
        }

    }

    public function test_projectDelete()
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
        // Project
        $project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $project->delete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::disable();
        $del2_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_project && $del2_project, 'Test project sucessfully tagged as deleted!');

        // Client
        $client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $client->delete();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::disable();
        $del2_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        sfPropelParanoidBehavior::enable();
        $this->ok(!$del_client && $del2_client, 'Test client sucessfully tagged as deleted!');

        // ObjectContact
        $c = new Criteria();
        if ($contact) {
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        }
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $client->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Client');
        $oContact = ObjectContactPeer::doSelect($c);
        $this->ok(!$oContact, 'Object contact associated with client object sucessfully deleted!');
        $c = new Criteria();
        if ($contact) {
            $c->add(ObjectContactPeer::OBJECTCONTACT_CONTACT_ID, $contact->getId());
        }
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_ID, $project->getId());
        $c->add(ObjectContactPeer::OBJECTCONTACT_OBJECT_CLASS, 'Project');
        $oContact = ObjectContactPeer::doSelect($c);
        $this->ok(!$oContact, 'Object contact associated with project object sucessfully deleted!');

        $joe->forceDelete();
        sfPropelParanoidBehavior::disable();
        $joe_del = sfGuardUserPeer::getOneBy(sfGuardUserPeer::USERNAME, 'bobbyjoe');
        $this->ok(!$joe_del, 'Test user sucessfully deleted!');

        $contact->forceDelete();
        $del_contact = ContactPeer::getOneBy(ContactPeer::CONTACT_EMAIL, 'smith@test.es');
        $this->ok(!$del_contact, 'Contact Joe sucessfully deleted!');

        $client->forceDelete();
        $del_client = ClientPeer::getOneBy(ClientPeer::CLIENT_UNIQUE_NAME, 'test client');
        $this->ok(!$del_client, 'Test client sucessfully deleted!');
        sfPropelParanoidBehavior::disable();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok($del_project, 'Test project not deleted when deleting associated client!');

        $project->forceDelete();
        $del_project = ProjectPeer::getOneBy(ProjectPeer::PROJECT_NAME, 'test project');
        $this->ok(!$del_project, 'Test project sucessfully deleted!');
    }

}

$test = new projectTest();
$test->execute();

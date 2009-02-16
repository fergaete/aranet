<?php

/**
 * Project form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class ProjectForm extends BaseProjectForm
{
  public function configure()
  {
    parent::configure();

    // created_at, created_by, updated_at, updated_by, deleted_at, deleted_by
    unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by'], $this['deleted_at'], $this['deleted_by']);

    // project_prefix && project_number
    $this->widgetSchema['project_prefix'] = new sfWidgetFormInput(array(), array('class' => 'tiny'));
    $this->widgetSchema['project_number'] = new sfWidgetFormInput(array(), array('class' => 'small'));
    $this->widgetSchema['project_name'] = new sfWidgetFormInput(array(), array('class' => 'large'));
    $this->widgetSchema['project_url'] = new sfWidgetFormInput(array(), array('class' => 'large'));
    
    $this->widgetSchema->setLabels(array(
      'project_url' => 'Project URL',
      'project_client_id' => 'Client',
      'project_prefix' => 'Prefix',
      'project_status_id' => 'Status',
      'project_category_id' => 'Category',
      'project_comments' => 'Comments',
      'project_start_date' => 'Start date',
      'project_finish_date' => 'Finish date',
      'project_number' => 'Identification' 
      ));
    
    
    // validators
    $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(
      array('model' => 'Project', 'column' => array('project_number')),
      array('invalid' => 'number in use')
    ));

    // project_client_id
    if ($this->object->getProjectClientId()) {
      $client_string = $this->object->getClient()->getFullName(false);
      $client_id = $this->object->getClient()->getId();
    } else {
      $client_string = '';
      $client_id = '';
    }
    $this->widgetSchema['project_client_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/client/autocomplete', 'value' => array($client_string, $client_id)), array('class' => 'large'));
    $this->validatorSchema['project_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => true)));

    // project_status_id    
    $this->widgetSchema['project_status_id'] = new yuiWidgetFormPropelSelect(array('model' => 'ProjectStatus', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));

    // project_category_id    
    $this->widgetSchema['project_category_id'] = new yuiWidgetFormPropelSelect(array('model' => 'ProjectCategory', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));
    
    // project_start_date
    $this->widgetSchema['project_start_date'] = new yuiWidgetFormDate();
    
    // project_finish_date
    $this->widgetSchema['project_finish_date'] = new yuiWidgetFormDate();
    
    // contacts
    $contact = new Contact();
    $contact->setId(0);
    if ($this->object->getContacts()) {
      $contacts = $this->object->getContacts();
      $contacts[] = $contact;
    } else {
      $contacts = array($contact);
    }
    foreach ($contacts as $contact) {
      $this->widgetSchema['contact['.$contact->getId().']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/contact/autocomplete', 'value' => array($contact->__toString(), $contact->getId())), array('class' => 'large'));
      $this->widgetSchema->setLabels(array('contact['.$contact->getId().']' => 'Contact'));
    }
    $this->validatorSchema['contact'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    $this->widgetSchema->setHelp('contact[0]', "If the contact doesn't exists, the program will create one");
    $this->widgetSchema->setHelp('tags', "If the tag doesn't exists, the program will create one");
    $this->widgetSchema->setHelp('project_client_id', "If the client doesn't exists, the program will create one");
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())), array('class' => 'large'));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('forms');
  }
}

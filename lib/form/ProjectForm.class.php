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
    
    // created_at
    unset($this->widgetSchema['created_at']);
    unset($this->validatorSchema['created_at']);

    // created_by
    unset($this->widgetSchema['created_by']);
    unset($this->validatorSchema['created_by']);

    // updated_at
    unset($this->widgetSchema['updated_at']);
    unset($this->validatorSchema['updated_at']);

    // updated_by
    unset($this->widgetSchema['updated_by']);
    unset($this->validatorSchema['updated_by']);

    // deleted_at
    unset($this->widgetSchema['deleted_at']);
    unset($this->validatorSchema['deleted_at']);

    // deleted_by
    unset($this->widgetSchema['deleted_by']);
    unset($this->validatorSchema['deleted_by']);

    
    // project_prefix && project_number
    $this->widgetSchema['project_prefix'] = new sfWidgetFormInput(array(), array('class' => 'tiny'));
    $this->widgetSchema['project_number'] = new sfWidgetFormInput(array(), array('class' => 'smaller'));
      
    $this->widgetSchema->setLabels(array(
      'project_url' => 'Project URL',
      'project_client_id' => 'Client',
      'project_prefix' => 'Prefix',
      'project_status_id' => 'Status',
      'project_category_id' => 'Category',
      'project_comments' => 'Comments',
      'project_start_date' => 'Start date',
      'project_finish_date' => 'Finish date',
      ));
    
    
    // validators
    $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(
      array('model' => 'Project', 'column' => array('project_number')),
      array('invalid' => 'number in use')
    ));

    // project_client_id
    $client = ($this->object->getClient()) ? $this->object->getClient()->getFullName(false) : '';
    $this->widgetSchema['project_client_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/client/autocomplete', 'value' => $client));
    $this->validatorSchema['project_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    // project_status_id    
    $this->widgetSchema['project_status_id'] = new yuiWidgetFormPropelSelect(array('model' => 'ProjectStatus', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));

    // project_category_id    
    $this->widgetSchema['project_category_id'] = new yuiWidgetFormPropelSelect(array('model' => 'ProjectCategory', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));
    
    // project_start_date
    $this->widgetSchema['project_start_date'] = new yuiWidgetFormDate();
    
    // project_finish_date
    $this->widgetSchema['project_finish_date'] = new yuiWidgetFormDate();
    
    // contacts
    $this->widgetSchema['contacts'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.FullName + " (" + %1%.Rol + ")"', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/contact/autocomplete', 'value' => $this->object->getContacts(array('serialized' => true))));
    
    $this->validatorSchema['contacts'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $this->widgetSchema->setHelp('tags', "If the tag doesn't exists, the program will create one");
    $this->widgetSchema->setHelp('contacts', "If the contact doesn't exists, the program will create one");
    $this->widgetSchema->setHelp('project_client_id', "If the client doesn't exists, the program will create one");
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
  }
}

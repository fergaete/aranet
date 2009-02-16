<?php

/**
 * Budget form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class BudgetForm extends BaseBudgetForm
{
  public function configure()
  {
    parent::configure();

    // created_at, created_by, updated_at, updated_by, deleted_at, deleted_by
    unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by'], $this['deleted_at'], $this['deleted_by']);

    // budget_prefix && budget_number && budget_revision
    $this->widgetSchema['budget_prefix'] = new sfWidgetFormInput(array(), array('class' => 'tiny separator'));
    $this->widgetSchema['budget_number'] = new sfWidgetFormInput(array(), array('class' => 'small separator'));
    $this->widgetSchema['budget_revision'] = new sfWidgetFormInput(array(), array('class' => 'tiny separator'));
    $this->validatorSchema['budget_revision'] = new sfValidatorInteger(array('required' => true));
    // budget_title
    $this->widgetSchema['budget_title'] = new sfWidgetFormInput(array(), array('class' => 'large'));
    $this->validatorSchema['budget_title'] = new sfValidatorString(array('required' => true));
    // budget_date
    $this->widgetSchema['budget_date'] = new yuiWidgetFormDate();
    $this->validatorSchema['budget_date'] = new sfValidatorDate(array('required' => true));
    // budget_valid_date
    $this->widgetSchema['budget_valid_date'] = new yuiWidgetFormDate();
    $this->validatorSchema['budget_valid_date'] = new sfValidatorDate(array('required' => true));
    //budget_tax_rate && budget_freight_charge && budget_payment_due_id
    $this->widgetSchema['budget_tax_rate'] = new sfWidgetFormInput(array(), array('class' => 'tiny separator'));
    $this->widgetSchema['budget_freight_charge'] = new sfWidgetFormInput(array(), array('class' => 'tiny separator'));
    $this->widgetSchema['budget_payment_condition_id'] = new yuiWidgetFormPropelSelect(array('model' => 'PaymentCondition', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select'));

$this->widgetSchema['budget_print_comments'] = new ysfYUIRadioWidget(array('choices' => array(0 => "No", 1 => "Yes")));



    
    $this->widgetSchema->setLabels(array(
      'budget_client_id' => 'Client',
      'budget_number' => 'No.',
      'budget_prefix' => 'Prefix',
      'budget_revision' => 'Revision',
      'budget_title' => 'Budget title',
      'budget_date' => 'Date',
      'budget_valid_date' => 'Valid till',
      'budget_client_id' => 'Client',
      'budget_project_id' => 'Project',
      'budget_status_id' => 'Status',
      'budget_category_id' => 'Category',
      'budget_comments' => 'Comments',
      'budget_print_comments' => 'Print comments?',
      'budget_tax_rate' => 'Tax rate (%)',
      'budget_freight_charge' => 'Freight charge',
      'budget_payment_condition_id' => 'Payment due'
    ));
    
    // validators
    $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(
      array('model' => 'Budget', 'column' => array('budget_number')),
      array('invalid' => 'number in use')
    ));

    // budget_client_id
    if ($this->object->getBudgetClientId()) {
      $client_string = $this->object->getClient()->getFullName(false);
      $client_id = $this->object->getClient()->getId();
    } else {
      $client_string = '';
      $client_id = '';
    }
    $this->widgetSchema['budget_client_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/client/autocomplete', 'value' => array($client_string, $client_id)), array('class' => 'large'));
    $this->validatorSchema['budget_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => true)));
    
    // budget_project_id
    if ($this->object->getBudgetProjectId()) {
      $project_string = $this->object->getProject()->__toString();
      $project_id = $this->object->getProject()->getId();
    } else {
      $project_string = '';
      $project_id = '';
    }
    $this->widgetSchema['budget_project_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/project/autocomplete', 'value' => array($project_string, $project_id)), array('class' => 'large'));
    $this->validatorSchema['budget_project_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    // budget_status_id    
    $this->widgetSchema['budget_status_id'] = new yuiWidgetFormPropelSelect(array('model' => 'BudgetStatus', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));
    $this->validatorSchema['budget_status_id'] = new sfValidatorPropelChoice(array('model' => 'BudgetStatus', 'column' => 'id', 'required' => true));

    // budget_category_id    
    $this->widgetSchema['budget_category_id'] = new yuiWidgetFormPropelSelect(array('model' => 'InvoiceCategory', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select'));
    
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
    $this->widgetSchema->setHelp('budget_client_id', "If the client doesn't exists, the program will create one");
    $this->widgetSchema->setHelp('budget_project_id', "If the project doesn't exists, the program will create one");
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())), array('class' => 'large'));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('forms');
  }
}

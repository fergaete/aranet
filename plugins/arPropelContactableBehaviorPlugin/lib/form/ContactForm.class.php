<?php

/**
 * Contact form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class ContactForm extends BaseContactForm
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
    
    // contact_birthday
    //$this->widgetSchema['contact_birthday'] = new yuiWidgetFormDate();

    // contact_salutation && contact_first_name && contact_last_name
    $this->widgetSchema['contact_salutation'] = new sfWidgetFormInput(array(), array('class' => 'tiny'));
    $this->widgetSchema['contact_first_name'] = new sfWidgetFormInput();
    $this->widgetSchema['contact_last_name'] = new sfWidgetFormInput();
    
    $this->widgetSchema->setLabels(array(
      'contact_salutation' => 'Salutation',
      'contact_first_name' => 'Name',
      'contact_last_name' => 'Last name',
      'contact_email' => 'Email',
      'contact_phone' => 'Phone',
      'contact_fax' => 'Fax',
      'contact_mobile' => 'Mobile',
      'contact_birthday' => 'Birthday',
      'contact_org_unit' => 'Rol',
      ));
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
  }
}

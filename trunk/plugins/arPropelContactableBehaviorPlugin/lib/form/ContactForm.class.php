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
    
    // created_at, created_by, updated_at, updated_by, deleted_at, deleted_by
    unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by'], $this['deleted_at'], $this['deleted_by']);
    
    // contact_birthday
    $this->widgetSchema['contact_birthday'] = new yuiWidgetFormDate();

    // contact_salutation && contact_first_name && contact_last_name
    $this->widgetSchema['contact_salutation'] = new sfWidgetFormInput(array(), array('class' => 'tiny'));
    //$this->widgetSchema['contact_first_name'] = new sfWidgetFormInput();
    //$this->widgetSchema['contact_last_name'] = new sfWidgetFormInput();
    
    // address
    $address = new Address();
    $address->setId(0);
    if ($this->object->getAddresses()) {
      $addresses = $this->object->getAddresses();
      $addresses[] = $address;
    } else {
      $addresses = array($address);
    }
    foreach ($addresses as $address) {
      $this->widgetSchema['address['.$address->getId().']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => array($address->__toString(true), $address->getId())), array('class' => 'large'));
    
    }
    $this->validatorSchema['address'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $this->validatorSchema['contact_email'] = new sfValidatorEmail(array('required' => false), array('invalid' => 'The e-mail address is invalid.'));


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
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())), array('class' => 'large'));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
  }
}

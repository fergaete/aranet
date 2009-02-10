<?php

/**
 * Vendor form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class VendorForm extends BaseVendorForm
{
  public function configure()
  {
    parent::configure();
    
    // created_at, created_by, updated_at, updated_by, deleted_at, deleted_by
    unset($this['created_at'], $this['created_by'], $this['updated_at'], $this['updated_by'], $this['deleted_at'], $this['deleted_by']);

    // vendor_has_tags
    unset($this['vendor_has_tags']);

    
    $this->widgetSchema->setLabels(array(
      'vendor_unique_name' => 'Vendor common name',
      'vendor_company_name' => 'Company name',
      'vendor_cif' => 'CIF',
      'vendor_kind_of_company_id' => 'Industry or Business type',
      'vendor_comments' => 'Comments',
      'vendor_website' => 'Website'
      ));
    
    $this->validatorSchema['vendor_website'] = new sfValidatorUrl(array('required' => false), array('invalid' => 'The url address is invalid.'));

    // validators
    if ($this->object->isNew()) {
      $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(
        array('model' => 'Vendor', 'column' => array('vendor_unique_name')),
        array('invalid' => 'Name in use')
      ));
    } else {
      $this->validatorSchema->setPostValidator(new sfValidatorPass()); 
    }

    // vendor_since
    $this->widgetSchema['vendor_since'] = new yuiWidgetFormDate();

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
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())), array('class' => 'large'));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    // vendor_kind_of_company_id    
    $this->widgetSchema['vendor_kind_of_company_id'] = new yuiWidgetFormPropelSelect(array('model' => 'KindOfCompany', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));

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
      $this->widgetSchema->setLabels(array('address['.$address->getId().']' => 'Address'));
    }
    $this->validatorSchema['address'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('forms');
  }
}

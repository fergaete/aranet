<?php

/**
 * Client form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class ClientForm extends BaseClientForm
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

    // client_has_tags
    unset($this->widgetSchema['client_has_tags']);
    unset($this->validatorSchema['client_has_tags']);
    
    $this->widgetSchema->setLabels(array(
      'client_unique_name' => 'Client common name',
      'client_company_name' => 'Company name',
      'client_cif' => 'CIF',
      'client_kind_of_company_id' => 'Industry or Business type',
      'client_comments' => 'Comments',
      ));
    
    $this->validatorSchema['client_website'] = new sfValidatorUrl(array('required' => false), array('invalid' => 'The url address is invalid.'));

    // client_kind_of_company_id    
    $this->widgetSchema['client_kind_of_company_id'] = new yuiWidgetFormPropelSelect(array('model' => 'KindOfCompany', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));


    // address
    $address = new Address();
    $address->setId(0);
    if ($this->object->getAddresses()) {
      $addresses = $this->object->getAddresses();
      $addresses[] = $address;
    } else {
      $addresses = array($address);
    }
    $i = 0;
    foreach ($addresses as $address) {
      $this->widgetSchema['address['.$address->getId().']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => $address->__toString(true)));
      $this->widgetSchema->setLabels(array('address['.$address->getId().']' => 'Address'));
    
    }
    $this->validatorSchema['address'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    // validators
    if ($this->object->isNew()) {
      $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(
        array('model' => 'Client', 'column' => array('client_unique_name')),
        array('invalid' => 'Name in use')
      ));
    } else {
      $this->validatorSchema->setPostValidator(new sfValidatorPass()); 
    }
    ysfYUI::addComponents('logger', 'calendar');
    // client_since
    $this->widgetSchema['client_since'] = new yuiWidgetFormDate();

    // contacts
    $this->widgetSchema['contacts'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.FullName + " (" + %1%.Rol + ")"', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/contact/autocomplete', 'value' => $this->object->getContacts(array('serialized' => true))));
    
    $this->validatorSchema['contacts'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    // tags
    $this->widgetSchema['tags'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.Name', 'resultSchema' => '["ResultSet.Result","Name"]', 'action' => '/tag/autocomplete', 'value' => implode(', ', $this->object->getTags())));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('client_form');
  }
}

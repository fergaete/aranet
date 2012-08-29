<?php

/**
 * Client form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ClientForm.class.php 49 2008-12-05 11:23:56Z aranova $
 */
class ClientForm extends BaseClientForm
{
  public function configure()
  {
    parent::configure();
    
    // created_at
    unset($this->widgetSchema['created_at'],$this->validatorSchema['created_at']);

    // created_by
    unset($this->widgetSchema['created_by'],$this->validatorSchema['created_by']);

    // updated_at
    unset($this->widgetSchema['updated_at'],$this->validatorSchema['updated_at']);

    // updated_by
    unset($this->widgetSchema['updated_by'],$this->validatorSchema['updated_by']);

    // deleted_at
    unset($this->widgetSchema['deleted_at'],$this->validatorSchema['deleted_at']);

    // deleted_by
    unset($this->widgetSchema['deleted_by'],$this->validatorSchema['deleted_by']);

    // client_has_tags
    unset($this->widgetSchema['client_has_tags'],$this->validatorSchema['client_has_tags']);
    
    $this->widgetSchema->setLabels(array(
      'client_unique_name' => 'Client common name',
      'client_company_name' => 'Company name',
      'client_cif' => 'CIF',
      'client_kind_of_company_id' => 'Industry or Business type',
      'client_comments' => 'Comments',
      ));
    
    $this->validatorSchema['client_website'] = new sfValidatorUrl(array('required' => false), array('invalid' => 'The url address is invalid.'));

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
      $this->widgetSchema['address['.$address->getId().']'] = new sfWidgetFormPropelChoice(array('model' => 'Address', 'add_empty' => true));
      $this->widgetSchema['address['.$address->getId().']']->setOption('renderer_class', 'sfWidgetFormPropelJQueryAutocompleter');
      $this->widgetSchema['address['.$address->getId().']']->setOption('renderer_options', array(
        'model' => 'Address',
        'url'   => $this->getOption('url'),
      ));
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

    // client_since
    $this->widgetSchema['client_since'] = new sfWidgetFormJQueryDate();

    // contacts
    $this->widgetSchema['contacts'] = new sfWidgetFormPropelChoice(array('model' => 'Contact', 'add_empty' => true));
    $this->widgetSchema['contacts']->setOption('renderer_class', 'sfWidgetFormPropelJQueryAutocompleter');
    $this->widgetSchema['contacts']->setOption('renderer_options', array(
      'model' => 'Contact',
      'url'   => $this->getOption('url'),
    ));
    $this->validatorSchema['contacts'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));

    // tags
    $this->widgetSchema['tags'] = new sfWidgetFormPropelChoice(array('model' => 'Tag', 'add_empty' => true));
    $this->widgetSchema['tags']->setOption('renderer_class', 'sfWidgetFormPropelJQueryAutocompleter');
    $this->widgetSchema['tags']->setOption('renderer_options', array(
      'model' => 'Tag',
      'url'   => 'tag/autocomplete',
    ));
    $this->validatorSchema['tags'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('client_form');
    // $this->widgetSchema->setFormFormatterName('list');
  }
}

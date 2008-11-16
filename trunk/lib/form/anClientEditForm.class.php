<?php

/**
 * Edit client form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class anClientEditForm extends ClientForm
{
  /**
   * @see ClientForm
   */
  public function configure()
  {
    parent::configure();

    // client_kind_of_company_id    
    //$this->widgetSchema['client_kind_of_company_id'] = new yuiWidgetFormPropelSelect(array('model' => 'KindOfCompany', 'add_empty' => false, 'multiple' => false), array('class' => 'yui_select'));


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
      $this->widgetSchema['address['.$address->getId().']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => $address->__toString(true)));
    
    }
    $this->validatorSchema['address'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
  }
}

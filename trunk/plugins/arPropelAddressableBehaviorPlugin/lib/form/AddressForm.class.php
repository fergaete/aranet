<?php

/**
 * Address form.
 *
 * @package    form
 * @subpackage aranet_address
 * @version    SVN: $Id$
 */
class AddressForm extends BaseAddressForm
{
  public function configure()
  {
    parent::configure();
    
    // address
    $id = uniqid();
    $this->widgetSchema['address['.$id.']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => $this->object->__toString(true)));
    
    $this->validatorSchema['address['.$id.']'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $this->widgetSchema->setLabels(array(
        'address_line1' => 'Street',
        'address_line2' => 'Street (extended)',
        'address_postal_code' => 'Postal code',
        'address_state' => 'State',
        'address_location' => 'Location',
        'address_country' => 'Country',
    ));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
  }
}

<?php

/**
 * Contact form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class anContactEditForm extends ContactForm
{
  public function configure()
  {
    parent::configure();
    
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
      $this->widgetSchema['address['.$address->getId().']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => $address->__toString(true)), array('class' => 'large'));
    
    }
    $this->validatorSchema['address'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
  }
}

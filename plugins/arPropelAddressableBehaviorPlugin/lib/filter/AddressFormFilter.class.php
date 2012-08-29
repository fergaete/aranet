<?php

/**
 * Address filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: AddressFormFilter.class.php 50 2008-12-05 23:18:18Z aranova $
 */
class AddressFormFilter extends BaseAddressFormFilter
{
  public function setup()
  {
    parent::setup();
    unset($this['address_line2']);
    
    $this->widgetSchema->setLabels(array(
      'address_line1' => 'Street',
      'address_location' => 'Location',
      'address_state' => 'State',
      'address_postal_code' => 'Postal code',
      'address_country' => 'Country',
      ));

  }
}

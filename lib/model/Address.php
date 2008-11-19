<?php

/**
 * Subclass for representing a row from the 'aranet_address' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: Address.php 3 2008-08-06 07:48:19Z pablo $
 */
 
class Address extends BaseAddress
{
  /**
   * type of address (work, home...)
   *
   * @var string
   **/
  protected $type;
  
  /**
   * true if the main address
   *
   * @var string
   **/
  protected $is_default;
  
  /**
   * name of the address (Main address, office, delegation...)
   *
   * @var string
   **/
  protected $name;

  /**
   * returns the type of address
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressType() {
    return $this->type;
  }

  /**
   * sets the type of address
   *
   * @param string  $type
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setAddressType($type) {
    return $this->type = $type;
  }

  /**
   * returns the name of address
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressName() {
    return $this->name;
  }

  /**
   * sets the name of address
   *
   * @param string  $name
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setAddressName($name) {
    return $this->name = $name;
  }

  /**
   * returns if is default address
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getAddressIsDefault() {
    return $this->is_default;
  }

  /**
   * sets the default of address
   *
   * @param string  $is_default
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function setAddressIsDefault($is_default) {
    return $this->is_default = $is_default;
  }

  /**
   * returns all address fields as string
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    sfLoader::loadHelpers(array('I18N', 'Number', 'NumberExtended'));
    $postal_code = $this->getAddressPostalCode() ? format_code($this->getAddressPostalCode()) . ' - '  : '';
    $address_line2 = $this->getAddressLine2() ? $this->getAddressLine2() . '<br/>'  : '';
    $address = $this->getAddressLine1() . '<br/>' . $address_line2 . $postal_code . $this->getAddressLocation() . ' (';
    $address .= ($this->getAddressState() != $this->getAddressLocation() ) ? $this->getAddressState() .')' : format_country($this->getAddressCountry()) .')' ;
    return $address;
  }

}

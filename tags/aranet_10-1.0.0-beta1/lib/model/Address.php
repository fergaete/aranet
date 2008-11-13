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

    protected $type;
    protected $is_default;
    protected $name;

    public function getAddressType() {
        return $this->type;
    }

    public function setAddressType($type) {
        return $this->type = $type;
    }

    public function getAddressName() {
        return $this->name;
    }

    public function setAddressName($name) {
        return $this->name = $name;
    }

    public function getAddressIsDefault() {
        return $this->is_default;
    }

    public function setAddressIsDefault($is_default) {
        return $this->is_default = $is_default;
    }

    public function __toString() {
        sfLoader::loadHelpers(array('I18N', 'Number', 'NumberExtended'));
        $postal_code = $this->getAddressPostalCode() ? format_code($this->getAddressPostalCode()) . ' - '  : '';
        $address_line2 = $this->getAddressLine2() ? $this->getAddressLine2() . '<br/>'  : '';
        $address = $this->getAddressLine1() . '<br/>' . $address_line2 . $postal_code . $this->getAddressLocation() . ' (';
        $address .= ($this->getAddressState() != $this->getAddressLocation() ) ? $this->getAddressState() .')' : format_country($this->getAddressCountry()) .')' ;
        return $address;
    }

}

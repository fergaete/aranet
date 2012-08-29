<?php

/**
 * Subclass for representing a row from the 'aranet_address' table.
 *
 * 
 *
 * @package plugins.sfPropelAddressableBehaviorPlugin.lib.model
 */ 
class Address extends BaseAddress
{
    private $type;
    private $is_default;
    private $name;

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

    public function __toString($replace = false) {
        sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N', 'Number', 'NumberExtended'));
        $postal_code = $this->getAddressPostalCode() ? '<br/>' . format_code($this->getAddressPostalCode()) . ' - '  : '';
        $address_line2 = $this->getAddressLine2() ? '<br/>' . $this->getAddressLine2() . '<br/>'  : '';
        $address = $this->getAddressLine1() . $address_line2 . $postal_code .  $this->getAddressLocation();
        if ($this->getAddressState() && $this->getAddressLocation() && $this->getAddressState() != $this->getAddressLocation()) {
          if ($this->getAddressCountry()) {
            $address .= ' (' . $this->getAddressState() . ' - ' . format_country($this->getAddressCountry()) .')' ;
          } else {
            $address .= ' (' . $this->getAddressState() .')';
          }
        } else {
          if ($this->getAddressCountry()) {
            $address .= ' (' . format_country($this->getAddressCountry()) .')';
          }
        }
        return $replace ? str_replace('<br/>', " | ", $address) : $address;
    }

}
//TODO
//sfPropelBehavior::add('Address', array('audit'));
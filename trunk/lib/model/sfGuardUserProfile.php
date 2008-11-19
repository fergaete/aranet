<?php

/**
 * Subclass for representing a row from the 'sf_guard_user_profile' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class sfGuardUserProfile extends BasesfGuardUserProfile {

    protected $contact = null;

    public function __construct()
	  {
			  parent::__construct();
	  }

    public function __toString() {
        return $this->getFullName();
    }

    public function getLanguage() {
        $lang = $this->getPreferredLanguage();
        return substr($lang, 0, strpos($lang, '_'));
    }

    public function getPhones() {
        $phones = $this->getPhone1();
        $phones .= ($phones || $this->getPhone2()) ? ' / ' . $this->getPhone2() : '';
        return ($this->getPhone2() && !$this->getPhone1()) ? substr($phones, 3) : $phones;
    }
 
    public function getFullName ($public = false) {
        $name = "";
        $name = (($this->getPublicFirstName() || !$public) && $this->getFirstName()) ? $this->getFirstName() : '';
        $name .= (($this->getPublicLastName() || !$public) && $this->getLastName()) ? ' ' . $this->getLastName() : '';
        if (!$name) {
            $name = $this->getsfGuardUserRelatedByUserId()->getUsername();
        }
        return $name;
    }

    public function getEditLink () {
        return link_to($this->__toString(), '/sfGuardUser/edit?id=' . $this->getUserId());
    }

    public function getEmail ($public = true) {
        $email = "";
        return (($this->getPublicEmail() || !$public) && parent::getEmail()) ? parent::getEmail() : '';
    }

    public function getUrl ($public = true) {
        $url = "";
        return (($this->getPublicUrl() || !$public) && parent::getUrl()) ? parent::getUrl() : '';
    }

    public function getBirthday ($public = true) {
        $birthday = "";
        return (($this->getPublicBirthday() || !$public) && parent::getBirthday() != '11/30/99') ? parent::getBirthday() : '';
    }

    public function getFullCountry () {
        switch ($this->getCountry()) {
            case 'ES':
                return "España";
                break;
            default:
                return '';
        }
    }

    public function getGravatarUrl() {
        $default = sfConfig::get('app_gravatar_default_url', null);
        $size = sfConfig::get('app_gravatar_default_size', 40);
        if ($this->getGravatar()) {
            return "http://www.gravatar.com/avatar.php?gravatar_id=".md5($this->getEmail())."&amp;default=".urlencode($default)."&amp;size=".$size;
        }
        else
        {
            return $default;
        }
    }

    public function getFullDirection($public = true) {
        $dir = "";
        $dir .= (($this->getPublicStreet() || !$public) && $this->getStreet()) ? " , " . $this->getStreet() : '';
        $dir .= (($this->getPublicCode() || !$public) && $this->getCode()) ? "<br/>" . $this->getCode() : '<br/>';
        $dir .= (($this->getPublicCity() || !$public) && $this->getCity()) ? " - " . $this->getCity() : '';
        if ($dir) {
            $dir .= (($this->getPublicCountry() || !$public) && $this->getCountry()) ? " (" . $this->getFullCountry() . ")" : '';
            return substr($dir,5);
        }
        else
        {
            return (($this->getPublicCountry() || !$public) && $this->getCountry()) ? $this->getFullCountry() : '';
        }
    }

    public function getTitleString ($long = false) {
        switch ($this->getTitle()) {
            case 1:
                return ($long) ? 'Señor' : 'Sr.';
            case 2:
                return ($long) ? 'Señorita' : 'Srta.';
            case 3:
                return ($long) ? 'Señoras' : 'Sra.';
        }
    }
            
} // sfGuardUserProfile

//sfMixer::register('BasesfGuardUserProfile:save:pre', array('sfGuardUserProfile', 'preSave'));
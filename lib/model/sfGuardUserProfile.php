<?php

/**
  * Subclass for representing a row from the 'sf_guard_user_profile' table.
  *
  *
  *
  * @package lib.model
  */
class sfGuardUserProfile extends BasesfGuardUserProfile {

  protected $user = null;

  public function __toString() {
    return $this->getFullName();
  }

  public function getFullName ($public = true) {
    $name = "";
    $name = (($this->getPublicFirstName() || $public) && $this->getFirstName()) ? $this->getFirstName() : '';
    $name .= (($this->getPublicLastName() || $public) && $this->getLastName()) ? ' ' . $this->getLastName() : '';
    if (!$name) {
      $name = $this->getGuardUser()->getUsername();
      if (!$name) {
        $name = $this->getOpenidUrl();
      }
    }
    return $name;
  }

  public function getEditLink () {
    return link_to($this->__toString(), '/sfGuardUser/edit?id=' . $this->getUserId());
  }

  public function getGuardUser() {
    if (!$this->user) {
      $this->user = sfGuardUserPeer::retrieveByPk($this->getUserId());
    }
    return $this->user;
  }

  public function getGravatarUrl() {
    $default = sfConfig::get('app_gravatar_default_image', null);
    if ($default) {
      $default_url = $_SERVER['HTTP_HOST'].'/images/'.$default;
      $size = sfConfig::get('app_gravatar_default_size', 40);
      if ($this->getGravatar()) {
        return "http://www.gravatar.com/avatar.php?gravatar_id=".md5($this->getEmail())."&amp;default=".urlencode($default)."&amp;size=".$size;
      }
      else
      {
        return $default;
      }
    } else {
      return '';
    }
  }

  public function getFullDirection($public = true) {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('i18N'));
    $dir = "";
    $dir .= (($this->getPublicStreet() || $public) && $this->getStreet()) ? " , " . $this->getStreet() : '';
    $dir .= (($this->getPublicCode() || $public) && $this->getCode()) ? "<br/>" . $this->getCode() : '<br/>';
    $dir .= (($this->getPublicCity() || $public) && $this->getCity()) ? " - " . $this->getCity() : '';
    if ($dir != '<br/>') {
      $dir .= (($this->getPublicCountry() || $public) && $this->getCountry()) ? " (" . format_country($this->getCountry()) . ")" : '';
      return substr($dir,3);
    }
    else
    {
      return (($this->getPublicCountry() || $public) && $this->getCountry()) ? format_country($this->getCountry()) : '';
    }
  }

  public function getTitleString ($long = false) {
    switch ($this->getTitle()) {
      case 1:
      return ($long) ? 'Señor' : 'Sr.';
      case 2:
      return ($long) ? 'Señorita' : 'Srta.';
      case 3:
      return ($long) ? 'Señora' : 'Sra.';
    }
  }

} // sfGuardUserProfile

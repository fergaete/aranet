<?php

/**
 * Subclass for representing a row from the 'sf_guard_user_profile' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: sfGuardUserProfile.php 3 2008-08-06 07:48:19Z pablo $
 */

class sfGuardUserProfile extends BasesfGuardUserProfile {

  /**
   * related contact
   *
   * @var Contact
   **/
  protected $contact = null;

  /**
   * returns a string that represent the object
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function __toString() {
    return $this->getFullName();
  }

  /**
   * returns user language
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getLanguage() {
    $lang = $this->getPreferredLanguage();
    return substr($lang, 0, strpos($lang, '_'));
  }

  /**
   * returns a string that phones
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getPhones() {
    $phones = $this->getPhone1();
    $phones .= ($phones || $this->getPhone2()) ? ' / ' . $this->getPhone2() : '';
    return ($this->getPhone2() && !$this->getPhone1()) ? substr($phones, 3) : $phones;
  }

  /**
   * returns a full name of the user
   *
   * @param   boolean $public include only public data
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullName($public = false) {
    $name = "";
    $name = (($this->getPublicFirstName() || !$public) && $this->getFirstName()) ? $this->getFirstName() : '';
    $name .= (($this->getPublicLastName() || !$public) && $this->getLastName()) ? ' ' . $this->getLastName() : '';
    if (!$name) {
      $name = $this->getsfGuardUserRelatedByUserId()->getUsername();
    }
    return $name;
  }

  /**
   * returns an edit link
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getEditLink() {
    return link_to($this->__toString(), '/sfGuardUser/edit?id=' . $this->getUserId());
  }

  /**
   * returns the email of the user
   *
   * @param   boolean $public include only public data
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getEmail($public = true) {
    $email = "";
    return (($this->getPublicEmail() || !$public) && parent::getEmail()) ? parent::getEmail() : '';
  }

  /**
   * returns the url of the user
   *
   * @param   boolean $public include only public data
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getUrl($public = true) {
    $url = "";
    return (($this->getPublicUrl() || !$public) && parent::getUrl()) ? parent::getUrl() : '';
  }

  /**
   * returns the birthday of the user
   *
   * @param   boolean $public include only public data
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getBirthday($public = true) {
    $birthday = "";
    return (($this->getPublicBirthday() || !$public) && parent::getBirthday() != '11/30/99') ? parent::getBirthday() : '';
  }

  /**
   * returns the full country of user
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullCountry () {
    // TODO use i18N
    switch ($this->getCountry()) {
      case 'ES':
        return "España";
        break;
      default:
        return '';
    }
  }

  /**
   * returns url gravatar of the user
   *
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * returns a string for user address
   *
   * @param   boolean $public include only public data
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getFullDirection($public = true) {
    $dir = '';
    $dir .= (($this->getPublicStreet() || !$public) && $this->getStreet()) ? $this->getStreet() : '';
    $aux = ($dir) ? '<br/>' : '';
    $code = (($this->getPublicCode() || !$public) && $this->getCode()) ? $this->getCode() : '';
    if (($this->getPublicCity() || !$public) && $this->getCity()) {
      if ($code) 
        $dir .= $aux . $code . " - " . $this->getCity();
      else
        $dir .= $aux . $this->getCity();
      $format = ' (%s)';
    } else {
      if (($this->getPublicState() || !$public) && $this->getState()) {
        if ($code)
          $dir .= $aux . $code . " " . $this->getState();
        else
          $dir .= $aux . $this->getState();
        $format = ' (%s)';
      } else {
        $format = '%s';
      }
    }
    $dir .= (($this->getPublicCountry() || !$public) && $this->getCountry()) ? sprintf($format, $this->getFullCountry()) : '';
    return $dir;
    echo $dir;
    //if substr($dir, 2) == ', '
    if (strlen($dir) > 5 && substr($dir, -5) != "<br/>") {
      $dir .= (($this->getPublicCountry() || !$public) && $this->getCountry()) ? " (" . $this->getFullCountry() . ")" : '';
      return substr($dir,5);
    }
    else
    {
      return (($this->getPublicCountry() || !$public) && $this->getCountry()) ? $this->getFullCountry() : '';
    }
  }

  /**
   * returns a string for title field of the user
   *
   * @param   boolean $long use long string
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function getTitleString ($long = false) {
    // TODO internacionalizacion
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
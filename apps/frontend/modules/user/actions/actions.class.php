<?php

/**
 * user actions.
 *
 * @package    aranet
 * @subpackage user
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class userActions extends myActions
{
  
  /**
   * returns invoice from params
   *
   * @return Invoice
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSfGuardUserProfile()
  {
    if ($this->getRequestParameter('id')) {
      $sf_guard_user_profile = sfGuardUserProfilePeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($sf_guard_user_profile);
    } else {
      $sf_guard_user_profile = new sfGuardUserProfile();
      $user = new sfGuardUser();
      $user->setUsername($this->getRequestParameter('username'));
      $user->setPassword($this->getRequestParameter('passwd'));
      $user->setIsActive(true);
      $sf_guard_user_profile->setsfGuardUserRelatedByUserId($user);
    }
    return $sf_guard_user_profile;
  }
  
  /**
   * executes update action
   *
   * @return Invoice
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
  {
    $sf_guard_user_profile = $this->getSfGuardUserProfile();
    $user = $sf_guard_user_profile->getsfGuardUserRelatedByUserId();
    $this->forward404Unless($user);
    $save_user = false;
    if ($this->getRequestParameter('username') && $this->getRequestParameter('username') != $user->getUsername()) {
      $user->setUsername($this->getRequestParameter('username'));
      $save_user = true;
    }
    if ($this->getRequestParameter('passwd')) {
      $user->setPassword($this->getRequestParameter('passwd'));
      $save_user = true;
    }
    if ($save_user) $user->save();

    $sf_guard_user_profile->setUserId($user->getId());
    // Create User Profile
    //$sf_guard_user_profile->setId($this->getRequestParameter('id'));
    $sf_guard_user_profile->setTitle($this->getRequestParameter('title'));
    $sf_guard_user_profile->setPublicTitle($this->getRequestParameter('public_title', 0));
    $sf_guard_user_profile->setFirstName($this->getRequestParameter('first_name'));
    $sf_guard_user_profile->setPublicFirstName($this->getRequestParameter('public_first_name', 0));
    $sf_guard_user_profile->setLastName($this->getRequestParameter('last_name'));
    $sf_guard_user_profile->setPublicLastName($this->getRequestParameter('public_last_name', 0));
    $sf_guard_user_profile->setGender($this->getRequestParameter('gender'));
    $sf_guard_user_profile->setPublicGender($this->getRequestParameter('public_gender', 0));
    $sf_guard_user_profile->setEmail($this->getRequestParameter('email'));
    $sf_guard_user_profile->setPublicEmail($this->getRequestParameter('public_email', 0));
    $sf_guard_user_profile->setUrl($this->getRequestParameter('url'));
    $sf_guard_user_profile->setPublicUrl($this->getRequestParameter('public_url', 0));
    $sf_guard_user_profile->setOpenidUrl($this->getRequestParameter('openid_url'));
    $sf_guard_user_profile->setStreet($this->getRequestParameter('street'));
    $sf_guard_user_profile->setPublicStreet($this->getRequestParameter('public_street', 0));
    $sf_guard_user_profile->setCity($this->getRequestParameter('city'));
    $sf_guard_user_profile->setPublicCity($this->getRequestParameter('public_city', 0));
    $sf_guard_user_profile->setState($this->getRequestParameter('state'));
    $sf_guard_user_profile->setPublicState($this->getRequestParameter('public_state', 0));
    $sf_guard_user_profile->setCode($this->getRequestParameter('code'));
    $sf_guard_user_profile->setPublicCode($this->getRequestParameter('public_code', 0));
    $sf_guard_user_profile->setCountry($this->getRequestParameter('country'));
    $sf_guard_user_profile->setPublicCountry($this->getRequestParameter('public_country', 0));
    $sf_guard_user_profile->setTimezone($this->getRequestParameter('timezone'));
    $sf_guard_user_profile->setPublicTimezone($this->getRequestParameter('public_timezone', 0));
    if ($this->getRequestParameter('birthday'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('birthday'), $this->getUser()->getCulture());
      $sf_guard_user_profile->setBirthday("$y-$m-$d");
    }
    $sf_guard_user_profile->setPublicBirthday($this->getRequestParameter('public_birthday', 0));
    $sf_guard_user_profile->setCompany($this->getRequestParameter('company'));
    $sf_guard_user_profile->setPublicCompany($this->getRequestParameter('public_company', 0));
    $sf_guard_user_profile->setCif($this->getRequestParameter('cif'));
    $sf_guard_user_profile->setPublicCif($this->getRequestParameter('public_cif', 0));
    $sf_guard_user_profile->setPhone1($this->getRequestParameter('phone1'));
    $sf_guard_user_profile->setPublicPhone1($this->getRequestParameter('public_phone1', 0));
    $sf_guard_user_profile->setPhone2($this->getRequestParameter('phone2'));
    $sf_guard_user_profile->setPublicPhone2($this->getRequestParameter('public_phone2', 0));
    $sf_guard_user_profile->setFax($this->getRequestParameter('fax'));
    $sf_guard_user_profile->setPublicFax($this->getRequestParameter('public_fax', 0));
    $sf_guard_user_profile->setNotes($this->getRequestParameter('notes'));
    $sf_guard_user_profile->setGravatar($this->getRequestParameter('gravatar', 0));
    $sf_guard_user_profile->setAvatar($this->getRequestParameter('avatar'));
    $sf_guard_user_profile->setAvatarFiletype($this->getRequestParameter('avatar_filetype'));
    $sf_guard_user_profile->setOwnerUserId($this->getRequestParameter('owner_user_id') ? $this->getRequestParameter('owner_user_id') : null);
    $sf_guard_user_profile->setUserNewsletter($this->getRequestParameter('user_newsletter', 0));

    $sf_guard_user_profile->setPreferredLanguage($this->getRequestParameter('preferred_language') . "_" . $this->getRequestParameter('country'));

    $sf_guard_user_profile->save();

    // Check permissions
    $c = new Criteria();
    $c->add(sfGuardPermissionPeer::NAME, 'member');
    $perm = sfGuardPermissionPeer::doSelectOne($c);
    if (!$perm instanceof sfGuardPermission) {
      $perm = new sfGuardPermission();
      $perm->setName('member');
      $perm->save();
    }
    // Check group
    $c = new Criteria();
    $c->add(sfGuardGroupPeer::NAME, 'Members');
    $group = sfGuardGroupPeer::doSelectOne($c);
    if (!$group) {
      // Create group
      $group = new sfGuardGroup();
      $group->setName('Members');
      $group->save();
      $groupperm = new sfGuardGroupPermission();
      $groupperm->setGroupId($group->getId());
      $groupperm->setPermissionId($perm->getId());
      $groupperm->save();
    }
    // Join user to users group
    if (!$user->hasGroup('Members')) {
      $groupuser = new sfGuardUserGroup();
      $groupuser->setUserId($user->getId());
      $groupuser->setGroupId($group->getId());
      $groupuser->save();
    }

    return $this->redirect('user/show?id='.$sf_guard_user_profile->getId());
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortColumn()
  {
    return 'id';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['user_name']) && $this->filters['user_name'] && $this->filters['user_name'] != sfI18N::getInstance()->__('Name') . '...')
    {
      $criterion = $c->getNewCriterion(sfGuardUserProfilePeer::FIRST_NAME, "%".$this->filters['user_name']."%", Criteria::LIKE);
      $crit2 = $c->getNewCriterion(sfGuardUserProfilePeer::LAST_NAME, "%".$this->filters['user_name']."%", Criteria::LIKE);
      $crit3 = $c->getNewCriterion(sfGuardUserPeer::USERNAME, "%".$this->filters['user_name']."%", Criteria::LIKE);
      $crit2->addOr($crit3);
      $criterion->addOr($crit2);
      $c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
      $c->add($criterion);
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

}
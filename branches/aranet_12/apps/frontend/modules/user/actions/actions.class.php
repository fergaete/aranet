<?php

/**
 * user actions.
 *
 * @package    aranet
 * @subpackage user
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class userActions extends anActions
{
  
  /**
   * returns invoice from params
   *
   * @return Invoice
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSfGuardUserProfile()
  {
    if ($request->getParameter('id')) {
      $sf_guard_user_profile = sfGuardUserProfilePeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($sf_guard_user_profile);
    } else {
      $sf_guard_user_profile = new sfGuardUserProfile();
      $user = new sfGuardUser();
      $user->setUsername($request->getParameter('username'));
      $user->setPassword($request->getParameter('passwd'));
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
    if ($request->getParameter('username') && $request->getParameter('username') != $user->getUsername()) {
      $user->setUsername($request->getParameter('username'));
      $save_user = true;
    }
    if ($request->getParameter('passwd')) {
      $user->setPassword($request->getParameter('passwd'));
      $save_user = true;
    }
    if ($save_user) $user->save();

    $sf_guard_user_profile->setUserId($user->getId());
    // Create User Profile
    //$sf_guard_user_profile->setId($request->getParameter('id'));
    $sf_guard_user_profile->setTitle($request->getParameter('title'));
    $sf_guard_user_profile->setPublicTitle($request->getParameter('public_title', 0));
    $sf_guard_user_profile->setFirstName($request->getParameter('first_name'));
    $sf_guard_user_profile->setPublicFirstName($request->getParameter('public_first_name', 0));
    $sf_guard_user_profile->setLastName($request->getParameter('last_name'));
    $sf_guard_user_profile->setPublicLastName($request->getParameter('public_last_name', 0));
    $sf_guard_user_profile->setGender($request->getParameter('gender'));
    $sf_guard_user_profile->setPublicGender($request->getParameter('public_gender', 0));
    $sf_guard_user_profile->setEmail($request->getParameter('email'));
    $sf_guard_user_profile->setPublicEmail($request->getParameter('public_email', 0));
    $sf_guard_user_profile->setUrl($request->getParameter('url'));
    $sf_guard_user_profile->setPublicUrl($request->getParameter('public_url', 0));
    $sf_guard_user_profile->setOpenidUrl($request->getParameter('openid_url'));
    $sf_guard_user_profile->setStreet($request->getParameter('street'));
    $sf_guard_user_profile->setPublicStreet($request->getParameter('public_street', 0));
    $sf_guard_user_profile->setCity($request->getParameter('city'));
    $sf_guard_user_profile->setPublicCity($request->getParameter('public_city', 0));
    $sf_guard_user_profile->setState($request->getParameter('state'));
    $sf_guard_user_profile->setPublicState($request->getParameter('public_state', 0));
    $sf_guard_user_profile->setCode($request->getParameter('code'));
    $sf_guard_user_profile->setPublicCode($request->getParameter('public_code', 0));
    $sf_guard_user_profile->setCountry($request->getParameter('country'));
    $sf_guard_user_profile->setPublicCountry($request->getParameter('public_country', 0));
    $sf_guard_user_profile->setTimezone($request->getParameter('timezone'));
    $sf_guard_user_profile->setPublicTimezone($request->getParameter('public_timezone', 0));
    if ($request->getParameter('birthday'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('birthday'), $this->getUser()->getCulture());
      $sf_guard_user_profile->setBirthday("$y-$m-$d");
    }
    $sf_guard_user_profile->setPublicBirthday($request->getParameter('public_birthday', 0));
    $sf_guard_user_profile->setCompany($request->getParameter('company'));
    $sf_guard_user_profile->setPublicCompany($request->getParameter('public_company', 0));
    $sf_guard_user_profile->setCif($request->getParameter('cif'));
    $sf_guard_user_profile->setPublicCif($request->getParameter('public_cif', 0));
    $sf_guard_user_profile->setPhone1($request->getParameter('phone1'));
    $sf_guard_user_profile->setPublicPhone1($request->getParameter('public_phone1', 0));
    $sf_guard_user_profile->setPhone2($request->getParameter('phone2'));
    $sf_guard_user_profile->setPublicPhone2($request->getParameter('public_phone2', 0));
    $sf_guard_user_profile->setFax($request->getParameter('fax'));
    $sf_guard_user_profile->setPublicFax($request->getParameter('public_fax', 0));
    $sf_guard_user_profile->setNotes($request->getParameter('notes'));
    $sf_guard_user_profile->setGravatar($request->getParameter('gravatar', 0));
    $sf_guard_user_profile->setAvatar($request->getParameter('avatar'));
    $sf_guard_user_profile->setAvatarFiletype($request->getParameter('avatar_filetype'));
    $sf_guard_user_profile->setOwnerUserId($request->getParameter('owner_user_id') ? $request->getParameter('owner_user_id') : null);
    $sf_guard_user_profile->setUserNewsletter($request->getParameter('user_newsletter', 0));

    $sf_guard_user_profile->setPreferredLanguage($request->getParameter('preferred_language') . "_" . $request->getParameter('country'));

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
    if (isset($this->filters['user_name']) && $this->filters['user_name'] && $this->filters['user_name'] != sfContext::getInstance()->getI18N()->__('Name') . '...')
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
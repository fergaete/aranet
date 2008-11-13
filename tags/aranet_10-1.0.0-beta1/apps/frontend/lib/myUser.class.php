<?php

/**
 * myUser class
 *
 * @package    aranet
 * @subpackage frontend
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: myUser.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class myUser extends sfGuardSecurityUser
{

    protected $aProfile;

    /**
     * getUserId function
     *
     * @return integer
     * @author Pablo Sánchez
     **/
    public function getUserId() {
        return parent::getGuardUser()->getId();
    }

}

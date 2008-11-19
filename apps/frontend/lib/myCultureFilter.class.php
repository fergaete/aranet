<?php

/**
 * myCultureFilter class
 *
 * @package    aranet
 * @subpackage frontend
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: myCultureFilter.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class myCultureFilter extends sfFilter
{
  
  /**
   * executes the filter
   *
   * @return void
   * @param  object $filterChain  
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function execute ($filterChain)
  {
    static $loaded;

    // execute this filter only once
    if (!isset($loaded))
    {
      // load the filter
      $loaded = true;

      // Set the culture on the fly
      $context = sfContext::getInstance();
      if ($context->getUser()->isAuthenticated()) {
        if (!$context->getUser()->getAttribute('language', null, 'sfGuardSecurityUser')) {
          $context->getUser()->setAttribute('fullname', $context->getUser()->getProfile()->getFullname(false), 'sfGuardSecurityUser');
          $context->getUser()->setAttribute('language', $context->getUser()->getProfile()->getPreferredLanguage(), 'sfGuardSecurityUser');
        }
        $context->getUser()->setCulture($context->getUser()->getAttribute('language', null, 'sfGuardSecurityUser'));
      }
      else
      {
        $context->getUser()->setCulture(sfConfig::get('sf_i18n_default_culture'));
      }
    }

    // execute next filter
    $filterChain->execute();
  }
} // END myCultureFilter
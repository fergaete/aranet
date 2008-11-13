<?php
class myCultureFilter extends sfFilter
{
        public function initialize ($context, $parameters = null)
        {
                // initialize parent
                parent::initialize($context, $parameters);
                return true;
        }

        public function execute ($filterChain)
        {
                static $loaded;

                // execute this filter only once
                if (!isset($loaded))
                {
                        // load the filter
                        $loaded = true;

                        // Set the culture on the fly
                        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
                            if (!sfContext::getInstance()->getUser()->getAttribute('fullname') || !sfContext::getInstance()->getUser()->getAttribute('language')) {
                                sfContext::getInstance()->getUser()->setAttribute('fullname', sfContext::getInstance()->getUser()->getProfile()->getFullname(false));
                                sfContext::getInstance()->getUser()->setAttribute('language', sfContext::getInstance()->getUser()->getProfile()->getPreferredLanguage());
                            }
                            sfContext::getInstance()->getUser()->setCulture(sfContext::getInstance()->getUser()->getAttribute('language'));
                        }
                        else
                        {
                            sfContext::getInstance()->getUser()->setCulture('en_US');
                        }
                }

                // execute next filter
                $filterChain->execute();
        }
}
?>

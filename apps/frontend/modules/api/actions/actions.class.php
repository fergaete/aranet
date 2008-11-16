<?php

/**
 * api actions.
 *
 * @package    ARANet
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id$
 */
class apiActions extends sfActions
{
 /**
  * Executes contacts action
  *
  * @param sfRequest $request A request object
  */
  public function executeContacts($request)
  {
    sfConfig::set('sf_web_debug', false);
    $this->pager = ContactPeer::getPager($request->getParameter('page', 1), 'doSelect', 20, new Criteria());
    $this->setLayout(false);
  }
}

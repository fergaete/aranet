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
    $this->setLayout(false);
    $startIndex = $request->getParameter('startIndex');
    $results = $request->getParameter('results', 1);
    $sort = $request->getParameter('sort');
    if ($sort == 'name') {
        $sort_column = 'CONCAT(' . ContactPeer::CONTACT_FIRST_NAME.", ' ', " . ContactPeer::CONTACT_LAST_NAME.')';
    } else {
      if ($sort != 'id') {
        $sort = "contact_".$sort;
      }
      $sort_column = call_user_func('ContactPeer::translateFieldName', $sort, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    }
      
    $dir = $request->getParameter('dir');
    $page = $startIndex + $results / $results;
    $criteria = new Criteria();
    if ($dir == 'asc') {
      $criteria->addAscendingOrderByColumn($sort_column);
    } else {
      $criteria->addDescendingOrderByColumn($sort_column);
    }
    $pager = new sfPropelPager('Contact', $results);
    $pager->setCriteria($criteria);
    $pager->setPage($page);
    $pager->setPeerMethod('doSelect');
    $pager->init();
    $this->pager = $pager;
  }
}

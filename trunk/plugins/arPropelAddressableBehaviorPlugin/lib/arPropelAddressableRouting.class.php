<?php

/**
 *
 * @package    ARANet
 * @subpackage arPropelContactableBehaviorPlugin
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class arPropelAddressableRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->connect('address_minilist', new sfRoute('/address/minilist/related/:related/id/:id', array('module' => 'address', 'action' => 'minilist')));
    $r->connect('address_show_by_id', new sfRoute('/address/show/id/:id', array('module' => 'address', 'action' => 'show')));
    $r->connect('address_edit_by_id', new sfRoute('/address/edit/id/:id', array('module' => 'address', 'action' => 'edit')));
    $r->connect('address_delete_by_id', new sfRoute('/address/delete/id/:id', array('module' => 'address', 'action' => 'delete')));
    $r->connect('address_history_by_id', new sfRoute('/address/history/id/:id', array('module' => 'address', 'action' => 'history')));
    $r->connect('address_delete_all', new sfRoute('/address/delete', array('module' => 'address', 'action' => 'delete')));
    $r->connect('address_list', new sfRoute('/address/list', array('module' => 'address', 'action' => 'list')));
    $r->connect('address_list_remove_filters', new sfRoute('/address/list?filter=', array('module' => 'address', 'action' => 'list')));
    $r->connect('address_list_by_tag', new sfRoute('/address/list/tag/:tag', array('module' => 'address', 'action' => 'listByTag')));
    $r->connect('address_create', new sfRoute('/address/create', array('module' => 'address', 'action' => 'create')));
    $r->connect('address_delete_related', new sfRoute('/address/delete/id/:id/related/:related/oid/:oid', array('module' => 'address', 'action' => 'deleteObject')));

  }
}

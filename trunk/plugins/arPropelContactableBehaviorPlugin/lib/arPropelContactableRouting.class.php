<?php

/**
 *
 * @package    ARANet
 * @subpackage arPropelContactableBehaviorPlugin
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class arPropelContactableRouting
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
    $r->connect('contact_minilist', new sfRoute('/contact/minilist/related/:related/id/:id', array('module' => 'contact', 'action' => 'minilist')));
    $r->connect('contact_show_by_id', new sfRoute('/contact/show/:id', array('module' => 'contact', 'action' => 'show')));
    $r->connect('contact_edit_by_id', new sfRoute('/contact/edit/:id', array('module' => 'contact', 'action' => 'edit')));
    $r->connect('contact_delete_by_id', new sfRoute('/contact/delete/:id', array('module' => 'contact', 'action' => 'delete')));
    $r->connect('contact_history_by_id', new sfRoute('/contact/history/:id', array('module' => 'contact', 'action' => 'history')));
    $r->connect('contact_delete_all', new sfRoute('/contact/delete', array('module' => 'contact', 'action' => 'delete')));
    $r->connect('contact_list', new sfRoute('/contact/list', array('module' => 'contact', 'action' => 'list')));
    $r->connect('contact_list_remove_filters', new sfRoute('/contact/list?filter=', array('module' => 'contact', 'action' => 'list')));
    $r->connect('contact_list_by_tag', new sfRoute('/contact/list/:tag', array('module' => 'contact', 'action' => 'listByTag')));
    $r->connect('contact_create', new sfRoute('/contact/create', array('module' => 'contact', 'action' => 'create')));
    $r->connect('contact_delete_related', new sfRoute('/contact/delete/:id/:related/:oid', array('module' => 'contact', 'action' => 'deleteObject')));
    
  }
}

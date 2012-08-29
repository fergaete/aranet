<?php
/*
 * This file is part of the arPropelContactableBehaviorPlugin package.
 *
 * (c) 2008 Pablo Sánchez <pablo.sanchez@aranova.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (sfConfig::get('app_ar_propel_contactable_behavior_plugin_routes_register', true) && in_array('contact', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('arPropelContactableRouting', 'listenToRoutingLoadConfigurationEvent'));
}


sfPropelBehavior::registerHooks('arPropelContactableBehavior', array (
 ':save:post' => array ('arPropelContactableBehavior', 'postSave'),
));


sfPropelBehavior::registerMethods('arPropelContactableBehavior', array (
  array (
    'arPropelContactableBehavior',
    'addContact'
  ),
  array (
    'arPropelContactableBehavior',
    'getContacts'
  ),
  array (
    'arPropelContactableBehavior',
    'getDefaultContact'
  ),
  array (
    'arPropelContactableBehavior',
    'hasContacts'
  ),
  array (
    'arPropelContactableBehavior',
    'removeAllContacts'
  ),
  array (
    'arPropelContactableBehavior',
    'removeContact'
  ),
  array (
    'arPropelContactableBehavior',
    'setContacts'
  ),
));
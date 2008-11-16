<?php
/*
 * This file is part of the arPropelAddressableBehaviorPlugin package.
 *
 * (c) 2008 Pablo Sánchez <pablo.sanchez@aranova.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (sfConfig::get('app_ar_propel_addressable_behavior_plugin_routes_register', true) && in_array('address', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('arPropelAddressableRouting', 'listenToRoutingLoadConfigurationEvent'));
}


sfPropelBehavior::registerHooks('arPropelAddressableBehavior', array (
 ':save:post' => array ('arPropelAddressableBehavior', 'postSave'),
));


sfPropelBehavior::registerMethods('arPropelAddressableBehavior', array (
  array (
    'arPropelAddressableBehavior',
    'addAddress'
  ),
  array (
    'arPropelAddressableBehavior',
    'getAddresses'
  ),
  array (
    'arPropelAddressableBehavior',
    'getDefaultAddress'
  ),
  array (
    'arPropelAddressableBehavior',
    'hasAddresses'
  ),
  array (
    'arPropelAddressableBehavior',
    'removeAllAddresses'
  ),
  array (
    'arPropelAddressableBehavior',
    'removeAddress'
  ),
  array (
    'arPropelAddressableBehavior',
    'setAddresses'
  ),
));
<?php

if (sfConfig::get('app_sfPropelFileStoragePlugin_routes_register', true) && in_array('sfPropelFileStorage', sfConfig::get('sf_enabled_modules')))
{
  $this->dispatcher->connect('routing.load_configuration', array('sfPropelFileStorageRouting', 'listenToRoutingLoadConfigurationEvent'));
}
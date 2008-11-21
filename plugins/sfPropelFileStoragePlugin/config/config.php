<?php

if (sfConfig::get('app_sfPropelFileStoragePlugin_routes_register', true) && in_array('sfPropelFileStorage', sfConfig::get('sf_enabled_modules')))
{
  $r = sfRouting::getInstance();

  // preprend our routes
  $r->prependRoute('download_by_file_name', '/download/:name', array('module' => 'sfPropelFileStorage', 'action' => 'download'));
  $r->prependRoute('download_image_by_file_name', '/images/:name', array('module' => 'sfPropelFileStorage', 'action' => 'download'));
}

<?php
pake_desc('Enable sfPropelFileStorage to use some user management system. Ex. sfGuard');
pake_task('file-storage-set-user-manager', 'project_exists');

function run_file_storage_set_user_manager($task, $args)
{
  if(!count($args))
  {
    throw new Exception('You must specify a user management system, like sfGuard');
  }

  
  $dir = sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfPropelFileStoragePlugin'.DIRECTORY_SEPARATOR.'config';

  switch($args[0]) {
    case 'sfGuard':
      if(file_exists(sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfGuardPlugin')) 
      {
        copy($dir.DIRECTORY_SEPARATOR.'sfguard.xml', $dir.DIRECTORY_SEPARATOR.'schema.xml');
        pake_echo_action('sfPropelFileStorage', "sfPropelFileStorage is now using sfGuard.");
        pake_echo_action('sfPropelFileStorage', "Remember to rebuild your model and clear your cache.");
        
      }
      else 
      {
        throw new Exception('sfGuard is not installed.');
      }
    break;    
    
    case 'none':
        copy($dir.DIRECTORY_SEPARATOR.'none.xml', $dir.DIRECTORY_SEPARATOR.'schema.xml');
        pake_echo_action('sfPropelFileStorage', "sfPropelFileStorage is not using any user manager.");
        pake_echo_action('sfPropelFileStorage', "Remember to rebuild your model and clear your cache.");
      
    break;
    
    default:
      throw new Exception($args[0].' is not supported by by sfPropelFileStorage.');
    break;
  }  
}

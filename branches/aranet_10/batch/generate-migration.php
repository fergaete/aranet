<?php

// initialize framework
define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/..'));
define('SF_APP',         'frontend');
define('SF_ENVIRONMENT', 'cli');
define('SF_DEBUG',       true);

require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');
 
sfContext::getInstance();


$migrator = new sfMigrator();

if($_SERVER['argc'] == 2) {
  $filename = $migrator->generateMigration($_SERVER['argv'][1]);
  echo "generated migration $filename\n";
  exit(0);  
} else {
  echo "USAGE: ".$_SERVER['PHP_SELF']." <migration_name>\n";
  exit(1);  
}

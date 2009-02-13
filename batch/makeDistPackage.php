<?php

/**
 * makeDistPackage batch script
 *
 * Here goes a brief description of the purpose of the batch script
 *
 * @package    aranet
 * @subpackage batch
 * @version    $Id$
 */

define('SF_ROOT_DIR',    realpath(dirname(__file__).'/..'));
define('SF_APP',         'frontend');
define('SF_ENVIRONMENT', 'cli');
define('SF_DEBUG',       1);

require_once(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// initialize database manager
//$databaseManager = new sfDatabaseManager();
//$databaseManager->initialize();

// batch process here
//0. Remove unneeded files
exec('chmod 777 cache'); // cache
exec('chmod 777 log'); // log
exec('find . -name .svn -print0 | xargs -0 rm -rf'); // svn info
exec('find . -name ._* -print0 | xargs -0 rm -rf'); // temp files (._* and .DS_Store)
exec('find . -name .DS_Store -print0 | xargs -0 rm -rf'); // temp files (._* and .DS_Store)
exec('rm -rf cache/*'); // cache and logs
exec('rm -rf log/*'); // cache and logs
exec('rm -rf graph/*'); 
exec('rm -rf doc/*'); 
exec('rm -rf test/*'); 
exec('rm -rf lib/vendor/symfony/doc/*'); 
exec('rm -rf lib/vendor/symfony/test/*'); 

//1. Unedded plugins for deploy
exec('rm -rf plugins/sfCompressWebFilesPlugin'); 
exec('rm -rf plugins/sfI18nExtractPlugin'); 
exec('rm -rf plugins/sfModelTestPlugin'); 
exec('rm -rf plugins/sfPropelGraphvizPlugin'); 
exec('rm -rf plugins/sfPropelSqlDiffPlugin'); 


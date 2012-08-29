<?php

/**
 * makeDistPackage batch script
 *
 * Here goes a brief description of the purpose of the batch script
 *
 * @package    aranet
 * @subpackage batch
 * @version    $Id: makeDistPackage.php 39 2008-11-25 09:08:08Z aranova $
 */

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration);
 
// initialize database manager
//$databaseManager = new sfDatabaseManager($configuration);
//$databaseManager->loadConfiguration();

// batch process here
//0. Remove unneeded files
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
exec('find . -name Base* -print0 | xargs -0 rm -rf'); // Generated Base*

//1. Unedded plugins for deploy
exec('rm -rf plugins/sfCompressWebFilesPlugin'); 
exec('rm -rf plugins/sfI18nExtractPlugin'); 
exec('rm -rf plugins/sfModelTestPlugin'); 
exec('rm -rf plugins/sfPropelGraphvizPlugin'); 
exec('rm -rf plugins/sfPropelSqlDiffPlugin'); 

//2. makes a zip file
$path = getcwd();
exec('cd '.$path.'/..; zip -r -9 ARANet-1.0-latest.zip aranet_10-dist');

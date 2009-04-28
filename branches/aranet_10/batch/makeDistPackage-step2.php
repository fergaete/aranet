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
//1. Clean
$path = getcwd();
exec('rm -rf cache/*'); // cache and logs
exec('rm -rf log/*'); // cache and logs
exec('find lib/model -name Base* -print0 | xargs -0 rm -rf'); // Generated Base*
exec('find plugins -not -name *class.php -name Base* -print0 | xargs -0 rm -rf'); // Generated Base*
exec('find . -name generated-* -print0 | xargs -0 rm -rf'); // Generated*

//2. rewrite configs
file_put_contents($path.'/config/databases.yml',
'#all:
#  propel:
#    class:          sfPropelDatabase
#    param:
#      dsn:          mysql://root@localhost/aranet');

file_put_contents($path.'/config/propel.ini',
'propel.targetPackage       = lib.model
propel.packageObjectModel  = true
propel.project             = aranet
propel.database            = mysql
propel.database.createUrl  = mysql://root@localhost/
propel.database.url        = mysql://root@localhost/aranet
propel.mysql.tableType     = InnoDB

propel.addGenericAccessors = true
propel.addGenericMutators  = true
propel.addTimeStamp        = false

propel.schema.validate     = false

; directories
propel.home                    = .
propel.output.dir              = /Users/pablo/Sites/ARANOVA/Google/ARANet/branches/aranet_10
propel.schema.dir              = ${propel.output.dir}/config
propel.conf.dir                = ${propel.output.dir}/config
propel.phpconf.dir             = ${propel.output.dir}/config
propel.sql.dir                 = ${propel.output.dir}/data/sql
propel.runtime.conf.file       = runtime-conf.xml
propel.php.dir                 = ${propel.output.dir}
propel.default.schema.basename = schema
propel.datadump.mapper.from    = *schema.xml
propel.datadump.mapper.to      = *data.xml

; builder settings
#propel.builder.peer.class              = ${propel.output.dir}.lib.SfPeerAdvBuilder
#propel.builder.peer.class              = addon.propel.builder.SfPeerBuilder
propel.builder.peer.class              = ${propel.output.dir}.lib.SfPeerAdvBuilder
propel.builder.object.class            = ${propel.output.dir}.lib.SfObjectAdvBuilder
#propel.builder.object.class            = addon.propel.builder.SfObjectBuilder

propel.builder.objectstub.class        = addon.propel.builder.SfExtensionObjectBuilder
propel.builder.peerstub.class          = addon.propel.builder.SfExtensionPeerBuilder
propel.builder.objectmultiextend.class = addon.propel.builder.SfMultiExtendObjectBuilder
propel.builder.mapbuilder.class        = addon.propel.builder.SfMapBuilderBuilder
propel.builder.interface.class         = propel.engine.builder.om.php5.PHP5InterfaceBuilder
propel.builder.node.class              = propel.engine.builder.om.php5.PHP5NodeBuilder
propel.builder.nodepeer.class          = propel.engine.builder.om.php5.PHP5NodePeerBuilder
propel.builder.nodestub.class          = propel.engine.builder.om.php5.PHP5ExtensionNodeBuilder
propel.builder.nodepeerstub.class      = propel.engine.builder.om.php5.PHP5ExtensionNodePeerBuilder

propel.builder.addIncludes = false
propel.builder.addComments = false

propel.builder.AddBehaviors = true');
file_put_contents($path.'/config/properties.ini',
'[symfony]
  name=aranet
');

//3. makes a zip file
exec('cd '.$path.'/..; zip -r -9 ARANet-1.0-latest.zip aranet_10-dist');

<?php

pake_desc('build and install ARANet');
pake_task('install-aranet', 'project_exists', 'clear-cache', 'propel-build-model', 'propel-build-sql', 'propel-insert-sql');

function run_install_aranet($task, $args)
{
  $args = array();
  $args[] = 'frontend';
  run_propel_load_data($task, $args);
  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();
  $migrator = new sfMigrator();
  $currentVersion = $migrator->getCurrentVersion();
  _executeQuery("UPDATE `schema_info` SET `version` = '".(int)$migrator->getMaxVersion()."'");
  $currentVersion = $migrator->getCurrentVersion();
  sfSettingsTools::clearCache();
  pake_echo_action("install_aranet", "installed schema version " . $currentVersion);
}


function _executeQuery($sql, $fetchmode = null)
{
  $connection = Propel::getConnection();
  
  if (version_compare(Propel::VERSION, "1.3.x", ">=")) 
  {
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    
    return $stmt;
  }
  else 
  {
    return $connection->executeQuery($sql, $fetchmode);
  }
}
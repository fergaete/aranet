<?php
class sfSettingsTools {
    
  /**
   * clears cache
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function clearCache()
  {
    $cache_file = sfConfig::get('sf_root_dir').'/cache/frontend/dev/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);
    $cache_file = sfConfig::get('sf_root_dir').'/cache/frontend/prod/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);
    $cache_file = sfConfig::get('sf_root_dir').'/cache/frontend/cli/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);
    $cache_file = sfConfig::get('sf_root_dir').'/cache/backend/prod/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);    
    $cache_file = sfConfig::get('sf_root_dir').'/cache/backend/dev/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file); 
    $cache_file = sfConfig::get('sf_root_dir').'/cache/backend/cli/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file); 
  }
}
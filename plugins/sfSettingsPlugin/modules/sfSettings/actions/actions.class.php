<?php

/**
 * settings actions.
 *
 * @package    sfSettings
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class sfSettingsActions extends autosfSettingsActions
{

  protected function getsfSettingOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $sf_setting = new sfSetting();
    }
    else
    {
      $sf_setting = sfSettingPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($sf_setting);
    }

		// delete existing settings cached file so the changes are applied immediately
    $cache_file = sfConfig::get('sf_root_dir').'/cache/frontend/prod/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);
    $cache_file = sfConfig::get('sf_root_dir').'/cache/backend/prod/config/config_db_settings.yml.php';
    sfToolkit::clearGlob($cache_file);

    return $sf_setting;
  }

}

<?php

$config = require dirname(__FILE__).'/config.php';
if (!$config['symfony_dir'])
{
  exit('No has indicado el directorio de symfony en la configuración.');
}

require_once $config['symfony_dir'] . '/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

if (!$config['secret'])
{
  exit('No has indicado la frase secreta en la configuración.');
}
sfForm::enableCSRFProtection($config['secret']);

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
  // Personalización de directorios cache y log
    if (is_readable($file = dirname(__FILE__).'/dirs.php'))
    {
      $dirs = require($file);

      if (!empty($dirs['cache']))
      {
        $this->setCacheDir($dirs['cache']);
      }
      if (!empty($dirs['log']))
      {
        $this->setLogDir($dirs['log']);
      }
    }

    // Generamos la frase secreta en la cache si no existe.
    if (!is_readable($file = sfConfig::get('sf_config_cache_dir').'/SP_SECRET'))
    {
      require_once dirname(__FILE__).'/../lib/util/anToolkit.class.php';

      $secret = anToolkit::generatePassword(50);

      $this->dispatcher->connect('context.load_factories', array('ProjectConfiguration', 'writeSecretFile'));
    }
    else
    {
      $secret = @file_get_contents($file);
    }

    // Guardamos la frase secreta y el token del usuario en sfConfig
    sfConfig::set('sp_secret', $secret);
    sfConfig::set('sp_token', md5($secret.session_id()));

    // Asignamos la frase secreta a sfForm
    sfForm::enableCSRFProtection($secret);
    sfForm::setCSRFFieldName('token');

    //sfWidgetFormSchema::setDefaultFormFormatterName('formu');
  }

  static public function writeSecretFile()
  {
    @file_put_contents(sfConfig::get('sf_config_cache_dir').'/SP_SECRET', sfConfig::get('sp_secret'));
  }
}

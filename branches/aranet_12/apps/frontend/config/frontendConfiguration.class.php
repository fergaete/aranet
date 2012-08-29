<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    /**
     * Register aranet.yml config handler and load compiled aranet.yml
     */
    $this->getConfigCache()->registerConfigHandler('config/aranet.yml', 'sfDefineEnvironmentConfigHandler', array('prefix' => 'aranet_'));
    require_once($this->getConfigCache()->checkConfig('config/aranet.yml'));
  }
}

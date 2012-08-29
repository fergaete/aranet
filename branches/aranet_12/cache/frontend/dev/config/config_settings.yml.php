<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2009/02/10 14:04:10
sfConfig::add(array(
  'sf_error_404_module' => 'default',
  'sf_error_404_action' => 'error404',
  'sf_login_module' => 'sfGuardAuth',
  'sf_login_action' => 'signin',
  'sf_secure_module' => 'sfGuardAuth',
  'sf_secure_action' => 'secure',
  'sf_module_disabled_module' => 'default',
  'sf_module_disabled_action' => 'disabled',
  'sf_default_module' => 'dashboard',
  'sf_default_action' => 'index',
  'sf_use_database' => true,
  'sf_i18n' => true,
  'sf_check_symfony_version' => false,
  'sf_compressed' => false,
  'sf_check_lock' => false,
  'sf_csrf_secret' => false,
  'sf_escaping_strategy' => false,
  'sf_escaping_method' => 'ESC_SPECIALCHARS',
  'sf_no_script_name' => false,
  'sf_validation_error_prefix' => '<img src="/images/problem.png" class="image_error"/>&nbsp;&nbsp;',
  'sf_validation_error_suffix' => ' ',
  'sf_validation_error_class' => 'form_error',
  'sf_validation_error_id_prefix' => 'error_for_',
  'sf_cache' => false,
  'sf_etag' => false,
  'sf_web_debug' => true,
  'sf_error_reporting' => 8191,
  'sf_rich_text_js_dir' => 'js/tiny_mce',
  'sf_admin_web_dir' => '/sf/sf_admin',
  'sf_web_debug_web_dir' => '/sf/sf_web_debug',
  'sf_calendar_web_dir' => '/sf/calendar',
  'sf_standard_helpers' => array (
  0 => 'Partial',
  1 => 'Form',
  2 => 'Date',
  3 => 'I18N',
  4 => 'Text',
  5 => 'Global',
  6 => 'Validation',
  7 => 'ARANet',
),
  'sf_enabled_modules' => array (
  0 => 'default',
  1 => 'sfGuardAuth',
  2 => 'sfPropelFileStorage',
  3 => 'contact',
  4 => 'address',
),
  'sf_charset' => 'utf-8',
  'sf_strip_comments' => true,
  'sf_max_forwards' => 5,
  'sf_logging_enabled' => true,
  'sf_default_culture' => 'es_ES',
  'sf_prototype_web_dir' => '/sfProtoculousPlugin',
  'sf_available' => true,
  'sf_compat_10' => true,
  'sf_title' => 'ARANet',
  'sf_description' => 'Aplicación web de gestión, control y organización de ARANOVA',
));
<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();

$browser->
  get('/client/index')->
  isStatusCode(200)->
  isRequestParameter('module', 'client')->
  isRequestParameter('action', 'index')->
  checkResponseElement('body', '!/This is a temporary page/');

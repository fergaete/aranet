<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// symfony bootstraping
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

// Propel Behaviors

sfPropelBehavior::add('Client', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('Vendor', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('CashItem', array('audit', 'paranoid'));
sfPropelBehavior::add('Address', array('audit'));
sfPropelBehavior::add('File', array('audit'));
sfPropelBehavior::add('Milestone', array('audit'));
sfPropelBehavior::add('Task', array('audit'));
sfPropelBehavior::add('Timesheet', array('audit'));
sfPropelBehavior::add('Project', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('Contact', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('Invoice', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('sfGuardUserProfile', array('audit', 'paranoid'));
sfPropelBehavior::add('sfGuardUser', array('audit', 'paranoid'));
sfPropelBehavior::add('Budget', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('IncomeItem', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));
sfPropelBehavior::add('ExpenseItem', array('audit', 'paranoid', 'sfPropelActAsTaggableBehavior'));

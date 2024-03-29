<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Promote a user as a super administrator.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id$
 */
class sfGuardPromoteSuperAdminTask extends sfPropelBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'The application name'),
      new sfCommandArgument('username', sfCommandArgument::REQUIRED, 'The user name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
    ));

    $this->namespace = 'guard';
    $this->name = 'promote';
    $this->briefDescription = 'Promotes a user as a super administrator';

    $this->detailedDescription = <<<EOF
The [guard:promote|INFO] task promotes a user as a super administrator:

  [./symfony guard:promote fabien|INFO]

The user must exist in the database.
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $configuration = ProjectConfiguration::getApplicationConfiguration($arguments['application'], $options['env'], true);

    $databaseManager = new sfDatabaseManager($configuration);

    $user = sfGuardUserPeer::retrieveByUsername($arguments['username']);
    if (!$user)
    {
      throw new sfCommandException(sprintf('User "%s" does not exist.', $arguments['username']));
    }

    $user->setIsSuperAdmin(true);
    $user->save();

    $this->logSection('guard', sprintf('Promote user %s as a super administrator', $arguments['username']));
  }
}

<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardGroup.php 3 2008-08-06 07:48:19Z pablo $
 */
class PluginsfGuardGroup extends BasesfGuardGroup
{
  public function __toString()
  {
    return $this->getName();
  }
}

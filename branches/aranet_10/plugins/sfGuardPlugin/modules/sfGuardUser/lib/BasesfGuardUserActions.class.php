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
 * @version    SVN: $Id: BasesfGuardUserActions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class BasesfGuardUserActions extends autosfGuardUserActions
{
  public function validateEdit()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST && !$this->getRequestParameter('id'))
    {
      if ($this->getRequestParameter('sf_guard_user[password]') == '')
      {
        $this->getRequest()->setError('sf_guard_user{password}', $this->getContext()->getI18N()->__('Password is mandatory'));

        return false;
      }
    }

    return true;
  }
}

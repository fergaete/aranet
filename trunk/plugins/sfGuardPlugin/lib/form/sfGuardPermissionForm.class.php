<?php

/**
 * sfGuardPermission form.
 *
 * @package    form
 * @subpackage sf_guard_permission
 * @version    SVN: $Id$
 */
class sfGuardPermissionForm extends BasesfGuardPermissionForm
{
  public function configure()
  {
    unset($this['sf_guard_user_permission_list']);

    $this->widgetSchema['sf_guard_group_permission_list']->setLabel('Groups');
  }
}

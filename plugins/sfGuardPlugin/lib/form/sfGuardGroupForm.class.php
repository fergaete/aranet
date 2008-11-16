<?php

/**
 * sfGuardGroup form.
 *
 * @package    form
 * @subpackage sf_guard_group
 * @version    SVN: $Id$
 */
class sfGuardGroupForm extends BasesfGuardGroupForm
{
  public function configure()
  {
    unset($this['sf_guard_user_group_list']);

    $this->widgetSchema['sf_guard_group_permission_list']->setLabel('Permissions');
  }
}

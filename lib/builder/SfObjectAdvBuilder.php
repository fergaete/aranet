<?php
/* I recomend put this class out Symfony Folder.
*  If you put this class in some project folder
* you can use include_once 'symfony/addon/propel/builder/SfObjectBuilder.php'
* @author     Boris Duin
 */
include_once 'plugins/sfPropelPlugin/lib/propel/builder/SfObjectBuilder.php';
class SfObjectAdvBuilder extends SfObjectBuilder
{

    //Extend Method addDelete
    protected function addDelete(&$script)
    {
        $tmp = '';
        parent::addDelete($tmp);

        $date_script = '';

        $user_deleted = false;
        foreach ($this->getTable()->getColumns() as $col)
        {
            $clo = strtolower($col->getName());

            if (!$user_deleted && $clo == 'deleted_by')
            {
                $user_deleted = true;
                $date_script .= "
                    if (!\$this->isColumnModified('deleted_by'))
                    {
                        \$user = null;//sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setDeletedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setDeletedBy(null);
                        }
                    }
                ";
            }
        }

        $tmp = preg_replace('/{/', '{'.$date_script, $tmp, 1);
        $script .= $tmp;
    }

    //Extend Method addSave
    protected function addSave(&$script)
    {
        $tmp = '';
        parent::addSave($tmp);

        $date_script = '';

        $user_updated = false;
        $user_created = false;
        $user_deleted = false;
        foreach ($this->getTable()->getColumns() as $col)
        {
            $clo = strtolower($col->getName());

            if (!$user_created && $clo == 'created_by')
            {
                $user_created = true;
                $date_script .= "
                    if (\$this->isNew() && !\$this->isColumnModified('created_by'))
                    {
                        \$user = null;//sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setCreatedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setCreatedBy(null);
                        }
                    }
                ";
            }
            else if (!$user_updated && $clo == 'updated_by')
            {
                $user_updated = true;
                $date_script .= "
                    if (\$this->isModified() && !\$this->isColumnModified('updated_by'))
                    {
                        \$user = null;//sfContext::getInstance()->getUser();
                        if (\$user instanceof sfGuardSecurityUser)
                        {
                            if (\$user->getGuardUser() instanceof sfGuardUser)
                                \$this->setUpdatedBy(\$user->getGuardUser()->getId());
                            else
                                \$this->setUpdatedBy(null);
                        }
                    }
                ";
            }
        }

        $tmp = preg_replace('/{/', '{'.$date_script, $tmp, 1);
        $script .= $tmp;
    }

}

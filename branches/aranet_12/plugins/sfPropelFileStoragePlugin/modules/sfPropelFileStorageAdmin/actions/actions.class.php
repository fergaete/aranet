<?php

/**
 * sfPropelFileStorageAdmin actions.
 *
 * @package    aranova
 * @subpackage sfPropelFileStorageAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class sfPropelFileStorageAdminActions extends autosfPropelFileStorageAdminActions
{
    protected function updateSfPropelFileStorageInfoFromRequest()
    {
        $file_info = $request->getParameter('sf_propel_file_storage_info');
        if (!$file_info['file_id'])
        {
          $sf_propel_file_storage_info = new sfPropelFileStorageInfo();
        }
        else
        {
          $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($file_info['file_id']);
          $this->forward404Unless($sf_propel_file_storage_info);
        }

        sfPropelFileStorageUtil::saveFromRequest($this->getRequest(), 'sf_propel_file_storage_info[file_name]');

        return $this->redirect('sfPropelFileStorageAdmin/list');
    }
}

<?php

/**
 * file actions.
 *
 * @package    aranet
 * @subpackage file
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class fileActions extends myActions
{
    public function preExecute() {
        $this->referer = $this->getRequest()->getReferer();
    }

    public function executeCreate()
    {
        $this->sf_propel_file_storage_info = new sfPropelFileStorageInfo();

        $this->setTemplate('edit');
        return sfView::SUCCESS;
    }

    public function executeEdit()
    {
        if ($this->getRequestParameter('file_id')) {
            $this->sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($this->getRequestParameter('file_id'));
            $this->forward404Unless($this->sf_propel_file_storage_info);
        } else {
            $this->sf_propel_file_storage_info = new sfPropelFileStorageInfo();
        }
        return sfView::SUCCESS;
    }

    public function handleErrorUpdate()
    {
        $this->forward('file', 'edit');
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('file_id'))
        {
            $sf_propel_file_storage_info = new sfPropelFileStorageInfo();
        }
        else
        {
            $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($this->getRequestParameter('file_id'));
            $this->forward404Unless($sf_propel_file_storage_info);
        }

        $sf_propel_file_storage_info->setFileId($this->getRequestParameter('file_id'));

        sfPropelFileStorageUtil::saveFromRequest($this->getRequest(), 'uploaded_file', $sf_propel_file_storage_info);

        $sf_propel_file_storage_info->save();

        return $this->redirect($this->getRequestParameter('referer', 'file/list'));
    }

    public function executeDelete()
    {
        $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($this->getRequestParameter('file_id'));

        $this->forward404Unless($sf_propel_file_storage_info);

        $sf_propel_file_storage_info->delete();

        return sfView::SUCCESS;
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $sf_propel_file_storage_info = sfPropelFileStorageInfoPeer::retrieveByPk($item);
                    $sf_propel_file_storage_info->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('file/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'file/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'file/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'file/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'file/sort'))
        {
            $this->getUser()->setAttribute('sort', 'created_at', 'file/sort');
            $this->getUser()->setAttribute('type', 'asc', 'file/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'file/sort'))
        {
            $sort_column = sfPropelFileStorageInfoPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'file/sort') == 'asc')
            {
                $c->addAscendingOrderByColumn($sort_column);
            }
            else
            {
                $c->addDescendingOrderByColumn($sort_column);
            }
        }
    }

    protected function addFiltersCriteria ($c)
    {
        if (isset($this->filters['file_name']) && $this->filters['file_name'] !== sfI18N::getInstance()->__('Project') . '...' && $this->filters['file_name'] !== '')
        {
            $criterion = $c->getNewCriterion(sfPropelFileStorageInfoPeer::FILE_NAME, "%".$this->filters['file_name']."%", Criteria::LIKE);
            $crit2 = $c->getNewCriterion(sfPropelFileStorageInfoPeer::FILE_TITLE, "%".$this->filters['file_name']."%", Criteria::LIKE);
            $criterion->addOr($crit2);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }

}

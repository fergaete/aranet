<?php

/**
 * vendor actions.
 *
 * @package    aranet
 * @subpackage vendor
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
    */
class vendorActions extends myActions
{

    public function executeShow()
    {
        $c = new Criteria();
        $c->add(VendorPeer::ID, $this->getRequestParameter('id'));
        $vendors = VendorPeer::doSelect($c);
        if (isset($vendors[0])) {
            $this->vendor = $vendors[0];
        } else {
            $this->forward404();
        }
        return sfView::SUCCESS;
    }

    public function executeList()
    {
        $this->processList(new Criteria(), 'doSelect');
        return sfView::SUCCESS;
    }

    public function executeStats()
    {
        $this->vendor = VendorPeer::retrieveByPk($this->getRequestParameter('vendor_id'));
        $this->forward404Unless($this->vendor);
        return sfView::SUCCESS;
    }

    public function executeCreate()
    {
        $this->getUser()->setAttribute('index', 0);
        $this->vendor = new Vendor();
        $this->setTemplate('edit');
        return sfView::SUCCESS;
    }

    public function executeEdit()
    {
        $this->getUser()->setAttribute('index', 0);
        $c = new Criteria();
        $c->add(VendorPeer::ID, $this->getRequestParameter('id'));
        $vendors = VendorPeer::doSelect($c);
        if (isset($vendors[0])) {
            $this->vendor = $vendors[0];
        } else {
            $this->vendor = new Vendor();
        }
        return sfView::SUCCESS;
    }

    public function handleErrorUpdate()
    {
        $this->forward('vendor', 'edit');
    }

    public function handleErrorEdit()
    {
        $this->executeEdit();
        return sfView::SUCCESS;
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $vendor = new Vendor();
        }
        else
        {
            $vendor = VendorPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($vendor);
        }

        $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
        $i = 0;
        foreach($contacts as $contact) {
            $vendor->addContact($contact, ($i == 0));
            $i++;
        }

        $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
        if ($addresses) {
            if (count($addresses)) {
                $addresses[0]->setAddressIsDefault(true);
            }
            foreach($addresses as $address) {
                $vendor->addAddress($address);
            }
        }

        $vendor->setId($this->getRequestParameter('id'));
        $vendor->setVendorUniqueName($this->getRequestParameter('vendor_unique_name'));
        $vendor->setVendorCompanyName($this->getRequestParameter('vendor_company_name'));
        $vendor->setVendorCif($this->getRequestParameter('vendor_cif'));
        $vendor->setVendorKindOfCompanyId($this->getRequestParameter('vendor_kind_of_company_id') ? $this->getRequestParameter('vendor_kind_of_company_id') : null);
        if ($this->getRequestParameter('vendor_since'))
        {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('vendor_since'), $this->getUser()->getCulture());
            $vendor->setVendorSince("$y-$m-$d");
        }
        $vendor->setVendorWebsite($this->getRequestParameter('vendor_website'));
        $vendor->setVendorComments($this->getRequestParameter('vendor_comments'));
        $vendor->removeAllTags();
        $vendor->addTag($this->getRequestParameter('tags') ? $this->getRequestParameter('tags') : null);

        $vendor->save();

        return $this->redirect('vendor/show?id='.$vendor->getId());
    }

    public function executeDelete()
    {
        $vendor = VendorPeer::retrieveByPk($this->getRequestParameter('id'));

        $this->forward404Unless($vendor);

        $vendor->delete();
        if (!$this->getRequest()->isXmlHttpRequest())
            return $this->redirect('vendor/list');
        else
            return sfView::SUCCESS;
    }

    public function executeDeleteall()
    {
        // TODO: borrado múltiple en una pasada
        $select = $this->getRequestParameter('select', null);
        if ($select) {
            foreach ($select as $item) {
                if ($item != 0) {
                    $vendor = VendorPeer::retrieveByPk($item);
                    $vendor->delete();
                }
            }
        }
        return $this->redirect($this->getRequest()->getReferer());
    }

    protected function processFilters ()
    {
        if ($this->getRequest()->hasParameter('filter') || $this->getRequest()->hasParameter('filters'))
        {
            $filters = $this->getRequestParameter('filters');
            $this->getUser()->getAttributeHolder()->removeNamespace('vendor/filters');
            $this->getUser()->getAttributeHolder()->add($filters, 'vendor/filters');
        }
    }

    protected function processSort ()
    {
        if ($this->getRequestParameter('sort'))
        {
            $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'vendor/sort');
            $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'vendor/sort');
        }

        if (!$this->getUser()->getAttribute('sort', null, 'vendor/sort'))
        {
            $this->getUser()->setAttribute('sort', 'vendor_company_name', 'vendor/sort');
            $this->getUser()->setAttribute('type', 'asc', 'vendor/sort');
        }
    }

    protected function addSortCriteria ($c)
    {
        if ($sort_column = $this->getUser()->getAttribute('sort', null, 'vendor/sort'))
        {
            $sort_column = VendorPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
            if ($this->getUser()->getAttribute('type', null, 'vendor/sort') == 'asc')
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
        if (isset($this->filters['vendor_name']) && $this->filters['vendor_name'] && $this->filters['vendor_name'] != sfI18N::getInstance()->__('Name') . '...')
        {
            $criterion = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, "%".$this->filters['vendor_name']."%", Criteria::LIKE);
            $crit2 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, "%".$this->filters['vendor_name']."%", Criteria::LIKE);
            $criterion->addOr($crit2);
            $c->add($criterion);
        }
        if (isset($criterion))
        {
            $c->add($criterion);
        }
    }

    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $vendor_name = $this->getRequestParameter('filters[vendor_name]', $this->getRequestParameter('vendor_name'));
        if (!$vendor_name) {
            $vendor_name = $this->getRequestParameter('company_name');
        }
        $this->vendors = VendorPeer::getVendorsLike($vendor_name);
        return sfView::SUCCESS;
    }

}

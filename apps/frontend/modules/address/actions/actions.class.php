<?php

/**
 * address actions.
 *
 * @package    aranet
 * @subpackage address
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class addressActions extends sfActions
{

    public function executeMinilist()
    {
        switch ($this->getRequestParameter('class')) {
            case "Vendor":
            $object = VendorPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
            case "Client":
            $object = ClientPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
            case "Project":
            $object = ProjectPeer::retrieveByPK($this->getRequestParameter('id'));
            break;
        }
        $this->addresss = $object->getAddresses();
        return sfView::SUCCESS;
    }

    public function executeIndex()
    {
        return $this->forward('address', 'list');
    }

    public function executeList()
    {
        $this->addresss = AddressPeer::doSelect(new Criteria());
    }

    public function executeShow()
    {
        $this->address = AddressPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->address);
    }

    public function executeCreate()
    {
        $this->address = new Address();
        $this->index = $this->getRequestParameter('index', -1)+1;
        $this->setTemplate('edit');
    }

    public function executeEdit()
    {
        $this->address = AddressPeer::retrieveOrCreateByPk($this->getRequestParameter('id'));
        $this->index = 0;
        $this->forward404Unless($this->address);
    }

    public function executeUpdate()
    {
        if (!$this->getRequestParameter('id'))
        {
            $address = new Address();
        }
        else
        {
            $address = AddressPeer::retrieveByPk($this->getRequestParameter('id'));
            $this->forward404Unless($address);
        }

        $address->setId($this->getRequestParameter('id'));
        $address->setAddressType($this->getRequestParameter('address_type'));
        $address->setAddressLine1($this->getRequestParameter('address_line1'));
        $address->setAddressLine2($this->getRequestParameter('address_line2'));
        $address->setAddressLocation($this->getRequestParameter('address_location'));
        $address->setAddressState($this->getRequestParameter('address_state'));
        $address->setAddressPostalCode($this->getRequestParameter('address_postal_code'));
        $address->setAddressCountry($this->getRequestParameter('address_country'));

        $address->save();

        return $this->redirect('address/show?id='.$address->getId());
    }

    public function executeDelete()
    {
        $c = new Criteria();
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $this->getRequestParameter('oid'));
        $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, $this->getRequestParameter('class'));
        $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->getRequestParameter('id'));
        $address = ObjectAddressPeer::doSelectOne($c);
        if ($address) {
            $address->delete();
        }
        return sfView::SUCCESS;
    }

    public function executeAutocomplete()
    {
        sfConfig::set('sf_web_debug', false);
        $addresses = $this->getRequestParameter('address');
        $i = 0;
        while (!isset($addresses[$i])) {
            $i++;
        }
        $address_line1 = $addresses[$i]['line1'];
        $this->addresses = AddressPeer::getAddressesLikeStreet($address_line1);
    }

}

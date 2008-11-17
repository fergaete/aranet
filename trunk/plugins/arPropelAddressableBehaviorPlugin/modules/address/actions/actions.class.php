<?php

/**
 * address actions.
 *
 * @package    ARANet
 * @subpackage address
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class addressActions extends anActions
{

    public function executeMinilist($request)
    {
        $class_peer = $request->getParameter('related') . 'Peer';
        if (class_exists($class_peer)) {
          $object = call_user_func($class_peer.'::retrieveByPK', $request->getParameter('id'));
          if ($object) {
            $this->addresses = $object->getAddresses();
            $this->object = $object;
          }
        }
        $this->setLayout(false);
        return sfView::SUCCESS;
    }

    public function executeList($request)
    {
        $this->addresss = AddressPeer::doSelect(new Criteria());
    }

    public function executeShow($request)
    {
        $this->address = AddressPeer::retrieveByPk($this->getRequestParameter('id'));
        $this->forward404Unless($this->address);
    }

    public function executeCreate($request)
    {
      $address = new Address();
      //$address->setId($request->getParameter('index'));
      $this->form = new anAddressEditForm($address);
      /*
        $this->address = new Address();
        $this->index = $this->getRequestParameter('index', -1)+1;
        
        $this->setTemplate('edit');
        */
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
    
    /**
     * executes autocomplete action
     *
     * @param object $request
     * @return void
     */
    public function executeAutocomplete($request)
    {
        sfConfig::set('sf_web_debug', false);
        $name = $request->getParameter('query');
        $this->setLayout(false);
        $this->addresses = AddressPeer::getAddressesLike($name);
    }

}

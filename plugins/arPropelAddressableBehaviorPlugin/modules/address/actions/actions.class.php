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

  /**
   * executes minilist action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes list action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeList($request)
  {
    $this->addresss = AddressPeer::doSelect(new Criteria());
  }

  /**
   * executes show action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeShow($request)
  {
    $this->address = AddressPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->address);
  }

  /**
   * executes create action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeCreate($request)
  {
    $address = new Address();
    $this->form = new anAddressEditForm($address);
  }

  /**
   * executes edit action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit($request)
  {
    $this->address = AddressPeer::retrieveOrCreateByPk($request->getParameter('id'));
    $this->index = 0;
    $this->forward404Unless($this->address);
  }

  /**
   * executes update action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate($request)
  {
    if (!$request->getParameter('id'))
    {
      $address = new Address();
    }
    else
    {
      $address = AddressPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($address);
    }

    $address->setId($request->getParameter('id'));
    $address->setAddressType($request->getParameter('address_type'));
    $address->setAddressLine1($request->getParameter('address_line1'));
    $address->setAddressLine2($request->getParameter('address_line2'));
    $address->setAddressLocation($request->getParameter('address_location'));
    $address->setAddressState($request->getParameter('address_state'));
    $address->setAddressPostalCode($request->getParameter('address_postal_code'));
    $address->setAddressCountry($request->getParameter('address_country'));

    $address->save();

    return $this->redirect('address/show?id='.$address->getId());
  }

  /**
   * executes delete action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeDelete($request)
  {
    $c = new Criteria();
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $request->getParameter('oid'));
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, $request->getParameter('class'));
    $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $request->getParameter('id'));
    $address = ObjectAddressPeer::doSelectOne($c);
    if ($address) {
      $address->delete();
    }
    return sfView::SUCCESS;
  }

  /**
   * executes autocomplete action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete($request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->addresses = AddressPeer::getAddressesLike($name);
  }

}
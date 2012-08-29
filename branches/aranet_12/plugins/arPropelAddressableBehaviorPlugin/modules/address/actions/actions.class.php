<?php

/**
 * address actions.
 *
 * @package    ARANet
 * @subpackage address
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 50 2008-12-05 23:18:18Z aranova $
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
  public function executeMinilist(sfWebRequest $request)
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
   * executes edit action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeEdit(sfWebRequest $request)
  {
    if ($edit = $request->hasParameter('id'))
    {
      $this->contact = $this->getObject();
    }
    else
    {
      $this->address = new Address();
    }
    
    $this->form = new anContactEditForm($address);
    
    if ($request->isMethod('post'))
    {
      $add = $request->getParameter('address');

      $this->form->bind($add);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $address = $this->form->getObject();
        $address->save();
        
        $this->setFlash('success', $this->__($edit ? 'Address edited.' : 'Address created.'));

        return $this->redirect('@address_show_by_id?id='.$contact->getId());
      }
    }
  }

  /**
   * executes deleteObject action
   *
   * @param $request
   */
  public function executeDeleteObject(sfWebRequest $request)
  {
    $c = new Criteria();
    $class = $request->getParameter('related');
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_ID, $this->getRequestParameter('oid'));
    $c->add(ObjectAddressPeer::OBJECTADDRESS_OBJECT_CLASS, $class);
    $c->add(ObjectAddressPeer::OBJECTADDRESS_ADDRESS_ID, $this->getRequestParameter('id'));
    $address = ObjectAddressPeer::doDelete($c);
    return sfView::SUCCESS;
  }
  
  /**
   * executes autocomplete action
   *
   * @param  object $request the request
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->addresses = AddressPeer::getAddressesLike($name);
  }

  /**
   * add filter criteria
   *
   * @param Criteria $c
   */
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['address_line1']) && $this->filters['address_line1'] && $this->filters['address_line1'] != $this->__('Name') . '...')
    {
      $c->add(AddressPeer::ADDRESS_LINE1, '%'.$this->filters['address_line1']['text'].'%', Criteria::LIKE);
    }
  }
  
  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'address_line1';
  }
  
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'address_line1', 'label' => $this->__('Street'), 'sortable' => true, 'editor' => true),
        array('name' => 'address_location', 'label' => $this->__('Location'), 'sortable' => true, 'editor' => true),
        array('name' => 'address_state', 'label' => $this->__('State'), 'sortable' => true, 'editor' => true),
        array('name' => 'address_postal_code', 'label' => $this->__('Code'), 'sortable' => true, 'editor' => true),
        array('name' => 'address_country', 'label' => $this->__('Country'), 'sortable' => true, 'editor' => true)
        );
    return $keys;
  }
}
<?php

/**
 * vendor actions.
 *
 * @package    ARANet
 * @subpackage vendor
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class vendorActions extends anActions
{

  /**
   * executes edit action
   *
   * @param $request
   */
  public function executeEdit($request)
  {
    $this->vendor = $this->getObject();
    $edit = $request->hasParameter('id');
    $this->form = new VendorForm($this->vendor);
    
    if ($request->isMethod('post'))
    {
      $ven = $request->getParameter('vendor');
      $this->form->bind($ven);
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        $vendor = $this->form->getObject();

        $vendor->setTags($ven['tags']['name']);
        if ($ven['tags']['name']) {
          $vendor->setVendorHasTags(true);
        }
        $vendor->setContacts($ven['contact']);    
        $vendor->setAddresses($ven['address']);
        $vendor->save();
        
        $this->setFlash('success', $this->__($edit ? 'Vendor edited.' : 'Vendor created.'));

        return $this->redirect('@vendor_show_by_id?id='.$vendor->getId());
      }
    }
  }

  /**
   * executes autocomplete action
   *
   * @param $request
   */
  public function executeAutocomplete($request)
  {
    sfConfig::set('sf_web_debug', false);
    $name = $request->getParameter('query');
    $this->setLayout(false);
    $this->vendors = VendorPeer::getVendorsLike($name);
  }

  /**
   * add filter criteria
   * 
   * @param Criteria $c
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   */
  protected function addFiltersCriteria ($c)
  {
    if (isset($this->filters['name']))
    {
      if (isset($this->filters['name']['text']) && $this->filters['name']['text'] && $this->filters['name']['text'] != $this->__('Name') . '...')
      {
        $criterion = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $crit2 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, "%".$this->filters['name']['text']."%", Criteria::LIKE);
        $criterion->addOr($crit2);   
      }
      if (isset($this->filters['name']['is_empty']) && $this->filters['name']['is_empty'])
      {
        
        $criterion = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, null, Criteria::ISNULL);
        
        $crit2 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, null, Criteria::ISNULL);
        $crit3 = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, "");
        $crit4 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, "");
        $crit3->addOr($crit4);
        $criterion->addOr($crit2);
        $criterion->addOr($crit3);
      }
    }
    if (isset($criterion))
    {
      $c->add($criterion);
    }
  }

  /**
   * Returns the column name to sort list by default
   *
   * @return string
   */
  protected function getDefaultSortField()
  {
    return 'vendor_company_name';
  }
  
  public function getColumns()
  {
    $keys = array(
        array('name' => 'id'),
        array('name' => 'actions', 'label' => $this->__('Actions')),
        array('name' => 'vendor_company_name', 'label' => $this->__('Company'), 'sortable' => true, 'editor' => 'textbox'),
        array('name' => 'contact', 'label' => $this->__('Main contact')),
        array('name' => 'phone', 'label' => $this->__('Phone')),
        array('name' => 'address', 'label' => $this->__('Address')),
        array('name' => 'total_amount', 'label' => $this->__('Total amount'))
        );
    return $keys;
  }

}

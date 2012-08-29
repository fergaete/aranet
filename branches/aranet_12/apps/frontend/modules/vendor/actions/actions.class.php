<?php

/**
 * vendor actions.
 *
 * @package    aranet
 * @subpackage vendor
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: actions.class.php 3 2008-08-06 07:48:19Z pablo $
 */
class vendorActions extends anActions
{

  /**
   * returns vendor from params
   *
   * @return Vendor
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getVendor()
  {
    if ($this->hasRequestParameter('id')) {
      $vendor = VendorPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($vendor);
    } else {
      $vendor = new Vendor();
    }
    return $vendor;
  }
  
  /**
   * executes stats action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeStats(sfWebRequest $request)
  {
    $this->vendor = $this->getVendor();
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate(sfWebRequest $request)
  {
    $vendor = $this->getVendor();
    // Process contacts
    $contacts = ContactPeer::processContact($this->getRequest()->getParameterHolder()->getAll());
    if ($contacts) {
      $i = 0;
      foreach($contacts as $contact) {
        $vendor->addContact($contact, ($i == 0));
        $i++;
      }
    }
    // Process addresses
    $addresses = AddressPeer::processAddress($this->getRequest()->getParameterHolder()->getAll());
    if ($addresses) {
      if (count($addresses)) {
        $addresses[0]->setAddressIsDefault(true);
      }
      foreach($addresses as $address) {
        $vendor->addAddress($address);
      }
    }

    $vendor->setId($request->getParameter('id'));
    $vendor->setVendorUniqueName($request->getParameter('vendor_unique_name'));
    $vendor->setVendorCompanyName($request->getParameter('vendor_company_name'));
    $vendor->setVendorCif($request->getParameter('vendor_cif'));
    $vendor->setVendorKindOfCompanyId($request->getParameter('vendor_kind_of_company_id') ? $request->getParameter('vendor_kind_of_company_id') : null);
    if ($request->getParameter('vendor_since'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($request->getParameter('vendor_since'), $this->getUser()->getCulture());
      $vendor->setVendorSince("$y-$m-$d");
    }
    $vendor->setVendorWebsite($request->getParameter('vendor_website'));
    $vendor->setVendorComments($request->getParameter('vendor_comments'));
    $vendor->removeAllTags();
    $vendor->addTag($request->getParameter('tags') ? $request->getParameter('tags') : null);

    $vendor->save();

    return $this->redirect('vendor/show?id='.$vendor->getId());
  }

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortField()
  {
    return 'vendor_company_name';
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
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeAutocomplete()
  {
    sfConfig::set('sf_web_debug', false);
    $vendor_name = $request->getParameter('filters[vendor_name]', $request->getParameter('vendor_name'));
    if (!$vendor_name) {
      $vendor_name = $request->getParameter('company_name');
    }
    $this->vendors = VendorPeer::getVendorsLike($vendor_name);
    return sfView::SUCCESS;
  }

}

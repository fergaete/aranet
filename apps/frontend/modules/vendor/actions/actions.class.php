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

  /**
   * returns vendor from params
   *
   * @return Vendor
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getVendor()
  {
    if ($this->getRequestParameter('id')) {
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
  public function executeStats()
  {
    $this->vendor = $this->getVendor();
    return sfView::SUCCESS;
  }

  /**
   * executes update action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public function executeUpdate()
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

  /**
   * returns order column
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  protected function getSortColumn()
  {
    return 'vendor_company_name';
  }

  /**
   * adds filters criteria
   *
   * @param  Criteria  $c  the base criteria
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

  /**
   * executes autocomplete action
   *
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
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

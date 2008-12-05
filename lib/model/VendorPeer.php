<?php

/**
 * Subclass for performing query and update operations on the 'aranet_vendor' table.
 *
 * @package    aranet
 * @subpackage lib.model
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

class VendorPeer extends BaseVendorPeer
{

  /**
   * returns vendors like name
   *
   * @param string  $name
   * @param integer  $max
   * @return array
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getVendorsLike($name, $max = 10)
  {
    $c = new Criteria();
    $crit1 = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, "%${name}%", Criteria::LIKE);
    $crit2 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, "%${name}%", Criteria::LIKE);
    $crit1->addOr($crit2);
    $c->add($crit1);
    $c->setLimit($max);
    $vendors = VendorPeer::doSelect($c);
    return $vendors;
  }

  /**
   * returns the vendor matching given name
   *
   * @param  string $name company name
   * @return Vendor
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getVendorByCompanyName($name)
  {
    $c = new Criteria();
    $order   = array("\r\n", "\n", "\r");
    $name = str_replace($order, '', $name);
    $crit = $c->getNewCriterion(VendorPeer::VENDOR_COMPANY_NAME, $name);
    $crit2 = $c->getNewCriterion(VendorPeer::VENDOR_UNIQUE_NAME, $name);
    $crit->addOr($crit2);
    $c->add($crit);
    $vendor = VendorPeer::doSelectOne($c);
    if (!$vendor instanceof Vendor) {
        $c = new Criteria();
        $c->add(VendorPeer::VENDOR_UNIQUE_NAME, "${name}");
        $vendor = VendorPeer::doSelectOne($c);
        if (!$vendor instanceof Vendor) {
            $vendor = new Vendor();
            $vendor->setVendorCompanyName($name);
            $vendor->setVendorUniqueName($name);
        }
    }
    return $vendor;
  }
}

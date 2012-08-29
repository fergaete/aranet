<?php

/**
 * Vendor filter form.
 *
 * @package    ARANet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: VendorFormFilter.class.php 49 2008-12-05 11:23:56Z aranova $
 */
class VendorFormFilter extends BaseVendorFormFilter
{
  public function setup()
  {
    $this->setWidgets(array('name' => new sfWidgetFormFilterInput()));
    $this->setValidators(array('name' => new sfValidatorPass(array('required' => false))));
    $this->widgetSchema->setNameFormat('vendor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}

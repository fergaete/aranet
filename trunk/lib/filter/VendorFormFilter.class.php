<?php

/**
 * Vendor filter form.
 *
 * @package    ARANet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
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

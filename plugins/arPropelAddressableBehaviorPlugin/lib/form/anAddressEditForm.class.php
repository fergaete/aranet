<?php

/**
 * Edit address form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class anAddressEditForm extends BaseFormPropel
{
  /**
   * @see AddressForm
   */
  public function configure()
  {
    parent::configure();

    // address
    $id = uniqid();
    $this->widgetSchema['address['.$id.']'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullHTMLAddress', 'resultSchema' => '["ResultSet.Result","FullAddress"]', 'action' => '/address/autocomplete', 'value' => $this->object->__toString(true)));
    
    $this->validatorSchema['address['.$id.']'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');


  }

  public function getModelName()
  {
    return 'Address';
  }

}
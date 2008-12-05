<?php

/**
 * Contact filter form.
 *
 * @package    aranet
 * @subpackage filter
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class ContactFormFilter extends BaseContactFormFilter
{
  public function setup()
  {
    $this->setWidgets(array('name' => new sfWidgetFormFilterInput()));
    $this->setValidators(array('name' => new sfValidatorPass(array('required' => false))));
    $this->widgetSchema->setNameFormat('contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}

<?php

/**
 * Client filter form.
 *
 * @package    ARANet
 * @subpackage filter
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id: ClientFormFilter.class.php 49 2008-12-05 11:23:56Z aranova $
 */
class ClientFormFilter extends BaseClientFormFilter
{
  public function setup()
  {
    $this->setWidgets(array('name' => new sfWidgetFormFilterInput()));
    $this->setValidators(array('name' => new sfValidatorPass(array('required' => false))));
    $this->widgetSchema->setNameFormat('client_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}

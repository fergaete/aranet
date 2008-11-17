<?php

/**
 * Generic filter by name form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class BaseFilterForm extends BaseFormPropel
{
  public function configure()
  {
      $this->setWidgets(array(
        'name'             => new sfWidgetFormInput(array(), array('onfocus' => 'this.value=""', 'onblur' => 'if (this.value=="") this.value="'.$this->object->getName().'"')),
      ));

      $this->setValidators(array(
        'name'          => new sfValidatorString(array('max_length' => 255)),
      ));

      $this->widgetSchema->setNameFormat('filters[%s]');

      $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

      parent::setup();
    }

    public function getModelName()
    {
      return 'Filter';
    }
}

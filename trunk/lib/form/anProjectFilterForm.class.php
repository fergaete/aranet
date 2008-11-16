<?php

/**
 * Project filter form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class anProjectFilterForm extends BaseSidebarFilterForm
{
  public function configure()
  {
    parent::configure();

    $this->setWidgets(array(
        'project_start_date'    => new yuiWidgetFormDate(),
        'project_finish_date'   => new yuiWidgetFormDate(),
        'project_status_id'     => new sfWidgetFormPropelSelect(array('model' => 'ProjectStatus', 'add_empty' => true))
    ));

    // project_client_id
    $this->widgetSchema['project_client_id'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.UniqueName', 'resultSchema' => '["ResultSet.Result","UniqueName"]', 'action' => '/client/autocomplete'));
    
    $this->validatorSchema['project_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));


    $this->setValidators(array(
        'project_start_date'    => new sfValidatorDateTime(array('required' => false)),
        'project_finish_date'   => new sfValidatorDateTime(array('required' => false)),
        'project_status_id'     => new sfValidatorPropelChoice(array('model' => 'ProjectStatus', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setLabels(array(
        'project_start_date'    => 'Start date',
        'project_finish_date'   => 'End date'
    ));

    $this->widgetSchema->setNameFormat('filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}

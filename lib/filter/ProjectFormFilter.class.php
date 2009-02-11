<?php

/**
 * Project filter form.
 *
 * @package    ARANet
 * @subpackage filter
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class ProjectFormFilter extends BaseProjectFormFilter
{
  public function configure()
  {
    parent::configure();
    
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(),
      'project_start_date_from'    => new yuiWidgetFormDate(),
      'project_start_date_to'    => new yuiWidgetFormDate(),
      'project_finish_date_from'   => new yuiWidgetFormDate(),
      'project_finish_date_to'   => new yuiWidgetFormDate(),
      'project_status_id'     => new yuiWidgetFormPropelSelect(array('model' => 'ProjectStatus', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select')),
      'project_category_id'   => new yuiWidgetFormPropelSelect(array('model' => 'ProjectCategory', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select')),
      'project_client_id'     => new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.UniqueName', 'resultSchema' => '["ResultSet.Result","UniqueName"]', 'action' => '/client/autocomplete'), array('class' => 'tiny')),
    ));
    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'project_start_date_from'    => new sfValidatorDateTime(array('required' => false)),
      'project_start_date_to'    => new sfValidatorDateTime(array('required' => false)),
      'project_finish_date_from'   => new sfValidatorDateTime(array('required' => false)),
      'project_finish_date_to'   => new sfValidatorDateTime(array('required' => false)),
      'project_status_id'     => new sfValidatorPropelChoice(array('model' => 'ProjectStatus', 'column' => 'id', 'required' => false)),
      'project_category_id'   => new sfValidatorPropelChoice(array('model' => 'ProjectCatagory', 'column' => 'id', 'required' => false)),
      'project_client_id'     => new sfValidatorTags('name', new sfValidatorString(array('required' => false))),
    ));
    

    // project_client_id
    if (isset($this->object) && $this->object->getClient()) {
      $client_string = $this->object->getClient()->getFullName(false);
      $client_id = $this->object->getClient()->getId();
    } else {
      $client_string = '';
      $client_id = '';
    }
    $this->widgetSchema['project_client_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/client/autocomplete', 'value' => array($client_string, $client_id)), array('class' => 'small'));
    $this->validatorSchema['project_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => true)));


    $this->widgetSchema->setLabels(array(
        'project_start_date_from' => 'From (start)',
        'project_start_date_to'   => 'To (start)',
        'project_finish_date_from'=> 'From (end)',
        'project_finish_date_to'  => 'To (End)',
        'project_status_id'       => 'Status',
        'project_category_id'     => 'Category',
        'project_client_id'       => 'Client'
    ));

    $this->widgetSchema->setNameFormat('project_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}

<?php

/**
 * Budget filter form.
 *
 * @package    ARANet
 * @subpackage filter
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class BudgetFormFilter extends BaseBudgetFormFilter
{
  public function configure()
  {
    parent::configure();
    
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(),
      'budget_date_from'    => new yuiWidgetFormDate(),
      'budget_date_to'    => new yuiWidgetFormDate(),
      'budget_valid_date_from'   => new yuiWidgetFormDate(),
      'budget_valid_date_to'   => new yuiWidgetFormDate(),
      'budget_status_id'     => new yuiWidgetFormPropelSelect(array('model' => 'BudgetStatus', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select')),
      'budget_category_id'   => new yuiWidgetFormPropelSelect(array('model' => 'InvoiceCategory', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select')),
      'budget_client_id'     => new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.UniqueName', 'resultSchema' => '["ResultSet.Result","UniqueName"]', 'action' => '/client/autocomplete'), array('class' => 'width-auto')),
      'budget_project_id'     => new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/project/autocomplete'), array('class' => 'width-auto')),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'budget_start_date_from'    => new sfValidatorDateTime(array('required' => false)),
      'budget_start_date_to'    => new sfValidatorDateTime(array('required' => false)),
      'budget_finish_date_from'   => new sfValidatorDateTime(array('required' => false)),
      'budget_finish_date_to'   => new sfValidatorDateTime(array('required' => false)),
      'budget_status_id'     => new sfValidatorPropelChoice(array('model' => 'ProjectStatus', 'column' => 'id', 'required' => false)),
      'budget_category_id'   => new sfValidatorPropelChoice(array('model' => 'ProjectCatagory', 'column' => 'id', 'required' => false)),
      'budget_client_id'     => new sfValidatorTags('name', new sfValidatorString(array('required' => false))),
    ));
    

    // budget_client_id
    if (isset($this->object) && $this->object->getClient()) {
      $client_string = $this->object->getClient()->getFullName(false);
      $client_id = $this->object->getClient()->getId();
    } else {
      $client_string = '';
      $client_id = '';
    }
    $this->widgetSchema['budget_client_id'] = new yuiWidgetFormAutocomplete(array('formatResult' => '%1%.FullName', 'resultSchema' => '["ResultSet.Result","FullName"]', 'action' => '/client/autocomplete', 'value' => array($client_string, $client_id)), array('class' => 'small'));
    $this->validatorSchema['budget_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => true)));


    $this->widgetSchema->setLabels(array(
        'budget_date_from' => 'From (start)',
        'budget_date_to'   => 'To (start)',
        'budget_valid_date_from'=> 'From (end)',
        'budget_valid_date_to'  => 'To (End)',
        'budget_status_id'       => 'Status',
        'budget_category_id'     => 'Category',
        'budget_client_id'       => 'Client',
        'budget_project_id'       => 'Project'
    ));

    $this->widgetSchema->setNameFormat('budget_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}

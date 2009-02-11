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
    if (isset($this->object)) {
      $name = $this->object->getName();
    } else {
      $name = '';//sfContext::getInstance()->sfI18N()->__('Name').'...';
    }
    $this->setWidgets(array(
        'name'             => new sfWidgetFormInput(array(), array('onfocus' => 'this.value=""', 'onblur' => 'if (this.value=="") this.value="'.$name.'"')),
      ));

      $this->setValidators(array(
        'name'          => new sfValidatorString(array('max_length' => 255)),
      ));

    $this->setWidgets(array(
        'name'                  => new sfWidgetFormInput(),
        'project_start_date'    => new yuiWidgetFormDate(),
        'project_finish_date'   => new yuiWidgetFormDate(),
        'project_status_id'     => 
        new yuiWidgetFormPropelSelect(array('model' => 'ProjectStatus', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select')),
        'project_category_id'     => 
        new yuiWidgetFormPropelSelect(array('model' => 'ProjectCategory', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select'))
    ));
    //new sfWidgetFormPropelSelect(array('model' => 'ProjectCategory', 'add_empty' => true)),
    // project_client_id
    $this->widgetSchema['project_client_id'] = new yuiWidgetFormAutocomplete(array('delimChar' => array(','), 'formatResult' => '%1%.UniqueName', 'resultSchema' => '["ResultSet.Result","UniqueName"]', 'action' => '/client/autocomplete'), array('class' => 'tiny'));
    
    $this->validatorSchema['project_client_id'] = new sfValidatorTags('name', new sfValidatorString(array('required' => false)));


    $this->setValidators(array(
        'name'                  => new sfValidatorPass(array('required' => false)),
        'project_start_date'    => new sfValidatorDateTime(array('required' => false)),
        'project_finish_date'   => new sfValidatorDateTime(array('required' => false)),
        'project_status_id'     => new sfValidatorPropelChoice(array('model' => 'ProjectStatus', 'column' => 'id', 'required' => false)),
        'project_category_id'     => new sfValidatorPropelChoice(array('model' => 'ProjectCatagory', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setLabels(array(
        'project_start_date'    => 'Start date',
        'project_finish_date'   => 'End date',
        'project_status_id'     => 'Status',
        'project_category_id'   => 'Category',
        'project_client_id'     => 'Client'
    ));

    $this->widgetSchema->setNameFormat('project_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}

<?php use_helper('Object', 'Javascript') ?>
  <?php echo select_tag($sf_params->get('class') . '_milestone_id', objects_for_select($milestones,
  'getId',
  '__toString',
  '', 
  'include_custom='.__('Select milestone') . '...'),
  array ('class' => 'form-combobox',
         'onchange' => remote_function(array(
                   'update' => 'tasks',
                   'url' => 'project/getTaskSelect',
                   'with' => "'class=timesheet&milestone_id=' + this.options[this.selectedIndex].value"
    )))) ?>
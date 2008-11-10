<?php use_helper('Object', 'Javascript') ?>
  <?php echo select_tag($sf_params->get('class') . '_project_id', objects_for_select(
  $projects,
  'getId',
  '__toString',
  '', 'include_custom=' . __('Select project') . '...'),
  array ('class' => 'form-medium-combobox',
         'onchange' => remote_function(array(
                   'update' => 'budgets',
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=invoice&project_id=' + this.options[this.selectedIndex].value"
                 )))) ?>

<?php use_helper('Object') ?>
  <?php echo select_tag($sf_params->get('class') . '_task_id', objects_for_select(
      $tasks,
      'getId',
      '__toString',
      '',
      'include_custom='. __('Select task') . '...'),
      array('class' => 'form-combobox')) ?>

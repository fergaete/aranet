<?php echo input_tag('task_title', ($ftask instanceof FrequentlyTask) ? $ftask->getTaskTitle() : $sf_params->get('task_title'), array (
  'size' => 80, 'class' => 'form-text')) ?>
<?php use_helper('Object', 'Javascript') ?>

<?php echo form_remote_tag(array(
        'url'      => 'project/updatetask',
        'update' => 'projectMilestones',
        'loading'  => visual_effect('appear', "indicator-milestone"),
        'complete' => visual_effect('fade', "indicator-milestone").
                      visual_effect('highlight', "projectMilestones")), 'name=task') ?>
                      
<?php echo (isset($task)) ? input_hidden_tag('id', $task->getId()) : '' ?>
<?php echo input_hidden_tag('task_project_id', $project->getId()) ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="leftCol"><label><?php echo __('Select from frequently used tasks') ?></label></td>
  <td class="rightCol"><?php echo select_tag('task_frequently_id', objects_for_select(FrequentlyTaskPeer::doSelect(new Criteria()), 'getId', '__toString', $sf_params->get('task_frequently_id'), 'include_blank=true'), array ('class' => 'form-combobox', 'onchange' => remote_function(array(
                   'update' => 'task_title',
                   'url' => 'project/getFrecuentlyTaskTitle',
                   'with' => "'id=' + this.options[this.selectedIndex].value"
                 ))
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Task title') ?></label></td>
  <td class="rightCol" id="task_title"><?php echo input_tag('task_title', (isset($task)) ? $task->getTaskTitle() : $sf_params->get('task_title'), array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label><?php echo __('Task milestone') ?></label></td>
  <td class="rightCol"><?php echo select_tag('task_milestone_id', objects_for_select($milestones, 'getId', '__toString', (isset($task)) ? $task->getTaskMilestoneId() : $sf_params->get('task_milestone_id'), 'include_blank=true'), array ('class' => 'form-combobox')) ?></td>
</tr>
<tr>
  <td class="leftCol"><label><?php echo __('Task description') ?></label></td>
  <td class="rightCol"><?php echo textarea_tag('task_description', (isset($task)) ? $task->getTaskDescription() : $sf_params->get('task_description'), array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Task dates') ?></label></td>
  <td class="rightCol">
    <div style="float: left; padding-right: 5px;"><?php echo __('Start Date') ?><br>
        <?php echo input_date_tag('task_start_date', (isset($task)) ? $task->getTaskStartDate() : $sf_params->get('task_start_date'), 'rich=true class=form-date') ?>
    </div><div style="float: left;"><?php echo __('End Date') ?><br>
        <?php echo input_date_tag('task_finish_date', (isset($task)) ? $task->getTaskFinishDate() : $sf_params->get('task_finish_date'), array (
            'rich' => true, 'class' => 'form-date'
            )) ?>
    </div>
  </td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Estimated time') ?></label></td>
  <td class="rightCol" id="task_estimated_hours"><?php echo input_tag('task_estimated_hours', (isset($task)) ? $task->getTaskEstimatedHours() : $sf_params->get('task_estimated_hours'), array (
  'size' => 8, 'class' => 'form-tiny-text'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Priority') ?></label></td>
  <td class="rightCol"><?php echo select_tag('task_priority_id', objects_for_select(TaskPriorityPeer::doSelect(new Criteria()), 'getId', '__toString', (isset($task)) ? $task->getTaskPriorityId() : $sf_params->get('task_priority_id')), array ('class' => 'form-tiny-combobox'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"></td>
  <td class="rightCol"><?php echo checkbox_tag('task_is_frequently', 1, false) ?> <?php echo __('Save to frequently used task list') ?></td>
</tr>
<tr>
  <td style="border: medium none ;"></td>
  <td style="border: medium none ; text-align: left;">
      <?php echo submit_to_remote('ajax_submit', "", array(
        'url'      => 'project/updatetask',
        'update' => 'projectMilestones',
        'loading'  => visual_effect('appear', "indicator-milestone"),
        'complete' => visual_effect('fade', "indicator-milestone").
                      visual_effect('highlight', "projectMilestones"),
        ), array('class' => 'form-save')) ?>
    <?php echo link_to_function(image_tag('button_close.gif', 'alt="Close"'), update_element_function('projectMilestoneAddEdit', array('content'  => ""))) ?>
        </td>
    </tr>

</tbody>
</table>
<?php use_helper('Javascript') ?>

<?php //echo form_tag('project/updatemilestone', 'name=milestone') ?>
<?php echo form_remote_tag(array(
        'url'      => 'project/updatemilestone',
        'update' => 'projectMilestones',
        'loading'  => visual_effect('appear', "indicator-milestone"),
        'complete' => visual_effect('fade', "indicator-milestone").
                      visual_effect('highlight', "projectMilestones")), 'name=milestone') ?>
                      
<?php echo (isset($milestone)) ? input_hidden_tag('id', $milestone->getId()) : '' ?>
<?php echo input_hidden_tag('milestone_project_id', $project->getId()) ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Title') ?></label></td>
  <td class="rightCol"><?php echo input_tag('milestone_title', (isset($milestone)) ? $milestone->getMilestoneTitle() : $sf_params->get('milestone_title'), array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label><?php echo __('Description') ?></label></td>
  <td class="rightCol"><?php echo textarea_tag('milestone_description', (isset($milestone)) ? $milestone->getMilestoneDescription() : $sf_params->get('milestone_description'), array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Milestone dates') ?></label></td>
  <td class="rightCol">
    <div style="float: left; padding-right: 5px;"><?php echo __('Start Date') ?><br>
        <?php echo input_date_tag('milestone_start_date', (isset($milestone)) ? $milestone->getMilestoneStartDate() : $sf_params->get('milestone_start_date'), 'rich=true class=form-date') ?>
    </div><div style="float: left;"><?php echo __('End Date') ?><br>
        <?php echo input_date_tag('milestone_finish_date', (isset($milestone)) ? $milestone->getMilestoneFinishDate() : $sf_params->get('milestone_finish_date'), 'rich=true class=form-date') ?>
    </div>
  </td>
</tr>
<tr>
  <td class="leftCol"><label class="required"><?php echo __('Estimated time') ?></label></td>
  <td class="rightCol" id="milestone_estimated_hours"><?php echo input_tag('milestone_estimated_hours', (isset($milestone)) ? $milestone->getMilestoneEstimatedHours() : $sf_params->get('milestone_estimated_hours'), array (
  'size' => 8, 'class' => 'form-tiny-text'
)) ?></td>
</tr>
<tr>
  <td style="border: medium none ;"></td>
  <td style="border: medium none ; text-align: left;">
      <?php echo submit_to_remote('ajax_submit', "", array(
        'url'      => 'project/updatemilestone',
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
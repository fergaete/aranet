<?php use_helper('Object', 'Javascript') ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo ($timesheet->getId()) ? __('Edit timesheet record') : __('Add new timesheet record') ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('timesheet/update') ?>

<?php echo object_input_hidden_tag($timesheet, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Description') ?></label></td>
  <td class="rightCol"><?php echo object_input_hidden_tag($timesheet, 'getTimesheetUserId') ?>
  <?php echo object_input_tag($timesheet, 'getTimesheetDescription', array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Timesheet hours') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('timesheet_hours') ? form_error('timesheet_hours') : '' ?>
    <?php echo form_error('timesheet_date') ? form_error('timesheet_date') : '' ?>
    <?php echo object_input_tag($timesheet, 'getTimesheetHours', array ('size' => 7, 'class' => $sf_request->getError('timesheet_hours') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
    <label><?php echo __('Date') ?></label>
    <?php echo object_input_date_tag($timesheet, 'getTimesheetDate', array ('rich' => true, 'class' => $sf_request->getError('timesheet_date') ? 'form-date err' : 'form-date')) ?>
    </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Kind of work') ?></label></td>
  <td class="rightCol">
    <?php echo object_select_tag($timesheet, 'getTimesheetTypeId', array (
        'related_class' => 'TypeOfHour',
        'class' => 'form-medium-combobox',
        'name' => 'timesheet_type_id',
    )) ?>
    <label><?php echo __('Is billable?') ?></label>
    <?php echo object_checkbox_tag($timesheet, 'getTimesheetIsBillable', array (
)) ?>
    </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project') ?></label></td>
  <td class="rightCol" id="projects">
            <?php $pro = ($timesheet->getTimesheetProjectId()) ? $timesheet->getProject()->__toString() : __('Project') . '...' ?>
  <?php echo javascript_tag("
  function getProject(text, li){
      $('timesheet_project_id').value = li.id;
      new Ajax.Updater('budgets', '/project/getBudgetSelect', {asynchronous:true, evalScripts:false, parameters:'class=timesheet&project_id=' + li.id});
      ".remote_function(array(
                   'update' => 'milestones',
                   'script' => true,
                   'url' => 'project/getMilestones',
                   'with' => "'class=timesheet&project_id=' + $('timesheet_project_id').value"
                 )).
      remote_function(array(
                   'update' => 'budgets',
                   'script' => true,
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=timesheet&project_id=' + $('timesheet_project_id').value"
                 ))."
  }") ?>
  <?php echo input_hidden_tag('timesheet_project_id', ($timesheet->getTimesheetProjectId()) ? $timesheet->getTimesheetProjectId() : '') ?>
            <?php echo input_auto_complete_tag('project_name', ($sf_params->get('project_name') ? $sf_params->get('project_name') : $pro),
        'project/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""; $("timesheet_project_id").value = ""'),
        array('use_style'    => true,
            'after_update_element' => 'getProject')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any project") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Associated budget') ?></label></td>
    <td class="rightCol" id="budgets">
            <?php $bud = ($timesheet->getTimesheetBudgetId()) ? $timesheet->getBudget()->getFullTitle() : __('Budget') . '...' ?>
  <?php echo javascript_tag("
  function getBudget(text, li){
      $('timesheet_budget_id').value = li.id;
  }") ?>
  <?php echo input_hidden_tag('timesheet_budget_id', ($timesheet->getTimesheetBudgetId()) ? $timesheet->getTimesheetBudgetId() : '') ?>
            <?php echo input_auto_complete_tag('budget_name', ($sf_params->get('budget_name') ? $sf_params->get('budget_name') : $bud),
        'budget/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
        array('use_style'    => true,
            'after_update_element' => 'getBudget')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any budget") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Milestones & Tasks') ?></label></td>
  <td class="rightCol">
  <span id="milestones">
  <?php $project = ($timesheet->getTimesheetProjectId()) ? ProjectPeer::retrieveByPk($timesheet->getTimesheetProjectId()) : new Project() ?>
  <?php $selected = null; if ($timesheet->getTimesheetMilestoneId()) {
        $selected[] = 'milestone_' . $timesheet->getTimesheetMilestoneId();
    }
    if ($timesheet->getTimesheetTaskId()) {
        $selected[] = 'task_' . $timesheet->getTimesheetTaskId();
    } ?>
<?php include_partial('project/milestone_select_list', array('project' => $project, 'selected' => $selected)) ?>
    </span>
  </td>
</tr>
</tbody>
</table>
<table style="width: 100%;">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
            <?php echo submit_tag(__('Save timesheet'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

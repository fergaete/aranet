<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<?php aranet_title(__('List timesheet records')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all timesheet records tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all timesheet records');
endif ?>
</h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('timesheet/list', array('method' => 'get', 'name' => 'timesheet_filters')) ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="timesheet_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[timesheet_from]', isset($filters['timesheet_from']) && $filters['timesheet_from'] !== '' ? format_date($filters['timesheet_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="timesheet_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[timesheet_to]', isset($filters['timesheet_to']) && $filters['timesheet_to'] !== '' ? format_date($filters['timesheet_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
  <fieldset>
    <legend><?php echo __('Member filter') ?></legend>
    <div class="form-row">
    <label for="timesheet_member"><?php echo __('Member') ?></label>
    <div class="content">
    <?php echo select_tag('filters[timesheet_user_id]', objects_for_select($members, 'getId', '__toString',
    isset($filters['timesheet_user_id']) ? $filters['timesheet_user_id'] : '', 'include_custom='.__('Member').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
  </fieldset>
      <fieldset>
    <legend><?php echo __('Project filter') ?></legend>
    <div class="form-row">
    <label for="timesheet_project_id"><?php echo __('Project') ?></label>
    <div class="content">
    <?php echo input_auto_complete_tag('filters[project_name]', isset($filters['project_name']) ? $filters['project_name'] : __('Project') . '...',
                    'project/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text', 'onfocus' => 'this.value=""'),
                    array('use_style'    => true)
                    ) ?>
    </div>
    </div>
  </fieldset>
    <fieldset>
    <legend><?php echo __('Billable filter') ?></legend>
    <div class="form-row">
    <label for="timesheet_validation_id"><?php echo __('Billable?') ?></label>
    <div class="content">
        <?php echo select_tag('filters[timesheet_is_billable]', options_for_select(array('0' => __('No'), '1' => __('Yes')), isset($filters['timesheet_is_billable']) ? $filters['timesheet_is_billable'] : null, 'include_blank=true'), array ('class' => 'form-tiny-combobox')) ?>
    </div>
    </div>
  </fieldset>
  <div class="filterActions">
    <?php echo link_to(__('reset'), 'timesheet/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('timesheet_full_list', array('pager' => $pager)) ?>
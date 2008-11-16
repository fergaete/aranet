<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . __('List budgets')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all budgets tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all budgets');
endif ?>
</h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('budget/list', array('method' => 'get', 'name' => 'budget_filters')) ?>
<?php echo input_hidden_tag('filters[budget_name]', isset($filters['budget_name']) ? $filters['budget_name'] : '') ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="budget_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[budget_from]', isset($filters['budget_from']) && $filters['budget_from'] !== '' ? format_date($filters['budget_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="budget_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[budget_to]', isset($filters['budget_to']) && $filters['budget_to'] !== '' ? format_date($filters['budget_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Status filter') ?></legend>
    <div class="form-row">
    <label for="budget_status_id"><?php echo __('Status') ?></label>
    <div class="content">
    <?php echo select_tag('filters[budget_status_id]', objects_for_select($budget_status,'getId', '__toString', isset($filters['budget_status_id']) ? $filters['budget_status_id'] : null, 'include_blank=true'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Project filter') ?></legend>
    <div class="form-row">
    <label for="budget_project_id"><?php echo __('Project') ?></label>
    <div class="content">
    <?php echo input_auto_complete_tag('filters[project_name]', isset($filters['project_name']) ? $filters['project_name'] : __('Project').'...',
                    'project/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text', 'onfocus' => 'this.value=""'),
                    array('use_style'    => true)
                    ) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Client filter') ?></legend>
    <div class="form-row">
    <label for="budget_client_id"><?php echo __('Client') ?></label>
    <div class="content">
    <?php echo input_auto_complete_tag('filters[client_name]', isset($filters['client_name']) ? $filters['client_name'] : __('Client') .'...',
                    'client/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text', 'onfocus' => 'this.value=""'),
                    array('use_style'    => true)
                    ) ?>
    </div>
    </div>
  </fieldset>
  <div class="filterActions">
    <?php echo link_to(__('reset'), 'budget/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('budget_full_list', array('pager' => $pager)) ?>
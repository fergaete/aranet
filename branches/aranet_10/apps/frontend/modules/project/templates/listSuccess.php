<?php use_helper('Object', 'Javascript') ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . __('List projects')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all projects tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all projects');
endif ?>
</h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('project/list', array('method' => 'get', 'name' => 'project_filters')) ?>
<?php echo input_hidden_tag('filters[project_name]', isset($filters['project_name']) ? $filters['project_name'] : '') ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="project_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[project_from]', isset($filters['project_from']) && $filters['project_from'] !== '' ? format_date($filters['project_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="project_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[project_to]', isset($filters['project_to']) && $filters['project_to'] !== '' ? format_date($filters['project_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Status filter') ?></legend>
    <div class="form-row">
    <label for="project_status_id"><?php echo __('Status') ?></label>
    <div class="content">
    <?php echo select_tag('filters[project_status_id]', objects_for_select($project_status,'getId', '__toString', isset($filters['project_status_id']) ? $filters['project_status_id'] : null, 'include_blank=true'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Client filter') ?></legend>
    <div class="form-row">
    <label for="project_client_id"><?php echo __('Client') ?></label>
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
    <?php echo link_to(__('reset'), 'project/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('project_full_list', array('pager' => $pager)) ?>

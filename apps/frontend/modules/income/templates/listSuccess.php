<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<?php aranet_title(__('List incomes')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all incomes tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all incomes');
endif ?>
</h3>
<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('income/list', array('method' => 'get', 'name' => 'income_filters')) ?>
<?php echo input_hidden_tag('filters[budget_name]', isset($filters['budget_name']) ? $filters['budget_name'] : '') ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="income_from"><?php echo __('From') . '...' ?></label>
    <div class="content">
    <?php echo input_date_tag('filters[income_from]', isset($filters['income_from']) && $filters['income_from'] !== ''  ? format_date($filters['income_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="income_to"><?php echo __('To') . '...' ?></label>
    <div class="content">
    <?php echo input_date_tag('filters[income_to]', isset($filters['income_to']) && $filters['income_to'] !== '' ? format_date($filters['income_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Category filter') ?></legend>
    <div class="form-row">
    <label for="income_item_category_id"><?php echo __('Category') ?></label>
    <div class="content">
    <?php echo select_tag('filters[income_item_category_id]', objects_for_select(IncomeCategoryPeer::doSelect(new Criteria()),'getId', '__toString', isset($filters['income_item_category_id']) ? $filters['income_item_category_id'] : null, 'include_custom='.__('Category').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Payment filter') ?></legend>
    <div class="form-row">
    <label for="income_item_category_id"><?php echo __('Payment') ?></label>
    <div class="content">
    <?php echo select_tag('filters[income_item_payment_method_id]', objects_for_select(PaymentMethodPeer::doSelect(new Criteria()), 'getId', '__toString', isset($filters['income_item_payment_method_id']) ? $filters['income_item_payment_method_id'] : null, 'include_custom='.__('Paid with').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Project filter') ?></legend>
    <div class="form-row">
    <label for="income_item_project_id"><?php echo __('Project') ?></label>
    <div class="content">
    <?php echo input_auto_complete_tag('filters[project_name]', isset($filters['project_name']) ? $filters['project_name'] : __('Project') . '...',
                    'project/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text', 'onfocus' => 'this.value=""'),
                    array('use_style'    => true)
                    ) ?>
    </div>
    </div>
  </fieldset>
  <div class="filterActions">
    <?php echo link_to(__('reset'), 'income/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('income_full_list', array('pager' => $pager)) ?>
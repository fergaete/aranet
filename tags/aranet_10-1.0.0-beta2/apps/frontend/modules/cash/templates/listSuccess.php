<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<h3><?php echo __('View all cash movements') ?></h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('cash/list', array('method' => 'get', 'name' => 'cash_filters')) ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="filters_cash_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[cash_from]', isset($filters['cash_from']) && $filters['cash_from'] !== '' ? format_date($filters['cash_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="filters_cash_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[cash_to]', isset($filters['cash_to']) && $filters['cash_to'] !== '' ? format_date($filters['cash_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
  </fieldset>
  <div class="filterActions">
    <?php echo link_to(__('reset'), 'cash/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<?php include_partial('cash_full_list', array('pager' => $pager)) ?>
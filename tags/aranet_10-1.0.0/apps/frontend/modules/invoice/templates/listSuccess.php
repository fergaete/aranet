<?php use_helper('Object') ?>
<?php aranet_title(__('List invoices')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all invoices tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all invoices');
endif ?>
</h3>


<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('invoice/list', array('method' => 'get', 'name' => 'invoice_filters')) ?>
<?php echo input_hidden_tag('filters[invoice_name]', isset($filters['invoice_name']) ? $filters['invoice_name'] : '') ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="invoice_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[invoice_from]', isset($filters['invoice_from']) && $filters['invoice_from'] !== '' ? format_date($filters['invoice_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="invoice_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[invoice_to]', isset($filters['invoice_to']) && $filters['invoice_to'] !== '' ? format_date($filters['invoice_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Status filter') ?></legend>
    <div class="form-row">
    <label for="invoice_status_id"><?php echo __('Status') ?></label>
    <div class="content">
    <?php echo select_tag('filters[invoice_payment_status_id]', objects_for_select($payment_status,'getId', '__toString', isset($filters['invoice_payment_status_id']) ? $filters['invoice_payment_status_id'] : null, array('include_blank' => true)), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <div class="filterActions">
    <?php echo link_to(__('reset'), 'invoice/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('invoice_full_list', array('pager' => $pager)) ?>

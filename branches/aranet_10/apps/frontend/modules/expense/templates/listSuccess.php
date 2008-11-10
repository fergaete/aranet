<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<?php aranet_title(__('List expenses')) ?>
<div id="expListActions" class="listTopActions">
    <ul>
    <li>
      <?php echo link_to_function(image_tag('buttonPrintLarge.gif', 'alt="Print expense list" style="border: medium none ; cursor: pointer;'), visual_effect('appear', 'printMenu')) ?>
      <div id="printMenu" class="popUpDiv popUpWindow" style="text-align: left; display:none;">
      <div id="container_printMenu">
          <div style="text-align: right;">
            <?php echo link_to_function(image_tag('buttonCloseSmall.gif', 'alt="Close"'), visual_effect('fade', 'printMenu')) ?>
        </div>
        <div style="height: 5px;"></div>
        <div id="windowContent" style="text-align: left;">
            <div style="text-align: left;">
                <?php echo form_tag('expense/print') ?>
                <legend><?php echo __('Select report to print') ?></legend>
                <fieldset style="margin-top:4px;margin-bottom:6px;">
                    <?php $c = new Criteria();
                    $c->add(ReportPeer::REPORT_MODEL, 'ExpenseItem'); ?>
                    <label style="display:none"><?php echo __('Report') ?>: </label>
                    <?php echo select_tag('report', objects_for_select(ReportPeer::doSelect($c), 'getId', 'getReportName')) ?>
                </fieldset>
                <?php echo submit_tag('', array('class' => 'form-save')) ?>
            </form>
        </div>
    </div>
        </div>
        </div>
      </li>
      <li>
      <?php echo link_to(image_tag('buttonDownloadLarge.gif', 'alt="Download associated files"'), '/expense/downloadFiles') ?>
      </li>
      </ul>
</div>
<h3>
<?php if (isset($tag)) : 
 echo __('View all expenses tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all expenses');
endif ?>
</h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<?php echo form_tag('expense/list', array('method' => 'get', 'name' => 'expense_filters')) ?>
<?php echo input_hidden_tag('filters[expense_name]', isset($filters['expense_name']) ? $filters['expense_name'] : '') ?>
  <fieldset>
    <legend><?php echo __('Date filter') ?></legend>
    <div class="form-row">
    <label for="expense_from" class="visible"><?php echo __('From') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[expense_from]', isset($filters['expense_from']) && $filters['expense_from'] !== '' ? format_date($filters['expense_from']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    <div class="form-row">
    <label for="expense_to" class="visible"><?php echo __('To') ?>...</label>
    <div class="content">
    <?php echo input_date_tag('filters[expense_to]', isset($filters['expense_to']) && $filters['expense_to'] !== '' ? format_date($filters['expense_to']) : '', 'rich=true class=form-date') ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Category filter') ?></legend>
    <div class="form-row">
    <label for="expense_item_category_id"><?php echo __('Category') ?></label>
    <div class="content">
    <?php echo select_tag('filters[expense_item_category_id]', objects_for_select($expense_categories,'getId', '__toString', isset($filters['expense_item_category_id']) ? $filters['expense_item_category_id'] : null, 'include_custom='.__('Category').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Payment filter') ?></legend>
    <div class="form-row">
    <label for="expense_item_payment_method_id"><?php echo __('Payment') ?></label>
    <div class="content">
    <?php echo select_tag('filters[expense_item_payment_method_id]', objects_for_select($payment_methods, 'getId', '__toString', isset($filters['expense_item_payment_method_id']) ? $filters['expense_item_payment_method_id'] : null, 'include_custom='.__('Paid with').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div><br/>
    <div class="form-row">
    <label for="expense_item_purchase_by_id"><?php echo __('Member') ?></label>
    <div class="content">
    <?php echo select_tag('filters[expense_purchase_by]', objects_for_select($members, 'getId', '__toString', isset($filters['expense_purchase_by']) ? $filters['expense_purchase_by'] : null, 'include_custom='.__('Paid by').'...'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <legend><?php echo __('Project filter') ?></legend>
    <div class="form-row">
    <label for="expense_item_project_id"><?php echo __('Project') ?></label>
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
    <legend><?php echo __('Validation filter') ?></legend>
    <div class="form-row">
    <label for="expense_item_validation_id"><?php echo __('Validation') ?></label>
    <div class="content">
        <?php echo select_tag('filters[expense_item_validation_id]', options_for_select(array('1' => __('Waiting approval'), '2' => __('Approved')), isset($filters['expense_item_validation_id']) ? $filters['expense_item_validation_id'] : null, 'include_blank=true'), array ('class' => 'form-full-combobox')) ?>
    </div>
    </div>
  </fieldset>
  <div class="filterActions">
    <?php echo link_to(__('reset'), 'expense/list?filter=filter', 'id=reset_btn class=btn') ?>
    <?php echo submit_tag(__('filter'), 'id=submit_btn name=filter class=btn') ?>
  </div>
</form>
<br/><br/>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<?php include_partial('expense_full_list', array('pager' => $pager)) ?>

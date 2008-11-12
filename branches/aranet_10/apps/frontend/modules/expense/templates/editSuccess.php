<?php use_helper('Object', 'Javascript') ?>
<?php if ($expense_item->isNew()) {
    $title = __('Add new expense');
} else {
    $title = __('Edit expense %1%', array('%1%' => $expense_item->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('expense/update', 'id="expense"') ?>
<?php echo object_input_hidden_tag($expense_item, 'getId') ?>
<?php echo (isset($referer)) ? input_hidden_tag('referer', $referer) : '' ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Expense item name') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('expense_item_name') ?>
    <?php echo input_tag('expense_item_name', $sf_params->get('expense_item_name') ? $sf_params->get('expense_item_name') : $expense_item->getExpenseItemName(), array (
  'size' => 80, 'class' => $sf_request->getError('expense_item_name') ? 'form-medium-text err' : 'form-medium-text')) ?>
    <label><?php echo __('Invoice') ?></label>
    <?php echo input_tag('expense_item_invoice_number', $sf_params->get('expense_item_invoice_number') ? $sf_params->get('expense_item_invoice_number') : $expense_item->getExpenseItemInvoiceNumber(), array (
  'size' => 80, 'class' => 'form-small-text'
)) ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Expense vendor') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('vendor_name') ?>
    <?php
    if ($sf_params->get('vendor_id')) {
        $vendor_id = $sf_params->get('vendor_id');
        $ven = VendorPeer::retrieveByPk($vendor_id);
        if ($ven)
            $vendor = $vendor->getFullName(false);
    }
    if ($sf_params->get('expense_item_vendor_id') || $sf_params->get('vendor_name')) {
        $vendor_id = $sf_params->get('expense_item_vendor_id');
        if ($vendor_id)
            $ven = VendorPeer::retrieveByPk($vendor_id);
        if (isset($ven) && $ven)
            $vendor = $ven->getFullName(false);
        else
            $vendor = $sf_params->get('vendor_name');
    }
    if ($expense_item->getExpenseItemVendorId()) {
        $vendor_id = $expense_item->getExpenseItemVendorId();
        $vendor = $expense_item->getVendor()->getFullName(false);
    }
    if (!isset($vendor) || !$vendor) {
        $vendor = __('Vendor') . '...';
        $vendor_id = -1;
    } ?>
    <?php echo javascript_tag("function getVendor(text, li){ $('expense_item_vendor_id').value = li.id }") ?>
      <?php echo input_hidden_tag('expense_item_vendor_id', $vendor_id) ?>
    <?php echo input_auto_complete_tag('vendor_name', $vendor,
                    'vendor/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'if (this.value == "'.__('Vendor').'...") { this.value=""}'),
                    array('use_style'    => true,
                        'after_update_element' => 'getVendor')
                    ) ?><br/>
    <span class="notes"><?php echo __("If the vendor doesn't exists, the program will create one") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Amount') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('expense_item_base') ?>
    <?php echo input_tag('expense_item_base', $sf_params->get('expense_item_base') ? $sf_params->get('expense_item_base') : $expense_item->getExpenseItemBase(), array ('size' => 7, 'class' => $sf_request->getError('expense_item_base') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
  <label><?php echo __('Tax (%)') ?></label>
      <?php echo input_tag('expense_item_tax_rate', $sf_params->get('expense_item_tax_rate') ? $sf_params->get('expense_item_tax_rate') : $expense_item->getExpenseItemTaxRate(), array ('size' => 7, 'class' => 'form-tiny-text')) ?>
  <label><?php echo __('IRPF') ?></label>
    <?php echo input_tag('expense_item_irpf', $sf_params->get('expense_item_irpf') ? $sf_params->get('expense_item_irpf') : $expense_item->getExpenseItemIrpf(), array ('size' => 7, 'class' => 'form-tiny-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Purchased') ?></label></td>
  <td class="rightCol">
      <label><?php echo __('Date') ?></label>
        <?php echo form_error('expense_purchase_date') ?>
        <?php echo input_date_tag('expense_purchase_date', $sf_params->get('expense_purchase_date') ? date('Y-d-m', strtotime($sf_params->get('expense_purchase_date'))) : $expense_item->getExpensePurchaseDate(), array (
            'rich' => true,
            'class' => $sf_request->getError('expense_purchase_date') ? 'form-date err' : 'form-date')) ?>
      <label><?php echo __('By') ?></label>
        <?php echo select_tag('expense_purchase_by', objects_for_select(
  sfGuardUserPeer::doSelect(new Criteria()),
  'getId',
  '__toString',
  $sf_params->get('expense_purchase_by') ? $sf_params->get('expense_purchase_by') : $expense_item->getExpensePurchaseBy()),  array('class' => 'form-medium-combobox')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Expense item comments') ?></label></td>
  <td class="rightCol"><?php echo textarea_tag('expense_item_comments', $sf_params->get('expense_item_comments') ? $sf_params->get('expense_item_comments') : $expense_item->getExpenseItemComments(), array ('size' => '30x3', 'class' => 'form-textarea')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Expense category') ?></label></td>
  <td class="rightCol">
  <?php echo select_tag('expense_item_category_id', objects_for_select(
  ExpenseCategoryPeer::doSelect(new Criteria()),
  'getId',
  '__toString',
  $sf_params->get('expense_item_category_id') ? $sf_params->get('expense_item_category_id') : $expense_item->getExpenseItemCategoryId(),
  'include_custom='.__('Select') . '...'),  array('class' => 'form-medium-combobox')) ?>
    <?php //echo link_to(__('Edit categories'), '/expense/editcategories') ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Expense item payment method') ?></label></td>
  <td class="rightCol"><?php echo select_tag('expense_item_payment_method_id', objects_for_select(
  PaymentMethodPeer::doSelect(new Criteria()),
  'getId',
  '__toString',
  $sf_params->get('expense_item_payment_method_id') ? $sf_params->get('expense_item_payment_method_id') : $expense_item->getExpenseItemPaymentMethodId(),
  'include_custom='.__('Select') . '...'),  array('class' => 'form-small-combobox')) ?>
    <?php echo input_tag('expense_item_payment_check', $sf_params->get('expense_item_payment_check') ? $sf_params->get('expense_item_payment_check') : $expense_item->getExpenseItemPaymentCheck(), array ('size' => 20, 'class' => 'form-small-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Reimbursement') ?></label></td>
  <td class="rightCol"><?php echo select_tag('expense_item_reimbursement_id', objects_for_select(
  ReimbursementPeer::doSelect(new Criteria()),
  'getId',
  '__toString',
  $sf_params->get('expense_item_reimbursement_id') ? $sf_params->get('expense_item_reimbursement_id') : $expense_item->getExpenseItemReimbursementId(),
  'include_custom='.__('Select') . '...'),  array('class' => 'form-small-combobox')) ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Associated project') ?></label></td>
  <td class="rightCol" id="projects">
      <?php if (isset($projects)) : ?>
  <?php echo select_tag('expense_item_project_id', objects_for_select($projects,
  'getId',
  '__toString',
  $sf_params->get('expense_item_project_id', $sf_params->get('project_id')) ? $sf_params->get('expense_item_project_id', $sf_params->get('project_id')) : $expense_item->getExpenseItemProjectId(),
  'include_custom='.__('Select project') . '...'),
  array ('class' => 'form-combobox')) ?>
<?php else : ?>
      <?php $pro = ($expense_item->getExpenseItemProjectId()) ? $expense_item->getProject()->__toString() : '' ?>
  <?php echo javascript_tag("
  function getProject(text, li){
      $('expense_item_project_id').value = li.id;
      new Ajax.Updater('budgets', '/project/getBudgetSelect', {asynchronous:true, evalScripts:false, parameters:'class=expense_item&project_id=' + li.id});
  }") ?>
  <?php echo input_hidden_tag('expense_item_project_id', ($expense_item->getExpenseItemProjectId()) ? $expense_item->getExpenseItemProjectId() : '') ?>
            <?php echo input_auto_complete_tag('project_name', ($sf_params->get('project_name') ? $sf_params->get('project_name') : $pro),
        'project/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""; $("expense_item_project_id").value = ""', 'onblur' => remote_function(array(
                   'update' => 'budgets',
                   'script' => true,
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=expense_item&project_id=' + $('expense_item_project_id').value"
                 ))),
        array('use_style'    => true,
            'after_update_element' => 'getProject')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any project") ?></span>
<?php endif ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Associated budget') ?></label></td>
    <td class="rightCol" id="budgets">
    <?php if (!isset($budgets)) : ?>
    <?php
    if ($sf_params->get('budget_id')) {
        $budget_id = $sf_params->get('budget_id');
        $bud = BudgetPeer::retrieveByPk($budget_id);
        if ($bud)
            $budget = $bud->getFullTitle();
    }
    if ($sf_params->get('expense_item_budget_id') || $sf_params->get('budget_name')) {
        $budget_id = $sf_params->get('expense_item_budget_id');
        if ($budget_id)
            $bud = BudgetPeer::retrieveByPk($budget_id);
        if (isset($bud) && $bud)
            $budget = $bud->getFullTitle();
        else
            $budget = $sf_params->get('budget_name');
    }
    if ($expense_item->getExpenseItemBudgetId()) {
        $budget_id = $expense_item->getExpenseItemBudgetId();
        $budget = $expense_item->getBudget()->getFullTitle();
    }
    if (!isset($budget) || !$budget) {
        $budget = __('Budget') . '...';
        $budget_id = -1;
    } ?>
  <?php echo javascript_tag("function getBudget(text, li){ $('expense_item_budget_id').value = li.id;}") ?>
  <?php echo input_hidden_tag('expense_item_budget_id', $budget_id) ?>
            <?php echo input_auto_complete_tag('budget_name', $budget,
        'budget/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
        array('use_style'    => true,
            'after_update_element' => 'getBudget')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any budget") ?></span>
    <?php else : ?>
          <?php echo select_tag('expense_item_budget_id', objects_for_select($budgets,
  'getId',
  'getFulltitle',
  (isset($budget_id)) ? $budget_id : $expense_item->getExpenseItemBudgetId(),
  'include_custom='.__('Select budget') . '...'),
  array ('class' => 'form-combobox')) ?>
    <?php endif?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Tags for this expense item') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $expense_item->getTags())),
        'tag/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text'),
        array('use_style'    => true, 'tokens' => ', ')
    ) ?><br/>
    <span class="notes"><?php echo __("If the tag doesn't exists, the program will create one") ?></span>
  </td>
</tr>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;"><?php echo submit_tag(__('Save expense'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

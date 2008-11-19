<?php use_helper('Object', 'Javascript') ?>
<?php if ($income_item->isNew()) {
    $title = __('Add new income');
} else {
    $title = __('Edit income %1%', array('%1%' => $income_item->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('income/update') ?>

<?php echo object_input_hidden_tag($income_item, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Income item name') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('income_item_name') ?>
    <?php echo object_input_tag($income_item, 'getIncomeItemName', array (
  'size' => 80, 'class' => $sf_request->getError('income_item_name') ? 'form-medium-text err' : 'form-medium-text')) ?>
    <label><?php echo __('Invoice') ?></label>
    <?php echo object_input_tag($income_item, 'getIncomeItemInvoiceNumber', array (
  'size' => 80, 'class' => 'form-small-text'
)) ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Income vendor') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('income_item_vendor_id') ?>
    <?php
    if ($sf_params->get('vendor_id')) {
        $vendor_id = $sf_params->get('vendor_id');
        $ven = VendorPeer::retrieveByPk($vendor_id);
        if ($ven)
            $vendor = $vendor->getFullName(false);
    }
    if ($sf_params->get('income_item_vendor_id') || $sf_params->get('vendor_name')) {
        $vendor_id = $sf_params->get('income_item_vendor_id');
        if ($vendor_id)
            $ven = VendorPeer::retrieveByPk($vendor_id);
        if (isset($ven) && $ven)
            $vendor = $ven->getFullName(false);
        else
            $vendor = $sf_params->get('vendor_name');
    }
    if ($income_item->getIncomeItemVendorId()) {
        $vendor_id = $income_item->getIncomeItemVendorId();
        $vendor = $income_item->getVendor()->getFullName(false);
    }
    if (!isset($vendor) || !$vendor) {
        $vendor = __('Vendor') . '...';
        $vendor_id = -1;
    } ?>
    <?php echo javascript_tag("function getVendor(text, li){ $('income_item_vendor_id').value = li.id; }") ?>
      <?php echo input_hidden_tag('income_item_vendor_id', $vendor_id) ?>
      <?php echo input_auto_complete_tag('vendor_name', $vendor,
                    'vendor/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
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
      <?php echo form_error('income_item_base') ?>
    <?php echo object_input_tag($income_item, 'getIncomeItemBase', array (
  'size' => 7, 'class' => 'form-tiny-text'
)) ?>
  <label><?php echo __('Tax (%)') ?></label>
    <?php echo object_input_tag($income_item, 'getIncomeItemTaxRate', array (
  'size' => 7, 'class' => 'form-tiny-text'
)) ?>
  <label><?php echo __('IRPF') ?></label>
    <?php echo object_input_tag($income_item, 'getIncomeItemIrpf', array (
  'size' => 7, 'class' => 'form-tiny-text'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Income date') ?></label></td>
  <td class="rightCol"><?php echo object_input_date_tag($income_item, 'getIncomeDate', array (
  'rich' => true,
  'class' => 'form-date'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Income item comments') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($income_item, 'getIncomeItemComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Income category') ?></label></td>
  <td class="rightCol">
  <?php echo object_select_tag($income_item, 'getIncomeItemCategoryId', array (
  'related_class' => 'IncomeCategory',
  'include_custom' => __('Select...'),
  'class' => 'form-medium-combobox'
)) ?>
    <?php //echo link_to(__('Edit categories'), '/income/editcategories') ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Income item payment method') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($income_item, 'getIncomeItemPaymentMethodId', array (
  'related_class' => 'PaymentMethod',
  'include_custom' => __('Select...'),
  'class' => 'form-small-combobox'
)) ?>
    <?php echo object_input_tag($income_item, 'getIncomeItemPaymentCheck', array (
  'size' => 20, 'class' => 'form-small-text'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Reimbursement') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($income_item, 'getIncomeItemReimbursementId', array (
  'related_class' => 'Reimbursement',
  'include_custom' => _('Select...'),
  'class' => 'form-small-combobox'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Associated project') ?></label></td>
  <td class="rightCol" id="projects">
    <?php $pro = ($income_item->getIncomeItemProjectId()) ? $income_item->getProject() : '';
    $pro = (!$pro && $sf_params->get('project_id')) ? ProjectPeer::retrieveByPk($sf_params->get('project_id')) : __('Project') . '...' ?>
  <?php echo javascript_tag("
  function getProject(text, li){
      $('income_item_project_id').value = li.id;
      new Ajax.Updater('budgets', '/project/getBudgetSelect', {asynchronous:true, evalScripts:false, parameters:'class=income_item&project_id=' + li.id});
  }") ?>
  <?php echo input_hidden_tag('income_item_project_id', ($income_item->getIncomeItemProjectId()) ? $income_item->getIncomeItemProjectId() : $sf_params->get('income_item_project_id', $sf_params->get('project_id'))) ?>
            <?php echo input_auto_complete_tag('project_name', ($sf_params->get('project_name') ? $sf_params->get('project_name') : $pro),
        'project/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""; $("income_item_project_id").value = ""', 'onblur' => remote_function(array(
                   'update' => 'budgets',
                   'script' => true,
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=income_item&project_id=' + $('income_item_project_id').value"
                 ))),
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
            <?php $bud = ($income_item->getIncomeItemBudgetId()) ? $income_item->getBudget()->getFullTitle() : '' ?>
  <?php echo javascript_tag("
  function getBudget(text, li){
      $('income_item_budget_id').value = li.id;
  }") ?>
  <?php echo input_hidden_tag('income_item_budget_id', ($income_item->getIncomeItemBudgetId()) ? $income_item->getIncomeItemBudgetId() : '') ?>
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
  <td class="leftCol"><label><?php echo __('Tags for this income') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $income_item->getTags())),
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
        <td style="padding-top:5px;"><?php echo submit_tag(__('Save income'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

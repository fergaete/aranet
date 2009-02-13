<?php use_helper('Object', 'Javascript') ?>
<?php if ($invoice->isNew()) {
    $title = __('Add new invoice');
} else {
    $title = __('Edit invoice %1%', array('%1%' => $invoice->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('invoice/update') ?>

<?php echo object_input_hidden_tag($invoice, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Invoice title or name') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('invoice_title') ? form_error('invoice_title') : '' ?>
    <?php echo input_tag('invoice_title', $sf_params->get('invoice_title') ? $sf_params->get('invoice_title') : $invoice->getInvoiceTitle(), array (
  'size' => 80, 'class' => $sf_request->getError('invoice_title') ? 'form-text err' : 'form-text'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Invoice identifier') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('invoice_number') ? form_error('invoice_number') : '' ?>
    <?php echo form_error('invoice_date') ? form_error('invoice_date') : '' ?>
    <label><?php echo __('Prefix') ?></label>
    <?php echo input_tag('invoice_prefix', $sf_params->get('invoice_prefix') ? $sf_params->get('invoice_prefix') : $invoice->getInvoicePrefix(), array ('size' => 20, 'class' => 'form-tiny-text')) ?>
    <label><?php echo __('No.') ?></label>
    <?php echo input_tag('invoice_number', $sf_params->get('invoice_number') ? $sf_params->get('invoice_number') : $invoice->getInvoiceNumber(), array ('size' => 7, 'class' =>
     $sf_request->getError('invoice_number') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
    <label><?php echo __('Date') ?></label>
    <?php echo input_date_tag('invoice_date', $sf_params->get('invoice_date') ? $sf_params->get('invoice_date') : $invoice->getInvoiceDate(), array ('rich' => true, 'class' => $sf_request->getError('invoice_date') ? 'form-date err' : 'form-date')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Client') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('client_name') ?>
    <?php
    if ($sf_params->get('client_id')) {
        $client_id = $sf_params->get('client_id');
        $cli = ClientPeer::retrieveByPk($client_id);
        if ($cli)
            $client = $cli->getFullName(false);
    }
    if ($sf_params->get('invoice_client_id') || $sf_params->get('client_name')) {
        $client_id = $sf_params->get('invoice_client_id');
        if ($client_id)
            $cli = ClientPeer::retrieveByPk($client_id);
        if (isset($cli) && $cli)
            $client = $cli->getFullName(false);
        else 
            $client = $sf_params->get('client_name');
    }
    if ($invoice->getInvoiceClientId()) {
        $client_id = $invoice->getInvoiceClientId();
        $client = $invoice->getClient()->getFullName(false);
    }
    if (!isset($client) || !$client) {
        $client = __('Client') . '...';
        $client_id = -1;
    } ?>
  <?php echo javascript_tag("function getClient(text, li){ $('invoice_client_id').value = li.id; }") ?>
  <?php echo input_hidden_tag('invoice_client_id', $client_id) ?>
  <?php echo input_auto_complete_tag('client_name', $client,
                    'client/autocomplete',
                    array('autocomplete' => 'off', 'class' => $sf_request->getError('client_name') ? 'form-text err' : 'form-text', 'onclick' => 'this.value=""'),
                    array('use_style'    => true,
                        'after_update_element' => 'getClient')
                    ) ?><br/>
    <span class="notes"><?php echo __("If the client doesn't exists, the program will create one") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project') ?></label></td>
  <td class="rightCol" id="projects">
    <?php
    if ($sf_params->get('project_id')) {
        $project_id = $sf_params->get('project_id');
        $pro = ProjectPeer::retrieveByPk($project_id);
        if ($pro)
            $project = $pro->__toString();
    }
    if ($sf_params->get('invoice_project_id') || $sf_params->get('project_name')) {
        $project_id = $sf_params->get('invoice_project_id');
        if ($project_id)
            $pro = ProjectPeer::retrieveByPk($project_id);
        if (isset($pro) && $pro)
            $project = $pro->__toString();
        else 
            $project = $sf_params->get('project_name');
    }
    if ($invoice->getInvoiceProjectId()) {
        $project_id = $invoice->getInvoiceProjectId();
        $project = $invoice->getProject()->__toString();
    }
    if (!isset($project) || !$project) {
        $project = __('Project') . '...';
        $project_id = -1;
    } ?>
  <?php echo javascript_tag("
  function getProject(text, li){
      $('invoice_project_id').value = li.id;
      new Ajax.Updater('budgets', '/project/getBudgetSelect', {asynchronous:true, evalScripts:false, parameters:'class=invoice&project_id=' + li.id});
      ".remote_function(array(
                   'update' => 'budgets',
                   'script' => true,
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=invoice&project_id=' + $('invoice_project_id').value"
                 ))."
  }") ?>
<?php if (isset($projects)) : ?>
  <?php echo select_tag('invoice_project_id', objects_for_select($projects,
  'getId',
  '__toString',
  $project_id, 
  'include_custom='.__('Select project') . '...'),
  array ('class' => 'form-combobox',
    'onchange' => remote_function(array(
                   'update' => 'budgets',
                   'script' => true,
                   'url' => 'project/getBudgetSelect',
                   'with' => "'class=invoice&project_id=' + $('invoice_project_id').value"
                 )) 
  )) ?>
<?php else : ?>   
    <?php echo input_hidden_tag('invoice_project_id', $project_id) ?>
            <?php echo input_auto_complete_tag('project_name', $project,
        'project/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""; $("invoice_project_id").value = ""'),
        array('use_style'    => true,
            'after_update_element' => 'getProject')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any project") ?></span>
<?php endif ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget') ?></label></td>
      <td class="rightCol" id="budgets">
        <?php echo form_error('invoice_budget_id') ?>
        <?php $bud = ($invoice->getInvoiceBudgetId()) ? $invoice->getBudget()->getFullTitle() : __('Budget').'...' ?>
            <?php if (isset($budgets) && $budgets) : ?>
<?php echo select_tag('invoice_budget_id', objects_for_select($budgets,
  'getId',
  'getFulltitle',
  $invoice->getInvoiceBudgetId(), 
  'include_custom='.__('Select budget') . '...'),
  array ('class' => 'form-combobox')) ?>
            <?php else : ?>
  <?php echo javascript_tag("
  function getBudget(text, li){
      $('invoice_budget_id').value = li.id;
  }") ?>
  <?php echo input_hidden_tag('invoice_budget_id', ($invoice->getInvoiceBudgetId()) ? $invoice->getInvoiceBudgetId() : '') ?>              
            <?php echo input_auto_complete_tag('budget_name', ($sf_params->get('budget_name') ? $sf_params->get('budget_name') : $bud),
        'budget/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
        array('use_style'    => true,
            'after_update_element' => 'getBudget')
    ) ?>
    <?php endif ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any budget") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Kind of invoice') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($invoice, 'getInvoiceKindOfInvoiceId', array (
  'related_class' => 'KindOfInvoice',
  'class' => 'form-medium-combobox'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Invoice category') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($invoice, 'getInvoiceCategoryId', array (
  'related_class' => 'InvoiceCategory',
  'include_custom' => __('Select').'...',
  'class' => 'form-medium-combobox'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Comments about this invoice') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($invoice, 'getInvoiceComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Print comments on invoice') ?></label></td>
  <td class="rightCol"><?php echo object_checkbox_tag($invoice, 'getInvoicePrintComments', array (
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"></td>
  <td class="rightCol">
  <table cellpadding="0" cellspacing="0" style="border: none;">
            <tr>
                <td style="text-align: left; border: none;"><label><?php echo __('Tax rate (%)') ?></label><br />
                <?php echo object_input_tag($invoice, 'getInvoiceTaxRate', array (
  'size' => 7, 'class' => "form-tiny-text", 'onFocus' => "this.value=''")) ?></td>
                <td style="text-align: left; border: none;"><label><?php echo __('Freight charge') ?></label><br />
                <?php echo object_input_tag($invoice, 'getInvoiceFreightCharge', array (
  'size' => 7, "class" => "form-tiny-text", 'onFocus' => "this.value=''"
)) ?></td>
            </tr>
            <tr>
                <td style="text-align: left; border: none;"><label><?php echo __('Payment due') ?></label><br />
                    <?php echo object_select_tag($invoice, 'getInvoicePaymentConditionId', array (
                        'related_class' => 'PaymentCondition',
                        'include_custom' => __('Select') . '...',
                        'class' => 'form-small-combobox'
                    )) ?>
                </td>
                <td style="text-align: left; border: none;"><label><?php echo __('Late fee (%)') ?></label><br />
                    <?php echo object_input_tag($invoice, 'getInvoiceLateFeePercent', array (
                        'size' => 7, "class" => "form-tiny-text", 'onFocus' => "this.value=''"
                    )) ?>
                </td>
            </tr>
            </table>
    </td>
</tr>
<?php $i = 0; $contacts = $invoice->getContacts() ?>
<?php if ($contacts) : ?><?php foreach ($contacts as $contact) : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $i, 'class' => 'Invoice', 'oid' => $invoice->getId())) ?>
</tr>
<?php $i++; ?>
<?php endforeach; else : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => new Contact(), 'index' => $i, 'class' => 'Invoice', 'oid' => $invoice->getId())) ?>
</tr>
<?php endif ?>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>

<?php $i = 0; if($invoice->getDefaultContact() && $invoice->getDefaultContact()->getAddress()) : ?>
<?php foreach ($invoice->getDefaultContact()->getAddress() as $address) : ?>
<tr id="address_<?php echo $i ?>">
<?php include_partial('address/edit', array('address' => $address, 'index' => $i, 'class' => 'Invoice', 'oid' => $invoice->getId(), 'more' => false)) ?>
</tr>
<?php $i++; endforeach ?>
<?php else : ?>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'newAddress',
    'position' => 'before',
    'script' => 'true',
    'url'     => 'address/create?index=' . ($i-1),
  ))
) ?>
<?php endif ?>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Payment') ?></label></td>
  <td class="rightCol">
  <table cellpadding="0" cellspacing="0" style="border: none;">
            <tr>
                <td style="text-align: left; border: none;"><label><?php echo __('Status') ?></label>
                    <?php echo select_tag('invoice_payment_status_id', objects_for_select(PaymentStatusPeer::doSelect(new Criteria()),
                        'getId',
                        '__toString',
                        ($sf_params->get('invoice_payment_status_id') ? $sf_params->get('invoice_payment_status_id') : $invoice->getInvoicePaymentStatusId())),
                        array ('class' => 'form-small-combobox')) ?>
                </td>
                <td style="text-align: left; border: none;"><label><?php echo __('Date') ?></label>
                    <?php echo object_input_date_tag($invoice, 'getInvoicePaymentDate', array (
                        'rich' => true,
                        'class' => 'form-date'
                        )) ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: left; border: none;"><label><?php echo __('Method') ?></label>
                    <?php echo select_tag('invoice_payment_method_id', objects_for_select(PaymentMethodPeer::doSelect(new Criteria()),
                        'getId',
                        '__toString',
                        ($sf_params->get('invoice_payment_method_id') ? $sf_params->get('invoice_payment_method_id') : $invoice->getInvoicePaymentMethodId()), 'include_blank=true'),
                        array ('class' => 'form-small-combobox')) ?></td>
                <td style="text-align: left; border: none;"><label><?php echo __('Number') ?></label>
                    <?php echo object_input_tag($invoice, 'getInvoicePaymentCheck', array (
                        'size' => 64, "class" => "form-small-text")) ?>
                </td>
            </tr>
  </table>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Tags for this invoice') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $invoice->getTags())),
        'tag/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text'),
        array('use_style'    => true, 'tokens' => ', ')
    ) ?><br/>
    <span class="notes"><?php echo __("If the tag doesn't exists, the program will create one") ?></span>
  </td>
</tr>
</tbody>
</table>

    <div class="headerInvoiceItems"><?php echo __('Invoice items') ?></div>
<div id="invoiceViewItems" class="windowFrame" style="margin-top: 10px;">
    <div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <?php include_partial('invoice_item', array('invoice_items' => $invoice->getInvoiceItems(), 'invoice' => $invoice)) ?>
</div>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;"><?php echo submit_tag(__('Save invoice'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

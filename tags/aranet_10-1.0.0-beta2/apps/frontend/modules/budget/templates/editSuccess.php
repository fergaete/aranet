<?php use_helper('Object', 'Javascript') ?>
<?php if ($budget->isNew()) {
    $title = __('Add new budget');
} else {
    $title = __('Edit budget %1%', array('%1%' => $budget->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('budget/update') ?>

<?php echo object_input_hidden_tag($budget, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget title or name') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($budget, 'getBudgetTitle', array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget identifier') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('budget_number') . form_error('budget_revision') ?>
    <label><?php echo __('Prefix') ?></label>
    <?php echo object_input_tag($budget, 'getBudgetPrefix', array ('size' => 8, 'class' => 'form-tiny-text')) ?>
    <label class="required"><?php echo __('No.') ?></label>
    <?php echo object_input_tag($budget, 'getBudgetNumber', array ('size' => 11, 'class' => $sf_request->getError('budget_number') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
    <label class="required"><?php echo __('Revision') ?></label>
    <?php echo object_input_tag($budget, 'getBudgetRevision', array ('size' => 7, 'class' => $sf_request->getError('budget_revision') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><label><?php echo __('Budget dates') ?></label></label></td>
  <td class="rightCol">
      <?php echo form_error('budget_date') ? form_error('budget_date') : '' ?>
      <?php echo form_error('budget_valid_date') ? form_error('budget_valid_date') : '' ?>
    <label class="required"><?php echo __('Date') ?></label>
    <?php echo object_input_date_tag($budget, 'getBudgetDate', array ('rich' => true, 'class' => $sf_request->getError('budget_date') ? 'form-date err' : 'form-date')) ?>
    <label class="required"><?php echo __('Valid till') ?></label>
    <?php echo object_input_date_tag($budget, 'getBudgetValidDate', array ('rich' => true, 'class' => $sf_request->getError('budget_valid_date') ? 'form-date err' : 'form-date')) ?>
  </td>
 </tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget client') ?></label></td>
  <td class="rightCol">
    <?php
    if ($sf_params->get('client_id')) {
        $client_id = $sf_params->get('client_id');
        $cli = ClientPeer::retrieveByPk($client_id);
        if ($cli)
            $client = $cli->getFullName(false);
    }
    if ($sf_params->get('budget_client_id') || $sf_params->get('client_name')) {
        $client_id = $sf_params->get('budget_client_id');
        if ($client_id)
            $cli = ClientPeer::retrieveByPk($client_id);
        if (isset($cli) && $cli)
            $client = $cli->getFullName(false);
        else
            $client = $sf_params->get('client_name');
    }
    if ($budget->getBudgetClientId()) {
        $client_id = $budget->getBudgetClientId();
        $client = $budget->getClient()->getFullName(false);
    }
    if (!isset($client) || !$client) {
        $client = __('Client') . '...';
        $client_id = -1;
    } ?>
  <?php echo javascript_tag("function getClient(text, li){ $('budget_client_id').value = li.id; }") ?>
  <?php echo input_hidden_tag('budget_client_id', $client_id) ?>
  <?php echo input_auto_complete_tag('client_name', $client,
                    'client/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
                    array('use_style'    => true,
                        'after_update_element' => 'getClient')
                    ) ?><br/>
    <span class="notes"><?php echo __("If the client doesn't exists, the program will create one") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget project') ?></label></td>
  <td class="rightCol" id="projects">
    <?php
    if ($sf_params->get('project_id')) {
        $project_id = $sf_params->get('project_id');
        $pro = ProjectPeer::retrieveByPk($project_id);
        if ($pro)
            $project = $pro->__toString();
    }
    if ($sf_params->get('budget_project_id') || $sf_params->get('project_name')) {
        $project_id = $sf_params->get('budget_project_id');
        if ($project_id)
            $pro = ProjectPeer::retrieveByPk($project_id);
        if (isset($pro) && $pro)
            $project = $pro->__toString();
        else 
            $project = $sf_params->get('project_name');
    }
    if ($budget->getBudgetProjectId()) {
        $project_id = $budget->getBudgetProjectId();
        $project = $budget->getProject()->__toString();
    }
    if (!isset($project) || !$project) {
        $project = __('Project') . '...';
        $project_id = -1;
    } ?>
  <?php echo javascript_tag("function getProject(text, li){ $('budget_project_id').value = li.id; }") ?>
  <?php echo input_hidden_tag('budget_project_id', $project_id) ?>
  <?php echo input_auto_complete_tag('project_name', $project,
                    'project/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
                    array('use_style'    => true,
                        'after_update_element' => 'getProject')
                    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any project") ?></span>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget category') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($budget, 'getBudgetCategoryId', array (
  'related_class' => 'InvoiceCategory',
  'include_custom' => __('Select').'...',
  'class' => 'form-medium-combobox'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget comments') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($budget, 'getBudgetComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Budget print comments') ?></label></td>
  <td class="rightCol"><?php echo object_checkbox_tag($budget, 'getBudgetPrintComments', array (
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"></td>
  <td class="rightCol">
  <table cellpadding="0" cellspacing="0" style="border: none;">
            <tr>
                <td style="text-align: left; border: none;"><label><?php echo __('Tax rate (%)') ?></label><br />
                <?php echo object_input_tag($budget, 'getBudgetTaxRate', array (
  'size' => 7, 'class' => "form-tiny-text", 'onFocus' => "this.value=''")) ?></td>
                <td style="text-align: left; border: none;"><label><?php echo __('Freight charge') ?></label><br />
                <?php echo object_input_tag($budget, 'getBudgetFreightCharge', array (
  'size' => 7, "class" => "form-tiny-text", 'onFocus' => "this.value=''"
)) ?></td>
                <td style="text-align: left; border: none;"><label><?php echo __('Payment due') ?></label><br />
                    <?php echo object_select_tag($budget, 'getBudgetPaymentConditionId', array (
                        'related_class' => 'PaymentCondition',
                        'include_custom' => __('Select') . '...',
                        'class' => 'form-small-combobox'
                    )) ?>
                </td>
                <td style="text-align: left; border: none;"></td>
            </tr>
            </table>
    </td>
</tr>

<?php $i = 0; $contacts = $budget->getContacts() ?>
<?php if ($contacts) : ?><?php foreach ($contacts as $contact) : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $i, 'class' => 'Budget', 'oid' => $budget->getId())) ?>
</tr>
<?php $i++; ?>
<?php endforeach; else : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => new Contact(), 'index' => $i, 'class' => 'Budget', 'oid' => $budget->getId())) ?>
</tr>
<?php $sf_user->setAttribute('index', $i) ?>
<?php endif ?>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Status') ?></label></td>
  <td class="rightCol">
    <?php echo select_tag('budget_status_id', objects_for_select(BudgetStatusPeer::doSelect(new Criteria()),
                        'getId',
                        '__toString',
                        ($sf_params->get('budget_status_id') ? $sf_params->get('budget_status_id') : $budget->getBudgetStatusId())),
                        array ('class' => 'form-small-combobox')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Tags for this budget') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $budget->getTags())),
        'tag/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text'),
        array('use_style'    => true, 'tokens' => ', ')
    ) ?><br/>
    <span class="notes"><?php echo __("If the tag doesn't exists, the program will create one") ?></span>
  </td>
</tr>
</tbody>
</table>

<div class="headerBudgetItems"><?php echo __('Budget Items') ?></div>
<div id="budgetViewItems" class="windowFrame" style="margin-top: 10px;">
    <div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <?php include_partial('budget_item', array('budget_items' => $budget->getBudgetItems(), 'budget' => $budget)) ?>
</div>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
            <?php echo submit_tag(__('Save budget'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

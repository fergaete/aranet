<?php use_helper('Javascript') ?>
<?php if ($cash_item->isNew()) {
    $title = __('Add new cash movement');
} else {
    $title = __('Edit cash movement %1%', array('%1%' => $cash_item->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('cash/update') ?>

<?php echo input_hidden_tag('id', $cash_item->getId()) ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Name') ?></label></td>
  <td class="rightCol">
  <?php echo form_error('cash_item_name') ?>
  <?php echo input_tag('cash_item_name', $sf_params->get('cash_item_name') ? $sf_params->get('cash_item_name') : $cash_item->getCashItemName(), array ('size' => 80, 'class' => $sf_request->getError('cash_item_name') ? 'form-text err' : 'form-text')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Date') ?></label></td>
  <td class="rightCol">
  <?php echo form_error('cash_item_date') ?>
  <?php echo form_error('cash_item_amount') ?>
  <?php echo input_date_tag('cash_item_date', $sf_params->get('cash_item_date') ? $sf_params->get('cash_item_date') : $cash_item->getCashItemDate(), array ('rich' => true, 'class' => $sf_request->getError('cash_item_date') ? 'form-date err' : 'form-date')) ?>
    <label class="required"><?php echo __('Amount') ?></label>
    <?php echo input_tag('cash_item_amount', $sf_params->get('cash_item_amount') ? $sf_params->get('cash_item_amount') : $cash_item->getCashItemAmount(), array (
    'size' => 7, 'class' => $sf_request->getError('cash_item_amount') ? 'form-small-text err' : 'form-small-text'
)) ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Comments') ?></label></td>
  <td class="rightCol"><?php echo textarea_tag('cash_item_comments', $sf_params->get('cash_item_comments') ? $sf_params->get('cash_item_comments') :  $cash_item->getCashItemComments(), array ('size' => '30x3', 'class' => 'form-textarea')) ?></td>
</tr>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
        <?php echo submit_tag(__('Save cash movement'), 'id="submit_btn" class="btn big green"') ?>
        <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

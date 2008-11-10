<?php use_helper('Object', 'Javascript') ?>
<?php if ($sf_setting->isNew()) {
    $title = __('Add new setting');
} else {
    $title = __('Edit setting %1%', array('%1%' => $sf_setting->getName()));
} ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . $title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('setting/update') ?>

<?php echo object_input_hidden_tag($sf_setting, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Name') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('name') ?>
      <?php echo input_tag('name', (!$sf_params->get('name')) ? $sf_setting->getName() : $sf_params->get('name'), array("size" => "128", "class" => "form-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Environment') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('env') ?>
      <?php echo input_tag('env', (!$sf_params->get('env')) ? $sf_setting->getEnv() : $sf_params->get('env'), array("size" => "30", "class" => "form-medium-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Value') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('value') ?>
      <?php echo input_tag('value', (!$sf_params->get('value')) ? $sf_setting->getValue() : $sf_params->get('value'), array("size" => "200", "class" => "form-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Description') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('description') ?>
    <?php echo object_input_tag($sf_setting, 'getDescription', array ('size' => 80, 'class' => 'form-text')) ?>
  </td>
</tr>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
            <?php echo submit_tag(__('Save setting'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

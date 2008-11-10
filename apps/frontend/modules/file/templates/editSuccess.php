<?php use_helper('Javascript') ?>
<?php if ($sf_propel_file_storage_info->isNew()) {
    $title = __('Add new file');
} else {
    $title = __('Edit file %1%', array('%1%' => $sf_propel_file_storage_info->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('file/update', array('multipart' => true)) ?>

<?php echo input_hidden_tag('file_id', $sf_propel_file_storage_info->getFileId()) ?>
<?php echo input_hidden_tag('class', $sf_params->get('class')) ?>
<?php echo input_hidden_tag('object_id', $sf_params->get('object_id')) ?>
<?php echo (isset($referer) || $sf_params->get('referer')) ? input_hidden_tag('referer', $sf_params->get('referer') ? $sf_params->get('referer') : $referer) : '' ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('File title') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('file_title') ?>
      <?php echo input_tag('file_title', $sf_params->get('file_title') ? $sf_params->get('file_title') : $sf_propel_file_storage_info->getFileTitle(), array ('size' => 80, 'class' => $sf_request->getError('file_title') ? 'form-text err' : 'form-text')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Upload a File') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('uploaded_file') ?>
      <?php echo input_file_tag('uploaded_file', array ('size' => 50, 'class' => $sf_request->getError('uploaded_file') ? 'form-text err' : 'form-text')) ?></td>
</tr>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
            <?php echo submit_tag(__('Save file'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

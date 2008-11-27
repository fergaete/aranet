<?php use_helper('Object', 'Javascript') ?>
<?php if ($project->isNew()) {
    $title = __('Add new project');
} else {
    $title = __('Edit project %1%', array('%1%' => $project->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('project/update') ?>

<?php echo object_input_hidden_tag($project, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Select client') ?></label></td>
  <td class="rightCol">
  <?php echo form_error('client_name') ?>
  <?php
  if ($sf_params->get('client_id')) {
      $client_id = $sf_params->get('client_id');
      $cli = ClientPeer::retrieveByPk($client_id);
      if ($cli)
          $client = $cli->getFullName(false);
  }
  if ($sf_params->get('project_client_id') || $sf_params->get('client_name')) {
      $client_id = $sf_params->get('project_client_id');
      if ($client_id)
          $cli = ClientPeer::retrieveByPk($client_id);
      if (isset($cli) && $cli)
          $client = $cli->getFullName(false);
      else
          $client = $sf_params->get('client_name');
  }
  if ($project->getProjectClientId()) {
      $client_id = $project->getProjectClientId();
      $client = $project->getClient()->getFullName(false);
  }
  if (!isset($client) || !$client) {
      $client = __('Client') . '...';
      $client_id = -1;
  } ?>
  <?php echo javascript_tag("function getClient(text, li){ $('project_client_id').value = li.id; }") ?>
  <?php echo input_hidden_tag('project_client_id', $client_id) ?>
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
  <td class="leftCol"><label><?php echo __('Project number') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('project_number') ?>
      <label><?php echo __('Prefix') ?></label>
      <?php echo object_input_tag($project, 'getProjectPrefix', array (
  'size' => 20, 'class' => 'form-tiny-text')) ?>
    <label class="required"><?php echo __('Number') ?></label>
    <?php echo object_input_tag($project, 'getProjectNumber', array ('size' => 7, 'class' => $sf_request->getError('project_number') ? 'form-tiny-text err' : 'form-tiny-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Project name or title') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('project_name') ?>
    <?php echo object_input_tag($project, 'getProjectName', array ('size' => 80, 'class' => $sf_request->getError('project_name') ? 'form-text err' : 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project URL') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($project, 'getProjectUrl', array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Comments about this project') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($project, 'getProjectComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project category') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($project, 'getProjectCategoryId', array (
  'related_class' => 'ProjectCategory',
  'class' => 'form-combobox'
)) ?>
    <?php //echo link_to(__('Edit categories'), '/project/editcategories') ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project date range') ?></label></td>
  <td class="rightCol">
    <label><?php echo __('From') ?></label>
    <?php echo object_input_date_tag($project, 'getProjectStartDate', array (
  'rich' => true,
  'class' => "form-date"
)) ?>
    <label><?php echo __('To') ?></label>
    <?php echo object_input_date_tag($project, 'getProjectFinishDate', array (
  'rich' => true,
  'class' => "form-date"
)) ?>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Project status') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($project, 'getProjectStatusId', array('related_class' => 'ProjectStatus', 'include_custom' => 'Select...', 'name' => 'project_status_id', 'class' => 'form-small-combo')) ?>
</td>
</tr>
<?php $i = 0; $contacts = $project->getContacts() ?>
<?php if ($contacts) : ?><?php foreach ($contacts as $contact) : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $i, 'class' => 'Project', 'oid' => $project->getId())) ?>
</tr>
<?php $i++; ?>
<?php endforeach; else : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => new Contact(), 'index' => $i, 'class' => 'Project', 'oid' => $project->getId())) ?>
</tr>
<?php $sf_user->setAttribute('index', $i) ?>
<?php endif ?>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Tags for this project') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $project->getTags())),
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
        <td style="padding-top:5px;"><?php echo submit_tag(__('Save project'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

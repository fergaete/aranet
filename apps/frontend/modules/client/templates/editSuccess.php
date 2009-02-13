<?php use_helper('Object', 'Javascript') ?>
<?php if ($client->isNew()) {
    $title = __('Add new client');
} else {
    $title = __('Edit client %1%', array('%1%' => $client->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('client/update') ?>

<?php echo object_input_hidden_tag($client, 'getId') ?>
<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Client common name') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('client_unique_name') ?>
      <?php echo object_input_tag($client, 'getClientUniqueName', array ('size' => 80, 'class' => $sf_request->getError('client_unique_name') ? 'form-text err' : 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Company name') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('client_company_name') ?>
      <?php echo object_input_tag($client, 'getClientCompanyName', array ('size' => 80, 'class' => $sf_request->getError('client_company_name') ? 'form-text err' : 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('CIF') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($client, 'getClientCif', array ('size' => 20, 'class' => 'form-small-text')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Industry or Business type') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($client, 'getClientKindOfCompanyId', array('related_class' => 'KindOfCompany', 'include_custom' => 'Select...', 'name' => 'client_kind_of_company_id', 'class' => 'form-medium-combobox')) ?>
  <?php echo link_to_remote(image_tag('buttonEditLarge.gif', 'alt="'.__('Edit business types').'"'), array(
        'update'   => 'businessDisplay',
        'url'      => 'client/editbusiness',
        'loading'  => visual_effect('appear', 'indicator-business'),
        'complete' => visual_effect('fade', 'indicator-business').
                      visual_effect('highlight', 'businessDisplay'),))  ?>
  <div id="indicator-business" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
  <div id="businessDisplay" class="popUpDiv" style="text-align: left;"></div>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Client since') ?></label></td>
  <td class="rightCol"><?php echo object_input_date_tag($client, 'getClientSince', array ('rich' => true, 'class' => 'form-date')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Client website') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('client_website') ?>
      <?php echo object_input_tag($client, 'getClientWebsite', array ('size' => 80, 'class' => $sf_request->getError('client_website') ? 'form-text err' : 'form-text')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Client comments') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($client, 'getClientComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Client contact person') ?></label></td>
  <td class="rightCol">
    <?php echo input_auto_complete_tag('contact[0][name]', $client->getContact(),
        'contact/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-medium-text'),
        array('use_style'    => true)
    ) ?>
    <label><?php echo __('Rol') ?></label>
    <?php $rol = ($client->getContact()) ? $client->getContact()->getContactRol() : '' ?>
    <?php echo input_tag('contact[0][rol]', ($sf_params->get('contact[0][rol]') ? $sf_params->get('contact[0][rol]') : $rol), 'class=form-small-text') ?>
  </td>
</tr>
<?php $i = 1; $contacts = $client->getContacts(); if (count($contacts) >1) : ?>
<?php foreach ($contacts as $contact) : ?>
<?php if ($client->getContact() && $contact->getId() != $client->getContact()->getId()) : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $i, 'class' => 'Client', 'oid' => $client->getId())) ?>
</tr>
<?php $i++; endif ?>
<?php endforeach ?>
<?php else : ?>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'newContact',
    'position' => 'before',
    'script' => 'true',
    'url'     => 'contact/minicreate?index=' . ($i-1),
  ))
) ?>
<?php endif ?>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<?php $i = 0; if($client->getAddresses()) : ?>
<?php foreach ($client->getAddresses() as $address) : ?>
<tr id="address_<?php echo $i ?>">
<?php include_partial('address/edit', array('address' => $address, 'index' => $i, 'class' => 'Client', 'oid' => $client->getId())) ?>
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
<tr id="newAddress">
    <td colspan="3" id="indicator-address" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Tags for this client') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $client->getTags())),
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
        <td style="padding-top:5px;">
        <?php echo submit_tag(__('Save client'), 'id="submit_btn" class="btn big green"') ?>
        <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

<?php use_helper('Object', 'Javascript') ?>
<?php if ($vendor->isNew()) {
    $title = __('Add new vendor');
} else {
    $title = __('Edit vendor %1%', array('%1%' => $vendor));
} ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . $title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('vendor/update') ?>

<?php echo object_input_hidden_tag($vendor, 'getId') ?>

<table class="gridTable" width="100%">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Vendor common name') ?></label></td>
  <td class="rightCol">
        <?php echo form_error('vendor_unique_name') ?>
        <?php echo object_input_tag($vendor, 'getVendorUniqueName', array ('size' => 80, 'class' => $sf_request->getError('vendor_unique_name') ? 'form-text err' : 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Company name') ?></label></td>
  <td class="rightCol">
        <?php echo form_error('vendor_company_name') ?>
        <?php echo object_input_tag($vendor, 'getVendorCompanyName', array ('size' => 80, 'class' => $sf_request->getError('vendor_company_name') ? 'form-text err' : 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('CIF') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($vendor, 'getVendorCif', array (
  'size' => 20, 'class' => 'form-small-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Industry or Business Type') ?></label></td>
  <td class="rightCol"><?php echo object_select_tag($vendor, 'getVendorKindOfCompanyId', array('related_class' => 'KindOfCompany', 'include_custom' => 'Select...', 'class' => 'form-medium-combobox')) ?>
  <?php echo link_to_remote(image_tag('buttonEditLarge.gif', 'alt="'.__('Edit business types').'"'), array(
        'update'   => 'businessDisplay',
        'url'      => 'vendor/editbusiness',
        'loading'  => visual_effect('appear', 'indicator-business'),
        'complete' => visual_effect('fade', 'indicator-business').
                      visual_effect('highlight', 'businessDisplay'),))  ?>
  <div id="indicator-business" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
  <div id="businessDisplay" class="popUpDiv" style="text-align: left;"></div>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Vendor since') ?></label></td>
  <td class="rightCol"><?php echo object_input_date_tag($vendor, 'getVendorSince', array (
  'rich' => true, 'class' => 'form-date'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Vendor website') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($vendor, 'getVendorWebsite', array (
  'size' => 80, 'class' => 'form-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Vendor comments') ?></label></td>
  <td class="rightCol"><?php echo object_textarea_tag($vendor, 'getVendorComments', array (
  'size' => '30x3', 'class' => 'form-textarea'
)) ?></td>
</tr>
<?php $i = 0; $contacts = $vendor->getContacts() ?>
<?php if ($contacts) : ?><?php foreach ($contacts as $contact) : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $i, 'class' => 'Vendor', 'oid' => $vendor->getId())) ?>
</tr>
<?php $i++; ?>
<?php endforeach; else : ?>
<tr id="contact_<?php echo $i ?>">
<?php include_partial('contact/edit', array('contact' => new Contact(), 'index' => $i, 'class' => 'Vendor', 'oid' => $vendor->getId())) ?>
</tr>
<?php $sf_user->setAttribute('index', $i) ?>
<?php endif ?>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<?php $i = 0; if($addresses = $vendor->getAddresses()) : ?>
<?php foreach ($addresses as $address) : ?>
<tr id="address_<?php echo $i ?>">
<?php include_partial('address/edit', array('address' => $address, 'index' => $i, 'class' => 'Vendor', 'oid' => $vendor->getId())) ?>
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
  <td class="leftCol"><label><?php echo __('Tags for this vendor') ?></label></td>
  <td class="rightCol">
  <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $vendor->getTags())),
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
        <td style="padding-top:5px;"><?php echo submit_tag(__('Save vendor'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>

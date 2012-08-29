<?php use_helper('Object', 'Javascript') ?>
<?php if (!$contact instanceof Contact)
$contact = new Contact();
?>
<?php echo object_input_hidden_tag($contact, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Contact name') ?></label></td>
  <td class="rightCol">
   <table>
         <tr>
           <td>
                <label><?php echo __('Salutation') ?></label><br/>
                <?php echo object_input_tag($contact, 'getContactSalutation', array ('size' => 6, 'class' => 'form-tiny-text')) ?>
           </td>
           <td>
                <label class="required"><?php echo __('First name') ?></label><br/>
                <?php echo object_input_tag($contact, 'getContactFirstName', array ('size' => 80, 'class' => 'form-small-text')) ?>
           </td>
           <td>
                <label class="required"><?php echo __('Last name') ?></label><br/>
                <?php echo object_input_tag($contact, 'getContactLastName', array ('size' => 80, 'class' => 'form-medium-text')) ?>
           </td>
         </tr>
   </table>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Company') ?></label></td>
  <td class="rightCol">
    <?php $companyClass = $sf_params->get('company_class', 'Client');
    if ($contact->getClient()) {
        $company_id = $contact->getClient()->getId();
        $company = $contact->getClient()->getFullName(false);
    }
    if ($contact->getVendor()) {
        $company_id = $contact->getVendor()->getId();
        $company = $contact->getVendor()->getFullName(false);
        $companyClass = 'Vendor';
    }
    $peerClass = $companyClass. 'Peer';
    if ($sf_params->get('company_id')) {
        $company_id = $sf_params->get('company_id');
        $comp = call_user_func(array($peerClass, 'retrieveByPk'), $company_id);
        if ($comp)
            $company = $comp->getFullName(false);
    }
    if ($sf_params->get('company_name')) {
        $company_id = '';
        $company = $sf_params->get('company_name');
    }
    if (!isset($company) || !$company) {
        $company = __('Company') . '...';
        $company_id = '';
        $companyClass = 'Undefined';
    } ?>
        <?php echo javascript_tag("function getCompany(text, li){ $('company_id').value = li.id; $('company_class').value = li.className; }") ?>
  <?php echo input_hidden_tag('company_id', $company_id) ?>
  <?php echo input_hidden_tag('company_class', $companyClass) ?>
  <?php echo input_auto_complete_tag('company_name', $company,
                    'contact/getCompanies',
                    array('autocomplete' => 'off', 'class' => 'form-medium-text', 'onclick' => 'this.value=""'),
                    array('use_style'    => true,
                        'after_update_element' => 'getCompany')
                    ) ?>
  <label><?php echo __('Department') ?></label>
  <?php echo object_input_tag($contact, 'getContactOrgUnit', array (
  'size' => 128, 'class' => 'form-small-text'
)) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Email') ?></label></td>
  <td class="rightCol"><?php echo object_input_tag($contact, 'getContactEmail', array ('size' => 128, 'class' => 'form-text')) ?></td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Phones') ?></label></td>
  <td class="rightCol">
    <table>
        <tr>
           <td>
             <label><?php echo __('Phone') ?></label>
             <?php echo input_tag('contact_phone', ($contact) ? $contact->getContactPhone() : $sf_params->get('contact_phone'), 'size="20" class="form-number-text"') ?>
           </td>
           <td>
             <label><?php echo __('Fax') ?></label>
             <?php echo input_tag('contact_fax', ($contact) ? $contact->getContactFax() : $sf_params->get('contact_fax'), 'size="20" class="form-number-text"') ?>
           </td>
           <td>
             <label><?php echo __('Mobile') ?></label>
             <?php echo input_tag('contact_mobile', ($contact) ? $contact->getContactMobile() : $sf_params->get('contact_mobile'), 'size="20" class="form-number-text"') ?>
           </td>
         </tr>
    </table>
</td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Contact birthday') ?></label></td>
  <td class="rightCol"><?php echo object_input_date_tag($contact, 'getContactBirthday', array ('rich' => true)) ?></td>
</tr>
<?php $i = 0; if($contact->getAddresses()) : ?>
<?php foreach ($contact->getAddresses() as $address) : ?>
<tr id="address_<?php echo $i ?>">
<?php include_partial('address/edit', array('address' => $address, 'index' => $i, 'class' => 'Contact', 'oid' => $contact->getId())) ?>
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
  <td class="leftCol"><label><?php echo __('Tags for this contact') ?></label></td>
  <td class="rightCol">
      <?php echo input_auto_complete_tag('tags', ($sf_params->get('tags') ? $sf_params->get('tags') : implode(', ', $contact->getTags())),
        'tag/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text'),
        array('use_style'    => true, 'tokens' => ', ')
    ) ?><br/>
    <span class="notes"><?php echo __("If the tag doesn't exists, the program will create one") ?></span>
  </td>
</tr>
</tbody>
<tfoot>
    <tr>
        <th></th>
        <th></th>
        <th><?php echo submit_tag(__('Save contact'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </th>
    </tr>
</tfoot>
</table>
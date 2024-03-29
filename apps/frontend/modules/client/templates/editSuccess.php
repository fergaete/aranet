<?php use_helper('Javascript', 'YUIForm', 'YUIJavascript') ?>
<?php if ($client->isNew()) {
    $title = __('Add new client');
} else {
    $title = __('Edit client %1%', array('%1%' => $client->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>
<form action="<?php echo url_for($client->isNew() ? '@client_create' : '@client_edit_by_id?id='.$client->getId()) ?>" method="post" class="form">
  <?php if ($form->hasGlobalErrors()): ?>
<table class="formActions">
  <tr>
    <td>
    <?php echo $form->renderGlobalErrors() ?>
    </td>
  </tr>
</table>
<?php endif ?>

<?php echo $form->isCSRFProtected() ? $form['token'] : '' ?>
<?php echo $form['id'] ?>
<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol">
    <?php echo $form['client_unique_name']->renderLabel($form['client_unique_name']->renderLabelName(), array('class' => 'required')) ?>
  </td>
  <td class="rightCol">
    <?php echo $form['client_unique_name'] ?>
    <?php echo $form['client_unique_name']->renderError() ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol">
    <?php echo $form['client_company_name']->renderLabel($form['client_company_name']->renderLabelName(), array('class' => 'required')) ?>
  </td>
  <td class="rightCol">
    <?php echo $form['client_company_name'] ?>
    <?php echo $form['client_company_name']->renderError() ?>
  </td>
</tr>
<?php echo $form['client_cif']->renderRow() ?>
<?php echo $form['client_kind_of_company_id']->renderRow() ?>
<?php echo $form['client_since']->renderRow() ?>
<?php echo $form['client_website']->renderRow() ?>
<?php echo $form['client_comments']->renderRow() ?>
<?php foreach ($client->getContacts() as $contact): ?>
<tr id="li_contact_<?php echo $contact->getId() ?>">
  <td class='actionsCol'>
    <ul>
         <li><?php echo yui_link_to_remote(image_tag('icons/delete.png', 'alt="'.__('Delete this contact') .'"'), array(
            'url' => url_for('@contact_delete_by_id?id='.$contact->getId()),
            'update' => 'li_contact_'.$contact->getId(),
            'loading'  => "Element.show('indicator-contact')",
            'complete' => "Element.hide('indicator-contact')"
            )) ?></li>
    </ul>
  </td>
  <td class='leftCol'><?php echo $form['contact['.$contact->getId().']']->renderLabel() ?></td>
  <td class='rightCol'><?php echo $form['contact['.$contact->getId().']'] ?></td>
</tr>
<?php endforeach ?>
<tr id="li_contact_0">
  <td class='actionsCol'>
    <ul>
      <li><?php echo yui_link_to_remote(image_tag('icons/add.png', 'alt="'.__('Add new contact') .'"'), array(
            'url' => url_for('@contact_create'),
            'update' => 'newContact',
            'position' => 'before',
            'script' => 'true'
            )) ?></li>
    </ul>
  </td>
  <td class='leftCol'><?php echo $form['contact[0]']->renderLabel() ?></td>
  <td class='rightCol'><?php echo $form['contact[0]'] ?></td>
</tr>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<?php foreach ($client->getAddresses() as $address): ?>
<tr id="li_address_<?php echo $address->getId() ?>">
  <td class='actionsCol'>
    <ul>
         <li><?php echo yui_link_to_remote(image_tag('icons/delete.png', 'alt="'.__('Delete this address') .'"'), array(
            'url' => url_for('@address_delete_by_id?id='.$address->getId()),
            'update' => 'li_address_'.$address->getId(),
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
    </ul>
  </td>
  <td class='leftCol'><?php echo $form['address['.$address->getId().']']->renderLabel() ?></td>
  <td class='rightCol'><?php echo $form['address['.$address->getId().']'] ?></td>
</tr>
<?php endforeach ?>
<tr id="li_address_0">
  <td class='actionsCol'>
    <ul>
      <li><?php echo yui_link_to_remote(image_tag('icons/add.png', 'alt="'.__('Add new address') .'"'), array(
            'url' => url_for('@address_create'),
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true'
            )) ?></li>
    </ul>
  </td>
  <td class='leftCol'><?php echo $form['address[0]']->renderLabel() ?></td>
  <td class='rightCol'><?php echo $form['address[0]'] ?></td>
</tr>
<tr id="newAddress">
    <td colspan="3" id="indicator-address" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<?php echo $form['tags']->renderRow() ?>
</tbody>
</table>

<table class="formActions">
    <tr>
        <td>
          <?php echo yui_submit_tag(__('Save client')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo yui_button_to(__('Cancel'), '@client_list') ?>
        </td>
    </tr>
</table>
</form>
<?php use_helper('Javascript', 'YUIForm', 'YUIJavascript') ?>
<?php if ($contact->isNew()) {
    $title = __('Add new contact');
} else {
    $title = __('Edit contact %1%', array('%1%' => $contact->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>


<form action="<?php echo url_for($contact->isNew() ? '@contact_create' : '@contact_edit_by_id?id='.$contact->getId()) ?>" method="post" class="form">
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
<?php echo $form['contact_salutation']->renderRow() ?>
<?php echo $form['contact_first_name']->renderRow() ?>
<?php echo $form['contact_last_name']->renderRow() ?>
<?php echo $form['contact_org_unit']->renderRow() ?>
<?php echo $form['contact_email']->renderRow() ?>
<?php echo $form['contact_phone']->renderRow() ?>
<?php echo $form['contact_fax']->renderRow() ?>
<?php echo $form['contact_mobile']->renderRow() ?>
<?php echo $form['contact_birthday']->renderRow() ?>

<?php foreach ($contact->getAddresses() as $address): ?>
<?php echo $form['address['.$address->getId().']']->renderRow() ?>
<?php endforeach ?>
<tr id="li_address_0">
  <td class='actionsCol'>
    <ul>
      <li id="addressActionAdd"><?php echo link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/add.png', 'alt="'.__('Add new address') .'"'), array(
            'url' => 'address/create',
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
         <li id="addressActionDel"><?php echo link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/delete.png', 'alt="'.__('Delete this address') .'"'), array(
            'url' => 'address/delete',
            'update' => 'li_address_0',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
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
          <?php echo yui_submit_tag(__('Save contact')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo yui_button_to(__('Cancel'), '@contact_list') ?>
        </td>
    </tr>
</table>
</form>
<?php use_helper('Javascript', 'YUIForm', 'YUIJavascript') ?>
<?php if ($vendor->isNew()) {
    $title = __('Add new vendor');
} else {
    $title = __('Edit vendor %1%', array('%1%' => $vendor->__toString()));
} ?>
<?php aranet_title($title) ?>
<?php ysfYUI::addComponents('reset', 'fonts', 'grids', 'datasource') ?>

<h3><?php echo $title ?></h3>


<form action="<?php echo url_for($vendor->isNew() ? '@vendor_create' : '@vendor_edit_by_id?id='.$vendor->getId()) ?>" method="post" class="form">
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
    <?php echo $form['vendor_unique_name']->renderLabel($form['vendor_unique_name']->renderLabelName(), array('class' => 'required')) ?>
  </td>
  <td class="rightCol">
    <?php echo $form['vendor_unique_name'] ?>
    <?php echo $form['vendor_unique_name']->renderError() ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol">
    <?php echo $form['vendor_company_name']->renderLabel($form['vendor_company_name']->renderLabelName(), array('class' => 'required')) ?>
  </td>
  <td class="rightCol">
    <?php echo $form['vendor_company_name'] ?>
    <?php echo $form['vendor_company_name']->renderError() ?>
  </td>
</tr>
<?php echo $form['vendor_cif']->renderRow() ?>
<?php echo $form['vendor_kind_of_company_id']->renderRow() ?>
<?php echo $form['vendor_since']->renderRow() ?>
<?php echo $form['vendor_website']->renderRow() ?>
<?php echo $form['vendor_comments']->renderRow() ?>
<?php echo $form['contacts']->renderRow() ?>
<?php foreach ($vendor->getAddresses() as $address): ?>
    <td class='actionsCol'>
    <ul>
      <li id="addressActionAdd"><?php echo yui_link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/add.png', 'alt="'.__('Add new address') .'"'), array(
            'url' => url_for('address/create'),
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
         <li id="addressActionDel"><?php echo yui_link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/delete.png', 'alt="'.__('Delete this address') .'"'), array(
            'url' => url_for('address/delete'),
            'update' => 'li_address_0',
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
      <li id="addressActionAdd"><?php echo yui_link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/add.png', 'alt="'.__('Add new address') .'"'), array(
            'url' => url_for('address/create'),
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
         <li id="addressActionDel"><?php echo yui_link_to_remote(image_tag(sfConfig::get('yui_icons_web_dir') . '/delete.png', 'alt="'.__('Delete this address') .'"'), array(
            'url' => url_for('address/delete'),
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
          <?php echo yui_submit_tag(__('Save vendor')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo yui_button_to(__('Cancel'), '@vendor_list') ?>
        </td>
    </tr>
</table>
</form>
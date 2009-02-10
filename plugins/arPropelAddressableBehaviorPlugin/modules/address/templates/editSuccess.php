<?php if ($address->isNew()) {
    $title = __('Add new address');
} else {
    $title = __('Edit address %1%', array('%1%' => $address->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>

<form action="<?php echo url_for($address->isNew() ? '@address_create' : '@address_edit_by_id?id='.$address->getId()) ?>" method="post" class="form">
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
<?php echo $form['address_line1']->renderRow() ?>
<?php echo $form['address_line2']->renderRow() ?>
<?php echo $form['address_postal_code']->renderRow() ?>
<?php echo $form['address_location']->renderRow() ?>
<?php echo $form['address_state']->renderRow() ?>
<?php echo $form['address_country']->renderRow() ?>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="text-align:center">
          <?php echo yui_submit_tag(__('Save')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo (!$address->isNew()) ? yui_button_to(__('Delete'), '@address_delete_by_id?id='.$address->getId(), array('confirm' => __('Are you sure?'))) : '' ?>
          <?php echo yui_button_to(__('Return to list'), '@address_list') ?>
        </td>
    </tr>
</table>
</form>
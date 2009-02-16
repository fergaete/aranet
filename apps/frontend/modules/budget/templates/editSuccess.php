<?php use_helper('Javascript', 'YUI') ?>
<?php if ($budget->isNew()) {
    $title = __('Add new budget');
} else {
    $title = __('Edit budget %1%', array('%1%' => $budget->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>
<form action="<?php echo url_for($budget->isNew() ? '@budget_create' : '@budget_edit_by_id?id='.$budget->getId()) ?>" method="post" class="form">
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
  <td class="leftCol"><?php echo $form['budget_title']->renderLabel('Budget title', array('class' => 'required')) ?></td>
  <td class="rightCol">
    <?php echo $form['budget_title'] ?><?php echo $form['budget_title']->renderError() ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><?php echo $form['budget_client_id']->renderLabel('Client', array('class' => 'required')) ?></td>
  <td class="rightCol">
    <?php echo $form['budget_client_id']->render() ?><?php echo $form['budget_client_id']->renderError() ?>
    <span class="help"><?php echo $form['budget_client_id']->renderHelp() ?></span>
  </td>
</tr>
<?php echo $form['budget_project_id']->renderRow() ?>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><?php echo $form['budget_number']->renderLabel('Identification') ?></td>
  <td class="rightCol">
    <?php echo $form['budget_prefix']->renderLabel('Prefix', array('class' => 'width-auto float-first')) ?>
    <?php echo $form['budget_prefix'] ?>
    <?php echo $form['budget_number']->renderLabel('No.', array('class' => 'required width-auto float')) ?>
    <?php echo $form['budget_number'] ?><?php echo $form['budget_number']->renderError() ?>
    <?php echo $form['budget_revision']->renderLabel('Revision', array('class' => 'required width-auto float')) ?>
    <?php echo $form['budget_revision'] ?><?php echo $form['budget_revision']->renderError() ?>
  </td>
</tr>
<?php echo $form['budget_date']->renderRow() ?>
<?php echo $form['budget_valid_date']->renderRow() ?>
<?php echo $form['budget_category_id']->renderRow() ?>
<?php echo $form['budget_comments']->renderRow() ?>
<?php echo $form['budget_print_comments']->renderRow() ?>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"></td>
  <td class="rightCol">
    <?php echo $form['budget_tax_rate']->renderLabel('Tax rate (%)', array('class' => 'width-auto float-first')) ?>
    <?php echo $form['budget_tax_rate'] ?>
    <?php echo $form['budget_freight_charge']->renderLabel('Freight charge', array('class' => 'width-auto float')) ?>
    <?php echo $form['budget_freight_charge'] ?>
    <?php echo $form['budget_payment_condition_id']->renderLabel('Payment due', array('class' => 'width-auto float')) ?>
    <?php echo $form['budget_payment_condition_id'] ?>
  </td>
</tr>
<?php echo $form['budget_status_id']->renderRow() ?>
<?php foreach ($budget->getContacts() as $contact): ?>
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
  <td class='rightCol'><?php echo $form['contact[0]'] ?><span class="help"><?php echo __($form['contact[0]']->renderHelp()) ?></span></td>
</tr>
<tr id="newContact">
    <td colspan="3" id="indicator-contact" style="text-align:left;display:none"><?php echo image_tag('indicator.gif') ?></td>
</tr>
<?php echo $form['tags']->renderRow() ?>
</tbody>
</table>

<table class="formActions">
    <tr>
        <td>
          <?php echo yui_submit_tag(__('Save budget')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo yui_button_to(__('Cancel'), '@budget_list') ?>
        </td>
    </tr>
</table>

<h4><?php echo __('Budget Items') ?></h4>


<div id="budgetViewItems" class="windowFrame" style="margin-top: 10px;">
    <div id="indicator-items" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <?php foreach ($form['budget_item'] as $item_form) : ?>
      
    <?php echo $item_form['item_budget_id'] ?>
    <?php echo $item_form['item_order'] ?>
    
    <?php echo $item_form['item_order']->renderError() ?>
    <table class="dataTable">
      <thead>
        <tr>
          <th style="width:40%"><?php echo $item_form['item_description']->renderLabel() ?></th>
          <th><?php echo $item_form['item_type_id']->renderLabel() ?></th>
          <th><?php echo $item_form['item_quantity']->renderLabel() ?></th>
          <th><?php echo $item_form['item_cost']->renderLabel() ?></th>
          <th><?php echo __('Subtotal') ?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $item_form['item_description']->render(array('class' => 'full')) ?></td>
          <td><?php echo $item_form['item_type_id'] ?><?php echo $item_form['item_type_id']->renderError() ?>
          <span class="newline"><?php echo $item_form['item_is_optional']->renderLabel() . $item_form['item_is_optional'] ?></span>
          </td>
          <td style="text-align:center"><?php echo $item_form['item_quantity']->render(array('style' => 'float:none!important')) ?></td>
          <td><?php echo $item_form['item_cost'] ?><?php echo $item_form['item_margin'] ?> <?php echo $item_form['item_retail_price'] ?></td>
          <td class="number"><?php echo "xxxxxx" ?></td>
          <td>
            <?php echo link_to(image_tag('icons/add.png', 'alt='.__("Add item")), '@budget_show_by_id?id='.$budget->getId()) ?>
          </td>
        </tr>
      </tbody>
    </table>

    <?php //include_partial('budget_item', array('budget_items' => $budget->getBudgetItems(), 'budget' => $budget)) ?>
    <?php endforeach ?>
</div>

</form>


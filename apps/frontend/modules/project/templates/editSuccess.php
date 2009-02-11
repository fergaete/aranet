<?php use_helper('Javascript', 'YUI') ?>
<?php if ($project->isNew()) {
    $title = __('Add new project');
} else {
    $title = __('Edit project %1%', array('%1%' => $project->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>
<form action="<?php echo url_for($project->isNew() ? '@project_create' : '@project_edit_by_id?id='.$project->getId()) ?>" method="post" class="form">
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
  <td class="leftCol"><?php echo $form['project_client_id']->renderLabel('Client', array('class' => 'required')) ?></td>
  <td class="rightCol">
    <?php echo $form['project_client_id'] ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><?php echo $form['project_number']->renderLabel() ?></td>
  <td class="rightCol">
    <?php echo $form['project_prefix']->renderLabel(__('Prefix'), array('class' => 'width-auto float-first')) ?>
    <?php echo $form['project_prefix'] ?>
    <?php echo $form['project_number']->renderLabel(__('Number'), array('class' => 'required width-auto float')) ?>
    <?php echo $form['project_number'] ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><?php echo $form['project_name']->renderLabel('Project name', array('class' => 'required')) ?></td>
  <td class="rightCol">
    <?php echo $form['project_name'] ?>
  </td>
</tr>
<?php echo $form['project_url']->renderRow() ?>
<?php echo $form['project_comments']->renderRow() ?>
<?php echo $form['project_category_id']->renderRow() ?>
<?php echo $form['project_status_id']->renderRow() ?>
<?php echo $form['project_start_date']->renderRow() ?>
<?php echo $form['project_finish_date']->renderRow() ?>
<?php foreach ($project->getContacts() as $contact): ?>
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
  <td class='rightCol'><?php echo $form['contact[0]'] ?><span class="help"><?php echo $form['contact[0]']->renderHelp() ?></span></td>
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
          <?php echo yui_submit_tag(__('Save project')) ?>
          <?php echo yui_reset_tag(__('Reset')) ?>
          <?php echo yui_button_to(__('Cancel'), '@project_list') ?>
        </td>
    </tr>
</table>
</form>
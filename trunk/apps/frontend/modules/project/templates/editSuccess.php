<?php use_helper('Javascript', 'YUI') ?>
<?php if ($project->isNew()) {
    $title = __('Add new project');
} else {
    $title = __('Edit project %1%', array('%1%' => $project->__toString()));
} ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>
<?php if ($form->getGlobalErrors()) : ?>
  <?php print_r($form->getGlobalErrors()) ?>
  <?php endif ?>
<form action="<?php echo url_for($project->isNew() ? '@project_create' : '@project_edit_by_id?id='.$project->getId()) ?>" method="post" class="form">
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

<?php echo $form['contacts']->renderRow() ?>
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
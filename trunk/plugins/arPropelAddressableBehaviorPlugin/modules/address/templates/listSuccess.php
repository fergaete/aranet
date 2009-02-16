<?php $title = __('List addresses') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@address_list') ?>" method="get" name="address_filters">
<?php echo $filter_form ?>

  <div class="filterActions">
    <?php echo yui_reset_tag(__('Reset'), '@address_list_remove_filters') ?>
    <?php echo yui_submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@address_delete_all') ?>" method="post" name="chklist">
<div id="addressTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo yui_link_to_function(image_tag("icons/delete.png", 'alt="'.__('Delete selected').'"'),"if (confirm('".__('Are you sure?')."')) { document.chklist.submit() }") ?></li>
</ul>
</div>
</form>
<div class="clearer"></div>
<?php echo yui_button_to(__('New'), '@address_create') ?>
<?php echo $table->render('addressTable', 'addressTable', 'paginator', 'address'); ?>
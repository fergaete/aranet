<?php $title = (isset($tag)) ? __('List vendors tagged with "%1%"', array('%1%' => $tag)) : __('List vendors') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@vendor_list') ?>" method="get" name="vendor_filters">
<?php echo $filter_form ?>

  <div class="filterActions">
    <?php echo yui_reset_tag(__('Reset'), '@vendor_list_remove_filters') ?>
    <?php echo yui_submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@vendor_delete_all') ?>" method="post" name="chklist">
<div id="vendorTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo link_to_function(image_tag("icons/delete.png", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>
</form>

<?php echo $table->render('vendorTable', 'vendorTable', 'paginator', 'vendor'); ?>
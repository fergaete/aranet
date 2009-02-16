<?php $title = (isset($tag)) ? __('List vendors tagged with "%1%"', array('%1%' => $tag)) : __('List vendors') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<?php include_partial('filters', array('filter_form' => $filter_form)) ?>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@vendor_delete_all') ?>" method="post" name="chklist">
<div id="vendorTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo yui_link_to_function(image_tag("icons/delete.png", 'alt="'.__('Delete selected').'"'),"if (confirm('".__('Are you sure?')."')) { document.chklist.submit() }") ?></li>
</ul>
</div>
</form>

<div class="clearer"></div>
<?php echo yui_button_to(__('New'), '@vendor_create') ?>
<?php echo $table->render('vendorTable', 'vendorTable', 'paginator', 'vendor'); ?>
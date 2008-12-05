<?php $title = (isset($tag)) ? __('List clients tagged with "%1%"', array('%1%' => $tag)) : __('List clients') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@client_list') ?>" method="get" name="client_filters">
<?php echo $filter_form ?>

  <div class="filterActions">
    <?php echo yui_reset_tag(__('Reset'), '@client_list_remove_filters') ?>
    <?php echo yui_submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@client_delete_all') ?>" method="post" name="chklist">
<div id="clientTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo link_to_function(image_tag("icons/delete.png", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>
</form>

<?php echo $table->render('clientTable', 'clientTable', 'paginator', 'client'); ?>
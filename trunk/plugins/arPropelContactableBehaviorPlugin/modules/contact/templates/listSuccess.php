<?php $title = (isset($tag)) ? __('List contacts tagged with "%1%"', array('%1%' => $tag)) : __('List contacts') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@contact_list') ?>" method="get" name="contact_filters">
<?php echo $filter_form ?>

  <div class="filterActions">
    <?php echo yui_reset_tag(__('Reset'), '@contact_list_remove_filters') ?>
    <?php echo yui_submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@contact_delete_all') ?>" method="post" name="chklist">
<div id="contactTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo yui_link_to_function(image_tag(sfConfig::get("yui_icons_web_dir") . "/delete.png", 'alt="Delete selected"'),"document.chklist.submit()", array('confirm' => __('Are you sure?'))) ?></li>
</ul>
</div>
</form>

<?php echo $table->render('contactTable', 'contactTable', 'paginator', 'contact'); ?>
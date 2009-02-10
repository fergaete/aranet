<?php $title = (isset($tag)) ? __('List clients tagged with "%1%"', array('%1%' => $tag)) : __('List clients') ?>
<?php aranet_title($title) ?>

<?php slot('filters') ?>
<?php include_partial('filters', array('filter_form' => $filter_form)) ?>
<?php end_slot() ?>

<h3><?php echo $title ?></h3>
<form action="<?php echo url_for('@client_delete_all') ?>" method="post" name="chklist">
<div id="clientTable"></div>
<div id="paginator"></div>
<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo link_to_function(image_tag("icons/delete.png", 'alt="'.__('Delete selected').'"'),"document.chklist.submit()", array('confirm' => __('Are you sure?'))) ?></li>
</ul>
</div>
</form>

<div class="clearer"></div>
<?php echo yui_button_to(__('New'), '@client_create') ?>
<?php echo $table->render('clientTable', 'clientTable', 'paginator', 'client'); ?>
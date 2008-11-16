<?php use_helper('Javascript', 'YUIForm') ?>
<?php $title = (isset($tag)) ? __('List projects tagged with "%1%"', array('%1%' => $tag)) : __('List projects') ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>

<?php slot('filters') ?>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@project_list') ?>" method="get" name="project_filters">
<?php echo $filter_form ?>

  <div class="filterActions">
    <?php echo yui_reset_tag(__('Reset'), '@project_list_remove_filters') ?>
    <?php echo yui_submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<?php end_slot() ?>
<?php include_partial('project_full_list', array('pager' => $pager)) ?>

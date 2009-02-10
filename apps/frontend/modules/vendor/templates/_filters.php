<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@vendor_list') ?>" method="get" name="vendor_filters">
  <table>
<?php echo $filter_form ?>
  </table>
  <div class="filterActions">
    <?php echo button_to(__('Reset'), '@vendor_list_remove_filters') ?>
    <?php echo submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
<div class="module-filters module">
  <h2 class="module-header"><?php echo __('Filters') ?></h2>
  <div class="module-content">
<form action="<?php echo url_for('@client_list') ?>" method="get" name="client_filters">
  <table>
<?php echo $filter_form ?>
  </table>
  <div class="filterActions">
    <?php echo button_to(__('Reset'), '@client_list_remove_filters') ?>
    <?php echo submit_tag(__('Filter')) ?>
  </div>
</form>
</div>
  <div class="module-footer">
  </div>
</div>
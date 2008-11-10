<?php use_helper('Tags') ?>
<div class="module-calendar module">
  <h2><?php echo __('Popular tags') ?></h2>
  <div class="module-content">
<?php 
echo tag_cloud($tags, $module.'/listByTag?tag='); ?>
</div>
  <div class="module-footer">
  </div>
</div>

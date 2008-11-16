<?php use_helper('Tags') ?>
<div class="module-tags module">
  <h2><?php echo __('Popular tags') ?></h2>
  <div class="module-content">
<?php echo ($tags) ? tag_cloud($tags, '@'. $module.'_list_by_tag?tag=%s') : '<p>'.__('No related tags yet').'</p>' ?>
</div>
  <div class="module-footer">
  </div>
</div>


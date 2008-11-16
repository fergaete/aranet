<ul>
    <li><?php echo link_to(__('List projects'), '@project_list_remove_filters') ?></li>
    <li><?php echo link_to(__('Add new project'), '@project_create') ?></li>
    <li><form action="<?php echo url_for('@project_list') ?>" method="get" name="project_filters">
      <?php echo $form['name']->render() ?>
<?php use_helper('YUI') ?>
<?php echo yui_submit_tag(__('Search')) ?></form></li>
</ul>

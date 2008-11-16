<ul>
    <li><?php echo link_to(__('List clients'), '@client_list_remove_filters') ?></li>
    <li><?php echo link_to(__('Add new client'), '@client_create') ?></li>
    <li><form action="<?php echo url_for('@client_list') ?>" method="get" name="client_filters">
      <?php echo $form['name']->render() ?>
<?php use_helper('YUI') ?>
<?php echo yui_submit_tag(__('Search')) ?></form></li>
</ul>
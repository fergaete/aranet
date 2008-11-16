<ul>
    <li><?php echo link_to(__('List contacts'), '@contact_list_remove_filters') ?></li>
    <li><?php echo link_to(__('Add new contact'), '@contact_create') ?></li>
    <li><form action="<?php echo url_for('@contact_list') ?>" method="get" name="contact_filters">
      <?php echo $form['name']->render() ?>
<?php use_helper('YUI') ?>
<?php echo yui_submit_tag(__('Search')) ?></form></li>
</ul>
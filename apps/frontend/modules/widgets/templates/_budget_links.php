<ul>
    <li><?php echo link_to(__('List budgets'), '@budget_list') ?></li>
    <li><?php echo link_to(__('Add new budget'), '@budget_create') ?></li>
    <li><form action="<?php echo url_for('@budget_list') ?>" method="get" name="budget_filters">
      <?php echo $form['name']->render() ?>
<?php use_helper('YUI') ?>
<?php echo yui_submit_tag(__('Search')) ?></form></li>
</ul>

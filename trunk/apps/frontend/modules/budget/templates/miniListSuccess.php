<?php use_helper('YUI') ?>
      <div id="<?php echo $related ?>Budgets">
<?php include_partial('budget/budget_list', array('budgets' => $budgets, 'related' => $related)) ?>
      </div>
      <?php echo yui_button_to(__('Create new invoice'), "@budget_create_from_object?related='.$related.'&id=" . $id) ?>

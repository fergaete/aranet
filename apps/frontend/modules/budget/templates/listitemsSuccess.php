<?php use_helper('Javascript') ?>
<div id="indicator-bitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<?php include_partial('budget_item_list', array('budget_items' => $budget->getBudgetItems(), 'budget' => $budget)) ?>

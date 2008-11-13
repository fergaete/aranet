<?php use_helper('Object', 'Javascript') ?>
<?php include_partial('budget_item_form', array('i' => $i, 'budget_item' => null, 'max' => $i)) ?>
<div id="indicator-<?php echo ($i+1) ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<div id="budgetItems-<?php echo ($i+1) ?>">
</div>

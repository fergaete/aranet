<?php use_helper('Javascript', 'Style') ?>
<?php $remote = array(
        'update' => 'budWindow'.$budget->getId(),
        'url' => 'budget/editstatus?id='.$budget->getId(),
        'complete' => visual_effect('appear', "budWindow".$budget->getId())) ?>
<?php echo link_to_remote(icon_gtip($budget->getBudgetStatus(), array('id' => 'statusTip'.$budget->getId(), 'gtip_title' => __('Status'), 'content' => $budget->getFullStatus() , 'image' => 'iconBudget.png', 'status' => $budget->getBudgetStatusId())), $remote) ?>
<div id="budWindow<?php echo $budget->getId() ?>" style="display:none" class="popUpDiv"></div>

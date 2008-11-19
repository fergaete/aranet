<?php use_helper('Javascript', 'Style') ?>
<?php $remote = array(
        'update' => 'expWindow'.$expense_item->getId(),
        'url' => 'expense/editvalidation?id='.$expense_item->getId(),
        'complete' => visual_effect('appear', "expWindow".$expense_item->getId())) ?>
                <?php echo link_to_remote(icon_gtip($expense_item->getValidationStatus(), array('id' => 'statusTip'.$expense_item->getId(), 'content' => $expense_item->getValidationFullStatus() , 'image' => 'iconValidation.png', 'status' => $expense_item->getIsValidated())), $remote) ?>
 <div id="expWindow<?php echo $expense_item->getId() ?>" style="display:none" class="popUpDiv"></div>

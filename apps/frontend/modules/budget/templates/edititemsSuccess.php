<?php use_helper('Javascript') ?>
<div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>


<?php echo form_remote_tag(array(
        'url'      => 'budget/updateitems',
        'update' => 'budgetViewItems',
        'loading'  => visual_effect('appear', "indicator-iitems"),
        'complete' => visual_effect('fade', "indicator-iitems").
                      visual_effect('highlight', "budgetViewItems")), 'name=items') ?>

<?php echo input_hidden_tag('id', $budget->getId()) ?>

<?php include_partial('budget_item', array('budget_items' => $budget->getBudgetItems(), 'budget' => $budget)) ?>
<table class="gridTable" width="100%">
<tbody>
<tr>
  <td style="border: medium none ;"></td>
  <td style="border: medium none ; text-align: left;">
    <?php echo submit_to_remote('ajax_submit', "", array(
        'url'      => 'budget/updateitems',
        'update' => 'budgetViewItems',
        'loading'  => visual_effect('appear', "indicator-iitems"),
        'complete' => visual_effect('fade', "indicator-iitems").
                      visual_effect('highlight', "budgetViewItems"),
        ), array('class' => 'form-save')) ?>
    <?php echo link_to_remote(image_tag('button_close.gif', 'alt="Close"'), array(
    'url' => 'budget/listitems?id=' . $budget->getId(),
    'update' => 'budgetViewItems',
    'loading'  => visual_effect('appear', "indicator-iitems"),
    'complete' => visual_effect('fade', "indicator-iitems").
                  visual_effect('highlight', "budgetViewItems"),
     )) ?>
        </td>
    </tr>

</tbody>
</table>
</form>

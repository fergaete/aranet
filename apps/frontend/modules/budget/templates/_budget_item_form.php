<?php use_helper('Number', 'NumberExtended', 'Object', 'Javascript') ?>
<div id="indicator-<?php echo $i ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <div id="budgetItems-<?php echo $i ?>"><table class="dataTable">
<?php echo ($budget_item) ? input_hidden_tag('items['.$i.'][id]', $budget_item->getId()) : '' ?>
                    <tr>
                        <th style="width: 40%;"><?php echo __('Item Description') ?></th>
                        <th style="width: 10%;"><?php echo __('Type') ?></th>
                        <th style="width: 5%; text-align: center;"><?php echo __('Qty') ?></th>
                        <th style="width: 20%; text-align: center;"><?php echo __('Cost/Margin/Price') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Subtotal') ?></th>
                        <th style="width: 4%;"></th>
                    </tr>
                    <tr>
                        <td><?php echo ($budget_item) ? object_input_hidden_tag($budget_item, 'getItemBudgetId') : '' ?>
                            <?php echo textarea_tag('items['.$i.'][description]', ($budget_item) ? $budget_item->getItemDescription() : '', array (
                            'size' => '30x3', 'class' => 'form-full-textarea')) ?></td>
                        <td style="vertical-align: top; text-align: center;">
<?php 
if ($budget_item) {
  $cost = $budget_item->getItemCost();
  $hour = $budget_item->getItemTypeId();
} else {
  $cost = 0;
  $hour = 0;
}
?>
                            <?php echo select_tag('items['.$i.'][type_id]', objects_for_select(TypeOfInvoiceItemPeer::doSelect(new Criteria()), 'getId', '__toString', ($budget_item) ? $budget_item->getItemTypeId() : '','include_custom="Select..."'), array('class' => 'form-small-combo',
                               'onchange' =>
                                  remote_function(array(
                                  'update' => 'items_'.$i.'_cost',
                                  'url' => 'budget/getTypesOfHour',
                                  'script' => true,
                                  'with' => "'id=' + this.options[this.selectedIndex].value + '&i=".$i."&cost=".$cost."&hour=".$hour."'"
                                ))
                            )) ?><br/><br/>
                            <?php echo __('Optional?') ?><?php echo checkbox_tag('items['.$i.'][is_optional]', 1, ($budget_item) ? $budget_item->getItemIsOptional() : false, array('class' => 'form-checkbox')) ?></td>
                        <td style="vertical-align:top;"><?php echo input_tag('items['.$i.'][quantity]', ($budget_item) ? $budget_item->getItemQuantity() : 0, array (
                            'size' => 4, 'class' => 'form-auto-text')) ?></td>
                        <td style="vertical-align:top;text-align:center;">
                            <span id="items_<?php echo $i ?>_cost">
<?php if ($budget_item && $budget_item->getItemTypeId() == 1) : ?>
                            <?php echo select_tag('items['.$i.'][type_of_hour]', objects_for_select(TypeOfHourPeer::doSelect(new Criteria()), 'getId', 'getTypeOfHourTitle', $budget_item->getItemBudgetTypeId())) ?>
<?php else : ?>
                            <?php echo input_tag('items['.$i.'][cost]', ($budget_item) ? $budget_item->getItemCost() : '', array (
                                'size' => 7, 'class' => 'form-smallest-text', 'id' => 'items['.$i.'][cost]')) ?>
<?php endif ?>
                            </span>
                            <?php echo input_tag('items['.$i.'][margin]', ($budget_item) ? $budget_item->getItemMargin() : '', array (
                                'size' => 4, 'class' => 'form-smallest-text', 'id' => 'items['.$i.'][margin]')) ?>%
                            <?php echo input_tag('items['.$i.'][retail_price]', ($budget_item) ? $budget_item->getItemRetailPrice() : '', array (
                                'size' => 7, 'class' => 'form-smallest-text', 'id' => 'items['.$i.'][retail_price]')) ?>
                        </td>
                        <td style="vertical-align: top; text-align: right;">
                            <?php echo input_tag('items['.$i.'][total]', ($budget_item) ? ($budget_item->getItemQuantity() * $budget_item->getItemRetailPrice()) : 0, array (
                            'size' => 7, 'class' => 'form-auto-text')) ?>
                        </td>
                        <td style="vertical-align: top; text-align: center;">
                        <?php if ($i == $max) : ?>
                        <?php echo link_to_remote(image_tag('buttonAdd.gif', 'alt="Add Item"'), array(
                            'update' => 'budgetItems-'.($i+1),
                            'url' => 'budget/createitem?index='.($i+1),
                            'loading'  => visual_effect('appear', "indicator-".($i+1)),
                            'complete' => visual_effect('fade', "indicator-".($i+1)).
                                          visual_effect('highlight', "budgetItems-".($i+1)),
                                          )) ?>
                        <?php else: ?>
                        <?php echo link_to_remote(image_tag('buttonDel.gif', 'alt="Delete Item"'), array(
                            'update' => 'budgetItems-'.$i,
                            'url' => 'budget/deleteitem?id='.$budget_item->getId(),
                            'loading'  => "Element.show('indicator-".$i."')",
                            'complete' => "Element.hide('indicator-".$i."')")) ?>
                        <?php endif ?>
                        </td>
                    </tr>
                </table>
         </div>


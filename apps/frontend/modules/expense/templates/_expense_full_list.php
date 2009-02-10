<?php use_helper('Number', 'NumberExtended', 'Javascript', 'Style') ?>
<?php echo form_tag('expense/delete', 'name="chklist"') ?>
  <div id="expenseDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th><?php echo __('Item name') ?></th>
                <!--<th><?php //echo __('Category') ?></th>-->
                <th><?php echo __('Project/Budget') ?></th>
                <th><?php echo __('Vendor') ?></th>
                <th style="text-align: center;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'expense/sort') == 'expense_purchase_date'): ?>
                    <?php echo link_to(__('Date'), 'expense/list?sort=expense_purchase_date&type='.($sf_user->getAttribute('type', 'asc', 'expense/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'expense/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Date'), 'expense/list?sort=expense_purchase_date&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th><?php echo __('Validation') ?></th>
                <th  style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'expense/sort') == 'expense_item_amount'): ?>
                    <?php echo link_to(__('Amount'), 'expense/list?sort=expense_item_amount&type='.($sf_user->getAttribute('type', 'asc', 'expense/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'expense/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Amount'), 'expense/list?sort=expense_item_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total_r = 0; foreach ($pager->getResults() as $expense_item): $odd = fmod(++$i, 2); $total_r += $expense_item->getExpenseItemAmount(); ?>
<?php
    $tax_rate = ext_format_number($expense_item->getExpenseItemTaxRate(), 2);
    $subtotal = $expense_item->getExpenseItemAmount();
    $base = ($expense_item->getExpenseItemBase()) ? $expense_item->getExpenseItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $expense_item->getExpenseItemIrpf();
?>
            <tr id="expense_<?php echo $expense_item->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $expense_item->getId(), false) ?></td>
                <td class="actions" id="expenseMenu_<?php echo $expense_item->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("button_view.gif", 'alt="'.__('View').'"'), 'expense/show?id='.$expense_item->getId()) ?></li>
                            <li><?php echo link_to(image_tag("button_edit.gif", 'alt="'.__('Edit').'"'), 'expense/edit?id='.$expense_item->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("button_delete.gif", 'alt="'.__('Delete').'"'), array(
                                'update'   => 'expense_'.$expense_item->getId(),
                                'url'      => 'expense/delete?id='.$expense_item->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($expense_item->getExpenseItemName(), 'expense/show?id='.$expense_item->getId()) ?></td>
                <!--<td><?php //echo ($expense_item->getExpenseItemCategoryId()) ? $expense_item->getExpenseCategory() : '' ?></td> -->
                <td>
                    <?php if ($expense_item->getExpenseItemProjectId()) {
                        echo link_to($expense_item->getProject(), '@project_show_by_id?id='.$expense_item->getExpenseItemProjectId());
                        echo ($expense_item->getExpenseItemBudgetId()) ? '<br/>&nbsp;&nbsp&raquo;&nbsp;' . link_to($expense_item->getBudget()->getFullTitle(), '@budget_show_by_id?id='.$expense_item->getExpenseItemBudgetId()) : '';
                    } else
                        echo ($expense_item->getExpenseItemBudgetId()) ? link_to($expense_item->getBudget()->getFullTitle(), '@budget_show_by_id?id='.$expense_item->getExpenseItemBudgetId()) : '' ?>
                </td>
                <td><?php echo link_to($expense_item->getVendor(), 'vendor/show?id='.$expense_item->getExpenseItemVendorId()) ?></td>
                <td class="date"><?php echo format_date($expense_item->getExpensePurchaseDate()) ?></td>
                <td class="date" id="expValidation<?php echo $expense_item->getId() ?>">
                <?php $remote = array(
                        'update' => 'expWindow'.$expense_item->getId(),
                        'url' => 'expense/editvalidation?id='.$expense_item->getId(),
                        'complete' => visual_effect('appear', "expWindow".$expense_item->getId())) ?>
                <?php echo link_to_remote(icon_gtip($expense_item->getValidationStatus(), array('id' => 'statusTip'.$expense_item->getId(), 'content' => $expense_item->getValidationFullStatus() , 'image' => 'iconValidation.png', 'status' => $expense_item->getIsValidated())), $remote) ?>
                  <div id="expWindow<?php echo $expense_item->getId() ?>" style="display:none" class="popUpDiv"></div>
                </td>
                <td class="currency"><?php echo format_currency($subtotal, 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($total, 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="10">
                <div class="pagination">
<?php use_helper('Pagination'); $uri = substr($sf_request->getUri(), strlen($sf_request->getUriPrefix())+1) ?>
<?php echo pager_navigation($pager, $uri) ?>
                </div>
<?php echo pager_results($pager) ?>
<?php echo repagination_links($pager, $uri) ?>
            </th></tr>
        </tfoot>
    </table>
</div>

<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?> :</li>
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

<div style="width: 100%; text-align: right;">
    <div class="tableBottomTotal"><div id="expTotal" class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total_r, 'EUR') ?></span>
    </div></div>
</div>

</form>

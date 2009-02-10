<?php if (count($expense_items)) : ?>
<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<div class="windowFrame" id="<?php echo $related ?>ViewExpenses">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th class="date"><?php echo __('Date') ?></th>
                <th class="nuber"><?php echo __('Number') ?></th>
                <th><?php echo __('Item name') ?></th>
                <th><?php echo __('Category') ?></th>
                <th class="currency"><?php echo __('Amount') ?></th>
                <th class="currency"><?php echo __('Tax') ?></th>
                <th class="currency"><?php echo __('IRPF') ?></th>
                <th class="currency"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $total_r = 0; foreach ($expense_items as $expense_item): ?>
<?php
    $tax_rate = ext_format_number($expense_item->getExpenseItemTaxRate(), 2);
    $subtotal = $expense_item->getExpenseItemAmount();
    $base = ($expense_item->getExpenseItemBase()) ? $expense_item->getExpenseItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $expense_item->getExpenseItemIrpf();
    $total_r += $total;
?>
            <tr>
                <td class="actions" id="expenseMenu_<?php echo $expense_item->getId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'expense/show?id='.$expense_item->getId()) ?></li>
                  <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'expense/edit?id='.$expense_item->getId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                    'update'   => 'expense'.$expense_item->getId(),
                    'url'      => 'expense/delete?id='.$expense_item->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td class="date"><?php echo format_date($expense_item->getExpensePurchaseDate()) ?></td>
                <td><?php echo $expense_item->getExpenseItemInvoiceNumber() ?></td>
                <td><?php echo link_to($expense_item->getExpenseItemName(), 'expense/show?id='.$expense_item->getId()) ?></td>
                <td><?php echo $expense_item->getExpenseCategory() ?></td>
                <td class="currency"><?php echo format_currency($expense_item->getExpenseItemAmount(), 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($tax, 'EUR').' ('.format_percent($tax_rate).')' ?></td>
                <td class="currency"><?php echo format_currency($expense_item->getExpenseItemIrpf(), 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($total, 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($total_r) : ?>
<div class="sum">
    <div class="tableBottomTotal"><div class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total_r, 'EUR') ?></span>
    </div></div>
</div>
<?php endif ?>
</div>
<?php else : ?>
  <p><?php echo __('No related expense items yet') ?></p>
<?php endif ?>
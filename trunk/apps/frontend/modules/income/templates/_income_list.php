<?php if (count($income_items)) : ?>
<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<div class="windowFrame" id="<?php echo $related ?>ViewIncomes">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th class="date"><?php echo __('Date') ?></th>
                <th class="number"><?php echo __('Number') ?></th>
                <th><?php echo __('Item name') ?></th>
                <th><?php echo __('Category') ?></th>
                <th class="currency"><?php echo __('Amount') ?></th>
                <th class="currency"><?php echo __('Tax rate') ?></th>
                <!--<th class="currency"><?php echo __('Tax') ?></th>-->
                <th class="currency"><?php echo __('IRPF') ?></th>
                <th class="currency"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $total_r = 0; foreach ($income_items as $income_item): ?>
<?php
    $tax_rate = ext_format_number($income_item->getIncomeItemTaxRate(), 2);
    $subtotal = $income_item->getIncomeItemAmount();
    $base = ($income_item->getIncomeItemBase()) ? $income_item->getIncomeItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $income_item->getIncomeItemIrpf();
    $total_r += $total;
?>
            <tr>
                <td class="actions" id="incomeMenu_<?php echo $income_item->getId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'income/show?id='.$income_item->getId()) ?></li>
                  <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'income/edit?id='.$income_item->getId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                    'update'   => 'income'.$income_item->getId(),
                    'url'      => 'income/delete?id='.$income_item->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td class="date"><?php echo format_date($income_item->getIncomeDate()) ?></td>
                <td><?php echo $income_item->getIncomeItemInvoiceNumber() ?></td>
                <td><?php echo link_to($income_item->getIncomeItemName(), 'income/show?id='.$income_item->getId()) ?></td>
                <td><?php echo $income_item->getIncomeCategory() ?></td>
                <td class="currency"><?php echo format_currency($income_item->getIncomeItemAmount(), 'EUR') ?></td>
                <td class="number"><?php echo format_percent($tax_rate) ?></td>
                <!--<td class="currency"><?php echo format_currency($tax, 'EUR') ?></td>-->
                <td class="currency"><?php echo format_currency($income_item->getIncomeItemIrpf(), 'EUR') ?></td>
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
  <p><?php echo __('No related income items yet') ?></p>
<?php endif ?>
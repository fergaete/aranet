<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php $optional = 0; $total = 0; $oitems = array(); ?>
    <div id="budgetItems">
        <table class="dataTable">
                <thead>
                    <tr>
                        <th style="width: 2%; text-align: center;">#</th>
                        <th style="width: 50%;"><?php echo __('Item Description') ?></th>
                        <th style="width: 12%;"><?php echo __('Type') ?></th>
                        <th style="width: 12%; text-align: center;"><?php echo __('Qty') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Subtotal') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Total') ?></th>
                    </tr>
                  </thead>
                  <tbody id="order">
<?php $i = 0; foreach ($budget_items as $budget_item): $odd = !fmod(++$i, 2); ?>
                    <tr id="budgetitem_<?php echo $budget_item->getId() ?>" class="row_<?php echo $odd ?>">
                        <td style="vertical-align: top; text-align: center;"><?php echo $budget_item->getItemIsOptional() ? 'O.' . $i: $i ?></td>
                        <td><?php echo $budget_item->getItemDescription() ?></td>
                        <td style="vertical-align: top;"><?php echo $budget_item->getTypeOfInvoiceItem() ?></td>
                        <td style="vertical-align: top; text-align: center;"><?php echo $budget_item->getItemIsOptional() ? '' : $budget_item->getItemQuantity() ?></td>
                        <td style="vertical-align: top; text-align: right;"><?php echo format_currency($budget_item->getItemRetailPrice(), 'EUR') ?></td>
                        <td style="vertical-align: top; text-align: right;"><?php echo $budget_item->getItemIsOptional() ? '' : format_currency(($budget_item->getItemRetailPrice() * $budget_item->getItemQuantity()), 'EUR') ?></td>
                    </tr>
<?php if (!$budget_item->getItemIsOptional()) : ?>
<?php $total += ($budget_item->getItemRetailPrice() * $budget_item->getItemQuantity()); ?>
<?php else : ?>
<?php $optional += ($budget_item->getItemRetailPrice() * $budget_item->getItemQuantity());
array_push($oitems, $budget_item) ?>
<?php endif ?>
<?php endforeach ?>
                  </tbody>
<?php echo sortable_element('order', array(
  'url'    => 'budget/orderitems',
 'loading'  => visual_effect('appear', "indicator-bitems"),
 'complete' => visual_effect('fade', "indicator-bitems"),
  'tag'   => 'tr'
)) ?>
<?php
    $tax_rate = ext_format_number($budget->getBudgetTaxRate(), 2);
    $subtotal = $budget->getBudgetTotalAmount();
    $tax = $tax_rate * $subtotal / 100;
    $total = $subtotal + $tax;
?>
                  <tfooter>
                    <tr id="rowShipping" style="background: #E9F4FF; display: none;">
                        <td style="width: 88%;text-align:right;" colspan="5"><strong><?php echo __('Shipping') ?></strong></td>
                        <td style="width: 12%; text-align: right;"><span id="displayShipping" style="font-weight: bold;">$0.00</span></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 88%; text-align: right;" colspan="5"><strong><span style="padding: 3px;"><?php echo __('Subtotal') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="budgetSubtotal"><?php echo format_currency($subtotal, "EUR") ?></span></strong></td>
                    </tr><tr id="rowTax" style="background: #E9F4FF;">
                        <td style="width: 88%;text-align:right;" colspan="5"><strong><?php echo __('Sales Tax') ?> (<span id="displayTaxRate"><?php echo format_percent($tax_rate) ?></span>)</b></td>
                        <td style="width: 12%; text-align: right;"><strong><span id="taxTotal"><?php echo format_currency($tax, "EUR") ?></span></strong></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 88%; text-align: right;" colspan="5"><strong><span style="padding: 3px;"><?php echo __('Total') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="budgetTotal"><?php echo format_currency($total, "EUR") ?></span></strong></td>
                    </tr>
                  </tfooter>
                </table>
     </div>

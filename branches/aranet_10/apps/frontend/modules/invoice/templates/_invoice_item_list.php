<?php use_helper('Number', 'NumberExtended') ?>
<?php
    $tax_rate = ext_format_number($invoice->getInvoiceTaxRate(), 2);
    $subtotal = $invoice->getInvoiceTotalAmount();
    $tax = $tax_rate * $subtotal / 100;
    $total = $subtotal + $tax;
?>
    <div id="invoiceItems"><table class="dataTable">
                <thead>
                    <tr>
                        <th style="width: 52%;"><?php echo __('Item Description') ?></th>
                        <th style="width: 12%;"><?php echo __('Type') ?></th>
                        <th style="width: 12%; text-align: center;"><?php echo __('Qty') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Cost/Rate') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Total') ?></th>
                    </tr>
                  </thead>
                  <tbody>
<?php $i = 0; foreach ($invoice_items as $invoice_item): $odd = !fmod(++$i, 2); ?>
                    <tr id="invoice_item<?php echo $invoice_item->getId() ?>" class="row_<?php echo $odd ?>">
                        <td><?php echo $invoice_item->getItemDescription() ?></td>
                        <td style="vertical-align: top;"><?php echo $invoice_item->getTypeOfInvoiceItem() ?></td>
                        <td style="vertical-align: top; text-align: center;"><?php echo $invoice_item->getItemQuantity() ?></td>
                        <td style="vertical-align: top; text-align: right;"><?php echo format_currency($invoice_item->getItemCost()) ?></td>
                        <td style="vertical-align: top; text-align: right;"><?php echo format_currency($invoice_item->getItemCost() * $invoice_item->getItemQuantity()) ?></td>
                    </tr>
<?php endforeach ?>
                  </tbody>
                  <tfooter>
                    <tr id="rowShipping" style="background: #E9F4FF; display: none;">
                        <td style="width: 88%;text-align:right;" colspan="4"><strong><?php echo __('Shipping') ?></strong></td>
                        <td style="width: 12%; text-align: right;"><span id="displayShipping" style="font-weight: bold;">$0.00</span></td>
                    </tr><tr id="rowTax" style="background: #E9F4FF;">
                        <td style="width: 88%;text-align:right;" colspan="4"><strong><?php echo __('Sales Tax') ?> (<span id="displayTaxRate"><?php echo format_percent($tax_rate) ?></span>)</b></td>
                        <td style="width: 12%; text-align: right;"><strong><span id="taxTotal"><?php echo format_currency($tax, "EUR") ?></span></strong></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 88%; text-align: right;" colspan="4"><strong><span style="padding: 3px;"><?php echo __('Subtotal') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="invoiceSubtotal"><?php echo format_currency($subtotal, "EUR") ?></span></strong></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 88%; text-align: right;" colspan="4"><strong><span style="padding: 3px;"><?php echo __('Total') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="invoiceTotal"><?php echo format_currency($total, "EUR") ?></span></strong></td>
                    </tr>
                  </tfooter>
                </table>
     </div>

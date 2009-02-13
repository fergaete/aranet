<?php use_helper('Number', 'NumberExtended', 'Object', 'Javascript') ?>
<?php
    $tax_rate = ext_format_number($invoice->getInvoiceTaxRate(), 2);
    $subtotal = $invoice->getInvoiceTotalAmount();
    $tax = $tax_rate * $subtotal / 100;
    $total = $subtotal + $tax;
    $iitem = new InvoiceItem();
    array_push($invoice_items, $iitem);
?>
<?php $i = -1; foreach ($invoice_items as $invoice_item) : ?>
<?php $i++ ?>
<div id="indicator-<?php echo $i ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <div id="invoiceItems-<?php echo $i ?>"><table class="dataTable">
<?php echo input_hidden_tag('items['.$i.'][id]', $invoice_item->getId()) ?>
                    <tr>
                        <th style="width: 40%;"><?php echo __('Item Description') ?></th>
                        <th style="width: 12%;"><?php echo __('Type') ?></th>
                        <th style="width: 12%;"><?php echo __('Qty') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Cost') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Total') ?></th>
                        <th style="width: 12%;"></th>
                    </tr>
                    <tr>
                        <td><?php echo object_input_hidden_tag($invoice_item, 'getItemInvoiceId') ?>
                            <?php echo object_textarea_tag($invoice_item, 'getItemDescription', array (
                            'size' => '30x3', 'class' => 'form-textarea', 'name' => 'items['.$i.'][description]')) ?></td>
                        <td style="vertical-align: top;"><?php echo object_select_tag($invoice_item, 'getItemTypeId', array('related_class' => 'TypeOfInvoiceItem', 'peer_method' => 'doSelect', 'include_custom' => __('Select').'...', 'class' => 'form-small-combo', 'name' => 'items['.$i.'][type_id]')) ?></td>
                        <td style="vertical-align: top;"><?php echo object_input_tag($invoice_item, 'getItemQuantity', array (
                            'size' => 7, 'class' => 'form-tiny-text', 'name' => 'items['.$i.'][quantity]')) ?></td>
                        <td style="vertical-align: top;"><?php echo object_input_tag($invoice_item, 'getItemCost', array (
                            'size' => 7, 'class' => 'form-tiny-text', 'name' => 'items['.$i.'][cost]')) ?></td>
                        <td style="vertical-align: top; text-align: right;">
                            <?php echo input_tag('items['.$i.'][total]', ($invoice_item->getItemQuantity() * $invoice_item->getItemCost()), array (
                            'size' => 7, 'class' => 'form-tiny-text')) ?>
                        </td>
                        <td style="vertical-align: top; text-align: center;">
                        <?php if ($i == count($invoice_items)-1) : ?>
                        <?php echo link_to_remote(image_tag('buttonAdd.gif', 'alt="Add Item"'), array(
                            'update' => 'invoiceItems-'.($i+1),
                            'url' => 'invoice/createitem?index='.($i+1),
                            'loading'  => visual_effect('appear', "indicator-".($i+1)),
                            'complete' => visual_effect('fade', "indicator-".($i+1)).
                                          visual_effect('highlight', "invoiceItems-".($i+1)),
                                          )) ?>
                        <?php else: ?>
                        <?php echo link_to_remote(image_tag('buttonDel.gif', 'alt="Delete Item"'), array(
                            'update' => 'invoiceItems-'.$i,
                            'url' => 'invoice/deleteitem?id='.$invoice_item->getId(),
                            'loading'  => "Element.show('indicator-".$i."')",
                            'complete' => "Element.hide('indicator-".$i."')")) ?>
                        <?php endif ?>
                        </td>
                    </tr>
                </table>
         </div>
<?php endforeach ?>
<div id="indicator-<?php echo ($i+1) ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <div id="invoiceItems-<?php echo ($i+1) ?>">
    </div>

    <div id="invoiceFooter">
        <table class="dataTable"><tr id="rowShipping" style="background: #E9F4FF;">
                        <td style="width: 76%; text-align: right" colspan="4"><strong><?php echo __('Shipping') ?></strong></td>
                        <td style="width: 12%; text-align: right;"><span id="displayShipping" style="font-weight: bold;"><?php //echo format_currency($invoice->getInvoiceShippingCost(), 'EUR') ?></span></td>
                        <td style="width: 12%;"></td>
                    </tr><tr id="rowTax" style="background: #E9F4FF;">
                        <td style="width: 76%;text-align:right;" colspan="4"><strong><?php echo __('Sales Tax') ?> (<span id="displayTaxRate"><?php echo $tax_rate ?></span>%)</b></td>
                        <td style="width: 12%; text-align: right;"><strong><span id="taxTotal"><?php echo format_currency($tax, 'EUR' ) ?></span></strong></td>
                        <td style="width: 12%;"></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 76%; text-align: right;" colspan="4"><strong><span style="padding: 3px;"><?php echo __('Subtotal') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="invoiceTotal"><?php echo format_currency($subtotal, 'EUR' ) ?></span></strong></td>
                            <td style="width: 12%;"></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 76%; text-align: right;" colspan="4"><strong><span style="padding: 3px;"><?php echo __('Total') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="invoiceTotal"><?php echo format_currency($total, 'EUR' ) ?></span></strong></td>
                            <td style="width: 12%;"></td>
                    </tr>
        </table>
    </div>

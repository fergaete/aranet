<?php use_helper('Number', 'NumberExtended', 'Object', 'Javascript') ?>
<?php
    $tax_rate = ext_format_number($budget->getBudgetTaxRate(), 2);
    $subtotal = $budget->getBudgetTotalAmount();
    $tax = $tax_rate * $subtotal / 100;
    $total = $subtotal + $tax;
    $bitem = new BudgetItem();
    array_push($budget_items, $bitem);
?>
<?php $i = -1; foreach ($budget_items as $budget_item) : ?>
<?php $i++ ?>
<?php include_partial('budget_item_form', array('i' => $i, 'budget_item' => $budget_item, 'max' => count($budget_items)-1)) ?>
<?php endforeach ?>
<div id="indicator-<?php echo ($i+1) ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <div id="budgetItems-<?php echo ($i+1) ?>">
    </div>

    <div id="budgetFooter">
        <table class="dataTable"><tr id="rowShipping" style="background: #E9F4FF;">
                        <td style="width: 84%; text-align: right" colspan="5"><strong><?php echo __('Shipping') ?></strong></td>
                        <td style="width: 12%; text-align: right;"><span id="displayShipping" style="font-weight: bold;">0.00</span></td>
                        <td style="width: 4%;"></td>
                    </tr><tr id="rowTax" style="background: #E9F4FF;">
                        <td style="width: 84%;text-align:right;" colspan="5"><strong><?php echo __('Sales Tax') ?> (<span id="displayTaxRate"><?php echo $tax_rate ?></span>%)</b></td>
                        <td style="width: 12%; text-align: right;"><strong><span id="taxTotal"><?php echo format_currency($tax, 'EUR' ) ?></span></strong></td>
                        <td style="width: 4%;"></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 84%; text-align: right;" colspan="5"><strong><span style="padding: 3px;"><?php echo __('Subtotal') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="budgetTotal"><?php echo format_currency($subtotal, 'EUR' ) ?></span></strong></td>
                            <td style="width: 4%;"></td>
                    </tr><tr style="background: #E9F4FF;">
                            <td style="width: 84%; text-align: right;" colspan="5"><strong><span style="padding: 3px;"><?php echo __('Total') ?></span><strong></td>
                            <td style="width: 12%; text-align: right;"><strong><span id="budgetTotal"><?php echo format_currency($total, 'EUR' ) ?></span></strong></td>
                            <td style="width: 4%;"></td>
                    </tr>
        </table>
    </div>


<?php use_helper('Number', 'NumberExtended') ?>
<?php
    $tax_rate = ext_format_number($income_item->getIncomeItemTaxRate(), 2);
    $subtotal = $income_item->getIncomeItemAmount();
    $base = ($income_item->getIncomeItemBase()) ? $income_item->getIncomeItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $income_item->getIncomeItemIrpf();
?>
<h3 id="pageSubTitle" style="padding-left: 56px; padding-top: 10px;"><?php echo __('View income details') ?> <span class="subText">(<?php echo ($income_item->getIncomeItemVendorId() ) ? $income_item->getVendor() . ' - ' . $income_item->__toString() : '' ?>)</span></h3>

<div id="invoiceDisplay" style="width: 100%;" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo ($income_item->getIncomeItemVendorId()) ? link_to($income_item->getVendor()->getFullName(false), 'vendor/show?id=' . $income_item->getVendor()->getId()) : '' ?></span><br \>
            <?php include_partial('address/basic_data', array('address' => $income_item->getVendor()->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $income_item->getVendor()->getContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Status') ?></strong></td>
                            <td class="rightCol"><?php echo __('Date') . ': ' . format_date($income_item->getIncomeDate()) . '<br/>' .  $income_item->getPaymentMethod() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Invoice') ?></strong></td>
                            <td class="rightCol"><?php echo $income_item->getIncomeItemInvoiceNumber() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project & Budget') ?></strong></td>
                            <td class="rightCol"><strong><?php echo ($income_item->getIncomeItemProjectId()) ? link_to($income_item->getProject(), 'project/show?id=' . $income_item->getIncomeItemProjectId()) : '' ?></strong>
                               <?php echo ($income_item->getIncomeItemBudgetId()) ? '<br/>' . link_to($income_item->getBudget()->getFullTitle(), 'budget/show?id=' . $income_item->getIncomeItemBudgetId()) : '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Comments') ?></strong></td>
                            <td class="rightCol"><?php echo $income_item->getIncomeItemComments() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Category') ?></strong></td>
                            <td class="rightCol"><?php echo $income_item->getIncomeCategory() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Amount') ?></strong></td>
                            <td class="rightCol">
                            <?php if (!$tax && !$income_item->getIncomeItemIrpf()) : ?>
                            <strong><?php echo format_currency($total, 'EUR') ?></strong>
                            <?php else: ?>
                            <table style="width: 100%">
                            <?php if ($tax || $income_item->getIncomeItemIrpf()) : ?>
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('Subtotal') ?></th>
                                <td><?php echo format_currency($subtotal, 'EUR') ?></td>
                            </tr>
                            <?php endif ?>
                            <?php if ($tax) : ?>
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('Tax')  . ' (' . format_percent($tax_rate) . ')' ?></th>
                                <td><?php echo format_currency($tax, 'EUR') ?></td>
                            </tr>
                            <?php endif ?>
                            <?php if ($income_item->getIncomeItemIrpf()) : ?>
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('IRPF') ?></th>
                                <td><?php echo format_currency($income_item->getIncomeItemIrpf(), 'EUR') ?></td>
                            </tr>
                            <?php endif ?>
                            <tr>
                                <th style="text-align: right; width:40%"><strong><?php echo __('Total') ?></strong></th>
                                <td><strong><?php echo format_currency($total, 'EUR') ?></strong></td>
                            </tr>
                            </table>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $income_item->getTags()) ?></td>
                        </tr>
                    </table>
                </div>
                <div id="incDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit income details"'), '/income/edit?id=' . $income_item->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonCopyLarge.gif', 'alt="Copy income"'), '/income/create?id=' . $income_item->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete income"'), '/income/delete?id=' . $income_item->getId(), 'post=true&confirm=' . __('Are you sure?')) ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>

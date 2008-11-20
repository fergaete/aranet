<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php aranet_title(__('Show expense')) ?>
<?php
    $tax_rate = ext_format_number($expense_item->getExpenseItemTaxRate(), 2);
    $subtotal = $expense_item->getExpenseItemAmount();
    $base = ($expense_item->getExpenseItemBase()) ? $expense_item->getExpenseItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $expense_item->getExpenseItemIrpf();
?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View expense details') ?> <span class="subText">(<?php echo $expense_item->getVendor() . ' - ' . $expense_item->__toString() ?>)</span></h3>

<div id="invoiceDisplay" style="width: 100%;" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($expense_item->getVendor()->getFullName(false), 'vendor/show?id=' . $expense_item->getVendor()->getId()) ?></span><br \>
            <?php include_partial('address/basic_data', array('address' => $expense_item->getVendor()->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $expense_item->getVendor()->getContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Status') ?></strong></td>
                            <td class="rightCol"><?php echo __('Purchased') . ': ' . format_date($expense_item->getExpensePurchaseDate()) ?><br/><?php echo __('Paid by %1% (%2%)', array('%1%' => ($expense_item->getExpensePurchaseBy()) ? $expense_item->getsfGuardUserRelatedByExpensePurchaseBy()->getProfile() : $expense_item->getExpensePurchaseBy(), '%2%' => $expense_item->getPaymentMethod())) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Invoice') ?></strong></td>
                            <td class="rightCol"><?php echo $expense_item->getExpenseItemInvoiceNumber() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project & Budget') ?></strong></td>
                            <td class="rightCol"><strong><?php echo ($expense_item->getExpenseItemProjectId()) ? link_to($expense_item->getProject(), 'project/show?id=' . $expense_item->getExpenseItemProjectId()) : '' ?></strong>
                               <?php echo ($expense_item->getExpenseItemBudgetId()) ? '<br/>' . link_to($expense_item->getBudget()->getFullTitle(), 'budget/show?id=' . $expense_item->getExpenseItemBudgetId()) : '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Comments') ?></strong></td>
                            <td class="rightCol"><?php echo $expense_item->getExpenseItemComments() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Category') ?></strong></td>
                            <td class="rightCol"><?php echo $expense_item->getExpenseCategory() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Amount') ?></strong></td>
                            <td class="rightCol">
                            <table style="width: 100%">
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('Subtotal') ?></th>
                                <td><?php echo format_currency($subtotal, 'EUR') ?></td>
                            </tr>
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('Tax')  . ' (' . format_percent($tax_rate) . ')' ?></th>
                                <td><?php echo format_currency($tax, 'EUR') ?></td>
                            </tr>
                            <?php if ($expense_item->getExpenseItemIrpf()) : ?>
                            <tr>
                                <th style="text-align: right; width:40%"><?php echo __('IRPF') ?></th>
                                <td><?php echo format_currency($expense_item->getExpenseItemIrpf(), 'EUR') ?></td>
                            </tr>
                            <?php endif ?>
                            <tr>
                                <th style="text-align: right; width:40%"><strong><?php echo __('Total') ?></strong></th>
                                <td><strong><?php echo format_currency($total, 'EUR') ?></strong></td>
                            </tr>
                          </table>
                          </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $expense_item->getTags()) ?></td>
                        </tr>
                    </table>
                </div>
                <div id="expDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit expense details"'), '/expense/edit?id=' . $expense_item->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonCopyLarge.gif', 'alt="Copy expense"'), '/expense/create?id=' . $expense_item->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete expense"'), '/expense/delete?id=' . $expense_item->getId(), 'post=true&confirm=' . __('Are you sure?')) ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>

<div class="expenseHeader"><div class="headerFiles"><?php echo __('Associated files (#%1%)', array('%1%' => $expense_item->countFiles())) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo '<a href="/file/create?class=ExpenseItem&object_id=' . $expense_item->getId().'&referer=expense/show?id=' . $expense_item->getId() .'">'.image_tag('button_add.gif', __('Upload new file')).'</a>' ?></span>
    <span id="expenseViewFilesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'expenseViewFiles') . visual_effect('appear', 'expenseViewFilesRollDown') . visual_effect('fade', 'expenseViewFilesRollUp')) ?></span>
    <span id="expenseViewFilesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'expenseViewFiles') . visual_effect('appear', 'expenseViewFilesRollUp') . visual_effect('fade', 'expenseViewFilesRollDown')) ?></span>
</div></div>

<div id="expenseViewFiles" class="windowFrame" style="margin-top: 10px;">
<?php include_partial('file/file_list', array('sf_propel_file_storage_infos' => $expense_item->getFiles())) ?>
</div>

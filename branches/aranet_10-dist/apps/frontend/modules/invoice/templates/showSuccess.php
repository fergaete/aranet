<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View invoice details') ?> <span class="subText">(<?php echo $invoice . ' - ' . $invoice->getClient() ?>)</span></h3>

<div id="invoiceDisplay" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($invoice->getClient()->getFullName(false), 'client/show?id=' . $invoice->getClient()->getId()) ?></span><br \>
            <?php include_partial('address/basic_data', array('address' => $invoice->getClient()->getAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $invoice->getDefaultContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Status') ?></strong></td>
                            <td class="rightCol"><?php echo __('Open') . ': ' . format_date($invoice->getInvoiceDate()) . '<br/>' .  $invoice->getPaymentStatus() ?><?php echo ($invoice->getInvoicePaymentStatusId() == 3) ? ': ' . format_date($invoice->getInvoicePaymentDate()) : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project') ?></strong></td>
                            <td class="rightCol">
                              <?php echo ($invoice->getInvoiceProjectId()) ? link_to($invoice->getProject(), 'project/show?id=' . $invoice->getInvoiceProjectId()) . '<br/>' : '' ?>
                              <?php echo ($invoice->getInvoiceBudgetId()) ? link_to($invoice->getBudget()->getFullTitle(), 'budget/show?id=' . $invoice->getInvoiceBudgetId()) : '' ?></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Title') ?></strong></td>
                            <td class="rightCol"><?php echo $invoice->getInvoiceTitle() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Comments') ?></strong></td>
                            <td class="rightCol"><?php echo $invoice->getInvoiceComments() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tax and Freight') ?></strong></td>
                            <td class="rightCol"><?php echo __('Tax rate: %1%  Shipping Costs: %2%', array('%1%' => format_percent($invoice->getInvoiceTaxRate()), '%2%' => format_currency($invoice->getInvoiceFreightCharge(), 'EUR'))) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Payment terms') ?></strong></td>
                            <td class="rightCol"><?php echo $invoice->getPaymentCondition() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $invoice->getTags()) ?></td>
                        </tr>
                    </table>
                </div>
                 <div id="invDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit invoice details"'), '/invoice/edit?id=' . $invoice->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonPrintLarge.gif', 'alt="Print invoice"'), '/invoice/print?id=' . $invoice->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete invoice"'), '/invoice/delete?id=' . $invoice->getId(), 'post=true&confirm=Are you sure?') ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>

<br />
<div style="width: 100%;">
    <div class="headerInvoiceItems" style="float: left; width: 50%;"><?php echo __('Invoice items') ?></div>
    <div id="invItemAction" style="float: left; width: 40%; padding-top: 10px; text-align: right;">
        <?php echo link_to_remote(image_tag('buttonEditLarge.gif', 'alt="Edit Invoice Items"'), array(
           'update' => 'invoiceViewItems',
           'url' => 'invoice/edititems?id='.$invoice->getId(),
           'loading'  => visual_effect('appear', "indicator-iitems"),
           'complete' => visual_effect('fade', "indicator-iitems").
                         visual_effect('highlight', "invoiceViewItems"),
           )) ?>
    </div>
    <div style="clear: left;"></div>
    </div>
    <div id="error"></div>
    <div id="invoiceViewItems" class="windowFrame" style="margin-top: 10px;">
    <div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <?php include_partial('invoice_item_list', array('invoice_items' => $invoice->getInvoiceItems(), 'invoice' => $invoice)) ?>
    </div>
</div>

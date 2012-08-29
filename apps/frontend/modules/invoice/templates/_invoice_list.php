<?php use_helper('Number') ?>
<div id="<?php echo $id ?>">
<div class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th><?php echo __('Nº') ?></th>
                <th><?php echo __('Title') ?></th>
                <th class="date"><?php echo __('Created') ?></th>
                <th class="status"><?php echo __('Status') ?></th>
                <th class="currency"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $total = 0; foreach ($invoices as $invoice): $total += $invoice->getInvoiceTotalAmount() ?>
            <tr>
                <td class="actions" id="invoiceMenu_<?php echo $invoice->getId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'invoice/show?id='.$invoice->getId()) ?></li>
                  <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'invoice/edit?id='.$invoice->getId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                    'update'   => 'invoice'.$invoice->getId(),
                    'url'      => 'invoice/delete?id='.$invoice->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td><?php echo link_to($invoice, 'invoice/show?id='.$invoice->getId()) ?></td>
                <td><?php echo $invoice->getInvoiceTitle() ?></td>
                <td class="date"><?php echo format_date($invoice->getInvoiceDate()) ?></td>
                <td class="status"><?php echo $invoice->getPaymentStatus() ?></td>
                <td class="currency"><?php echo format_currency($invoice->getInvoiceTotalAmount(), 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($total) : ?>
<div class="sum">
    <div class="tableBottomTotal"><div class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total, 'EUR') ?></span>
    </div></div>
</div>
<?php endif ?>
</div>
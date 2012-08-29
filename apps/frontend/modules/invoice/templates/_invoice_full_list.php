<?php use_helper('Number', 'Javascript', 'gWidgets') ?>
<?php echo form_tag('invoice/delete', 'name="chklist"') ?>
<div id="invoiceDisplay" style="width: 100%;" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 10%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'invoice/sort') == 'invoice_number'): ?>
                    <?php echo link_to(__('Nº'), 'invoice/list?sort=invoice_number&type='.($sf_user->getAttribute('type', 'asc', 'invoice/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'invoice/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Nº'), 'invoice/list?sort=invoice_number&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 29%"><?php echo __('Title') ?></th>
                <th style="width: 24%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'invoice/sort') == 'invoice_client_id'): ?>
                    <?php echo link_to(__('Client'), 'invoice/list?sort=invoice_client_id&type='.($sf_user->getAttribute('type', 'asc', 'invoice/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'invoice/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Client'), 'invoice/list?sort=invoice_client_id&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 8%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'invoice/sort') == 'created_at'): ?>
                    <?php echo link_to(__('Created'), 'invoice/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'invoice/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'invoice/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Created'), 'invoice/list?sort=created_at&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 7%;"><?php echo __('Status') ?></th>
                <th style="width: 22%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'invoice/sort') == 'invoice_total_amount'): ?>
                    <?php echo link_to(__('Total'), 'invoice/list?sort=invoice_total_amount&type='.($sf_user->getAttribute('type', 'asc', 'invoice/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'invoice/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Total'), 'invoice/list?sort=invoice_total_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total = 0; foreach ($pager->getResults() as $invoice): $odd = fmod(++$i, 2); $total += $invoice->getInvoiceTotalAmount(); ?>
            <tr id="invoice_<?php echo $invoice->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $invoice->getId(), false) ?></td>
                <td class="actions" id="invoiceMenu_<?php echo $invoice->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'invoice/show?id='.$invoice->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'invoice/edit?id='.$invoice->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                                'update'   => 'invoice_'.$invoice->getId(),
                                'url'      => 'invoice/delete?id='.$invoice->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($invoice->getInvoicePrefix() . $invoice->getInvoiceNumber(), 'invoice/show?id='.$invoice->getId()) ?></td>
                <td><?php echo $invoice->getInvoiceTitle() ?></td>
                <td><?php echo link_to($invoice->getClient()->getClientCompanyName(), 'client/show?id=' . $invoice->getInvoiceClientId()) ?></td>
                <td class="date"><?php echo format_date($invoice->getInvoiceDate()) ?></td>
                <td class="status" id="payStatus<?php echo $invoice->getId() ?>">
                <div id="statusTip<?php echo $invoice->getId() ?>" style="display:none"><?php echo __('Created') . ': ' . format_date($invoice->getInvoiceDate()) . '<br/>' .  $invoice->getPaymentStatus() ?><?php echo ($invoice->getInvoicePaymentStatusId() == 3) ? ': ' . format_date($invoice->getInvoicePaymentDate()) : '' ?></div>
                  <?php $tooltip = array(
                        'class'        => 'gtip',
                        'title'        => __('Payment status'),
                        'gtip'         => '#statusTip'. $invoice->getId(),
                        'query_string' => '?eventOff=click');
                        $remote = array(
                        'update' => 'payWindow'.$invoice->getId(),
                        'url' => 'invoice/editstatus?id='.$invoice->getId(),
                        'complete' => visual_effect('appear', "payWindow".$invoice->getId())) ?>
                  <?php if (file_exists(sfConfig::get('sf_web_dir') . '/images/iconInvoice'.$invoice->getInvoicePaymentStatusId().'.gif')) : ?>
                  <?php echo link_to_remote(image_tag('iconInvoice'.$invoice->getInvoicePaymentStatusId().'.gif', array_merge($tooltip, array('alt' => $invoice->getPaymentStatus(), 'valign' => 'absmiddle'))), $remote) ?>
                  <?php else : ?>
                   <?php echo link_to_remote($invoice->getPaymentStatus(), $remote) ?>
                  <?php endif ?>
                  <div id="payWindow<?php echo $invoice->getId() ?>" style="display:none" class="popUpDiv"></div>
               </td>
                <td class="currency"><?php echo format_currency($invoice->getInvoiceTotalAmount(), 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="8">
                <div class="pagination">
<?php use_helper('Pagination'); $uri = substr($sf_request->getUri(), strlen($sf_request->getUriPrefix())+1) ?>
<?php echo pager_navigation($pager, $uri) ?>
                </div>
<?php echo pager_results($pager) ?>
<?php echo repagination_links($pager, $uri) ?>
            </th></tr>
        </tfoot>
    </table>
</div>

<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?> :</li>
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

<div style="width: 100%; text-align: right;">
    <div class="tableBottomTotal"><div id="expTotal" class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total, 'EUR') ?></span>
    </div></div>
</div>

</form>
<?php use_helper('Javascript') ?>
<div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>


<?php echo form_tag('invoice/updateitems', 'name=items') ?>

<?php echo input_hidden_tag('invoice_id', $invoice->getId()) ?>

<?php include_partial('invoice_item', array('invoice_items' => $invoice->getInvoiceItems(), 'invoice' => $invoice)) ?>
<table class="gridTable" width="100%">
<tbody>
<tr>
  <td style="border: medium none ;"></td>
  <td style="border: medium none ; text-align: left;">
    <?php echo submit_to_remote('ajax_submit', "", array(
        'url'      => 'invoice/updateitems',
        'update' => 'invoiceViewItems',
        'loading'  => visual_effect('appear', "indicator-iitems"),
        'complete' => visual_effect('fade', "indicator-iitems").
                      visual_effect('highlight', "invoiceViewItems"),
        ), array('class' => 'form-save')) ?>
    <?php echo link_to_remote(image_tag('button_close.gif', 'alt="Close"'), array(
    'url' => 'invoice/listitems?id=' . $invoice->getId(),
    'update' => 'invoiceViewItems',
    'loading'  => visual_effect('appear', "indicator-iitems"),
    'complete' => visual_effect('fade', "indicator-iitems").
                  visual_effect('highlight', "invoiceViewItems"),
     )) ?>
        </td>
    </tr>

</tbody>
</table>
</form>
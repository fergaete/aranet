<?php use_helper('Javascript') ?>
<div id="indicator-iitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<?php include_partial('invoice_item_list', array('invoice_items' => $invoice->getInvoiceItems(), 'invoice' => $invoice)) ?>

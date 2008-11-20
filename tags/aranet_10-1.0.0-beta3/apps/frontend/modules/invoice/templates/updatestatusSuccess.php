<?php use_helper('Javascript') ?>
<?php $link = (file_exists(sfConfig::get('sf_web_dir') . '/images/iconInvoice'.$invoice->getInvoicePaymentStatusId().'.gif')) ? image_tag('iconInvoice'.$invoice->getInvoicePaymentStatusId().'.gif', array('alt' => $invoice->getPaymentStatus())) : $invoice->getPaymentStatus() ?>
                  <?php echo link_to_remote($link,  array(
                    'update' => 'payWindow'.$invoice->getId(),
                    'url' => 'invoice/editstatus?id='.$invoice->getId(),
                    'complete' => visual_effect('appear', "payWindow".$invoice->getId()),
                    )) ?>
                  <div id="payWindow<?php echo $invoice->getId() ?>" style="display:none" class="popUpDiv"></div>
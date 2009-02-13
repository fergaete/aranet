<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<div class="popUpWindow" id="ABBApayWindow<?php echo $invoice_id ?>" style="text-align: left; width: 320px;">
    <div style="text-align: right;">
        <?php echo link_to_function(image_tag('buttonCloseSmall.gif', 'alt="Close"'),
            visual_effect('fade', 'payWindow' . $invoice_id)) ?>
    </div>
    <div style="height: 5px;"></div>
    <div id="windowContent" style="text-align: left;">
        <div style="text-align: left;" id="invoiceWindowOpen<?php echo $invoice_id ?>">
            <?php echo form_tag('invoice/updatestatus') ?>
            <?php echo input_hidden_tag('id', $invoice_id) ?>
            <strong><?php echo __('Enter payment information') ?>:</strong><br>
            <table style="border: medium none ;">
                <tbody>
                    <tr>
                        <td style="border: medium none ;"><?php echo __('Payment type') ?><br>
                            <?php echo select_tag('invoice_payment_method_id', objects_for_select(PaymentMethodPeer::doSelect(new Criteria()),
                                'getId',
                                '__toString',
                                $invoice->getInvoicePaymentMethodId()
                            )) ?>
                        </td>
                        <td style="border: medium none ;"><?php echo ('Account/Check No.') ?><br>
                            <?php echo input_tag('invoice_payment_check', $invoice->getInvoicePaymentCheck(), array('class' => 'form-text-small')) ?>
                        </td>
                    </tr><tr>
                        <td style="border: medium none ;"><?php echo __('Status') ?><br>
                            <?php echo select_tag('invoice_payment_status_id', objects_for_select(PaymentStatusPeer::doSelect(new Criteria()),
                                'getId',
                                '__toString',
                                $invoice->getInvoicePaymentStatusId()
                            )) ?>
                        </td>
                        <td style="border: medium none ;"><?php echo __('Date paid') ?><br>
                            <?php echo select_day_tag('invoice_payment_date[day]', ($invoice->getInvoicePaymentDate()) ?  date('d', strtotime($invoice->getInvoicePaymentDate())) : date('d'), array ('class' => 'form-tiny-combobox')) ?>
                            <?php echo select_month_tag('invoice_payment_date[month]', ($invoice->getInvoicePaymentDate()) ?  date('m', strtotime($invoice->getInvoicePaymentDate())) : date('m'), 'use_short_month=true', array ('class' => 'form-tiny-combobox')) ?>
                            <?php for($i=2005;$i<=date('Y');$i++) {
                                $options[$i] = $i;
                            } ?>
                            <?php echo select_tag('invoice_payment_date[year]', options_for_select($options, ($invoice->getInvoicePaymentDate()) ?  date('Y', strtotime($invoice->getInvoicePaymentDate())) : date('Y'), array ('class' => 'form-tiny-combobox'))) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php echo submit_to_remote('submit', '', array(
                    'update'   => 'payStatus' . $invoice_id,
                    'url'      => 'invoice/updatestatus',
                ), array('class' => 'form-save')) ?>
            </form>
        </div>
    </div>
</div>

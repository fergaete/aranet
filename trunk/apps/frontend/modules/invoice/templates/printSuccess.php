<?php use_helper('Number', 'NumberExtended', 'ExtendedText') ?>
<?php slot('header') ?>
<fo:block space-after="0.8cm" text-align="start" padding="0.2cm">
    <!-- table start -->
    <fo:table border-collapse="separate" table-layout="fixed" width="100%">
      <fo:table-column column-width="6cm"/>
      <fo:table-column column-width="100%-column-width(1) -column-width(3)" />
      <fo:table-column column-width="9.5cm"/>
      <fo:table-body>
        <fo:table-row>
<fo:table-cell padding="0.2cm" padding-top="0.5cm">
    <fo:block font-size="14pt"
                font-family="DejaVuSans-BoldOblique"
                line-height="28pt"
                text-align="center">
            <?php echo ($invoice->getInvoiceKindOfInvoiceId()) ? $invoice->getKindOfInvoice() : 'Factura' ?>
    </fo:block>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="start">
            FECHA: <fo:inline font-family="DejaVuSans-Bold"><?php echo format_date($invoice->getInvoiceDate()) ?></fo:inline>
    </fo:block>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="start">
            Nº Factura: <fo:inline font-family="DejaVuSans-Bold"><?php echo $invoice ?></fo:inline>
    </fo:block>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="start">
            N.I.F./C.I.F.: <fo:inline font-family="DejaVuSans-Bold"><?php echo $invoice->getClient()->getClientCif() ?></fo:inline>
    </fo:block>
    </fo:table-cell>
    <fo:table-cell><fo:block></fo:block></fo:table-cell>
    <fo:table-cell padding="0.2cm" padding-top="0.5cm" border="0.3mm solid black" height="3.5cm">
    <fo:block font-size="12pt"
                font-family="DejaVuSans-Bold"
                line-height="26pt"
                text-align="center">
            <?php echo $invoice->getClient()->getClientCompanyName() ?>
    </fo:block>
    <?php if ($invoice->getDefaultContact()) : ?>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="24pt"
                text-align="center">
            A/A.: <?php echo $invoice->getContact() ?>
    </fo:block>
    <?php endif ?>
    <?php $address = $invoice->getClient()->getAddress() ?>
<?php if ($address) : ?>
    <fo:block font-size="11pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="center">
            <?php echo $address->getAddressLine1() ?>
    </fo:block>
<?php if ($address->getAddressLine2()) : ?>
    <fo:block font-size="11pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="center">
<?php echo $address->getAddressLine2() ?>
    </fo:block>
<?php endif ?>
    <fo:block font-size="11pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="center">
            <?php echo format_code($address->getAddressPostalCode()) ?> - <?php $location = $address->getAddressLocation(); echo $location ?><?php echo ($address->getAddressState() != $location) ? ' (' . $address->getAddressState() . ')' : ''?>
    </fo:block>
<?php endif ?>
    </fo:table-cell>
    </fo:table-row>
</fo:table-body>
</fo:table>
</fo:block>
<?php end_slot() ?>

<fo:block font-size="12pt" font-family="DejaVuSans" line-height="12pt" space-after="0.4cm"><?php echo  $invoice->getInvoiceTitle() ?></fo:block>

<!-- table start -->
        <fo:table space-after="0.8cm" table-layout="fixed" width="100%" border-collapse="separate" border-color="black" border-style="solid" border-width=".4mm">
            <fo:table-column column-width="10%"/>
            <fo:table-column column-width="15%"/>
            <fo:table-column column-width="48%"/>
            <fo:table-column column-width="17%"/>
            <fo:table-column column-width="10%"/>
            <fo:table-body>
                <fo:table-row>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Cant.</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">P/Unitario</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Concepto</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Importe</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">I.V.A.</fo:block>
                </fo:table-cell>
                </fo:table-row>
                <?php $style = ' padding=".2cm" border-right="0.2mm solid black"'; $style_last = ' padding=".2cm"' ?>
                <?php  $invoice_items = $invoice->getInvoiceItems() ?>
                <?php $i = 0; foreach($invoice_items as $invoice_item): ?>
                <?php
                    $cost = format_currency($invoice_item->getItemCost());
                    $quantity = $invoice_item->getItemQuantity();
                    $description = fo_encode($invoice_item->getItemDescription());
                    $subtotal = format_currency($invoice_item->getItemCost() * $invoice_item->getItemQuantity());
                    $tax = format_percent($invoice_item->getItemTaxRate());
                ?>
                <fo:table-row border-width="0">
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $quantity ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $cost ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="justify" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $description ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $subtotal ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style_last ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $tax ?></fo:block>
                </fo:table-cell>
                </fo:table-row>
                <?php endforeach ?>
                <?php for($i=0; $i<10; $i++) : ?>
                <fo:table-row>
                <fo:table-cell<?php echo $style ?>><fo:block></fo:block></fo:table-cell>
                <fo:table-cell<?php echo $style ?>><fo:block></fo:block></fo:table-cell>
                <fo:table-cell<?php echo $style ?>><fo:block></fo:block></fo:table-cell>
                <fo:table-cell<?php echo $style ?>><fo:block></fo:block></fo:table-cell>
                <fo:table-cell<?php echo $style_last ?>><fo:block></fo:block></fo:table-cell>
                </fo:table-row>
                <?php endfor ?>
</fo:table-body>
</fo:table>
        <!-- table end -->

<!-- table start -->
        <fo:table table-layout="fixed" width="100%" border-collapse="separate" space-after="0.8cm">
            <fo:table-column column-width="14%"/>
            <fo:table-column column-width="18%"/>
            <fo:table-column column-width="16%"/>
            <fo:table-column column-width="16%"/>
            <fo:table-column column-width="16%"/>
            <fo:table-column column-width="20%"/>
            <fo:table-body>
                <fo:table-row>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-bottom-width=".2mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Total bruto</fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-bottom-width=".2mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">I.V.A.</fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-bottom-width=".2mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">TOTAL</fo:block>
                </fo:table-cell>
                </fo:table-row>
                <fo:table-row>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-top-width="0cm">
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans" line-height="12pt"><?php echo format_currency($invoice->getInvoiceTotalAmount(), 'EUR') ?></fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-top-width="0cm">
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans" line-height="12pt"><?php echo format_currency($invoice->getInvoiceTotalAmount() *  $invoice->getInvoiceTaxRate()/100, 'EUR') ?></fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-top-width="0cm">
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans-Bold" line-height="12pt"><?php echo format_currency($invoice->getInvoiceTotalAmount() * (100+$invoice->getInvoiceTaxRate())/100, 'EUR') ?></fo:block>
                </fo:table-cell>
                </fo:table-row>
            </fo:table-body>
        </fo:table>

            <fo:block text-align="left" font-size="10pt" font-family="DejaVuSans" line-height="20pt">Forma de pago: <fo:inline font-family="DejaVuSans-Bold"><?php echo $invoice->getPaymentMethod() ?></fo:inline></fo:block>
<?php if ($invoice->getInvoicePaymentMethodId() == 6) : ?>
            <fo:block text-align="left" font-size="10pt" font-family="DejaVuSans" line-height="20pt">Nº de Cuenta: <fo:inline font-family="DejaVuSans-Bold"><?php echo $invoice->getInvoicePaymentCheck() ?></fo:inline></fo:block>
<?php endif ?>

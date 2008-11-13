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
            Factura
    </fo:block>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="start">
            Fecha: <fo:inline font-family="DejaVuSans-Bold"><?php echo format_date($budget->getBudgetDate()) ?></fo:inline>
    </fo:block>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="20pt"
                text-align="start">
            Presupuesto: <fo:inline font-family="DejaVuSans-Bold"><?php echo $budget->getFullNumber() .'-r' . $budget->getBudgetRevision() ?></fo:inline>
    </fo:block>
    </fo:table-cell>
    <fo:table-cell><fo:block></fo:block></fo:table-cell>
    <fo:table-cell padding="0.2cm" padding-top="0.5cm" border="0.3mm solid black" height="3.5cm">
            <fo:block font-size="12pt"
                font-family="DejaVuSans-Bold"
                line-height="26pt"
                text-align="center">
            <?php echo $budget->getClient()->getClientCompanyName() ?>
    </fo:block>
    <?php if ($budget->getBudgetContactPersonId()) : ?>
    <fo:block font-size="12pt"
                font-family="DejaVuSans"
                line-height="24pt"
                text-align="center">
            A/A.: <?php echo $budget->getContact() ?>
    </fo:block>
    <?php endif ?>
<?php
$addresses = $budget->getContact()->getDefaultAddresses();
$address = $addresses[0] ?>
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
            <?php echo format_code($address->getAddressPostalCode()) ?> -
            <?php $location = $address->getAddressLocation(); echo $location ?>
            <?php echo ($address->getAddressState() != $location) ? ' (' . $address->getAddressState() . ')' : '' ?>
    </fo:block>
    </fo:table-cell>
    </fo:table-row>
</fo:table-body>
</fo:table>
</fo:block>
<?php end_slot() ?>
<?php //slot('title') ?>
<?php if ($budget->getBudgetProjectId()) : ?>
<fo:block font-size="12pt" display-align="after" font-family="DejaVuSans-Bold" line-height="12pt" space-after="0.2cm"><?php echo  $budget->getProject() ?></fo:block>
<?php endif ?>
<fo:block font-size="12pt" font-family="DejaVuSans" line-height="12pt" space-after="0.4cm"><?php echo  $budget->getBudgetTitle() ?>   <!--<fo:inline font-family="DejaVuSans-Oblique" font-size="12pt">(Pág. <fo:page-number/>)</fo:inline>--></fo:block>
<?php //end_slot() ?>


<!-- table start -->
        <fo:table space-after="0.8cm" table-layout="fixed" width="100%" border-collapse="separate" border-color="black" border-style="solid" border-width=".4mm">
            <fo:table-column column-width="6%"/>
            <fo:table-column column-width="52%"/>
            <fo:table-column column-width="10%"/>
            <fo:table-column column-width="15%"/>
            <fo:table-column column-width="17%"/>
            <fo:table-body>
                <fo:table-row>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Itm.</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Concepto</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Cant.</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">P/Unitario</fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width="0mm" border-bottom-width=".4mm" border-right-width=".4mm">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">Importe</fo:block>
                </fo:table-cell>
                </fo:table-row>
                <?php $style = ' padding=".2cm" border-right="0.2mm solid black"'; $style_last = ' padding=".2cm"' ?>
                <?php $budget_items = $budget->getBudgetItems() ?>
                <?php $i = 0; foreach($budget_items as $budget_item): ?>
                <?php
                    $i++;
                    $cost = format_currency($budget_item->getItemRetailPrice());
                    $quantity = $budget_item->getItemQuantity();
                    $description = fo_encode($budget_item->getItemDescription(), 'DejaVuSans');
                    $subtotal = format_currency($budget_item->getItemRetailPrice() * $budget_item->getItemQuantity());
                    $tax = format_percent($budget_item->getItemTaxRate());
                ?>
                <fo:table-row border-width="0">
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo ($budget_item->getItemIsOptional()) ? 'O.'. $i : $i ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="justify" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $description ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo ($budget_item->getItemIsOptional()) ? '' : $quantity ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo $cost ?></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block text-align="center" font-size="10pt" font-family="DejaVuSans" line-height="12pt"><?php echo ($budget_item->getItemIsOptional()) ? '' : $subtotal ?></fo:block>
                </fo:table-cell>
                </fo:table-row>
                <?php endforeach ?>
                <fo:table-row height="2cm">
                <fo:table-cell<?php echo $style ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell<?php echo $style_last ?>>
                    <fo:block></fo:block>
                </fo:table-cell>
                </fo:table-row>
</fo:table-body>
</fo:table>

<!-- table start -->
        <fo:table table-layout="fixed" width="100%" border-collapse="separate" space-after="0.8cm">
            <fo:table-column column-width="10%"/>
            <fo:table-column column-width="18%"/>
            <fo:table-column column-width="16%"/>
            <fo:table-column column-width="20%"/>
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
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-BoldOblique" line-height="12pt">I.V.A. (<?php echo format_percent($budget->getBudgetTaxRate()) ?>)</fo:block>
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
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans" line-height="12pt"><?php echo format_currency($budget->getBudgetTotalAmount(), 'EUR') ?></fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-top-width="0cm">
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans" line-height="12pt"><?php echo format_currency($budget->getBudgetTotalAmount() *  $budget->getBudgetTaxRate()/100, 'EUR') ?></fo:block>
                </fo:table-cell>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <fo:table-cell padding-top="0.2cm" padding-bottom="0.2cm" padding-right="0.1cm" padding-left="0.1cm" border-color="black" border-style="solid" border-width=".4mm" border-top-width="0cm">
                    <fo:block text-align="center" font-size="11pt" font-family="DejaVuSans-Bold" line-height="12pt"><?php echo format_currency($budget->getBudgetTotalAmount() * (100+$budget->getBudgetTaxRate())/100, 'EUR') ?></fo:block>
                </fo:table-cell>
                </fo:table-row>
            </fo:table-body>
        </fo:table>

            <fo:block text-align="left" font-size="10pt" font-family="DejaVuSans" line-height="20pt">Forma de pago: <fo:inline font-family="DejaVuSans-Bold"><?php echo $budget->getPaymentCondition() ?></fo:inline></fo:block>
            <fo:block text-align="left" font-size="10pt" font-family="DejaVuSans" line-height="20pt">Oferta válida hasta: <fo:inline font-family="DejaVuSans-Bold"><?php echo format_date($budget->getBudgetValidDate(), 'D') ?></fo:inline></fo:block>
<?php if ($budget->getBudgetPrintComments()) : ?>
            <fo:block text-align="left" font-size="10pt" font-family="DejaVuSans" line-height="20pt">
                Observaciones: <fo:inline font-family="DejaVuSans-Bold"><?php echo $budget->getBudgetComments() ?></fo:inline></fo:block>
<?php endif ?>

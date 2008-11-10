<?php use_helper('Number', 'NumberExtended', 'ExtendedText') ?>
<?php
// TODO:De momento
$filter_names = array(
    'expense_from' => 'Desde',
    'expense_to' => 'Hasta',
    'expense_name' => 'Nombre',
    'expense_item_category_id' => 'Categoría',
    'expense_purchase_by' => 'Miembro',
    'project_name' => 'Proyecto',
    'expense_item_validation_id' => 'Validación',
    'expense_item_payment_method_id' => 'Forma de pago',
    );
?>
<?php slot('header') ?>
<fo:block space-after="0.6cm" text-align="start" padding="0.2cm">
    <fo:block font-size="12pt" display-align="after" font-family="DejaVuSans-Bold" line-height="16pt" space-after="0.2cm">Listado de gastos</fo:block>
    <?php $filters = $sf_user->getAttributeHolder()->getAll('expense/filters') ?>
    <?php if ($filters) : ?>
    <!-- table start -->
    <fo:table border-collapse="separate" table-layout="fixed" width="100%" border=".4mm solid black">
      <fo:table-column column-width="14%"/>
      <fo:table-column column-width="20%"/>
      <fo:table-column column-width="14%"/>
      <fo:table-column column-width="19%"/>
      <fo:table-column column-width="14%"/>
      <fo:table-column column-width="19%"/>
      <fo:table-body>
        <?php $open_row = false ?>
        <?php $i = 0; foreach ($filters as $key => $value) : ?>
        <?php if ($value) : $i++; $tr = fmod($i, 3); ?>
        <?php if (!fmod(($i-1), 3)) : ?>
            <fo:table-row>
                <?php $open_row = true;?>
        <?php endif ?>
            <fo:table-cell padding=".1cm" border=".2mm solid black">
                <fo:block font-family="DejaVuSans-BoldOblique" font-size="9pt" text-align="end"><?php echo $filter_names[$key]  ?></fo:block>
            </fo:table-cell>
            <fo:table-cell padding=".1cm" border=".2mm solid black">
                <fo:block font-family="DejaVuSans" font-size="9pt">
                <?php switch ($key) {
                    case 'expense_purchase_by':
                        echo sfGuardUserPeer::retrieveByPk($value)->getProfile();
                        break;
                    case 'expense_item_payment_method_id':
                        echo PaymentMethodPeer::retrieveByPk($value);
                        break;
                    case 'expense_item_category_id':
                        echo ExpenseCategoryPeer::retrieveByPk($value);
                        break;
                    case 'expense_item_validation_id':
                        echo ($value == 1) ? __('Waiting approval') : __('Approved');
                        break;

                    default:
                        echo $value;
                } ?></fo:block>
            </fo:table-cell>
<?php if (!$tr) : $open_row = false; ?>
        </fo:table-row>
<?php endif ?>
<?php endif ?>
        <?php endforeach ?>
        <?php while (fmod($i++, 3)) : ?>
            <fo:table-cell><fo:block></fo:block></fo:table-cell>
            <fo:table-cell><fo:block></fo:block></fo:table-cell>
        <?php endwhile ?>
        <?php if ($open_row) : ?>
            </fo:table-row>
        <?php endif ?>
        </fo:table-body>
        </fo:table>
<?php endif ?>
</fo:block>
<?php end_slot() ?>
<!-- table start -->
        <fo:table space-after="0.8cm" table-layout="fixed" width="100%" border-collapse="separate" border-color="black" border-style="solid" border-width=".4mm">
            <?php $colspan = 0 ?>
            <fo:table-body>
                <fo:table-row>
<?php foreach ($report->getReportColumns() as $column) : ?>
<?php if (!isset($filters[strtolower($column->getColumnPhpName())])) : $colspan++; ?>
                <fo:table-cell padding=".1cm" border=".2mm solid black"<?php echo ($column->getColumnWidth()) ? ' width="' . $column->getColumnWidth() . 'cm"' : '' ?>>
                    <fo:block text-align="center" font-size="8pt" font-family="DejaVuSans-BoldOblique" line-height="12pt"><?php echo $column->getColumnName() ?></fo:block>
                </fo:table-cell>
<?php endif ?>
<?php endforeach ?>
                </fo:table-row>
<?php $total = 0; $z = 0; foreach ($pager->getResults() as $expense_item) : $z++; ?>
            <fo:table-row>
<?php foreach ($report->getReportColumns() as $column) : ?>
<?php if (!isset($filters[strtolower($column->getColumnPhpName())])) : ?>
<?php
$script = str_replace('$this', '$expense_item', $column->getColumnEvalScript());
?>
                <fo:table-cell padding=".1cm" border=".2mm solid black" display-align="center">
                    <fo:block text-align="center" font-size="8pt" font-family="DejaVuSans"><?php eval("\$str = " . $script . ";"); echo $str ?></fo:block>
                </fo:table-cell>
<?php endif ?>
<?php endforeach ?>
</fo:table-row>
<?php $total += $expense_item->getExpenseItemAmount() ?>
<?php endforeach ?>
            <fo:table-row>
                <?php for($i = 0;$i < $colspan-3; $i++) : ?>
                <fo:table-cell>
                    <fo:block></fo:block>
                </fo:table-cell>
                <?php endfor ?>
                <fo:table-cell padding=".1cm" display-align="center">
                    <fo:block text-align="end" font-size="9pt" font-family="DejaVuSans-Bold">TOTAL:</fo:block>
                </fo:table-cell>

                <fo:table-cell padding=".1cm" border=".2mm solid black" display-align="center" number-columns-spanned="2">
                    <fo:block text-align="center" font-size="9pt" font-family="DejaVuSans-Bold"><?php echo format_currency($total, 'EUR') ?></fo:block>
                </fo:table-cell>
            </fo:table-row>
        </fo:table-body>
    </fo:table>

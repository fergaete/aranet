<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php echo form_tag('income/deleteall', 'name="chklist"') ?>
<div id="incomeDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th><?php echo __('Item name') ?></th>
                <th><?php echo __('Category') ?></th>
                <th><?php echo __('Project') ?></th>
                <th><?php echo __('Vendor') ?></th>
                <th onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'income/sort') == 'income_date'): ?>
                    <?php echo link_to(__('Date'), 'income/list?sort=income_date&type='.($sf_user->getAttribute('type', 'asc', 'income/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'income/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Date'), 'income/list?sort=income_date&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'income/sort') == 'income_item_amount'): ?>
                    <?php echo link_to(__('Amount'), 'income/list?sort=income_item_amount&type='.($sf_user->getAttribute('type', 'asc', 'income/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'income/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Amount'), 'income/list?sort=income_item_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total_r = 0; foreach ($pager->getResults() as $income_item): $odd = fmod(++$i, 2); $total_r += $income_item->getIncomeItemAmount(); ?>
<?php
    $tax_rate = ext_format_number($income_item->getIncomeItemTaxRate(), 2);
    $subtotal = $income_item->getIncomeItemAmount();
    $base = ($income_item->getIncomeItemBase()) ? $income_item->getIncomeItemBase() : $subtotal;
    $tax = $tax_rate * $base / 100;
    $total = $subtotal + $tax - $income_item->getIncomeItemIrpf();
?>
    <tr id="income_<?php echo $income_item->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $income_item->getId(), false) ?></td>
                <td class="actions" id="incomeMenu_<?php echo $income_item->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), 'income/show?id='.$income_item->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'income/edit?id='.$income_item->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'income_'.$income_item->getId(),
                                'url'      => 'income/delete?id='.$income_item->getId(),
                                'confirm'  => _('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($income_item->getIncomeItemName(), 'income/show?id='.$income_item->getId()) ?></td>
                <td><?php echo $income_item->getIncomeCategory() ?></td>
                <td><?php echo ($income_item->getProject()->getId()) ? link_to($income_item->getProject(), 'project/show?id='.$income_item->getIncomeItemProjectId()) : '' ?></td>
                <td><?php echo ($income_item->getIncomeItemVendorId()) ? link_to($income_item->getVendor(), 'vendor/show?id='.$income_item->getIncomeItemVendorId()) : '' ?></td>
                <td class="date"><?php echo format_date($income_item->getIncomeDate()) ?></td>
                <td class="currency"><?php echo format_currency($subtotal, 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($total, 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="9">
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
    <div class="tableBottomTotal"><div id="incTotal" class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total_r, 'EUR') ?></span>
    </div></div>
</div>

</form>
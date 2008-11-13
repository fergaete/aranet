<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php echo form_tag('cash/deleteall', 'name="chklist"') ?>
<div id="cashDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 20%;"><?php echo __('Item name') ?></th>
                <th style="width: 40%;"><?php echo __('Comments') ?></th>
                <th style="width: 14%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'cash/sort') == 'cash_date'): ?>
                    <?php echo link_to(__('Date'), 'cash/list?sort=cash_date&type='.($sf_user->getAttribute('type', 'asc', 'cash/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'cash/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Date'), 'cash/list?sort=cash_date&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th  style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'cash/sort') == 'cash_item_amount'): ?>
                    <?php echo link_to(__('Amount'), 'cash/list?sort=cash_item_amount&type='.($sf_user->getAttribute('type', 'asc', 'cash/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'cash/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Amount'), 'cash/list?sort=cash_item_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;"><?php echo __('Total') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total_r = 0; foreach ($pager->getResults() as $cash_item): $odd = fmod(++$i, 2); $total_r += $cash_item->getCashItemAmount(); ?>
            <tr id="cash_<?php echo $cash_item->getId() ?>" class="row_<?php echo $odd ?>">
            <tr id="cash_<?php echo $cash_item->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $cash_item->getId(), false) ?></td>
                <td class="actions" id="cashMenu_<?php echo $cash_item->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'cash/edit?id='.$cash_item->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'cash'.$cash_item->getId(),
                                'url'      => 'cash/delete?id='.$cash_item->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo $cash_item ?></td>
                <td><?php echo $cash_item->getCashItemComments() ?></td>
                <td class="date"><?php echo format_date($cash_item->getCashItemDate()) ?></td>
                <td class="currency"><?php echo format_currency($cash_item->getCashitemAmount(), 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($total_r, 'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="7">
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
    <div class="tableBottomTotal"><div id="casTotal" class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total_r, 'EUR') ?></span>
    </div></div>
</div>

</form>
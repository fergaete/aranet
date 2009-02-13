<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php aranet_title(__('List vendors')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all vendors tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all vendors');
endif ?>
</h3>
<?php echo form_tag('vendor/delete', 'name="chklist"') ?>
<div id="vendorDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 22%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'vendor/sort') == 'vendor_company_name'): ?>
                    <?php echo link_to(__('Company'), 'vendor/list?sort=vendor_company_name&type='.($sf_user->getAttribute('type', 'asc', 'vendor/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'vendor/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Company'), 'vendor/list?sort=vendor_company_name&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 20%;"><?php echo __('Contact') ?></th>
                <th style="width: 10%;"><?php echo __('Phone') ?></th>
                <th style="width: 26%;"><?php echo __('Address') ?></th>
                <th style="width: 12%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'vendor/sort') == 'vendor_total_amount'): ?>
                    <?php echo link_to(__('Amount'), 'vendor/list?sort=vendor_total_amount&type='.($sf_user->getAttribute('type', 'asc', 'vendor/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'vendor/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Amount'), 'vendor/list?sort=vendor_total_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $vendor): $odd = fmod(++$i, 2) ?>
            <tr id="vendor_<?php echo $vendor->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $vendor->getId(), false) ?></td>
                <td class="actions" id="vendorMenu_<?php echo $vendor->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), 'vendor/show?id='.$vendor->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'vendor/edit?id='.$vendor->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'vendor_'.$vendor->getId(),
                                'url'      => 'vendor/delete?id='.$vendor->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($vendor->getVendorCompanyName(), 'vendor/show?id='.$vendor->getId()) ?></td>
                <td><?php echo ($vendor->getContact()) ? link_to($vendor->getContact(), 'contact/show?id=' . $vendor->getContact()->getId()) : ''  ?></td>
                <td><?php echo ($vendor->getContact()) ? smart_format_phone($vendor->getContact()->getContactPhone()) : '' ?></td>
                <td><?php echo ($vendor->getDefaultAddress()) ?  $vendor->getDefaultAddress() : '' ?></td>
                <td class="number"><?php //echo format_currency($vendor->getVendorTotalAmount(), "EUR") ?></td>
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

</form>
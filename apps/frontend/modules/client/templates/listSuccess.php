<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php aranet_title(__('List clients')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all clients tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all clients');
endif ?>
</h3>
<?php echo form_tag('client/deleteall', 'name="chklist"') ?>
<div id="clientDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 32%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'client/sort') == 'client_company_name'): ?>
                    <?php echo link_to(__('Company'), 'client/list?sort=client_company_name&type='.($sf_user->getAttribute('type', 'asc', 'client/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'client/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Company'), 'client/list?sort=client_company_name&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 22%;"><?php echo __('Main contact') ?></th>
                <th style="width: 14%;"><?php echo __('Phone') ?></th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'client/sort') == 'client_nb_projects'): ?>
                    <?php echo link_to(__('Projects'), 'client/list?sort=client_nb_projects&type='.($sf_user->getAttribute('type', 'asc', 'client/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'client/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Projects'), 'client/list?sort=client_nb_projects&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width:10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'client/sort') == 'client_total_invoices'): ?>
                    <?php echo link_to(__('Revenue'), 'client/list?sort=client_total_invoices&type='.($sf_user->getAttribute('type', 'asc', 'client/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'client/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Revenue'), 'client/list?sort=client_total_invoices&type=asc') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $client): $odd = fmod(++$i, 2) ?>
            <tr id="client_<?php echo $client->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $client->getId(), false) ?></td>
                <td class="actions" id="clientMenu_<?php echo $client->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), '@show_client_by_id?id='.$client->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), '@edit_client_by_id?id='.$client->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'client_'.$client->getId(),
                                'url'      => 'client/delete?id='.$client->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($client->getFullName(), '@show_client_by_id?id='.$client->getId()) ?></td>
                <?php $dcontact = $client->getDefaultContact() ?>
                <td style="vertical-align: top;"><?php if ($dcontact) : ?>
<?php echo link_to($dcontact, '@show_contact_by_id?id=' . $dcontact->getId()) ?>
<?php echo ($dcontact->getContactEmail()) ? '  ['.mail_to($dcontact->getContactEmail(),'email') . ']': '' ?>
<?php echo ($dcontact->getContactRol()) ? '<br/>'.$dcontact->getContactRol() : '' ?>
<?php endif ?></td>
                <td style="vertical-align: top; text-align: center;"><?php echo ($dcontact instanceof Contact) ? smart_format_phone($dcontact->getContactPhone()) : '' ?></td>
                <td class="number"><?php //echo $client->getClientNbProjects() ?></td>
                <td class="currency"><?php //echo format_currency($client->getClientTotalInvoices(), "EUR") ?></td>
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
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

</form>
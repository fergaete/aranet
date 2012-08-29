<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php echo form_tag('project/delete', 'name="chklist"') ?>
    <div id="projectDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 28%;"><?php echo __('Project title') ?></th>
                <th style="width: 19%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'project/sort') == 'project_client_id'): ?>
                    <?php echo link_to(__('Client'), 'project/list?sort=project_client_id&type='.($sf_user->getAttribute('type', 'asc', 'project/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'project/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Client'), 'project/list?sort=project_client_id&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'project/sort') == 'project_start_date'): ?>
                    <?php echo link_to(__('Start date'), 'project/list?sort=project_start_date&type='.($sf_user->getAttribute('type', 'asc', 'project/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'project/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Start date'), 'project/list?sort=project_start_date&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 8%;"><?php echo __('Status') ?></th>
                <th style="width: 8%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                <?php if ($sf_user->getAttribute('sort', null, 'project/sort') == 'project_total_hours'): ?>
                    <?php echo link_to(__('Hours'), 'project/list?sort=project_total_hours&type='.($sf_user->getAttribute('type', 'asc', 'project/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'project/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Hours'), 'project/list?sort=project_total_hours&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                <?php if ($sf_user->getAttribute('sort', null, 'project/sort') == 'project_total_invoices'): ?>
                    <?php echo link_to(__('Revenue'), 'project/list?sort=project_total_invoices&type='.($sf_user->getAttribute('type', 'asc', 'project/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'project/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Revenue'), 'project/list?sort=project_total_invoices&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                <?php if ($sf_user->getAttribute('sort', null, 'project/sort') == 'project_total_expenses'): ?>
                    <?php echo link_to(__('Expenses'), 'project/list?sort=project_total_expenses&type='.($sf_user->getAttribute('type', 'asc', 'project/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'project/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Expenses'), 'project/list?sort=project_total_expenses&type=asc') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $project): $odd = fmod(++$i, 2) ?>
            <tr id="project_<?php echo $project->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $project->getId(), false) ?></td>
                <td class="actions" id="projectMenu_<?php echo $project->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("button_view.gif", 'alt="'.__('View').'"'), 'project/show?id='.$project->getId()) ?></li>
                            <li><?php echo link_to(image_tag("button_edit.gif", 'alt="'.__('Edit').'"'), 'project/edit?id='.$project->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("button_delete.gif", 'alt="'.__('Delete').'"'), array(
                                'update'   => 'project_'.$project->getId(),
                                'url'      => 'project/delete?id='.$project->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td class="text"><?php echo link_to($project, '@project_show_by_id?id='.$project->getId()) ?></td>
                <td class="text">
                <table>
                <tr>
                <td style="border: none; width:20px"><?php echo ($project->getClient() && $project->getClient()->getClientWebsite()) ? link_to(image_tag('icon_website.gif', 'alt="' . $project->getClient() . '"'), $project->getClient()->getClientWebsite()) : '' ?></td>
                <td style="border:none;"><?php echo $project->getClient() ? link_to($project->getClient(), '@client_show_by_id?id='.$project->getProjectClientId()) : __('Client mark as deleted') //link_to(__('Client mark as deleted'), '@client_show_deleted_by_id?&id='.$project->getProjectClientId()) ?></td>
                </tr>
                </table>
                </td>
                <td class="date"><?php echo format_date($project->getProjectStartDate()) ?></td>
                <td class="status">
                <?php echo icon_gtip(null, array('id' => 'statusTip'.$project->getId(), 'content' => $project->getFullStatus() , 'image' => 'iconStatus.gif', 'status' => $project->getProjectStatusId())) ?></td>
                <td class="currency"><?php //echo format_hour(ext_format_number($project->getProjectTotalHours(),2)) ?></td>
                <td class="currency"><?php //echo format_currency($project->getProjectTotalInvoices(),'EUR') ?></td>
                <td class="currency"><?php //echo format_currency($project->getProjectTotalExpenses(),'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="10">
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
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"if (confirm('".__('Are you sure?')."')) { document.chklist.submit() }") ?></li>
</ul>
</div>

</form>
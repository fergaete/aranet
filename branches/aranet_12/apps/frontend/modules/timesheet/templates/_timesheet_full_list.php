<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php echo form_tag('timesheet/delete', 'name="chklist"') ?>
<div id="timesheetDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 8%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'timesheet/sort') == 'timesheet_date'): ?>
                    <?php echo link_to(__('Date'), 'timesheet/list?sort=timesheet_date&type='.($sf_user->getAttribute('type', 'asc', 'timesheet/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'timesheet/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Date'), 'timesheet/list?sort=timesheet_date&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'timesheet/sort') == 'timesheet_user_id'): ?>
                    <?php echo link_to(__('Member'), 'timesheet/list?sort=timesheet_user_id&type='.($sf_user->getAttribute('type', 'asc', 'timesheet/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'timesheet/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Member'), 'timesheet/list?sort=timesheet_user_id&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th><?php echo __('Project/Budget') ?></th>
                <th><?php echo __('Description') ?></th>
                <th style="width: 15%;"><?php echo __('Type of work') ?></th>
                <th  style="width: 8%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'timesheet/sort') == 'timesheet_hours'): ?>
                    <?php echo link_to(__('Hours'), 'timesheet/list?sort=timesheet_hours&type='.($sf_user->getAttribute('type', 'asc', 'timesheet/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'timesheet/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Hours'), 'timesheet/list?sort=timesheet_hours&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 6%;"><?php echo __('Billable?') ?></th>
                <th style="width: 8%;"><?php echo __('Amount') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total_h = 0; $total_r = 0; foreach ($pager->getResults() as $timesheet): $odd = fmod(++$i, 2); $total_r += $timesheet->getTimesheetHours() * $timesheet->getTypeOfHour()->getTypeOfHourCost();  $total_h += $timesheet->getTimesheetHours() ?>
            <tr id="timesheet_<?php echo $timesheet->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $timesheet->getId(), false) ?></td>
                <td class="actions" id="timesheetMenu_<?php echo $timesheet->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'timesheet/edit?id='.$timesheet->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                                'update'   => 'timesheet_'.$timesheet->getId(),
                                'url'      => 'timesheet/delete?id='.$timesheet->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td class="date"><?php echo format_date($timesheet->getTimesheetDate()) ?></td>
                <td><?php echo $timesheet->getsfGuardUser()->getProfile()->getFullName(false) ?></td>
                <td><?php echo ($timesheet->getTimesheetProjectId()) ? link_to($timesheet->getProject(), '@project_show_by_id?id=' . $timesheet->getTimesheetProjectId()) : '' ?>
                    <?php echo ($timesheet->getTimesheetProjectId() && $timesheet->getTimesheetBudgetId()) ?  '<br/>&nbsp;&nbsp;&raquo;&nbsp;' : '' ?>
                    <?php echo ($timesheet->getTimesheetBudgetId()) ? link_to($timesheet->getBudget()->getFullTitle(), '@budget_show_by_id?id=' . $timesheet->getTimesheetBudgetId()) : '' ?>
                </td>
                <td><?php echo $timesheet->getTimesheetDescription() ?></td>
                <td class="status"><?php echo $timesheet->getTypeOfHour() ?></td>
                <td class="currency"><?php echo format_hour($timesheet->getTimesheetHours()) ?></td>
                <td class="status"><?php echo ($timesheet->getTimesheetIsBillable()) ? image_tag('iconSmallBillable-1.png', 'alt="Yes"') : image_tag('iconSmallBillable-0.png', 'alt="No"') ?></td>
                <td class="currency"><?php echo format_currency($timesheet->getTimesheetHours() * $timesheet->getTypeOfHour()->getTypeOfHourCost(), 'EUR') ?></td>
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
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

<div style="width: 100%; text-align: right;">
    <div class="tableBottomTotal"><div id="timTotal" class="tableBottomContent">
    <span><?php echo __('Total (%1%)', array('%1%' => format_hour($total_h))) ?>: <?php echo format_currency($total_r, 'EUR') ?></span>
    </div></div>
</div>

</form>
<?php use_helper('Number', 'NumberExtended', 'Javascript', 'gWidgets', 'Style') ?>
<?php echo form_tag('budget/delete', 'name="chklist"') ?>
<div id="budgetDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 10%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'budget_number'): ?>
                    <?php echo link_to(__('Nº'), 'budget/list?sort=budget_number&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Nº'), 'budget/list?sort=budget_number&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 20%"><?php echo __('Title') ?></th>
                <th style="width: 12%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'budget_client_id'): ?>
                    <?php echo link_to(__('Client'), 'budget/list?sort=budget_client_id&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Client'), 'budget/list?sort=budget_client_id&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 18%" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'budget_project_id'): ?>
                    <?php echo link_to(__('Project'), 'budget/list?sort=budget_project_id&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Project'), 'budget/list?sort=budget_project_id&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 6%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'created_at'): ?>
                    <?php echo link_to(__('Date'), 'budget/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Date'), 'budget/list?sort=created_at&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 6%;"><?php echo __('Status') ?></th>
                <th style="width: 8%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'budget_total_expenses'): ?>
                    <?php echo link_to(__('Expenses'), 'budget/list?sort=budget_total_expenses&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Expenses'), 'budget/list?sort=budget_total_expenses&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th style="width: 10%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'budget/sort') == 'budget_total_amount'): ?>
                    <?php echo link_to(__('Revenue'), 'budget/list?sort=budget_total_amount&type='.($sf_user->getAttribute('type', 'asc', 'budget/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'budget/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Revenue'), 'budget/list?sort=budget_total_amount&type=asc') ?>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; $total = 0; foreach ($pager->getResults() as $budget): $odd = fmod(++$i, 2); $total += $budget->getBudgetTotalAmount(); ?>
            <tr id="budget_<?php echo $budget->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $budget->getId(), false) ?></td>
                <td class="actions" id="budgetMenu_<?php echo $budget->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), 'budget/show?id='.$budget->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'budget/edit?id='.$budget->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'budget'.$budget->getId(),
                                'url'      => 'budget/delete?id='.$budget->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($budget, '@budget_show_by_id?id='.$budget->getId()) ?></td>
                <td><?php echo $budget->getBudgetTitle() ?></td>
                <td><?php echo ($budget->getClient()) ? link_to($budget->getClient(), 'client/show?id=' . $budget->getBudgetClientId(), 'title="' . $budget->getClient()->getClientCompanyName() . '"') : '' ?></td>
                <td><?php echo ($budget->getBudgetProjectId()) ? link_to($budget->getProject(), '@show_project_by_id?id=' . $budget->getBudgetProjectId()) : '' ?></td>
                <td class="date"><?php echo format_date($budget->getBudgetDate()) ?></td>
                <td class="status" id="budStatus<?php echo $budget->getId() ?>">
                <?php $remote = array(
                        'update' => 'budWindow'.$budget->getId(),
                        'url' => 'budget/editstatus?id='.$budget->getId(),
                        'complete' => visual_effect('appear', "budWindow".$budget->getId())) ?>
                <?php echo link_to_remote(icon_gtip($budget->getBudgetStatus(), array('id' => 'statusTip'.$budget->getId(), 'gtip_title' => __('Status'), 'content' => $budget->getFullStatus() , 'image' => 'iconBudget.png', 'status' => $budget->getBudgetStatusId())), $remote) ?>
                  <div id="budWindow<?php echo $budget->getId() ?>" style="display:none" class="popUpDiv"></div>
                </td>
                <td class="currency"><?php //echo format_currency($budget->getBudgetTotalExpenses(), 'EUR') ?></td>
                <td class="currency"><?php echo format_currency($budget->getBudgetTotalAmount(), 'EUR') ?><br/><span style="<?php echo ($budget->getBudgetAverageMargin() < 0) ? 'color:#f11;' : ''?>">(<?php echo format_percent($budget->getBudgetAverageMargin()) ?>)</span></td>
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

</form>

<div style="width: 100%; text-align: right;">
    <div class="tableBottomTotal"><div id="expTotal" class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total, 'EUR') ?></span>
    </div></div>
</div>
<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php if (count($budgets)) : ?>
<div class="windowFrame" id="<?php echo $related ?>ViewBudgets">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th class="number"><?php echo __('Number') ?></th>
                <th><?php echo __('Main contact') ?></th>
                <th><?php echo __('Title') ?></th>
                <th class="date"><?php echo __('Date') ?></th>
                <th class="status"><?php echo __('Status') ?></th>
                <th class="currency"><?php echo __('Expenses') ?></th>
                <th class="currency"><?php echo __('Amount') ?></th>
            </tr>
        </thead>
        <tbody>
          <?php $i = 1; $total = 0; foreach ($budgets as $budget): $total += $budget->getBudgetTotalAmount(); $odd = fmod(++$i, 2) ?>
            <tr id="budget_<?php echo $budget->getId() ?>" style="background:<?php echo ($odd) ? '#eee' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eee' : 'fff' ?>!important';">
                <td class="actions" id="budgetMenu_<?php echo $budget->getId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__("View").'"'), 'budget/show?id='.$budget->getId()) ?></li>
                  <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__("Edit").'"'), 'budget/edit?id='.$budget->getId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__("Delete").'"'), array(
                    'update'   => 'budget_'.$budget->getId(),
                    'url'      => 'budget/delete?id='.$budget->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td><?php echo link_to($budget, 'budget/show?id=' . $budget->getId()) ?></td>
                <td class="text"><?php echo $budget->getDefaultContact() ?></td>
                <td class="text"><?php echo $budget->getBudgetTitle() ?></td>
                <td class="date"><?php echo format_date($budget->getBudgetDate()) ?></td>
                <td class="status" id="budStatus<?php echo $budget->getId() ?>">
                <?php $remote = array(
                        'update' => 'budWindow'.$budget->getId(),
                        'url' => 'budget/editstatus?id='.$budget->getId(),
                        'complete' => visual_effect('appear', "budWindow".$budget->getId())) ?>
                <?php echo link_to_remote(icon_gtip($budget->getBudgetStatus(), array('id' => 'statusTip'.$budget->getId(), 'gtip_title' => __('Status'), 'content' => $budget->getFullStatus() , 'image' => 'iconBudget.png', 'status' => $budget->getBudgetStatusId())), $remote) ?>
                  <div id="budWindow<?php echo $budget->getId() ?>" style="display:none" class="popUpDiv"></div>
                </td>
                <td class="currency"><?php //echo format_currency($budget->getBudgetTotalExpenses(),'EUR') ?></td>
                <td class="currency"><?php echo format_currency($budget->getBudgetTotalAmount(),'EUR') ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($total) : ?>
<div class="sum">
    <div class="tableBottomTotal"><div class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total, 'EUR') ?></span>
    </div></div>
</div>
<?php endif ?>
<?php else : ?>
  <p><?php echo __('No related budgets yet') ?></p>
<?php endif ?>
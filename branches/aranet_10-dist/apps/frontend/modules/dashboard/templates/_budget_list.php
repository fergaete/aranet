  <div class="module-content">
    <table class="gridTable">
      <tr>
        <th><?php echo __('Project/Budget') ?></th>
        <th><?php echo __('Client') ?></th>
        <th><?php echo __('Date') ?></th>
        <th><?php echo __('Amount') ?></th>
        <th><?php echo __('Margin') ?></th>
      </tr>
<?php $total = 0; $pr = 0; foreach ($budgets as $budget) : $total += $budget->getBudgetTotalAmount(); $pr += ($budget->getBudgetTotalAmount() - $budget->getBudgetTotalCost()); ?>
<?php
$style = 'color:#000;'; $date = '';
if ($budget->getBudgetValidDate()) {
    $days = $budget->getBudgetValidDate();
    $style = (strtotime($budget->getBudgetValidDate()) - strtotime($budget->getBudgetDate())) < 0 ? 'color:#f11 !important;' : 'color:#000;';
    $date = ($style == 'color:#000;') ? ' (+' : ' (-';
    $date .= round((strtotime($budget->getBudgetValidDate()) - strtotime($budget->getBudgetDate())) / (3600 * 24)) . ')';
}
$style = 'style="'.$style.'"';
?>
      <tr>
          <td class="text title">
<?php echo ($budget->getBudgetProjectId()) ? link_to($budget->getProject()->getProjectName(), '@project_show_by_id?id=' . $budget->getBudgetProjectId()) . '<br/>&nbsp;&nbsp;&raquo;&nbsp;' : '' ?><?php echo link_to($budget, '@budget_show_by_id?id=' . $budget->getId()) ?></td>
          <td class="text"><?php echo link_to($budget->getClient(), '/client/show?id=' . $budget->getBudgetClientId()) ?></td>
          <td class="number"<?php echo $style ?>><?php echo format_date($budget->getBudgetDate()) .$date ?></td>
          <td class="currency"><?php echo format_currency($budget->getBudgetTotalAmount(), 'EUR') ?></td>
          <td class="currency"><?php echo format_percent($budget->getBudgetAverageMargin()) ?></td>
      </tr>
<?php endforeach ?>
      <tr>
          <td colspan="3" class="total"><?php echo __('TOTAL') ?></td>
          <td class="total"><?php echo format_currency($total, 'EUR') ?></td>
          <td class="total"><?php echo $total ? format_percent($pr * 100 / $total) : '' ?></td>
      </tr>
    </table>
  </div>
  <div class="module-footer">
  </div>
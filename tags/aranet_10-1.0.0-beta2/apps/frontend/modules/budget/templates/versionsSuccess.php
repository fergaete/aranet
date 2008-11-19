<?php use_helper('Number', 'NumberExtended') ?>
<?php if ($budgets) : ?>
    <table class="gridTable">
        <tr>
            <th><?php echo __('Revision') ?></th>
            <th><?php echo __('Status') ?></th>
            <th><?php echo __('Cost') ?></th>
            <th><?php echo __('Amount') ?></th>
            <th><?php echo __('Margin') ?></th>
        </tr>
        <?php foreach ($budgets as $budget) : ?>
        <tr>
            <td><?php echo link_to(__('Revision %1%', array('%1%' => $budget->getBudgetRevision())), 'budget/show?id=' . $budget->getId()) ?></td>
            <td><?php echo __('Open') . ': ' . format_date($budget->getCreatedAt()) . '; ' ?>
                                <?php echo ($budget->getBudgetStatusId() == 2) ? __('Sended') . ': ' . format_date($budget->getBudgetDate()) . '; ' : '' ?>
                            <?php echo ($budget->getBudgetStatusId() == 3) ? __('Approved') . ': ' .  format_date($budget->getBudgetApprovedDate()) : '' ?></td>
            <td><?php echo format_currency($budget->getBudgetTotalCost(), 'EUR') ?></td>
            <td><?php echo format_currency($budget->getBudgetTotalAmount(), 'EUR') ?></td>
            <td><?php //echo format_percent($budget->getBudgetAverageMargin()) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>
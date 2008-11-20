<?php use_helper('Javascript', 'Number', 'NumberExtended') ?>
<?php if (!isset($selected)) $selected = array() ?>
<table class="dataTable">
<thead>
<tr>
  <th style="width: 4%"><?php echo checkbox_tag('select[]', 1, false, array('onlick' => "checkAll(); return false;")); ?></th>
  <th><?php echo __('Title') ?></th>
  <th style="text-align:center;width:8%"><?php echo __('From') ?></th>
  <th style="text-align:center;width:8%"><?php echo __('To') ?></th>
  <th style="text-align:center;width:15%"><?php echo __('Completion') ?></th>
</tr>
</thead>
<?php if ($project) : ?>
<tbody>
<?php $i = 1; $total = 0; $total_h = 0; $total_e = 0; foreach ($project->getMilestonesAndTasks() as $item): $odd = fmod(++$i, 2); ?>
<tr id="item_<?php echo $item->getId() ?>" class="row_<?php echo $odd ?>">
<?php if($item instanceof Milestone) : ?>
      <td><?php echo checkbox_tag('select[]', 'milestone_' . $item->getId(), (in_array('milestone_' . $item->getId(), $selected))) ?></td>
      <?php $total += $item->getMilestoneEstimatedHours() ?>
      <?php $total_h += $item->getMilestoneTotalHours() ?>
      <?php $total_e += $item->getMilestoneTotalHourCosts() ?>
      <td style="vertical-align:middle;text-align:left;"><strong><?php echo $item->getMilestoneTitle() ?></strong><?php echo ($item->getMilestoneDescription()) ? '<br/>' . $item->getMilestoneDescription() : '' ?></td>
      <td style="text-align:center;vertical-align:middle;"><strong><?php echo format_date($item->getMilestoneStartDate()) ?></strong></td>
      <td style="text-align:center;vertical-align:middle;"><strong><?php echo format_date($item->getMilestoneFinishDate()) ?></strong></td>
      <td style="text-align:center;vertical-align:middle;"><strong><?php echo ($item->getMilestoneTotalHours() || $item->getMilestoneEstimatedHours()) ? $item->getMilestoneTotalHours() . '/' . $item->getMilestoneEstimatedHours() . ' hrs (' . format_percent($item->getMilestoneCompletionFraction()) .')' : '' ?></strong></td>
<?php else: ?>
      <td><?php echo checkbox_tag('select[]', 'task_' . $item->getId(), (in_array('task_' . $item->getId(), $selected))) ?></td>
      <td style="vertical-align:middle;text-align:left;">&nbsp;&nbsp;&nbsp;<?php echo $item->getTaskTitle() ?><?php echo $item->getTaskDescription() ? ' (' . $item->getTaskDescription() .')' : '' ?></td>
      <td style="text-align:center;vertical-align:middle;"><?php echo format_date($item->getTaskStartDate()) ?></td>
      <td style="text-align:center;vertical-align:middle;"><?php echo format_date($item->getTaskFinishDate()) ?></td>
      <td style="text-align:center;vertical-align:middle;"><?php echo ($item->getTaskTotalHours() || $item->getTaskEstimatedHours()) ? $item->getTaskTotalHours() . '/' . $item->getTaskEstimatedHours() . ' hrs (' . format_percent($item->getTaskCompletionFraction()) .')' : '' ?></td>
<?php endif ?>
  </tr>
<?php endforeach; ?>
</tbody>
<?php else : ?>
 <?php $total = 0 ?>
 <?php $total_h = 0 ?>
 <?php $total_e = 0 ?>
<?php endif ?>
<tfoot>
    <tr>
        <th colspan="6" style="text-align: right;">
            <span><?php echo __('Completed/Estimated') ?>: <?php echo format_hour($total_h) ?> / <?php echo format_hour($total) ?> ( <?php echo format_percent(($total) ? $total_h / $total * 100 : '') ?>)</span>
        </th>
    </tr>
</tfoot>
</table>
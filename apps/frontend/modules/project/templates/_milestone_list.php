<?php use_helper('Javascript', 'Number', 'NumberExtended') ?>
<div id="<?php echo $id ?>">
<div class="windowFrame">
<table class="dataTable">
<thead>
<tr>
  <th class="actions"></th>
  <th></th>
  <th><?php echo __('Title') ?></th>
  <th style="text-align:center;width:8%"><?php echo __('From') ?></th>
  <th style="text-align:center;width:8%"><?php echo __('To') ?></th>
  <th style="text-align:center;width:15%"><?php echo __('Completion') ?></th>
  <th style="text-align:center;width:7%"><?php echo __('Cost') ?></th>
</tr>
</thead>
<tbody>
<?php $i = 1; $total = 0; $total_h = 0; $total_e = 0; foreach ($project->getMilestonesAndTasks() as $item): $odd = fmod(++$i, 2); ?>
<tr id="item_<?php echo $item->getId() ?>" class="row_<?php echo $odd ?>">
<?php if($item instanceof Milestone) : ?>
    <td class="actions" id="projectMenu_<?php echo $project->getId() ?>">
        <div class="objectActions">
            <ul>
              <li><?php echo link_to_remote(image_tag("button_edit.gif", 'alt="Edit"'), array(
                    'update'   => 'projectMilestoneAddEdit',
                    'url'      => 'project/editmilestone?id='.$item->getId()
                    )) ?></li>
              <li><?php echo link_to_remote(image_tag("button_delete.gif", 'alt="Delete"'), array(
                    'update'   => 'item_'.$item->getId(),
                    'url'      => 'project/deletemilestone?id='.$item->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
            </ul>
        </div>
      </td>
      <?php $total += $item->getMilestoneEstimatedHours() ?>
      <?php $total_h += $item->getMilestoneTotalHours() ?>
      <?php $total_e += $item->getMilestoneTotalHourCosts() ?>
      <td style="text-align:center;"><?php echo image_tag('milestone.gif', 'alt=Miletone') ?></td>
      <td style="vertical-align:middle;"><strong><?php echo $item->getMilestoneTitle() ?></strong><?php echo ($item->getMilestoneDescription()) ? '<br/>' . $item->getMilestoneDescription() : '' ?></td>
      <td class="date"><strong><?php echo format_date($item->getMilestoneStartDate()) ?></strong></td>
      <td class="date"><strong><?php echo format_date($item->getMilestoneFinishDate()) ?></strong></td>
<?php
  $fraction = $item->getMilestoneCompletionFraction();
  if ($fraction > 100) {
    $f = '<span style="color:red">('.format_percent($fraction).')</span>';
  } else {
    $f = '('.format_percent($fraction).')';
  }
?>
      <td class="number"><strong><?php echo ($item->getMilestoneTotalHours() || $item->getMilestoneEstimatedHours()) ? $item->getMilestoneTotalHours() . '/' . $item->getMilestoneEstimatedHours() . ' hrs '.$f : '' ?></strong></td>
      <td class="currency"><strong><?php echo ($item->getMilestoneTotalHourCosts()) ? format_currency($item->getMilestoneTotalHourCosts(), 'EUR') : '' ?></td>
<?php else: ?>
    <td class="actions" id="projectMenu_<?php echo $project->getId() ?>">
        <div class="objectActions">
            <ul>
              <li><?php echo link_to_remote(image_tag("button_edit.gif", 'alt="Edit"'), array(
                    'update'   => 'projectMilestoneAddEdit',
                    'url'      => 'project/edittask?id='.$item->getId()
                    )) ?></li>
              <li><?php echo link_to_remote(image_tag("button_delete.gif", 'alt="Delete"'), array(
                    'update'   => 'item_'.$item->getId(),
                    'url'      => 'project/deletetask?id='.$item->getId(),
                    'confirm'  => 'Are you sure?',
                    )) ?></li>
            </ul>
        </div>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $item->getTaskTitle() ?><?php echo $item->getTaskDescription() ? ' (' . $item->getTaskDescription() .')' : '' ?></td>
      <td class="date"><?php echo format_date($item->getTaskStartDate()) ?></td>
      <td class="date"><?php echo format_date($item->getTaskFinishDate()) ?></td>
<?php
  $fraction = $item->getTaskCompletionFraction();
  if ($fraction > 100) {
    $f = '<span style="color:red">('.format_percent($fraction).')</span>';
  } else {
    $f = '('.format_percent($fraction).')';
  }
?>

      <td class="number"><?php echo ($item->getTaskTotalHours() || $item->getTaskEstimatedHours()) ? $item->getTaskTotalHours() . '/' . $item->getTaskEstimatedHours() . ' hrs '.$f : '' ?></td>

      <td class="currency"><?php echo ($item->getTaskTotalHourCosts()) ? format_currency($item->getTaskTotalHourCosts(), 'EUR') : '' ?></td>
<?php endif ?>
  </tr>
<?php endforeach; ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="7" style="text-align: right;">
            <span><?php echo __('Completed/Estimated') ?>: <?php echo format_hour($total_h) ?> / <?php echo format_hour($total) ?> ( <?php echo format_percent(($total) ? $total_h / $total * 100 : '') ?>)</span>
        </th>
    </tr>
</tfoot>
</table>
</div>
<?php if ($total_e) : ?>
<div class="sum">
    <div class="tableBottomTotal"><div class="tableBottomContent">
    <span><?php echo __('Total') ?>: <?php echo format_currency($total_e, 'EUR') ?></span>
    </div></div>
</div>
<?php endif ?>
</div>
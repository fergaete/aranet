<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php if (count($projects)) : ?>
<div class="windowFrame" id="<?php echo $related ?>ViewProjects">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th><?php echo __('Project title') ?></th>
                <th class="date"><?php echo __('Completion date') ?></th>
                <th class="status"><?php echo __('Status') ?></th>
                <th class="number"><?php echo __('Hours') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $i = 1; foreach ($projects as $project): $odd = fmod(++$i, 2) ?>
            <tr id="project_<?php echo $project->getId() ?>" style="background:<?php echo ($odd) ? '#eee' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eee' : 'fff' ?>!important';">
                <td class="actions" id="projectMenu_<?php echo $project->getId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), 'project/show?id='.$project->getId()) ?></li>
                  <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'project/edit?id='.$project->getId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                    'update'   => 'project_'.$project->getId(),
                    'url'      => 'project/delete?id='.$project->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td class="text"><?php echo link_to($project, '/project/show?id='.$project->getId()) ?></td>
                <td class="date"><?php echo format_date($project->getProjectFinishDate()) ?></td>
                <td class="status">
                <?php echo icon_gtip(null, array('id' => 'statusTip'.$project->getId(), 'content' => $project->getFullStatus() , 'image' => 'iconStatus.gif', 'status' => $project->getProjectStatusId())) ?></td>
                <td class="currency"><?php //echo format_hour(format_hour($project->getProjectTotalHours())) ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else : ?>
  <p><?php echo __('No related projects yet') ?></p>
<?php endif ?>
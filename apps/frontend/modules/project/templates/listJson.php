{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo count($pager->getResults()) ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($pager->getResults() as $project) : $i++ ?>
        {"id":"<?php echo $project->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $project->getId() ?>' />",
        "actions":"<div class='objectActions'><ul><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form.png', 'alt='.__("View")), '@project_show_by_id?id='.$project->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_edit.png', 'alt='.__('Edit')), '@project_edit_by_id?id='.$project->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_delete.png', 'alt='.__('Delete')), '@project_delete_by_id?id='.$project->getId())) ?></li></ul></div>",
<<<<<<< .mine
        "project_name":"<?php echo $project->getProjectName() ?>",
        "project_title":"<?php echo $project->__toString() ?>",
        "client":"<?php echo $project->getClient()->__toString() ?>",
        "project_start_date":"<?php echo format_date($project->getProjectStartDate()) ?>",
        "project_end_date":"<?php echo format_date($project->getProjectFinishDate()) ?>",
        "project_number":"<?php echo $project->getFullNumber() ?>",
        "project_status":"<?php echo $project->getProjectStatus() ?>",
        "project_total_hours":"<?php //echo $project->getProjectStatus() ?>",
        "project_total_incomes":"<?php //echo $project->getProjectStatus() ?>",
        "project_total_expenses":"<?php //echo $project->getProjectStatus() ?>"}
        <?php if ($i+$pager->getFirstIndice()-1 < count($pager->getResults())) : ?>,<?php endif ?>
=======
        "project_name":"<?php echo $project->getProjectName() ?>",
        "project_title":"<?php echo $project->__toString() ?>",
        "client":"<?php echo $project->getClient()->__toString() ?>",
        "project_start_date":"<?php echo format_date($project->getProjectStartDate()) ?>",
        "project_end_date":"<?php echo format_date($project->getProjectFinishDate()) ?>",
        "project_number":"<?php echo $project->getFullNumber() ?>",
        "project_status":"<?php echo $project->getProjectStatus() ?>",
        "project_total_hours":"<?php //echo $project->getProjectStatus() ?>",
        "project_total_incomes":"<?php //echo $project->getProjectStatus() ?>",
        "project_total_expenses":"<?php //echo $project->getProjectStatus() ?>"}
        <?php if ($i+$pager->getFirstIndice()-1 < $pager->getLastIndice()) : ?>,<?php endif ?>
>>>>>>> .r55
<?php endforeach ?>
    ]
}
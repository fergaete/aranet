{"ResultSet":
    {"Result": [
<?php foreach ($projects as $project) : ?>
        {"Number":"<?php echo $project->getFullNumber() ?>",
        "Title":"<?php echo $project->getProjectName() ?>",
        "FullName":"<?php echo $project->__toString() ?>",
        "Id":"<?php echo $project->getId() ?>"
        },
<?php endforeach ?>
    ]}
}
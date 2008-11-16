{"ResultSet":
    {"Result": [
<?php foreach ($tags as $tag) : ?>
        {"Name":"<?php echo $tag->getName() ?>",
        "Id":"<?php echo $tag->getId() ?>"
        },
<?php endforeach ?>
    ]}
}
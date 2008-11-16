{"ResultSet":
    {"Result": [
<?php foreach ($clients as $client) : ?>
        {"UniqueName":"<?php echo $client->getClientUniqueName() ?>",
        "CompanyName":"<?php echo $client->getClientCompanyName() ?>",
        "FullName":"<?php echo $client->getFullName(false) ?>",
        "Id":"<?php echo $client->getId() ?>"
        },
<?php endforeach ?>
    ]}
}
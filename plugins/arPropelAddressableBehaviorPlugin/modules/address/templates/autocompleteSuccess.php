{"ResultSet":
    {"Result": [
<?php foreach ($addresses as $address) : ?>
        {"StreetLine1":"<?php echo $address->getAddressLine1() ?>",
        "StreetLine2":"<?php echo $address->getAddressLine2() ?>",
        "FullHTMLAddress":"<?php echo $address->__toString() ?>",
        "FullAddress":"<?php echo $address->__toString(true) ?>",
        "Id":"<?php echo $address->getId() ?>"
        },
<?php endforeach ?>
    ]}
}
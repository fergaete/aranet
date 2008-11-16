{"ResultSet":
    {"Result": [
<?php foreach ($contacts as $contact) : ?>
        {"FirstName":"<?php echo $contact->getContactFirstName() ?>",
        "LastName":"<?php echo $contact->getContactLastName() ?>",
        "FullName":"<?php echo $contact->__toString() ?>",
        "Rol":"<?php echo $contact->getContactOrgUnit() ? $contact->getContactOrgUnit() : __('Unknown rol') ?>",
        "Id":"<?php echo $contact->getId() ?>"
        },
<?php endforeach ?>
    ]}
}
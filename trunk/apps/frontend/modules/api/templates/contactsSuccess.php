{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo $pager->getNbResults() ?>,
    "startIndex":<?php echo $pager->getFirstIndice() ?>,
    "sort":id,
    "dir":"asc",
    "records":[
<?php foreach ($pager->getResults() as $contact) : ?>
        {"id":"<?php echo $contact->getId() ?>",
        "name":"<?php echo $contact->getFullName() ?>",
        "birthday":"<?php echo $contact->getContactBirthday() ?>",
        "phone":"<?php echo $contact->getContactPhone() ?>",
        "fax":"<?php echo $contact->getContactFax() ?>",
        "mobile":"<?php echo $contact->getContactMobile() ?>",
        "email":"<?php echo $contact->getContactEmail() ?>"},
<?php endforeach ?>
    ]
}
<?php $results = $pager->getResults() ?>
{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo count($results) ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($results as $address) : $i++ ?>
        {"id":"<?php echo $address->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $address->getId() ?>' />",
        "address_line1":"<?php echo $address->getAddressLine1() ?>",
        "address_line2":"<?php echo $address->getAddressLine2() ?>",
        "address_location":"<?php echo $address->getAddressLocation() ?>",
        "address_state":"<?php echo $address->getAddressState() ?>",
        "address_postal_code":"<?php echo $address->getAddressPostalCode() ?>",
        "address_country":"<?php echo $address->getAddressCountry() ?>"}
        <?php if ($i+$pager->getFirstIndice()-1 < $pager->getLastIndice()) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
<?php use_helper('NumberExtended') ?>
<?php $results = $pager->getResults() ?>
{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo count($results) ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($results as $vendor) : $i++ ?>
        {"id":"<?php echo $vendor->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $vendor->getId() ?>' />",
        "actions":"<div class='objectActions'><ul><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form.png', 'alt='.__("View")), '@vendor_show_by_id?id='.$vendor->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_edit.png', 'alt='.__('Edit')), '@vendor_edit_by_id?id='.$vendor->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_delete.png', 'alt='.__('Delete')), '@vendor_delete_by_id?id='.$vendor->getId())) ?></li></ul></div>",
        "vendor_company_name":"<?php echo $vendor->getVendorCompanyName() ?>",
<?php
$dcontact = $vendor->getDefaultContact();
if ($dcontact) {
  $con = link_to($dcontact, '@contact_show_by_id?id=' . $dcontact->getId());
  $con .= ($dcontact->getContactEmail()) ? '  ['.mail_to($dcontact->getContactEmail(),'email') . ']': '';
  $con .= ($dcontact->getContactRol()) ? '<br/>'.$dcontact->getContactRol() : '';
} else {
  $con = "";
}
?>
        "contact":"<?php echo str_replace('"', "'",$con) ?>",
<?php
$daddress = $vendor->getDefaultAddress();
if ($daddress) {
  $add = link_to($daddress, '@address_edit_by_id?id=' . $daddress->getId());
} else {
  $add = "";
}
?>
        "address":"<?php echo str_replace('"', "'",$add) ?>",
        "phone":"<?php echo $dcontact ? smart_format_phone($dcontact->getContactPhone()) : '' ?>",
        "total_amount":<?php //echo format_currency($vendor->getVendorTotalInvoices(), "EUR") ?>""}
        <?php if ($i+$pager->getFirstIndice()-1 < $pager->getLastIndice()) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
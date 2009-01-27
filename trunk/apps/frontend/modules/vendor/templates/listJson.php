<?php use_helper('NumberExtended') ?>
{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo $pager->getNbResults() ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($pager->getResults() as $vendor) : $i++ ?>
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
}
?>
        "contact":"<?php echo str_replace('"', "'",$con) ?>",
        "phone":"<?php echo $dcontact ? smart_format_phone($dcontact->getContactPhone()) : '' ?>",
        "address":"<?php echo ($vendor->getDefaultAddress()) ?  $vendor->getDefaultAddress() : '' ?>",
        "total_amount":"<?php //echo format_currency($vendor->getVendorTotalAmount(), "EUR") ?>"},
        <?php if ($i+$pager->getFirstIndice()-1 < $pager->getLastIndice()) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
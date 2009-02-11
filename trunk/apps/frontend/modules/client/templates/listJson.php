<?php use_helper('NumberExtended') ?>
{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo count($pager->getResults()) ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($pager->getResults() as $client) : $i++ ?>
        {"id":"<?php echo $client->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $client->getId() ?>' />",
        "actions":"<div class='objectActions'><ul><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form.png', 'alt='.__("View")), '@client_show_by_id?id='.$client->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_edit.png', 'alt='.__('Edit')), '@client_edit_by_id?id='.$client->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_delete.png', 'alt='.__('Delete')), '@client_delete_by_id?id='.$client->getId())) ?></li></ul></div>",
        "client_company_name":"<?php echo $client->getClientCompanyName() ?>",
<?php
$dcontact = $client->getDefaultContact();
if ($dcontact) {
  $con = link_to($dcontact, '@contact_show_by_id?id=' . $dcontact->getId());
  $con .= ($dcontact->getContactEmail()) ? '  ['.mail_to($dcontact->getContactEmail(),'email') . ']': '';
  $con .= ($dcontact->getContactRol()) ? '<br/>'.$dcontact->getContactRol() : '';
}
?>
        "contact":"<?php echo str_replace('"', "'",$con) ?>",
        "phone":"<?php echo $dcontact ? smart_format_phone($dcontact->getContactPhone()) : '' ?>",
        "nb_projects":"<?php //echo $client->getClientNbProjects() ?>",
        "revenue":"<?php //echo format_currency($client->getClientTotalInvoices(), "EUR") ?>"}
        <?php if ($i+$pager->getFirstIndice()-1 < count($pager->getResults())) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
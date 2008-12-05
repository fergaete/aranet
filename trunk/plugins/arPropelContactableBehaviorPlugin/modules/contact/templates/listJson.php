{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo $pager->getNbResults() ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($pager->getResults() as $contact) : $i++ ?>
        {"id":"<?php echo $contact->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $contact->getId() ?>' />",
        "actions":"<div class='objectActions'><ul><li><?php echo str_replace('"', "'", link_to(image_tag(sfConfig::get('yui_icons_web_dir') . '/application_form.png', 'alt='.__("View")), '@contact_show_by_id?id='.$contact->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag(sfConfig::get('yui_icons_web_dir') . '/application_form_edit.png', 'alt='.__('Edit')), '@contact_edit_by_id?id='.$contact->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag(sfConfig::get('yui_icons_web_dir') . '/application_form_delete.png', 'alt='.__('Delete')), '@contact_delete_by_id?id='.$contact->getId())) ?></li></ul></div>",
        "name":"<?php echo $contact->__toString() ?>",
        "contact_birthday":"<?php echo $contact->getContactBirthday() ?>",
        "contact_phone":"<?php echo $contact->getContactPhone() ?>",
        "contact_fax":"<?php echo $contact->getContactFax() ?>",
        "contact_mobile":"<?php echo $contact->getContactMobile() ?>",
        "contact_email":"<?php echo $contact->getContactEmail() ?>"}
        <?php if ($i+$pager->getFirstIndice()-1 < $pager->getLastIndice()) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
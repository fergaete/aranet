<tr id="contact_<?php echo $index ?>">
<?php include_partial('contact/edit', array('contact' => $contact, 'index' => $index, 'class' => $sf_params->get('class'), 'oid' => $sf_params->get('oid'))) ?>
</tr>
<tr id="address_<?php echo $index ?>">
<?php include_partial('address/edit', array('address' => $address, 'index' => $index, 'class' => $sf_params->get('class'), 'oid' => $sf_params->get('oid'))) ?>
</tr>
<?php use_helper('NumberExtended', 'Javascript') ?>
<?php if (isset($addresses) && $addresses) : ?>
    <table class="dataTable">
        <tbody>
        <?php $i = 1; foreach ($addresses as $address): $odd = fmod(++$i, 2) ?>
          <tr id="address_<?php echo $address->getId() ?>" class="row_<?php echo $odd ?>">
                <td class="actions">
                    <div class="objectActions">
                        <ul>
                          <li><?php echo link_to(image_tag("icons/application_form.png", 'alt="'.__("View").'"'), '@address_show_by_id?id='.$address->getId()) ?></li>
                            <li><?php echo link_to(image_tag("icons/application_form_edit.png", 'alt="'.__("Edit").'"'), '@address_edit_by_id?id='.$address->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag('icons/application_form_delete.png', 'alt="'.__("Delete").'"'), array(
                                'update'   => 'address_'.$address->getId(),
                                'url'      => '@address_delete_related?related='.get_class($object).'&oid='.$object->getId() . '&id='.$address->getId(),
                                'confirm'  => __('Are you sure?'),
                                'loading'  => "Element.show('indicator-tabs')",
                                'complete' => "Element.hide('indicator-tabs');"
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td class="text"><strong><?php echo ($address->getAddressName()) ? $address->getAddressName() : __('Address') ?></strong></td>
                <td class="text"><?php echo $address ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
  <p><?php echo __('No related addresses yet') ?></p>
<?php endif ?>

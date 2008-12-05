<?php use_helper('NumberExtended', 'Javascript') ?>
<?php if (isset($contacts) && $contacts) : ?>
    <table class="dataTable">
        <tbody>
        <?php $i = 1; foreach ($contacts as $contact): $odd = fmod(++$i, 2) ?>
            <tr id="contact_<?php echo $contact->getId() ?>" class="row_<?php echo $odd ?>">
                <td class="actions">
                    <div class="objectActions">
                        <ul>
                          <li><?php echo link_to(image_tag("icons/application_form.png", 'alt="View"'), '@contact_show_by_id?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to(image_tag("icons/application_form_edit.png", 'alt="Edit"'), '@contact_edit_by_id?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag('icons/application_form_delete.png', 'alt="Delete"'), array(
                                'update'   => 'contact_'.$contact->getId(),
                                'url'      => '@contact_delete_related?related='.get_class($object).'&oid='.$object->getId() . '&id='.$contact->getId(),
                                'confirm'  => __('Are you sure?'),
                                'loading'  => "Element.show('indicator-tabs')",
                                'complete' => "Element.hide('indicator-tabs');"
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td class="text"><?php echo $contact->getContactIsDefault() ? '<strong>' : '' ?><?php echo link_to($contact, 'contact/show?id='.$contact->getId()) ?><?php echo $contact->getContactIsDefault() ? '</strong>' : '' ?><?php echo ($contact->getContactRol()) ? '<br/><span class="notes">' . $contact->getContactFullRol() . '</span>': '' ?></td>
                <td class="text"><?php echo mail_to($contact->getContactEmail(), $contact->getContactEmail(), 'encode=true') ?></td>
                <td class="phone"><?php echo smart_format_phone(($contact->getContactMobile()) ? $contact->getContactMobile() : $contact->getContactPhone()) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
  <p><?php echo __('No related contacts yet') ?></p>
<?php endif ?>

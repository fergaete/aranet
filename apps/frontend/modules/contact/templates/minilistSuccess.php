<?php use_helper('NumberExtended') ?>
<div id="minicontactDisplay" style="width: 100%;" class="windowFrame">
<?php if (isset($contacts)) : ?>
    <table class="dataTable">
        <tbody>
        <?php $i = 1; foreach ($contacts as $contact): $odd = fmod(++$i, 2) ?>
            <tr id="contact_<?php echo $contact->getId() ?>" class="row_<?php echo $odd ?>">
                <td style="width:35%;"><?php echo link_to($contact, 'contact/show?id='.$contact->getId()) ?><?php echo ($contact->getContactRol()) ? '<br/><span class="notes">' . $contact->getContactFullRol() . '</span>': '' ?></td>
                <td style="width:45%"><?php echo mail_to($contact->getContactEmail(), $contact->getContactEmail(), 'encode=true') ?></td>
                <td style="width:20%;"><?php echo smart_format_phone(($contact->getContactMobile()) ? $contact->getContactMobile() : $contact->getContactPhone()) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif ?>
</div>

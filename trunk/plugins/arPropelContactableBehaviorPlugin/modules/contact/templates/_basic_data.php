<?php if ($contact instanceof Contact && $contact->getId()) :?>
<?php use_helper('NumberExtended') ?>
            <?php if (isset($show_data) && !$show_data) : ?>
            <?php echo ($contact->getClient()) ? link_to($contact->getClient()->getFullName(), '@client_show_by_id?id=' . $contact->getClient()->getId()) . "<br/>" : '' ?>
            <?php echo ($contact->getVendor()) ? link_to($contact->getVendor()->getFullName(), '@vendor_show_by_id?id=' . $contact->getVendor()->getId()) . "<br/>" : '' ?>
            <?php else : ?>
            <h5><?php echo __('Main contact') ?>:</h5>
            <?php echo link_to($contact, '@contact_show_by_id?id=' . $contact->getId()) ?><br/>
            <?php endif ?>
            <?php if ($contact->getContactOrgUnit()) :
                echo '<p>'.$contact->getContactOrgUnit().'</p>';
            elseif ($contact->getContactRol()):
                echo '<p>'.$contact->getContactRol().'</p>';
            endif ?>
            <p><?php echo $contact->getContactPhone() ? __('Phone') . smart_format_phone($contact->getContactPhone()) : '' ?></p>
            <?php echo ($contact->getContactEmail()) ? '<p>'.mail_to($contact->getContactEmail(), $contact->getContactEmail(), 'encode=true').'</p>': '' ?>
<?php endif ?>

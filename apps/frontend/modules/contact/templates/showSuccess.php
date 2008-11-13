<?php use_helper('NumberExtended', 'Javascript') ?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View contact details') ?> <span class="subText">(<?php echo $contact->__toString() ?>)</span></h3>

<div id="contactDisplay" style="width: 100%;" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td style="vertical-align: top; width: 40%;">
            <?php include_partial('contact/basic_data', array('contact' => $contact, 'show_data' => false)) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Mobile') ?></strong></td>
                            <td class="rightCol"><?php echo smart_format_phone($contact->getContactMobile()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Fax') ?></strong></td>
                            <td class="rightCol"><?php echo smart_format_phone($contact->getContactFax()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Birthday') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($contact->getContactBirthday()) ?></td>
                        </tr>
                        <?php if($contact->getAddresses()) : ?>
                        <?php foreach ($contact->getAddresses() as $address): ?>
                        <tr>
                            <td class="leftCol"><strong><?php echo ($address->getAddressType()) ? __('%1% addess', array('%1%' => ucfirst($address->getAddressType()))) : __('Address') ?></strong></td>
                            <td class="rightCol"><?php echo $address ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php endif ?>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $contact->getTags()) ?></td>
                        </tr>
                    </table>
                </div>
                <div id="contactEdit" stlye="display: none;"></div>
                <div id="conDetailEdit" style="width: 30%; text-align: right; padding: 4px;">
                <?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="' . __('Edit contact details') . '"'), '/contact/edit?id=' . $contact->getId()) ?>
                </div>
        </td>
    </tr>
    </table>
</div>

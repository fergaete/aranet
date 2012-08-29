<?php use_helper('Number', 'NumberExtended') ?>
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
                            <td class="leftCol"><strong><?php if ($address->getAddressType()) :
                                echo ($address->getAddressType() == 'work') ? __('Work address') : __('Home address');
                            else :
                                echo __('Address');
                                endif ?></strong></td>
                            <td class="rightCol"><?php echo $address ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php endif ?>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $contact->getTags()) ?></td>
                        </tr>
                    </table>
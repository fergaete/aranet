<?php use_helper('Number', 'NumberExtended', 'Javascript', 'Object') ?>
<h3 id="pageSubTitle" style="padding-left: 56px; padding-top: 10px;"><?php echo __('View user details') ?> <span class="subText">(<?php echo $sf_guard_user_profile->getFullName(false) ?>)</span></h3>

<div id="userDisplay" style="width: 100%;" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td style="vertical-align: top; width: 40%;">
            <span class="bigText"><?php echo $sf_guard_user_profile->getFullName(false) ?></span><br \><?php echo $sf_guard_user_profile->getFullDirection(false) ?><br />
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Username') ?></strong></td>
                            <td class="rightCol">
                                <?php echo $sf_guard_user_profile->getsfGuardUserRelatedByUserId()->getUsername() ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('User since') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($sf_guard_user_profile->getCreatedAt()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Company') ?></strong></td>
                            <td class="rightCol"><?php echo $sf_guard_user_profile->getCompany(false) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Email') ?></strong></td>
                            <td class="rightCol"><?php echo ($sf_guard_user_profile->getEmail(false)) ? mail_to($sf_guard_user_profile->getEmail(false), $sf_guard_user_profile->getEmail(false)) : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Website') ?></strong></td>
                            <td class="rightCol"><?php echo ($sf_guard_user_profile->getUrl(false)) ? link_to($sf_guard_user_profile->getUrl(false), $sf_guard_user_profile->getUrl(false)) : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Phones') ?></strong></td>
                            <td class="rightCol"><?php echo $sf_guard_user_profile->getPhones(false) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Fax') ?></strong></td>
                            <td class="rightCol"><?php echo $sf_guard_user_profile->getFax(false) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Language') ?></strong></td>
                            <td class="rightCol"><?php echo format_language($sf_guard_user_profile->getLanguage()) ?></td>
                        </tr>
                    </table>
                </div>
                <div id="userEdit" stlye="display: none;"></div>
                <div id="setDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit user details"'), '/user/edit?id=' . $sf_guard_user_profile->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete user"'), '/user/delete?id=' . $sf_guard_user_profile->getId(), 'post=true&confirm=' . ('Are you sure?')) ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>
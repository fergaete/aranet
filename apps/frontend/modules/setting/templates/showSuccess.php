<?php aranet_title(__('Setting %1%', array('%1%' => $sf_setting->getName()))) ?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View setting details') ?> <span class="subText">(<?php echo $sf_setting->getName() ?>)</span></h3>

<div id="settingDisplay" class="windowFrame">
    <table style="width:100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($sf_setting->getName(), 'setting/show?id=' . $sf_setting->getId()) ?></span><br \><?php echo $sf_setting->getDescription() ?><br />
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div id="infoWindow" class="infoWindow">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Environment') ?></strong></td>
                            <td class="rightCol"><?php echo $sf_setting->getEnv() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Value') ?></strong></td>
                            <td class="rightCol"><?php echo $sf_setting->getValue() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Since') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($sf_setting->getCreatedAt())  ?></td>
                        </tr>
                    </table>
                </div>
                <div id="settingEdit" stlye="display: none;"></div>
                <div id="setDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit setting details"'), '/setting/edit?id=' . $sf_setting->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete setting"'), '/setting/delete?id=' . $sf_setting->getId(), 'post=true&confirm=' . ('Are you sure?')) ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>
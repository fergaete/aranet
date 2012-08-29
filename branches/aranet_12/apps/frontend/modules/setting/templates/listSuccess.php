<?php use_helper('Javascript') ?>
<?php aranet_title(__('List settings')) ?>
<h3><?php echo __('View all settings') ?></h3>
<?php echo form_tag('setting/delete', 'name="chklist"') ?>
<div id="settingDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 22%;" onmouseover="this.style.cursor = 'pointer'; this.style.background = '#FBE27E';" onmouseout="this.style.background='#FBE9A1';">
                    <?php if ($sf_user->getAttribute('sort', null, 'setting/sort') == 'name'): ?>
                    <?php echo link_to(__('Name'), 'setting/list?sort=name&type='.($sf_user->getAttribute('type', 'asc', 'setting/sort') == 'asc' ? 'desc' : 'asc')) ?>
                    (<?php echo __($sf_user->getAttribute('type', 'asc', 'setting/sort')) ?>)
                    <?php else: ?>
                    <?php echo link_to(__('Name'), 'setting/list?sort=name&type=asc') ?>
                    <?php endif; ?>
                </th>
                <th><?php echo __('Environment') ?></th>
                <th><?php echo __('Value') ?></th>
                <th><?php echo __('Description') ?></th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $setting): $odd = fmod(++$i, 2) ?>
            <tr id="setting_<?php echo $setting->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $setting->getId(), false) ?></td>
                <td class="actions" id="settingMenu_<?php echo $setting->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'setting/show?id='.$setting->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'setting/edit?id='.$setting->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                                'update'   => 'setting_'.$setting->getId(),
                                'url'      => 'setting/delete?id='.$setting->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($setting->getName(), 'setting/show?id='.$setting->getId()) ?></td>
                <td><?php echo $setting->getEnv() ?></td>
                <td><?php echo $setting->getValue() ?></td>
                <td><?php echo $setting->getDescription() ?></td>
            </tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th colspan="6">
                <div class="pagination">
<?php use_helper('Pagination'); $uri = substr($sf_request->getUri(), strlen($sf_request->getUriPrefix())+1) ?>
<?php echo pager_navigation($pager, $uri) ?>
                </div>
<?php echo pager_results($pager) ?>
<?php echo repagination_links($pager, $uri) ?>
            </th></tr>
        </tfoot>
    </table>
</div>

<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?> :</li>
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

</form>
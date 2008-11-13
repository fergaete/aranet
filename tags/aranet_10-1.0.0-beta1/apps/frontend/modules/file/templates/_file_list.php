<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<div class="windowFrame" id="<?php echo $id ?>">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="actions"></th>
                <th style="width: 42%"><?php echo __('File') ?></th>
                <th style="text-align: center;width: 12%"><?php echo __('Size') ?></th>
                <th style="text-align: center;width: 24%"><?php echo __('Mime Type') ?></th>
                <th class="date"><?php echo __('Created at') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $i = 1; foreach ($sf_propel_file_storage_infos as $sf_propel_file_storage_info): $odd = fmod(++$i, 2);?>
            <tr id="file_<?php echo $sf_propel_file_storage_info->getFileId() ?>" class="row_<?php echo $odd ?>">
                <td class="actions" id="fileMenu_<?php echo $sf_propel_file_storage_info->getFileId() ?>">
                <div class="objectActions">
                <ul>
                  <li><?php echo link_to(image_tag("button_view.gif", 'alt="View/Download"'), '@download_by_file_name?name='.urlencode($sf_propel_file_storage_info->getFileName())) ?></li>
                  <li><?php echo link_to(image_tag("button_edit.gif", 'alt="Edit"'), 'file/edit?file_id='.$sf_propel_file_storage_info->getFileId()) ?></li>
                  <li><?php echo link_to_remote(image_tag("button_delete.gif", 'alt="Delete"'), array(
                    'update'   => 'file_' . $sf_propel_file_storage_info->getFileId(),
                    'url'      => 'file/delete?file_id='.$sf_propel_file_storage_info->getFileId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
                </ul>
                </div>
                </td>
                <td><?php echo link_to($sf_propel_file_storage_info, '@download_by_file_name?name='.urlencode($sf_propel_file_storage_info->getFileName())) ?></td>
                <td class="number"><?php echo smart_format_filesize($sf_propel_file_storage_info->getFileSize()) ?></td>
                <td class="status"><?php echo $sf_propel_file_storage_info->getFileMimeType() ?>
                    <?php if ($sf_propel_file_storage_info->getFileWidth() && $sf_propel_file_storage_info->getFileHeight()) : ?>
                    <?php echo ' ('.$sf_propel_file_storage_info->getFileWidth().'px x '.$sf_propel_file_storage_info->getFileHeight().'px)'?>
                    <?php endif ?>
                </td>
                <td class="date"><?php echo format_date($sf_propel_file_storage_info->getCreatedAt()) ?></td>
            </tr>
<?php endforeach; ?>
    </tbody>
</table>
</div>
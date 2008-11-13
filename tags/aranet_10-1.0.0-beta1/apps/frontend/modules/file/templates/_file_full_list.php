<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php echo form_tag('file/deleteall', 'name="chklist"') ?>
<div id="fileDisplay" style="width: 100%;" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width: 50%"><?php echo __('File') ?></th>
                <th style="width: 10%"><?php echo __('Size') ?></th>
                <th style="width: 20%"><?php echo __('Mime Type') ?></th>
                <th style="width: 14%"><?php echo __('Created at') ?></th>
            </tr>
        </thead>
        <tbody>
<?php $i = 1; foreach ($pager->getResults() as $sf_propel_file_storage_info): $odd = fmod(++$i, 2); ?>
    <tr id="file_<?php echo $sf_propel_file_storage_info->getFileId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $sf_propel_file_storage_info->getFileId(), false) ?></td>
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
                <td><?php echo link_to($sf_propel_file_storage_info, '@download_by_file_name?name='.$sf_propel_file_storage_info->getFileName()) ?></td>
                <td style="text-align: center;"><?php echo smart_format_filesize($sf_propel_file_storage_info->getFileSize()) ?></td>
                <td style="text-align: center;"><?php echo $sf_propel_file_storage_info->getFileMimeType() ?>
                    <?php if ($sf_propel_file_storage_info->getFileWidth() && $sf_propel_file_storage_info->getFileHeight()) : ?>
                    <?php echo ' ('.$sf_propel_file_storage_info->getFileWidth().'px x '.$sf_propel_file_storage_info->getFileHeight().'px)'?>
                    <?php endif ?>
                </td>
                <td style="text-align: center;"><?php echo format_date($sf_propel_file_storage_info->getCreatedAt()) ?></td>
            </tr>
<?php endforeach; ?>
    </tbody>
            <tfoot>
            <tr><th colspan="9">
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

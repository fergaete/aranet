<ul>
    <li><?php echo link_to(__('List files'), '/file/list') ?></li>
    <li><?php echo link_to(__('Add new file'), '/file/create') ?></li>
    <li><?php echo form_tag('file/list', array('method' => 'get', 'name' => 'file_filters')) ?>
        <?php echo input_tag('filters[file_name]', isset($filters['file_name']) && $filters['file_name'] ? $filters['file_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

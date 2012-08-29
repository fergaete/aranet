<ul>
    <li><?php echo link_to(__('List projects'), '/project/list') ?></li>
    <li><?php echo link_to(__('Add new project'), '/project/create') ?></li>
    <li><?php echo form_tag('project/list', array('method' => 'get', 'name' => 'project_filters')) ?>
        <?php echo input_tag('filters[project_name]', isset($filters['project_name']) && $filters['project_name'] ? $filters['project_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

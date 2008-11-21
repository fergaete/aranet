<ul>
    <li><?php echo link_to(__('List timesheet records'), '/timesheet/list') ?></li>
    <li><?php echo link_to(__('Add new record'), '/timesheet/create') ?></li>
    <li><?php echo form_tag('timesheet/list', array('method' => 'get', 'name' => 'timesheet_filters')) ?>
        <?php echo input_tag('filters[timesheet_name]', isset($filters['timesheet_name']) && $filters['timesheet_name'] ? $filters['timesheet_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

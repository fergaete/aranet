<ul>
    <li><?php echo link_to(__('List members'), '/user/list') ?></li>
    <li><?php echo link_to(__('Add new member'), '/user/create') ?></li>
    <li><?php echo form_tag('user/list', array('method' => 'get', 'name' => 'user_filters')) ?>
        <?php echo input_tag('filters[user_name]', isset($filters['user_name']) && $filters['user_name'] ? $filters['user_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

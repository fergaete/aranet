<ul>
    <li><?php echo link_to(__('List clients'), '/client/list') ?></li>
    <li><?php echo link_to(__('Add new client'), '/client/create') ?></li>
    <li><?php echo form_tag('client/list', array('method' => 'get', 'name' => 'client_filters')) ?>
        <?php echo input_tag('filters[client_name]', isset($filters['client_name']) && $filters['client_name'] ? $filters['client_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

<ul>
    <li><?php echo link_to(__('List contacts'), '/contact/list') ?></li>
    <li><?php echo link_to(__('Add new contact'), '/contact/create') ?></li>
    <li><?php echo form_tag('contact/list', array('method' => 'get', 'name' => 'contact_filters')) ?>
        <?php echo input_tag('filters[contact_name]', isset($filters['contact_name']) && $filters['contact_name'] ? $filters['contact_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

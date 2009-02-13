<ul>
    <li><?php echo link_to(__('List vendors'), '/vendor/list') ?></li>
    <li><?php echo link_to(__('Add new vendor'), '/vendor/create') ?></li>
    <li><?php echo form_tag('vendor/list', array('method' => 'get', 'name' => 'vendor_filters')) ?>
        <?php echo input_tag('filters[vendor_name]', isset($filters['vendor_name']) && $filters['vendor_name'] ? $filters['vendor_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

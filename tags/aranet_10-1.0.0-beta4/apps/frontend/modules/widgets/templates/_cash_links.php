<ul>
    <li><?php echo link_to(__('List cash movements'), '/cash/list') ?></li>
    <li><?php echo link_to(__('Add new cash movement'), '/cash/create') ?></li>
    <li><?php echo form_tag('cash/list', array('method' => 'get', 'name' => 'cash_filters')) ?>
        <?php echo input_tag('filters[cash_name]', isset($filters['cash_name']) && $filters['cash_name'] ? $filters['cash_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

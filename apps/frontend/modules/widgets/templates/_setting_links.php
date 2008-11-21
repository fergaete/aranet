<ul>
    <li><?php echo link_to(__('List settings'), '/setting/list') ?></li>
    <li><?php echo link_to(__('Add new setting'), '/setting/create') ?></li>
    <li><?php echo form_tag('setting/list', array('method' => 'get', 'name' => 'budget_filters')) ?>
        <?php echo input_tag('filters[name]', isset($filters['name']) && $filters['name'] ? $filters['name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

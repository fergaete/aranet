<ul>
    <li><?php echo link_to(__('List expenses'), '/expense/list') ?></li>
    <li><?php echo link_to(__('Add new expense item'), '/expense/create') ?></li>
    <li><?php echo form_tag('expense/list', array('method' => 'get', 'name' => 'expense_filters')) ?>
        <?php echo input_tag('filters[expense_name]', isset($filters['expense_name']) && $filters['expense_name'] ? $filters['expense_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

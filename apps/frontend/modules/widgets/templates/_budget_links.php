<ul>
    <li><?php echo link_to(__('List budgets'), '/budget/list') ?></li>
    <li><?php echo link_to(__('Add new budget'), '/budget/create') ?></li>
    <li><?php echo form_tag('budget/list', array('method' => 'get', 'name' => 'budget_filters')) ?>
        <?php echo input_tag('filters[budget_name]', isset($filters['budget_name']) && $filters['budget_name'] ? $filters['budget_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

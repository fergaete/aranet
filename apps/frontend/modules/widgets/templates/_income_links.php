<ul>
    <li><?php echo link_to(__('List incomes'), '/income/list') ?></li>
    <li><?php echo link_to(__('Add new income'), '/income/create') ?></li>
    <li><?php echo form_tag('income/list', array('method' => 'get', 'name' => 'income_filters')) ?>
        <?php echo input_tag('filters[income_name]', isset($filters['income_name']) && $filters['income_name'] ? $filters['income_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

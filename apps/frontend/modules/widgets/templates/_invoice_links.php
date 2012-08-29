<ul>
    <li><?php echo link_to(__('List invoices'), '/invoice/list') ?></li>
    <li><?php echo link_to(__('Add new invoice'), '/invoice/create') ?></li>
    <li><?php echo form_tag('invoice/list', array('method' => 'get', 'name' => 'invoice_filters')) ?>
        <?php echo input_tag('filters[invoice_name]', isset($filters['invoice_name']) && $filters['invoice_name'] ? $filters['invoice_name'] : __('Name') .'...', array('class' => 'form-medium-text', 'onfocus' => 'this.value=""')) ?>
    <?php echo submit_tag(__('Search'), 'name=filter class=sf_admin_action_filter') ?></form></li>
</ul>

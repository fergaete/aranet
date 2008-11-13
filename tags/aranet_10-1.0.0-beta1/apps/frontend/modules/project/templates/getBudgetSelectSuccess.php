<?php use_helper('Object', 'Javascript') ?>
<?php if (isset($budgets)) : ?>
  <?php echo select_tag($sf_params->get('class') . '_budget_id', objects_for_select($budgets,
  'getId',
  'getFulltitle',
  '',
  'include_custom='.__('Select budget') . '...'),
  array ('class' => 'form-combobox')) ?>
<?php else: ?>
<?php echo javascript_tag("function getBudget(text, li){ $('".$sf_params->get('class')."_budget_id').value = li.id;}") ?>
  <?php echo input_hidden_tag($sf_params->get('class').'_budget_id', ($sf_params->get($sf_params->get('class') .'_budget_id') ? $sf_params->get($sf_params->get('class') .'_budget_id') : '')) ?>
            <?php echo input_auto_complete_tag('budget_name', ($sf_params->get('budget_name') ? $sf_params->get('budget_name') : ''),
        'budget/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-text', 'onclick' => 'this.value=""'),
        array('use_style'    => true,
            'after_update_element' => 'getBudget')
    ) ?><br/>
    <span class="notes"><?php echo __("Leave blank if you don't want to select any budget") ?></span>
<?php endif ?>

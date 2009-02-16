<?php

/**
 * BudgetItem form.
 *
 * @package    ARANet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class BudgetItemForm extends BaseBudgetItemForm
{
  public function configure()
  {
    parent::configure();
    
    unset($this['milestone_task_id'], $this['item_task_id']);
    
    $this->widgetSchema['item_budget_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['item_order'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['item_type_id'] = new yuiWidgetFormPropelSelect(array('model' => 'TypeOfInvoiceItem', 'add_empty' => true, 'multiple' => false), array('class' => 'yui_select'));
    
    $this->widgetSchema['item_quantity'] = new sfWidgetFormInput(array(), array('class' => 'tiny'));
    $this->widgetSchema['item_cost'] = new sfWidgetFormInput(array(), array('class' => 'smaller separator'));
    $this->widgetSchema['item_margin'] = new sfWidgetFormInput(array(), array('class' => 'tiny separator'));
    $this->widgetSchema['item_retail_price'] = new sfWidgetFormInput(array(), array('class' => 'smaller separator'));
    
    $this->widgetSchema->setLabels(array(
      'item_description' => 'Description',
      'item_type_id' => 'Type',
      'item_quantity' => 'Qty.',
      'item_cost' => 'Cost/Margin/Price',
      'item_is_optional' => 'Is optional?',
    ));
    
    $decorator = new anWidgetFormSchemaFormatterAranet($this->widgetSchema);
    $this->widgetSchema->addFormFormatter('aranet', $decorator);
    $this->widgetSchema->setFormFormatterName('aranet');
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('forms');
  }
}

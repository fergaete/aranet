<?php

/**
 * Formatter para formularios de ARANet
 *
 * @package ARAnet
 */
class anWidgetFormSchemaFormatterAranet extends sfWidgetFormSchemaFormatter
{
  protected
      $rowFormat       = "<tr>\n  <td class='actionsCol'></td><td class='leftCol'>%label%</td>\n  <td class='rightCol'> %field%%error%%help%%hidden_fields%</td>\n</tr>\n",
      $helpFormat      = '<span class="help">%help%</span>',
      $errorRowFormat  = "<tr><td class='actionsCol'></td>\n</td><td class='leftCol'></td>\n<td class='rightCol'>%errors%</td>\n</tr>\n",
      $errorListFormatInARow     = "  <ul class=\"error_list\">\n%errors%  </ul>\n",
      $errorRowFormatInARow      = "    <li>&larr; %error%</li>\n",
      $namedErrorRowFormatInARow = "    <li>%name%: %error%</li>\n",
      $decoratorFormat = "<table>\n  %content%</table>";
      
  /**
   * @see sfWidgetFormSchemaFormatter
   */
  public function __construct(sfWidgetFormSchema $widgetSchema)
  {
    parent::__construct($widgetSchema);

    // Añadimos a la lista de estilos css a usar el de este formatter.
    sfContext::getInstance()->getResponse()->addStylesheet('forms');
  }
  
}
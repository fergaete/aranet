<?php

/**
 * Formatter
 *
 * @package ARANet
 */
class anWidgetFormSchemaFormatterAranetFilter extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat =
'<div class="row">
  <div class="label">
    %label%
  </div>
  <div class="field">
    %field%%error%%help%%hidden_fields%
  </div>
</div>
',

    $errorRowFormat =
'<div class="global-errors">%errors%
  </div>
',

    $errorListFormatInARow =
'
    <ul class="errors">%errors%
    </ul>',

    $errorRowFormatInARow =
'
      <li>%error%</li>',

    $helpFormat =
'
    <div class="help">
      %help%
    </div>',

    $decoratorFormat =
'%content%';

  /**
   * @see sfWidgetFormSchemaFormatter
   */
  public function __construct(sfWidgetFormSchema $widgetSchema)
  {
    parent::__construct($widgetSchema);

    // Añadimos a la lista de estilos css a usar el de este formatter.
    sfContext::getInstance()->getResponse()->addStylesheet('formu');
  }

  /**
   * @see sfWidgetFormSchemaFormatter
   */
  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    // Por defecto se pone un ancho fijo a los campos, y algunos como fechas, checkbox... requieren que sea normal. Aquí se comprueba si lo requieren, y si es así se le añade el código html para ello.
    if (self::isFieldForAutoWidth($field))
    {
      $field = sprintf("<div class=\"width-auto\">\n%s</div>\n", $field);
    }

    return parent::formatRow($label, $field, $errors, $help, $hiddenFields);
  }

  /**
   * Determina si un campo de formulario requiere un ancho normal.
   *
   * @param string $field Campo a comprobar.
   *
   * @return boolean true si necesita ancho normal, sino false.
   */
  static protected function isFieldForAutoWidth($field)
  {
    // fecha
    if (
      false !== strpos($field, '[day]') &&
      false !== strpos($field, '[month]') &&
      false !== strpos($field, '[year]')
    )
    {
      return true;
    }

    // checkbox
    if (false !== strpos($field, 'type="checkbox"'))
    {
      return true;
    }

    // radio
    if (false !== strpos($field, 'type="radio"'))
    {
      return true;
    }

    return false;
  }
}

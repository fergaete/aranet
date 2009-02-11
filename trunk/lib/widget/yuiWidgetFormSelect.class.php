<?php

/**
 * yuiWidgetFormSelect represents a select HTML tag.
 *
 * @package    ARAnet
 * @subpackage widget
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class yuiWidgetFormSelect extends sfWidgetForm
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * choices:  An array of possible choices (required)
   *  * multiple: true if the select tag must allow multiple selections
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('choices');
    $this->addOption('multiple', false);
    //TODO: Dont work
    ysfYUI::addComponents('yahoo', 'dom', 'button');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if ($this->getOption('multiple'))
    {
      $attributes['multiple'] = 'multiple';

      if ('[]' != substr($name, -2))
      {
        $name .= '[]';
      }
    }

    $choices = $this->getOption('choices');
    if ($choices instanceof sfCallable)
    {
      $choices = $choices->call();
    }
    if (!empty($choices) && array_key_exists($value, $choices)) {
      $label = $choices[$value];
    } else {
      $label = sfContext::getInstance()->getI18N()->__('Select').'...';
    }
    ysfYUI::addComponent('menu');
    ysfYUI::addComponent('dom');
    ysfYUI::addComponent('event');
    ysfYUI::addEvent($this->generateId($name), 'ready', '
        var menuClick'.$this->generateId($name).' = function(type, args, item) {
          var menu = item.parent;
          splitButton'.$this->generateId($name).'.set("label", item.cfg.getProperty("text")); 
          splitButton'.$this->generateId($name).'.set("value", item.value); 
          var aux'.$this->generateId($name).' = YAHOO.util.Dom.get("'.$this->generateId('aux_'.$name).'");
          aux'.$this->generateId($name).'.value = item.value;
          var menu_items = menu.getItems()
          for (var i = 0; i < menu_items.length; i++) {
              //Uncheck the menu item
              menu_items[i].cfg.setProperty("checked", false);
          }
          item.cfg.setProperty("checked", true);
        };
        var Menu'.$this->generateId($name).' = [ '.$this->getOptionsForJavascript($value, $choices, $this->generateId($name)).' ];
        var splitButton'.$this->generateId($name).' = new YAHOO.widget.Button({ type: "menu", label: "'.$label.'", menu: Menu'.$this->generateId($name).', container: "'.$this->generateId($name).'" });            
    ');
    return 
      $this->renderContentTag('div', 
        $this->renderTag('input', array_merge(array('type' => 'hidden', 'value' => $value, 'name' => $name, 'id' => $this->generateId("aux_".$name)), $attributes)),
        array('id' => $this->generateId($name)));
  }

  /**
   * Returns an array of option tags for the given choices
   *
   * @param  string $value    The selected value
   * @param  array  $choices  An array of choices
   *
   * @return array  An array of option tags
   */
  protected function getOptionsForSelect($value, $choices)
  {
    $mainAttributes = $this->attributes;
    $this->attributes = array();

    $options = array();
    foreach ($choices as $key => $option)
    {
      if (is_array($option))
      {
        $options[] = $this->renderContentTag('optgroup', implode("\n", $this->getOptionsForSelect($value, $option)), array('label' => self::escapeOnce($key)));
      }
      else
      {
        $attributes = array('value' => self::escapeOnce($key));
        if ((is_array($value) && in_array(strval($key), $value)) || strval($key) == strval($value))
        {
          $attributes['selected'] = 'selected';
        }

        $options[] = $this->renderContentTag('option', self::escapeOnce($option), $attributes);
      }
    }

    $this->attributes = $mainAttributes;

    return $options;
  }

/**
   * Returns an array of option tags for the given choices
   *
   * @param  string $value    The selected value
   * @param  array  $choices  An array of choices
   *
   * @return array  An array of option tags
   */
  protected function getOptionsForJavascript($value, $choices, $id)
  {
    $options = "";
    foreach ($choices as $key => $option)
    {
      $options .= '{ text: "'.$option.'", value: "'.$key.'", onclick: { fn: menuClick'.$id.' }';
      if ($value == $key) {
        $options .= ', checked: true';
      }
      $options .= ' },';
    }

    return substr($options,0,-1);
  }
  
  /**
   * @see sfWidget
   *
   * We always generate an attribute for the value.
   */
  protected function attributesToHtmlCallback($k, $v)
  {
    return is_null($v) || ('' === $v && 'value' != $k) ? '' : sprintf(' %s="%s"', $k, $this->escapeOnce($v));
  }
}

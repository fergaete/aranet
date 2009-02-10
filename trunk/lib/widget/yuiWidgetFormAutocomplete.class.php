<?php

/**
 * yuiWidgetFormAutocomplete represents a input autocomplete HTML tag.
 *
 * @package    ARAnet
 * @subpackage widget
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class yuiWidgetFormAutocomplete extends sfWidgetForm
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * delimChar:   An array of possible separators
   *  * useShadow:    
   *  * minQueryLength: 
   *  * maxResultDisplayed:
   *  * responseType:     JSON default
   *  * action:       TODO
   *  * formatResult:
   *  * resultSchema:
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('delimChar', array());
    $this->addOption('useShadow', true);
    $this->addOption('minQueryLength', 2);
    $this->addOption('maxResultDisplayed', 10);
    $this->addOption('responseType', "JSON");
    $this->addOption('action', "");
    $this->addOption('formatResult', "%1%.Title");
    $this->addOption('resultSchema', '["ResultSet.Result","Title"]');
    $this->addOption('value', "");
    parent::configure($options, $attributes);
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
    $attributes = array_merge($this->attributes, $attributes);
    $attributes = $this->fixFormId($attributes);
    ysfYUI::addComponents('datasource', 'autocomplete', 'json');

    if ($this->getOption('delimChar'))
    {
      $delimChar = implode('","', $this->getOption('delimChar'));
      $delimChar = '["'.$delimChar.'"]';
    }
    $action = $this->getOption('action');
    $responseType = $this->getOption('responseType');
    $minQueryLength = $this->getOption('minQueryLength');
    $useShadow = $this->getOption('useShadow');
    $maxResultDisplayed = $this->getOption('maxResultDisplayed');
    $formatResult = $this->getOption('formatResult');
    $resultSchema = $this->getOption('resultSchema');
    $value = $this->getOption('value');
    if (is_array($value)) {
      $string_value = $value[0];
      $id_value = $value[1];
    } else {
      $string_value = $value;
      $id_value = '';
    }

    $js = '
      var ACJson'.$this->generateId($name).' = new function(){
        var mySchema'.$this->generateId($name).' = '.$resultSchema.';
        var oACDS'.$this->generateId($name).'  = new YAHOO.widget.DS_XHR("'.$action.'", mySchema'.$this->generateId($name).');

        oACDS'.$this->generateId($name).'.responseType = YAHOO.widget.DS_XHR.TYPE_'.$responseType.'; 
    
        // Instantiate AutoComplete
        oAutoComp'.$this->generateId($name).' = new YAHOO.widget.AutoComplete("'.$this->generateId($name).'","'.$this->generateId($name).'-container", oACDS'.$this->generateId($name).');';
    $js .= ($useShadow) ? '
        oAutoComp'.$this->generateId($name).'.useShadow = true;' : '';
    $js .= '
        oAutoComp'.$this->generateId($name).'.maxResultDisplayed = '.$maxResultDisplayed.';';
    $js .= (isset($delimChar)) ? '
        oAutoComp'.$this->generateId($name).'.delimChar = '.$delimChar.';' : '';
    $js .= '
        oAutoComp'.$this->generateId($name).'.minQueryLength = '.$minQueryLength.';
        oAutoComp'.$this->generateId($name).'.formatResult = function(oResultItem, sQuery) {
          return '.preg_replace(array('/%1%/'), array('oResultItem[1]'), $formatResult).';
        };
        oAutoComp'.$this->generateId($name).'.doBeforeExpandContainer = function(oTextbox, oContainer, sQuery, aResults) {
          var pos = YAHOO.util.Dom.getXY(oTextbox);
          pos[1] += YAHOO.util.Dom.get(oTextbox).offsetHeight + 2;
          YAHOO.util.Dom.setXY(oContainer,pos);
          return true;
        };
        var itemSelectHandler'.$this->generateId($name).' = function(sType, aArgs) { 
          YAHOO.log(sType);
          var oInput = YAHOO.util.Dom.get("'.$this->generateId($name).'_ids");
          if (oInput.value != "") {
            oInput.value = aArgs[2][1].Id + "," + oInput.value + ",";
          } else {
            oInput.value = aArgs[2][1].Id;
          }
          oInput.value = aArgs[2][1].Id;
        }; 
        oAutoComp'.$this->generateId($name).'.itemSelectEvent.subscribe(itemSelectHandler'.$this->generateId($name).'); 
      };';
      ysfYUI::addEvent('document', 'ready', $js);
    
    $class = (isset($attributes['class'])) ? 'autocomplete ' . $attributes['class'] : 'autocomplete';
    unset($attributes['class']);
    $field = 
      $this->renderTag('input', array_merge(array('name' => $name."[name]", 'id' => $this->generateId($name), 'value' => $string_value, 'class' => $class), $attributes));
    $field .=
      $this->renderTag('input', array_merge(array('type' => 'hidden', 'name' => $name."[ids]", 'value' => $id_value), $attributes)).
      $this->renderContentTag('div', '', array_merge(array('id' => $this->generateId($name).'-container', 'class' => $class), $attributes));
    return $field;
  }

}

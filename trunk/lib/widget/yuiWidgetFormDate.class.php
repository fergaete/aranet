<?php

/**
 * yuiWidgetFormDate represents a select HTML tag.
 *
 * @package    ARAnet
 * @subpackage widget
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */
class yuiWidgetFormDate extends sfWidgetForm
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
    ysfYUI::addComponents('calendar', 'container', 'button');
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
    if (!is_array($value)) {
      $value = array('month' => substr($value, 5, 2), 'day' => substr($value, 8, 2), 'year' => substr($value, 0, 4));
    }

    $v = (implode('', $value)) ? format_date(sprintf('%04d', $value['year']).'-'.sprintf('%02d', $value['month']).'-'.sprintf('%02d', $value['day']), 'p') : __('Choose a date');
    $culture = sfContext::getInstance()->getUser()->getCulture();
    static $dateFormats = array();
    if (!isset($dateFormats[$culture]))
    {
      $dateFormats[$culture] = new sfDateFormat($culture);
    }
    $formated_date = $dateFormats[$culture]->format('1900-10-01', 'p');
    $date_format = str_replace(array('1900', '10', '01', '/'), array('nYear', 'nMonth', 'nDay', '+"/"+'), $formated_date);

    //$date_format = 'nMonth + "/" + nDay + "/" + nYear';
    //$attributes = $this->fixFormId(array_merge(array('name' => $name), $attributes));

    $js = '
    var oDateFields'.$this->generateId($name).' = YAHOO.util.Dom.get("'.$this->generateId($name).'_datefields");
      oMonthField'.$this->generateId($name).' = YAHOO.util.Dom.get("'.$this->generateId($name).'_month"),
      oDayField'.$this->generateId($name).' = YAHOO.util.Dom.get("'.$this->generateId($name).'_day"),
      oYearField'.$this->generateId($name).' = YAHOO.util.Dom.get("'.$this->generateId($name).'_year");
    oMonthField'.$this->generateId($name).'.style.display = "none";
    oDayField'.$this->generateId($name).'.style.display = "none";
    oYearField'.$this->generateId($name).'.style.display = "none";
    var oCalendarMenu'.$this->generateId($name).' = new YAHOO.widget.Overlay("'.$this->generateId($name).'_calendarmenu", { visible: false });
    var oCalendarButton'.$this->generateId($name).' = new YAHOO.widget.Button({ 
                    type: "menu", 
                    id: "calendarpicker'.$this->generateId($name).'", 
                    label: "'.$v.'", 
                    menu: oCalendarMenu'.$this->generateId($name).', 
                    container: "'.$this->generateId($name).'_datefields" });
    ';
  
    $js .= 'oCalendarButton'.$this->generateId($name).'.on("appendTo", function () {
      oCalendarMenu'.$this->generateId($name).'.setBody(" ");
      oCalendarMenu'.$this->generateId($name).'.body.id = "'.$this->generateId($name).'_calendarcontainer";
      oCalendarMenu'.$this->generateId($name).'.render(this.get("'.$this->generateId($name).'_datefields"));
    });
    
    function oCalendarButton'.$this->generateId($name).'Click() {
      var navConfig'.$this->generateId($name).' = {
        strings : {
          month: "'.__('Month').'",
          year: "'.__('Year').'",
          submit: "'.__('Ok').'",
          cancel: "'.__('Cancel').'",
          invalidYear: "'.__('Please enter a valid year').'"
        },
        monthFormat: YAHOO.widget.Calendar.LONG,
        initialFocus: "year"
      };
  

      var oCalendar'.$this->generateId($name).' = new YAHOO.widget.Calendar("'.$this->generateId($name).'", oCalendarMenu'.$this->generateId($name).'.body.id, { 
          navigator: navConfig'.$this->generateId($name).',
          title: "'.__('Choose a date:').'"
      });
      ';
      if (sfContext::getInstance()->getUser()->getCulture() == 'es_ES') {
        // Correct formats for Spain: dd/mm/yyyy, dd/mm, mm/yyyy
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("START_WEEKDAY", "1");'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("DATE_FIELD_DELIMITER", "/");'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MDY_DAY_POSITION", 1);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MDY_MONTH_POSITION", 2);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MDY_YEAR_POSITION", 3);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MD_DAY_POSITION", 1);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MD_MONTH_POSITION", 2);'."\n";

        // Date labels for Spanish locale
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MONTHS_SHORT",   ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("MONTHS_LONG",    ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("WEEKDAYS_1CHAR", ["D", "L", "M", "X", "J", "V", "S"]);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("WEEKDAYS_SHORT", ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"]);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("WEEKDAYS_MEDIUM",["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"]);'."\n";
        $js .= 'oCalendar'.$this->generateId($name).'.cfg.setProperty("WEEKDAYS_LONG",  ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]);'."\n";
      }
      $js .= 'oCalendar'.$this->generateId($name).'.render();
      oCalendar'.$this->generateId($name).'.changePageEvent.subscribe(function () {
        window.setTimeout(function () {
          oCalendarMenu'.$this->generateId($name).'.show();
        }, 0);
      });
      
      oCalendar'.$this->generateId($name).'.selectEvent.subscribe(function (p_sType, p_aArgs) {
        var aDate,
          nMonth,
          nDay,
          nYear;
        if (p_aArgs) {
          aDate = p_aArgs[0][0];
          nMonth = aDate[1];
          nDay = aDate[2];
          nYear = aDate[0];
          oCalendarButton'.$this->generateId($name).'.set("label", ('.$date_format.'));

          YAHOO.util.Dom.get("'.$this->generateId($name).'_month").value = nMonth;
          YAHOO.util.Dom.get("'.$this->generateId($name).'_day").value = nDay;
          YAHOO.util.Dom.get("'.$this->generateId($name).'_year").value = nYear;
        }
        oCalendarMenu'.$this->generateId($name).'.hide();
      });

      this.unsubscribe("click", oCalendarButton'.$this->generateId($name).'Click);
    }
    oCalendarButton'.$this->generateId($name).'.on("click", oCalendarButton'.$this->generateId($name).'Click);';
    ysfYUI::addEvent($this->generateId($name)."_datefields", 'ready', $js);
                                     
    return $this->renderContentTag('div',
      $this->renderTag('input', array('name' => $name.'[month]', 'value' => $value['month'])) .
      $this->renderTag('input', array('name' => $name.'[day]', 'value' => $value['day'])) .
      $this->renderTag('input', array('name' => $name.'[year]', 'value' => $value['year'])) 
    , array_merge(array('id' => $this->generateId($name)."_datefields"), array_merge(array('class' => 'yui_select'), $attributes)));
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
   * @see sfWidget
   *
   * We always generate an attribute for the value.
   */
  protected function attributesToHtmlCallback($k, $v)
  {
    return is_null($v) || ('' === $v && 'value' != $k) ? '' : sprintf(' %s="%s"', $k, $this->escapeOnce($v));
  }
}

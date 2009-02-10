<?php
use_helper('Javascript');

/*
 * This file is part of the symfony package.
 * (c) 2008 Yang Tang <pureyang@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Wrapper for YUI Button component.
 *
 * @package    symfony
 * @subpackage helper
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 */

// EXAMPLE USE:
// TODO

/**
 * Marks the usage of YUI Simple Dialog
 * for now just takes care of the relevant imports
 *
 *
 * @param string $element
 * @param string $data    This is a JS array containing the data (it's a string in php)
 * @param array  $fields  This is an associative array of fields of the form 'column_name' => 'Display Name'
 * @param string $actions This string of html allows any links to be added per row
 * @param string $caption This is curley brace'd list of options e.g. sortedBy:{key:"areacode", dir:"asc"}, caption: "hello"
 */

// below probably needs to be moved inside body slot
//YAHOO.namespace("csp.container");

function yui_calendar_init()
{
  ysfYUI::addComponents('dom', 'event', 'calendar');
}

function yui_calendar($name)
{
    yui_calendar_init();
    $element = strtr(get_id_from_name($name), ' ', '_');
    $js  = "";
    $js .= "YAHOO.util.Event.addListener(window, 'load', function() {\n".
      $element . "_cal = new YAHOO.widget.Calendar('".$element."_cal','".$element."Container');\n";
    if (sfContext::getInstance()->getUser()->getCulture() == 'es_ES') {
      // Correct formats for Spain: dd/mm/yyyy, dd/mm, mm/yyyy
      $js .= $element . '_cal.cfg.setProperty("START_WEEKDAY", "1");'."\n";
		  $js .= $element . '_cal.cfg.setProperty("DATE_FIELD_DELIMITER", "/");'."\n";
      $js .= $element . '_cal.cfg.setProperty("MDY_DAY_POSITION", 1);'."\n";
      $js .= $element . '_cal.cfg.setProperty("MDY_MONTH_POSITION", 2);'."\n";
      $js .= $element . '_cal.cfg.setProperty("MDY_YEAR_POSITION", 3);'."\n";
      $js .= $element . '_cal.cfg.setProperty("MD_DAY_POSITION", 1);'."\n";
      $js .= $element . '_cal.cfg.setProperty("MD_MONTH_POSITION", 2);'."\n";

		  // Date labels for Spanish locale
      $js .= $element . '_cal.cfg.setProperty("MONTHS_SHORT",   ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]);'."\n";
      $js .= $element . '_cal.cfg.setProperty("MONTHS_LONG",    ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]);'."\n";
      $js .= $element . '_cal.cfg.setProperty("WEEKDAYS_1CHAR", ["D", "L", "M", "X", "J", "V", "S"]);'."\n";
		  $js .= $element . '_cal.cfg.setProperty("WEEKDAYS_SHORT", ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"]);'."\n";
		  $js .= $element . '_cal.cfg.setProperty("WEEKDAYS_MEDIUM",["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"]);'."\n";
		  $js .= $element . '_cal.cfg.setProperty("WEEKDAYS_LONG",  ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]);'."\n";
    }
    $js .= $element."_cal.render();\n".
    "
    ".$element."_cal.beforeRenderEvent.subscribe(getDates);
    ".$element."_cal.renderEvent.subscribe(addListeners);
    YAHOO.util.Event.addListener('addTip', 'click', addDynamicTip);
    function addDynamicTip(ev) {
      var nDate = $('newDate').value;
      var nTip = $('newTip').value;
      if (nDate && nTip) {
        myDates[nDate] = nTip;
        ".$element."_cal.select(nDate);
        addListeners();
      }
      Event.stopEvent(ev);
    }
    function getDates() {
      var curDate = ".$element."_cal.cfg.getProperty('pagedate');
      var url = 'widgets/calendar?month=' + (curDate.getMonth() +1) + '&getYear=' + curDate.getFullYear();
      var transaction = YAHOO.util.Connect.asyncRequest('GET', url, callback, null);
    }
    function parseNewDates(o) {
      var newDates = eval('(' + o.responseText + ')');
      myDates = newDates;
      addListeners();
    }
    var callback = {
      success: parseNewDates
    }
    
    function addListeners() {
      for (var i = 0; i < dateHolder.length; i++) {
        dateHolder[i].destroy();
      }
      var tds = Dom.getElementsByClassName('calcell', 'td', ".$element."_cal.table);
      for (var i = 0; i < tds.length; i++) {
        //Parse the current date to (m/d/yyyy)
        var tmpDate = cal1.cellDates[i][1] + '/' + cal1.cellDates[i][2] + '/' + cal1.cellDates[i][0];
        if (myDates[tmpDate]) {
          //This fails in IE, not sure why?!?!
          try {
            ".$element."_cal.selectCell(i);
          } catch (e) {}
          dateHolder[dateHolder.length] = myTooltip = new YAHOO.widget.Tooltip(".$element."_cal.cells[i].id + '_tooltip', { 
            context: cal1.cells[i].id, 
            text: myDates[tmpDate],
            showDelay:500 } );
        }
      }
    }";
    $js .= "})\n";

    //echo sfContext::getInstance()->getUser()->getCulture();
      
    return javascript_tag($js);
}

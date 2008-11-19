<?php

/**
 * YUI DataTable Helper.
 *
 * @package    ARANet
 * @subpackage helpers
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 *
 */

sfContext::getInstance()->getConfiguration()->loadHelpersarray('Tag', 'Javascript'));

  function yui_table($name, $container)
  {
    $js = 'YAHOO.util.Event.onContentReady("'.$name.'", function() {
      YAHOO.aranet.'.$name.' = new function() {
        var myColumnDefs = [
            {key:"checkbox",label:"<input type=\"checkbox\" name=\"select[]\" value=\"0\" onclick=\"checkAll(this)\" />"},
            {key:"actions",label:"Actions"},
            {key:"name",label:"Name", sortable:true},
            {key:"email",label:"Email", sortable:true},
            {key:"phone",label:"Phone"},
            {key:"mobile",label:"Mobile"},
            {key:"address",label:"Address"},
        ];

        this.myDataSource = new YAHOO.util.DataSource(YAHOO.util.Dom.get("'.$name.'"));
        this.myDataSource.responseType = YAHOO.util.DataSource.TYPE_HTMLTABLE;
        this.myDataSource.responseSchema = {
            fields: [{key:"checkbox"},
                    {key:"actions"},
                    {key:"name"},
                    {key:"email"},
                    {key:"phone"},
                    {key:"mobile"},
                    {key:"address"},
            ]
        };

        this.myDataTable = new YAHOO.widget.DataTable("'.$container.'", myColumnDefs, this.myDataSource, {sortedBy:{key:"name",dir:"desc"}});

      };
    });'; 
    return javascript_tag($js);
    
  }
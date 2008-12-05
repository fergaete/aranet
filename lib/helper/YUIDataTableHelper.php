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

sfContext::getInstance()->getConfiguration()->loadHelpers(array('Tag', 'Javascript'));

  function yui_table($name, $container, $include_checkbox, $keys)
  {
    ysfYUI::addComponents('datasource', 'datatable', 'paginator');
    $js = 'YAHOO.util.Event.onContentReady("'.$name.'", function() {
      '.$name.' = new function() {
        var myColumnDefs = [';
    if ($include_checkbox) {
      $js .= '        {key:"checkbox",label:"<input type=\"checkbox\" name=\"select[]\" value=\"0\" onclick=\"checkAll(this)\" />"},';
    }
    foreach ($keys as $key) {
      $js .= '{key:"'.$key['name'].'",label:"'.$key['label'].'"';
      $js .= (isset($key['sortable'])) ? ', sortable:true' : '';
      $js .= '},';
    }
    $js .= '    ];

        this.myDataSource = new YAHOO.util.DataSource(YAHOO.util.Dom.get("'.$name.'"));
        this.myDataSource.responseType = YAHOO.util.DataSource.TYPE_HTMLTABLE;
        this.myDataSource.responseSchema = {
            fields: [';
    if ($include_checkbox) {
      $js .= '{key:"checkbox"},';
    }
    foreach ($keys as $key) {
      $js .= '{key:"'.$key['name'].'"},';
    }
    $js .= '
            ]
        };
        
        Exconfig = {
          // REQUIRED
          rowsPerPage : 20,

          // REQUIRED, but DataTable will default if not provided
          containers  : "pag",

          // If not provided, there is no last page or total pages.
          // DataTable will set this in the DataSource callback, so this is
          // redundant.
          totalRecords : 120, //Ex.data.areacodes.length,

          // page to activate at load
          initialPage : 1,

          // Define the innerHTML of the container(s) using placeholders
          // to identify where the controls will be located
          template :
            "<p>Mostrando resultados de {CurrentPageReport}</p>" +
            "<p class=\"pg-nav\">" +
            "{FirstPageLink} {PreviousPageLink} {PageLinks} " +
            "{NextPageLink} {LastPageLink}" +
            "</p>" +
            "<label>Page size: {RowsPerPageDropdown}</label>",

          // If there is less data than would display on one page, pagination
          // controls can be omitted by setting this to false.
          alwaysVisible : true, // default

          // Override setPage (et al) to immediately update internal values
          // and update the pagination controls in response to user actions.
          // Default is false; requests are delegated through the changeRequest
          // event subscriber.
          updateOnChange : false, // default

          // Options for FirstPageLink component
          firstPageLinkLabel : "<<",
            firstPageLinkClass : "yui-pg-first", // default

          // Options for LastPageLink component
          lastPageLinkLabel : ">>",
          lastPageLinkClass : "yui-pg-last", // default

          // Options for PreviousPageLink component
          previousPageLinkLabel : "< previous",
          previousPageLinkClass : "yui-pg-previous", // default

          // Options for NextPageLink component
          nextPageLinkLabel : "next >", // default
          nextPageLinkClass : "yui-pg-next", // default

          // Options for PageLinks component
          pageLinksContainerClass : "yui-pg-pages",        // default
          pageLinkClass           : "yui-pg-page",         // default
          currentPageClass        : "yui-pg-current-page", // default

          // Display a maximum of X page links.  Use
          // YAHOO.widget.Paginator.VALUE_UNLIMITED to show all page links
          pageLinks               : YAHOO.widget.Paginator.VALUE_UNLIMITED,

          // Create custom page link labels
          //pageLabelBuilder        : function (page,paginator) {
          //  return Ex.buildPageLabel(paginator.getPageRecords(page));
          //},

          // Options for RowsPerPageDropdown component
          rowsPerPageDropdownClass : "yui-pg-rpp-options", // default
          rowsPerPageOptions       : [
            { value : 20, text : "small" },
            { value : 40, text : "medium" },
            { value : 100, text : "large" }
          ],

          // Options for CurrentPageReport component
          pageReportClass : "yui-pg-current", // default

          // Provide a key:value map for use by the pageReportTemplate.
          // Unlikely this will need to be customized; see API docs for the
          // template keys made available by the default value generator
          pageReportValueGenerator : function (paginator) {
            var recs  = paginator.getPageRecords();

            return {
              start     : 0,
              end       : 10
            };
          },

          // How to render the notification of the Paginators current state
          pageReportTemplate : "{start} - {end}"
        };
      
        // Create the Paginator for our DataTable to use
        Expaginator = new YAHOO.widget.Paginator(Exconfig);

        var myConfigs = { 
          initialRequest: "sort=name&type=asc&page=1", // Initial request for first page of data 
          dynamicData: true, // Enables dynamic server-driven data 
          sortedBy : {key:"name", dir:YAHOO.widget.DataTable.CLASS_ASC}, // Sets UI initial sort arrow 
          paginator: Expaginator // Enables pagination  
        }; 
        
        this.myDataTable = new YAHOO.widget.DataTable("'.$container.'", myColumnDefs, this.myDataSource, myConfigs);

      };
    });'; 
    return javascript_tag($js);
    
  }
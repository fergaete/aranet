<?php

/**
 * YUI DataTable Class.
 *
 * @package    ARANet
 * @subpackage lib
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 *
 */
 
class yuiDataTable
{
  protected
    $class                  = null,
    $tableName              = null,
    $nbResults              = 0,
    $nb_links               = 5,
    $rowsPerPage            = null;

     
  public function __construct($class, $maxPerPage = 10)
  {
    //sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url', 'Javascript'));
    ysfYUI::addComponents('datasource', 'datatable', 'paginator', 'json');
    $this->class = $class;
    $this->tableName = constant($this->getClassPeer().'::TABLE_NAME');
    $count = call_user_func(array($this->getClassPeer(), 'doCount'), new Criteria());
    $this->setNbResults($count);
  }
 
  public function setRowsPerPage($var = array('10' => 10, '20' => 20, '50' => 50, '100' => 100, 'all' => 10000))
  {
    $r = '';
    $max = $this->getMaxPerPage();
    foreach ($var as $key => $value) {
      if ($max > 0 && $max<=$value) {
        $r .= '{ value : '.$max.', text : "'.$max.'" },';
        if ($max < $value) {
          $r .= '{ value : '.$value.', text : "'.$key.'" },';
        }
        $max = 0;
      } else {
        $r .= '{ value : '.$value.', text : "'.$key.'" },';
      }
    }
    $this->rowsPerPage = substr($r,0,-1);
  }
  
  public function getNbResults()
  {
    return $this->nbResults;
  }

  protected function setNbResults($nb)
  {
    $this->nbResults = $nb;
  }

  public function getClassPeer()
  {
    return constant($this->class.'::PEER');
  }
  
  private function getJsonSchema()
  {
    return $this->json_schema;
  }

  private function getTableSchema()
  {
    return $this->table_schema;
  }
  
  public function setColumns($columns = array(), $include_checkbox = false)
  {
    $this->setSchemaColumns($columns, $include_checkbox);
    $this->setTableColumns($columns, $include_checkbox);
  }
  
  public function setSchemaColumns($columns = array(), $include_checkbox = false)
  {
    // Create schema
    $schema = '';
    if ($include_checkbox) {
      $schema .= '{key:"checkbox"},';
    }
    foreach ($columns as $column) {
      $schema .= '{key:"'.$column['name'].'"';
      if (array_key_exists('parser', $column)) {
        $schema .= ', parser:"'.$column['parser'].'"';
      }
      $schema .= '},';
    }
    $this->json_schema = substr($schema,0,-1);
  }

  public function setDataSource($url)
  {
    $this->url = $url;
  }
  
  public function getDataSource()
  {
    return substr($this->url, 0, strpos($this->url, '?')+1);
  }

  public function setTableColumns($columns = array(), $include_checkbox = false)
  {
    // Create schema
    $schema = '';
    if ($include_checkbox) {
      $schema .= '{key:"checkbox",label:"<input type=\"checkbox\" name=\"select[]\" value=\"0\" onclick=\"checkAll(this)\" />"},';
    }
    foreach ($columns as $column) {
      if (array_key_exists('label', $column)) {
        $schema .= '{key:"'.$column['name'].'",label:"'.$column['label'].'"';
        if (array_key_exists('sortable', $column)) {
          $schema .= ', sortable:true';
        }
        if (array_key_exists('editor', $column)) {
          $schema .= ', editor: new YAHOO.widget.TextboxCellEditor()';
        }
        $schema .= '},';
      }
    }
    $this->table_schema = substr($schema,0,-1);
  }
  
  public function render($name, $container, $pag_container, $module) {
    if (!$this->rowsPerPage) {
      $this->setRowsPerPage();
    }
    $js = 'YAHOO.util.Event.onContentReady("'.$container.'", function() {
    EnhanceFromMarkup_update = new function() {
        YAHOO.widget.BaseCellEditor.prototype.asyncSubmitter = function() {
            // ++++ this is the inner function to handle the several possible failure conditions
            var onFailure = function (msg) {
              YAHOO.log(msg, "warn", msg.toString());
            };
            var newData = this.getInputValue();
            // Copy the data to pass to the event
            var oldData = YAHOO.widget.DataTable._cloneObject(this.value);

            var editColumn = this.getColumn().key;
            YAHOO.util.Connect.asyncRequest(
                    "POST",
                    "/'.$module.'/rpc?editColumn=" + editColumn + "&newData=" + encodeURIComponent(newData) +
                    "&oldData=" + encodeURIComponent(oldData),
            {
                success: function (o) {
                    // Update new value
                    this.value = newData;
                    this.getDataTable().updateCell(this.getRecord(), this.getColumn(), newData);

                    // Hide CellEditor
                    this.getContainerEl().style.display = "none";
                    this.isActive = false;
                    this.getDataTable()._oCellEditor =  null;

                    this.fireEvent("saveEvent",
                            {editor:this, oldData:oldData, newData:this.value});
                    YAHOO.log("Cell Editor input saved", "info", this.toString());

                    this.unblock();
                },
                failure: function(o) {
                    onFailure(o.statusText);
                    this.resetForm();
                    this.fireEvent("revertEvent",
                            {editor:this, oldData:oldData, newData:newData});
                    alert("'. __('Could not save new data').'");
                    YAHOO.log("Could not save Cell Editor input " +
                            newData, "warn", this.toString());
                    this.unblock();
                },
                scope: this
            }
                    );
            this.unblock();            

        };
        ;
    };
    ;
});

    YAHOO.util.Event.onContentReady("'.$container.'", function() {
      '.$name.' = new function() {
        var myColumnDefs_'.$name.' = ['.$this->getTableSchema().'];
      // DataSource instance
      myDataSource_'.$name.' = new YAHOO.util.DataSource("'.$this->getDataSource().'");
      myDataSource_'.$name.'.responseType = YAHOO.util.DataSource.TYPE_JSON;
      myDataSource_'.$name.'.responseSchema = {
        resultsList: "records",
        fields: ['.$this->getJsonSchema().'],
        metaFields: {
            totalRecords: "totalRecords" // Access to value in the server response
        }
    };

        YAHOO.util.DataSource.Parser["email"] = function (oData) {
            return oData;//"<a href=\"mailto:"+oData+"\">"+oData+"</a>";
        };

        var Expaginator_'.$name.' = new YAHOO.widget.Paginator({
            initialPage : '.$this->getInitialPage().',
            rowsPerPage : '.$this->getMaxPerPage().',
            totalRecords : '.$this->getNbResults().',
            containers : [ "pag" ],
            template : "{PageLinks} {RowsPerPageDropdown}",

            pageLinks : '.$this->getNbLinks().', // configure the PageLinks UI Component
            rowsPerPageOptions       : ['.$this->getRowsPerPage().'],
          });
    
        var myConfigs_'.$name.' = { 
          initialRequest: "'.$this->getInitialRequest().'", // Initial request for first page of data 
          dynamicData: true, // Enables dynamic server-driven data 
          sortedBy : {key:"'.$this->getSortKey().'", dir:'.$this->getSortDir().'}, // Sets UI initial sort arrow 
          paginator: Expaginator_'.$name.' // Enables pagination  
        }; 
        
        var myDataTable_'.$name.' = new YAHOO.widget.DataTable("'.$container.'", myColumnDefs_'.$name.', myDataSource_'.$name.', myConfigs_'.$name.');
        
        // Set up editing flow 
        var highlightEditableCell = function(oArgs) { 
          var elCell = oArgs.target; 
          if(YAHOO.util.Dom.hasClass(elCell, "yui-dt-editable")) { 
            this.highlightCell(elCell); 
          } 
        }; 
        myDataTable_'.$name.'.subscribe("cellMouseoverEvent", highlightEditableCell); 
        myDataTable_'.$name.'.subscribe("cellMouseoutEvent", myDataTable_'.$name.'.onEventUnhighlightCell); 
        myDataTable_'.$name.'.subscribe("cellClickEvent", myDataTable_'.$name.'.onEventShowCellEditor); 

      };
    });';
    return javascript_tag($js);
  }
  
  public function getInitialRequest()
  {
    return substr($this->url, strpos($this->url, '?')+1);
  }
  
  public function getMaxPerPage()
  {
    return $this->getUrlParam('results');
  }
  
  public function getSortKey() {
    return $this->getUrlParam('sort');
  }

  public function getSortDir() {
    $dir = $this->getUrlParam('dir');
    if ($dir == 'asc') {
      return 'YAHOO.widget.DataTable.CLASS_ASC';
    } else {
      return 'YAHOO.widget.DataTable.CLASS_DESC';
    }
  }
  
  private function getUrlParam($param)
  {
    if (preg_match('/'.$param.'=([a-z0-9_\-]+)/i', $this->url, $matches)) {
      return $matches[1];
    } else {
      return 0;
    }
  }
  
  public function getInitialPage()
  {
    $results = $this->getUrlParam('results');
    $startIndex = $this->getUrlParam('startIndex');
    return round($startIndex/$results)+1;
  }
  
  public function getNbLinks()
  {
    return $this->nb_links;
  }
  
  public function setNbLinks($nb_links = 5)
  {
    $this->nb_links = $nb_links;
  }
  
  public function getRowsPerPage()
  {
    return $this->rowsPerPage;
 }
}
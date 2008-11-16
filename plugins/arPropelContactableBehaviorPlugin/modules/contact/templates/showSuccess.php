<?php use_helper('Number', 'NumberExtended', 'YUI') ?>
<?php aranet_title(__('Contact "%1%"', array('%1%' => $contact))) ?>

<?php ysfYUI::addComponent('tabview'); ysfYUI::addEvent('tabs', 'ready', "var tabs = new YAHOO.widget.TabView('tabs');"); ?>

<h3 id="pageSubTitle"><?php echo __('View contact details') ?>: <span class="subText"><?php echo $contact->__toString() ?></span></h3>

<div id="contactDisplay" class="windowFrame">
    <table>
    <tr>
        <td class="leftSide">
            <?php include_partial('contact/basic_data', array('contact' => $contact, 'show_data' => false)) ?>
        </td>
        <td class="rightSide">
            <div id="tabs" class="yui-navset">
                <ul class="yui-nav">
	                <li class="selected"><a href="#stats"><em><?php echo __('Contact stats') ?></em></a></li>
                  <li><?php echo link_to_remote('<em>'.__('History').'</em>', array(
	                  'url' => '@contact_history_by_id?id='.$contact->getId() . '#history',
	                  'update' => 'history',
	                  'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
	              </ul>
                <div class="yui-content">
                  <div id="stats">
                    <?php include_partial('stats', array('contact' => $contact)) ?>
                  </div>
                  <div id="history"></div>
                </div>
            </div>
            <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
        </td>
    </tr>
    <tr>
      <td colspan="2">
          <div id="conDetailEdit" style="padding: 4px;">
            <?php echo yui_button_to(__('Edit'), '@contact_edit_by_id?id=' . $contact->getId()) ?>
            <?php echo yui_button_to(__('Delete'), '@contact_delete_by_id?id=' . $contact->getId()) ?>
            <?php echo yui_button_to(__('Return to list'), '@contact_list') ?>
          </div>
      </td>
    </tr>
    </table>
</div>

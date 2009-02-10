<?php use_helper('Number', 'NumberExtended') ?>
<?php aranet_title(__('Vendor "%1%"', array('%1%' => $vendor))) ?>
<?php ysfYUI::addComponents('reset', 'fonts', 'grids', 'tabview'); ysfYUI::addEvent('tabs', 'ready', "var tabs = new YAHOO.widget.TabView('tabs');"); ?>

<h3><?php echo __('View vendor details') ?>: <span class="subText"><?php echo $vendor ?></span></h3>

<div id="vendorDisplay" class="windowFrame">
    <table>
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($vendor->getVendorCompanyName(), '@vendor_show_by_id?id=' . $vendor->getId()) ?></span><br \>
            <?php echo ($vendor->getVendorWebsite()) ? link_to($vendor->getVendorWebsite(), $vendor->getVendorWebsite()) : '' ?>
            <?php include_partial('address/basic_data', array('address' => $vendor->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $vendor->getDefaultContact())) ?>
        </td>
        <td class="rightSide">
              <div id="tabs" class="yui-navset">
                <ul class="yui-nav">
                  <li class="selected"><a href="#stats"><em><?php echo __('Vendor stats') ?></em></a></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Contacts').'</em>', array(
                    'url' => url_for('@contact_minilist?related=Vendor&id='.$vendor->getId() . '#contacts'),
                    'update' => 'contacts-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Addresses').'</em>', array(
                    'url' => url_for('@address_minilist?related=Vendor&id='.$vendor->getId() . '#addresses'),
                    'update' => 'addresses-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                </ul>
                <div class="yui-content">
                  <div id="stats">
                    <?php include_partial('stats', array('vendor' => $vendor)) ?>
                  </div>
                  <div id="contacts-tab"></div>
                  <div id="addresses-tab"></div>
                </div>
              </div>
              <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
        </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
          <div id="cliDetailEdit" style="padding: 4px;">
            <?php echo yui_button_to(__('Edit'), '@vendor_edit_by_id?id=' . $vendor->getId()) ?>
            <?php echo yui_button_to(__('Delete'), '@vendor_delete_by_id?id=' . $vendor->getId()) ?>
            <?php echo yui_button_to(__('Return to list'), '@vendor_list') ?>
          </div>
      </td>
    </tr>
    </table>
</div>

<div id="indicator-related_tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>

<?php ysfYUI::addEvent('related_tabs', 'ready', "var relatedTabs = new YAHOO.widget.TabView('related_tabs');"); ?>

<div id="related_tabs" class="yui-navset">
  <ul class="yui-nav">
    <li class="selected"><a href="#expenses"><em><?php echo __('Expenses') ?></em></a></li>
    <li><a href="#incomes"><em><?php echo __('Incomes') ?></em></a></li>
  </ul>
  <div class="yui-content">
    <div id="expenses">
      <div id="vendorExpenses">
<?php include_partial('expense/expense_list', array('expense_items' => $vendor->getExpenseItems(), 'related' => 'Vendor')) ?>
      </div>
      <?php echo yui_button_to(__('Create new expense'), "@expense_create_from_object?related=Vendor&id=" . $vendor->getId()) ?>
    </div>
    <div id="incomes">
      <div id="vendorIncomes">
<?php include_partial('income/income_list', array('income_items' => $vendor->getIncomeItemsOrderedByDate(), 'related' => 'Vendor')) ?>
      </div>
      <?php echo yui_button_to(__('Create new income'), "@income_create_from_object?related=Vendor&id=" . $vendor->getId()) ?>
    </div>
  </div>
</div>
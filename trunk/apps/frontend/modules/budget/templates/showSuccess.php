<?php use_helper('Number', 'NumberExtended') ?>
<?php aranet_title(__('Budget "%1%"', array('%1%' => $budget))) ?>
<?php ysfYUI::addComponents('reset', 'fonts', 'grids', 'tabview'); ysfYUI::addEvent('tabs', 'ready', "var tabs = new YAHOO.widget.TabView('tabs');"); ?>

<h3><?php echo __('View budget details') ?>: <span class="subText"><?php echo $budget ?></span></h3>

<div id="budgetDisplay" class="windowFrame">
    <table>
    <tr>
        <td class="leftSide">
            <h4><?php echo $budget ?></h4>
            <?php include_partial('contact/basic_data', array('contact' => $budget->getDefaultContact())) ?>
            <?php $budget->getDefaultContact() ? include_partial('address/basic_data', array('address' => $budget->getDefaultContact()->getDefaultAddress())) : '' ?><br/>
        </td>
        <td class="rightSide">
              <div id="tabs" class="yui-navset">
                <ul class="yui-nav">
                  <li class="selected"><a href="#stats"><em><?php echo __('Budget stats') ?></em></a></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Contacts').'</em>', array(
                    'url' => url_for('@contact_minilist?related=Budget&id='.$budget->getId() . '#contacts'),
                    'update' => 'contacts-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Addresses').'</em>', array(
                    'url' => url_for('@address_minilist?related=Budget&id='.$budget->getId() . '#addresses'),
                    'update' => 'addresses-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                </ul>
                <div class="yui-content">
                  <div id="stats">
                    <?php include_partial('stats', array('budget' => $budget)) ?>
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
            <?php echo yui_button_to(__('Edit'), '@budget_edit_by_id?id=' . $budget->getId()) ?>
            <?php echo yui_button_to(__('Delete'), '@budget_delete_by_id?id=' . $budget->getId()) ?>
            <?php echo yui_button_to(__('Return to list'), '@budget_list') ?>
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
  </ul>
  <div class="yui-content">
    <div id="expenses">
      <div id="budgetExpenses">
<?php include_partial('expense/expense_list', array('expense_items' => $budget->getExpenseItems(), 'related' => 'Budget')) ?>
      </div>
      <?php echo yui_button_to(__('Create new expense'), "@expense_create_from_object?related=Budget&id=" . $budget->getId()) ?>
    </div>
  </div>
</div>
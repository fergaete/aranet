<?php use_helper('Number', 'NumberExtended') ?>
<?php aranet_title(__('Client "%1%"', array('%1%' => $client))) ?>
<?php ysfYUI::addComponents('reset', 'fonts', 'grids', 'tabview'); ysfYUI::addEvent('tabs', 'ready', "var tabs = new YAHOO.widget.TabView('tabs');"); ?>

<h3><?php echo __('View client details') ?>: <span class="subText"><?php echo $client ?></span></h3>

<div id="clientDisplay" class="windowFrame">
    <table>
    <tr>
        <td class="leftSide">
            <h4><?php echo $client->getClientCompanyName() ?></h4>
            <?php echo ($client->getClientWebsite()) ? link_to($client->getClientWebsite(), $client->getClientWebsite()) : '' ?>
            <?php include_partial('address/basic_data', array('address' => $client->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $client->getDefaultContact())) ?>
        </td>
        <td class="rightSide">
              <div id="tabs" class="yui-navset">
                <ul class="yui-nav">
                  <li class="selected"><a href="#stats"><em><?php echo __('Client stats') ?></em></a></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Contacts').'</em>', array(
                    'url' => url_for('@contact_minilist?related=Client&id='.$client->getId() . '#contacts'),
                    'update' => 'contacts-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Addresses').'</em>', array(
                    'url' => url_for('@address_minilist?related=Client&id='.$client->getId() . '#addresses'),
                    'update' => 'addresses-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                </ul>
                <div class="yui-content">
                  <div id="stats">
                    <?php include_partial('stats', array('client' => $client)) ?>
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
            <?php echo yui_button_to(__('Edit'), '@client_edit_by_id?id=' . $client->getId()) ?>
            <?php echo yui_button_to(__('Delete'), '@client_delete_by_id?id=' . $client->getId()) ?>
            <?php echo yui_button_to(__('Return to list'), '@client_list') ?>
          </div>
      </td>
    </tr>
    </table>
</div>

<div id="indicator-related_tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>

<?php ysfYUI::addEvent('related_tabs', 'ready', "var relatedTabs = new YAHOO.widget.TabView('related_tabs');"); ?>

<div id="related_tabs" class="yui-navset">
  <ul class="yui-nav">
    <li class="selected"><a href="#projects"><em><?php echo __('Projects') ?></em></a></li>
    <li><a href="#budgets"><em><?php echo __('Budgets') ?></em></a></li>
    <li><a href="#invoices"><em><?php echo __('Invoices') ?></em></a></li>
    <!-- <li><?php echo yui_link_to_remote('<em>'.__('Budgets (AJAX)').'</em>', array(
                    'url' => url_for('@budget_minilist?related=Client&id='.$client->getId() . '#budgets-ajax'),
                    'update' => 'budgets-ajax',
                    'loading'  => "Element.show('indicator-related_tabs')",
                    'complete' => "Element.hide('indicator-related_tabs')")) ?></li> -->
  </ul>
  <div class="yui-content">
    <div id="projects">
      <div id="clientProjects">
<?php include_partial('project/project_list', array('projects' => $client->getProjectsJoinProjectStatus(), 'related' => 'Client')) ?>
      </div>
      <?php echo yui_button_to(__('Create new project'), "@project_create_from_object?related=Client&id=" . $client->getId()) ?>
    </div>
    <div id="budgets">
      <div id="clientBudgets">
<?php include_partial('budget/budget_list', array('budgets' => $client->getLastBudgetsOrderedByDate(), 'related' => 'Client')) ?>
      </div>
      <?php echo yui_button_to(__('Create new budget'), "@budget_create_from_object?related=Client&id=" . $client->getId()) ?>
    </div>
    <div id="invoices">
      <div id="clientInvoices">
<?php include_partial('invoice/invoice_list', array('invoices' => $client->getInvoicesJoinPaymentStatusOrderByNumber(), 'related' => 'Client')) ?>
      </div>
      <?php echo yui_button_to(__('Create new invoice'), "@invoice_create_from_object?related=Client&id=" . $client->getId()) ?>
    </div>
    <div id="budgets-ajax"></div>
  </div>
</div>
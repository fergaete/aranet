<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View client details') ?> <span class="subText">(<?php echo $client->__toString() ?>)</span></h3>

<div id="clientDisplay" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($client->getClientCompanyName(), '@show_client_by_id?id=' . $client->getId()) ?></span><br \>
            <?php echo ($client->getClientWebsite()) ? link_to($client->getClientWebsite(), $client->getClientWebsite()) : '' ?>
            <?php include_partial('address/basic_data', array('address' => $client->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $client->getDefaultContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div class="infoWindowMenu">
                <ul id="menuItems">
                    <li id="menuItemStats" class="menuItemSelected"><?php echo link_to_remote('<span>'.__('Client stats').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'client/stats?client_id='.$client->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemStats')",
                        )) ?></li>
                    <li id="menuItemContacts" class=""><?php echo link_to_remote('<span>'.__('Contacts').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'contact/minilist?class=Client&id='.$client->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemContacts')",
                        )) ?></li>
                    <li id="menuItemAddresses" class=""><?php echo link_to_remote('<span>'.__('Addresses').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'address/minilist?class=Client&id='.$client->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemAddresses')",
                        )) ?></li>
                    <li id="menuItemMessages" class=""><?php echo __('Messages') ?></li>
                </ul>
            </div>
            <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
            <div id="infoWindow" class="infoWindow">
<?php include_partial('stats', array('client' => $client)) ?>
            </div>
            <div id="clientEdit" stlye="display: none;"></div>
            <div id="cliDetailEdit" style="width: 30%; text-align: right; padding: 4px;">
                <?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit client details"'), '@edit_client_by_id?id=' . $client->getId()) ?>
            </div>
        </td>
    </tr>
    </table>
</div>

<div class="clientHeader"><div class="headerProjects"><?php echo __('Projects (#%1%)', array('%1%' => count($client->getProjectsJoinProjectStatus()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new project')), "/project/create?client_id=" . $client->getId()) ?></span>
    <span id="clientViewProjectsRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'clientViewProjects') . visual_effect('appear', 'clientViewProjectsRollDown') . visual_effect('fade', 'clientViewProjectsRollUp')) ?></span>
    <span id="clientViewProjectsRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'clientViewProjects') . visual_effect('appear', 'clientViewProjectsRollUp') . visual_effect('fade', 'clientViewProjectsRollDown')) ?></span>
</div></div>
<?php include_partial('project/project_list', array('projects' => $client->getProjectsJoinProjectStatus(), 'id' => 'clientViewProjects')) ?>

<div class="clientHeader"><div class="headerBudgets"><?php echo __('Budgets (#%1%)', array('%1%' => count($client->getLastBudgetsOrderedByDate()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new budget')), "/budget/create?client_id=" . $client->getId()) ?></span>
    <span id="clientViewBudgetRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'clientViewBudgets') . visual_effect('appear', 'clientViewBudgetRollDown') . visual_effect('fade', 'clientViewBudgetRollUp')) ?></span>
    <span id="clientViewBudgetRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'clientViewBudgets') . visual_effect('appear', 'clientViewBudgetRollUp') . visual_effect('fade', 'clientViewBudgetRollDown')) ?></span>
</div></div>

<div id="indicator-budget" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<div id="clientBudgets">
<div id="clientBudgetAddEdit" style="margin-top: 10px;">
</div>
<?php include_partial('budget/budget_list', array('budgets' => $client->getLastBudgetsOrderedByDate(), 'id' => 'clientViewBudgets')) ?>
</div>

<div class="clientHeader"><div class="headerInvoices"><?php echo __('Invoices (#%1%)', array('%1%' => count($client->getInvoicesJoinPaymentStatusOrderByNumber()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new invoice')), "/invoice/create?client_id=" . $client->getId()) ?></span>
    <span id="clientViewInvoiceRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'clientViewInvoices') . visual_effect('appear', 'clientViewInvoiceRollDown') . visual_effect('fade', 'clientViewInvoiceRollUp')) ?></span>
    <span id="clientViewInvoiceRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'clientViewInvoices') . visual_effect('appear', 'clientViewInvoiceRollUp') . visual_effect('fade', 'clientViewInvoiceRollDown')) ?></span>
</div></div>

<?php include_partial('invoice/invoice_list', array('invoices' => $client->getInvoicesJoinPaymentStatusOrderByNumber(), 'id' => 'clientViewInvoices')) ?>

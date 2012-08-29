<?php use_helper('Javascript', 'Number') ?>
<?php aranet_title(__('Vendor %1%', array('%1%' => $vendor))) ?>
<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View vendor details') ?>: <span class="subText"><?php echo $vendor ?></span></h3>

<div id="vendorDisplay" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo $vendor ?></span><br \>
            <?php include_partial('address/basic_data', array('address' => $vendor->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $vendor->getDefaultContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div class="infoWindowMenu">
                <ul id="menuItems">
                    <li id="menuItemStats" class="menuItemSelected"><?php echo link_to_remote('<span>'.__('Vendor stats').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'vendor/stats?id='.$vendor->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemStats')",
                        )) ?></li>
                    <li id="menuItemContacts" class=""><?php echo link_to_remote('<span>'.__('Contacts').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'contact/minilist?class=Vendor&id='.$vendor->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemContacts')",
                        )) ?></li>
                    <li id="menuItemAddresses" class=""><?php echo link_to_remote('<span>'.__('Addresses').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'address/minilist?class=Vendor&id='.$vendor->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemAddresses')",
                        )) ?></li>
                    <li id="menuItemMessages" class=""><?php echo __('Messages') ?></li>
                </ul>
            </div>
            <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
            <div id="infoWindow" class="infoWindow">
<?php include_partial('stats', array('vendor' => $vendor)) ?>
            </div>
            <div id="vendorEdit" stlye="display: none;"></div>
            <div id="venDetailActions" class="detailActions">
            <div id="cliDetailActions" class="detailActions">
              <ul>
                <li><?php echo button_to(__('Edit'), '@vendor_edit_by_id?id=' . $vendor->getId()) ?></li>
                <li><?php echo button_to(__('List'), '@vendor_list') ?></li>
                <li><?php echo button_to(__('Delete'), '@vendor_delete_by_id?id=' . $vendor->getId(), 'post=true&confirm=' . __('Are you sure?')) ?></li>
              </ul>
            </div>
        </td>
    </tr>
    </table>
</div>

<div class="vendorHeader"><div class="headerExpenses"><?php echo __('Expenses (#%1%)', array('%1%' => count($vendor->getExpenseItemsOrderedByDate()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new expense')), "/expense/create?vendor_id=" . $vendor->getId()) ?></span>
    <span id="vendorViewExpenseRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'vendorViewExpenses') . visual_effect('appear', 'vendorViewExpenseRollDown') . visual_effect('fade', 'vendorViewExpenseRollUp')) ?></span>
    <span id="vendorViewExpenseRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'vendorViewExpenses') . visual_effect('appear', 'vendorViewExpenseRollUp') . visual_effect('fade', 'vendorViewExpenseRollDown')) ?></span>
</div></div>
<?php include_partial('expense/expense_list', array('expense_items' => $vendor->getExpenseItemsOrderedByDate(), 'id' => 'vendorViewExpenses')) ?>

<div class="vendorHeader"><div class="headerIncomes"><?php echo __('Incomes (#%1%)', array('%1%' => count($vendor->getIncomeItemsOrderedByDate()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new income')), "/income/create?vendor_id=" . $vendor->getId()) ?></span>
    <span id="vendorViewIncomeRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'vendorViewIncomes') . visual_effect('appear', 'vendorViewIncomeRollDown') . visual_effect('fade', 'vendorViewIncomeRollUp')) ?></span>
    <span id="vendorViewIncomeRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'vendorViewIncomes') . visual_effect('appear', 'vendorViewIncomeRollUp') . visual_effect('fade', 'vendorViewIncomeRollDown')) ?></span>
</div></div>
<?php include_partial('income/income_list', array('income_items' => $vendor->getIncomeItemsOrderedByDate(), 'id' => 'vendorViewIncomes')) ?>
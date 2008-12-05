<?php use_helper('Number', 'NumberExtended', 'Javascript') ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . __('Budget "%1%"', array('%1%' => $budget))) ?>

<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View budget details') ?> <span class="subText">(<?php echo $budget->__toString() . ' - ' . $budget->getBudgetTitle() ?>)</span></h3>

<div id="budgetDisplay" class="windowFrame">
    <table style="width: 100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo ($budget->getClient()) ? link_to($budget->getClient()->getFullName(false), '@show_client_by_id?id=' . $budget->getClient()->getId()) : '' ?></span><br \>
            <?php ($budget->getClient()) ? include_partial('address/basic_data', array('address' => $budget->getClient()->getDefaultAddress())) : '' ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $budget->getDefaultContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div class="infoWindowMenu">
                <ul id="menuItems">
                    <li id="menuItemStats" class="menuItemSelected"><?php echo link_to_remote('<span>'.__('Budget stats').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'budget/stats?id='.$budget->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemStats')",
                        )) ?></li>
                    <li id="menuItemContacts" class=""><?php echo link_to_remote('<span>'.__('Contacts').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'contact/minilist?class=Budget&id='.$budget->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemContacts')",
                        )) ?></li>
                    <li id="menuItemVersions" class=""><?php echo link_to_remote('<span>'.__('Versions').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'budget/versions?id='.$budget->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemVersions')",
                        )) ?></li>
                </ul>
            </div>
            <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
            <div id="infoWindow" class="infoWindow">
<?php include_partial('stats', array('budget' => $budget)) ?>
            </div>
            <div id="budgetEdit" stlye="display: none;"></div>
                <div id="budDetailActions" class="detailActions">
                    <ul>
                      <li><?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit budget details"'), '/budget/edit?id=' . $budget->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonPrintLarge.gif', 'alt="Print budget"'), '/budget/print?id=' . $budget->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonCopyLarge.gif', 'alt="Copy budget"'), '/budget/create?copy_id=' . $budget->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonCopyLarge.gif', 'alt="Create invoice"'), '/budget/createinvoice?id=' . $budget->getId()) ?></li>
                      <li><?php echo link_to(image_tag('buttonDeleteLarge.gif', 'alt="Delete budget"'), '/budget/delete?id=' . $budget->getId(), 'post=true&confirm=' . ('Are you sure?')) ?></li>
                    </ul>
                </div>
        </td>
    </tr>
    </table>
</div>

<br />
<div style="width: 100%;">
    <div class="headerBudgetItems" style="float: left; width: 50%;"><?php echo __('Budget Items') ?></div>
    <div id="invItemAction" style="float: left; width: 40%; padding-top: 10px; text-align: right;">
        <?php echo link_to_remote(image_tag('buttonEditLarge.gif', 'alt="Edit Budget Items"'), array(
           'update' => 'budgetViewItems',
           'url' => 'budget/edititems?id='.$budget->getId(),
           'loading'  => visual_effect('appear', "indicator-bitems"),
           'complete' => visual_effect('fade', "indicator-bitems").
                         visual_effect('highlight', "budgetViewItems"),
           )) ?>
    </div>
    <div style="clear: left;"></div>
    <div id="error"></div>
    <div id="budgetViewItems" class="windowFrame" style="margin-top: 10px;">
        <div id="indicator-bitems" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
        <?php include_partial('budget_item_list', array('budget_items' => $budget->getBudgetItemsOrderedByItemOrder(), 'budget' => 
$budget)) ?>
    </div>
</div>

<div class="budgetHeader"><div class="headerFiles"><?php echo __('Associated files (#%1%)', array('%1%' => $budget->countFiles())) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Upload new file')), "/file/create?class=Budget&object_id=" . $budget->getId().'&referer='.urlencode('budget/show?id=' . $budget->getId())) ?></span>
    <span id="budgetViewFilesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'budgetViewFiles') . visual_effect('appear', 'budgetViewFilesRollDown') . visual_effect('fade', 'budgetViewFilesRollUp')) ?></span>
    <span id="budgetViewFilesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'budgetViewFiles') . visual_effect('appear', 'budgetViewFilesRollUp') . visual_effect('fade', 'budgetViewFilesRollDown')) ?></span>
</div></div>

<?php include_partial('file/file_list', array('sf_propel_file_storage_infos' => $budget->getFiles(), 'id' => 'budgetViewFiles')) ?>

<div class="budgetHeader"><div class="headerExpenses"><?php echo __('Expenses (#%1%)', array('%1%' => count($budget->getExpenseItemsOrderedByDate()))) ?></div>
<div class="windowControlsDashboard">
    <span>
    <?php echo ($budget->getBudgetProjectId()) ? link_to(image_tag('button_add.gif', __('Create new expense')), "/expense/create?project_id=" . $budget->getBudgetProjectId() .'&budget_id=' . $budget->getId()) :
    link_to(image_tag('button_add.gif', __('Create new expense')), "/expense/create?budget_id=" . $budget->getId()) ?></span>
    <span id="budgetViewExpensesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'budgetViewExpenses') . visual_effect('appear', 'budgetViewExpensesRollDown') . visual_effect('fade', 'budgetViewExpensesRollUp')) ?></span>
    <span id="budgetViewExpensesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'budgetViewExpenses') . visual_effect('appear', 'budgetViewExpensesRollUp') . visual_effect('fade', 'budgetViewExpensesRollDown')) ?></span>
</div></div>

<?php include_partial('expense/expense_list', array('expense_items' => $budget->getExpenseItemsOrderedByDate(), 'id' => 'budgetViewExpenses')) ?>

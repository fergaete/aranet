<?php use_helper('Number', 'NumberExtended', 'Javascript', 'Object') ?>

<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . __('Project %1%', array('%1%' => $project))) ?>

<h3 id="pageSubTitle" style="padding-top: 10px;"><?php echo __('View projects details') ?> <span class="subText">(<?php echo $project->__toString() ?>)</span></h3>

<div id="projectDisplay" class="windowFrame">
    <table style="width:100%">
    <tr>
        <td class="leftSide">
            <span class="bigText"><?php echo link_to($project->getClient()->getFullName(false), 'client/show?id=' . $project->getClient()->getId()) ?></span><br \>
            <?php include_partial('address/basic_data', array('address' => $project->getClient()->getDefaultAddress())) ?><br/>
            <?php include_partial('contact/basic_data', array('contact' => $project->getDefaultContact())) ?>
        </td>
        <td style="vertical-align: top; width: 60%;">
            <div class="infoWindowMenu">
                <ul id="menuItems">
                    <li id="menuItemStats" class="menuItemSelected"><?php echo link_to_remote('<span>'.__('Project stats').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'project/stats?project_id='.$project->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemStats')",
                        )) ?></li>
                    <li id="menuItemContacts" class=""><?php echo link_to_remote('<span>'.__('Contacts').'</span>', array(
                        'update' => 'infoWindow',
                        'url'    => 'contact/minilist?class=Project&id='.$project->getId(),
                        'loading'  => "Element.show('indicator-tabs')",
                        'complete' => "Element.hide('indicator-tabs'); setActiveTab('menuItemContacts')",
                        )) ?></li>
                    <li id="menuItemMessages" class=""><?php echo __('Files') ?></li>
                    <li id="menuItemMessages" class=""><?php echo __('Messages') ?></li>
                    <li id="menuItemMessages" class=""><?php echo __('Notes') ?></li>
                    <!--<li id="menuItemMessages" class=""><?php //echo __('Team') ?></li> -->
                </ul>
            </div>
            <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
            <div id="infoWindow" class="infoWindow">
<?php include_partial('stats', array('project' => $project)) ?>
                </div>
                <div id="projectEdit" stlye="display: none;"></div>
                <div id="proDetailEdit" style="width: 30%; text-align: right; padding: 4px;">
                <?php echo link_to(image_tag('buttonEditLarge.gif', 'alt="Edit project details"'), '/project/edit?id=' . $project->getId()) ?>
                </div>
        </td>
    </tr>
    </table>
</div>

<div class="projectHeader"><div class="headerBudgets"><?php echo __('Budgets (#%1%)', array('%1%' => count($project->getLastBudgetsOrderedByDate()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new budget')), "/budget/create?project_id=" . $project->getId()."&client_id=" . $project->getProjectClientId()) ?></span>
    <span id="projectViewBudgetsRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'projectViewBudgets') . visual_effect('appear', 'projectViewBudgetsRollDown') . visual_effect('fade', 'projectViewBudgetsRollUp')) ?></span>
    <span id="projectViewBudgetsRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'projectViewBudgets') . visual_effect('appear', 'projectViewBudgetsRollUp') . visual_effect('fade', 'projectViewBudgetsRollDown')) ?></span>
</div></div>

<div id="indicator-budget" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<div id="projectBudgets">
<div id="projectBudgetAddEdit" style="margin-top: 10px;">
</div>
<?php include_partial('budget/budget_list', array('budgets' => $project->getLastBudgetsOrderedByDate(), 'id' => 'projectViewBudgets')) ?>
</div>

<div class="projectHeader"><div class="headerTasks"><?php echo __('Milestones and Tasks') ?></div>
<div style="float: right; margin-top: -25px;">
    <?php echo link_to_function(image_tag('buttonTaskMenu.gif', 'alt="Task menu" style="border: medium none ; cursor: pointer;'), visual_effect('appear', 'taskMenu')) ?>
    <div id="taskMenu" class="popUpDiv popUpWindow" style="text-align: left; display: none;" onClick="this.hide()">
    <div id="container_taskMenu">
        <ul style="font-size:10px;">
            <li><?php echo image_tag('iconAddMilestone.gif', 'alt="Add milestone"') ?>
            <?php echo link_to_remote('Add milestone', array(
                'update' => 'projectMilestoneAddEdit',
                'script' => true,
                'url' => 'project/createmilestone?id='.$project->getId(),
                'loading'  => visual_effect('appear', "indicator-milestone"),
                'complete' => visual_effect('fade', "indicator-milestone").
                              visual_effect('highlight', "projectMilestoneAddEdit"),
                )) ?></li>
            <li><?php echo image_tag('iconAddSmall.gif', 'alt="Add task"') ?>
                <?php echo link_to_remote('Add task', array(
                'update' => 'projectMilestoneAddEdit',
                'script' => true,
                'url' => 'project/createtask?id='.$project->getId(),
                'loading'  => visual_effect('appear', "indicator-milestone"),
                'complete' => visual_effect('fade', "indicator-milestone").
                              visual_effect('highlight', "projectMilestoneAddEdit"),
                )) ?></li>
                <!-- 
           <li><?php echo image_tag('iconPrintSmall.gif', 'alt="Print task list"') ?>
               <?php echo link_to('Print task list', '/project/taskreport?project_id=' . $project->getId()) ?></li>
           <li><?php echo image_tag('iconGanttSmall.gif', 'alt="View Gantt Chart"') ?>
               <?php echo link_to('View Gantt chart', '/project/gantt?project_id=' . $project->getId()) ?></li>-->
         </ul>
    </div>
    </div>
    <span id="projectViewTasksRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'projectViewMilestones') . visual_effect('appear', 'projectViewTasksRollDown') . visual_effect('fade', 'projectViewTasksRollUp')) ?></span>
    <span id="projectViewTasksRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'projectViewMilestones') . visual_effect('appear', 'projectViewTasksRollUp') . visual_effect('fade', 'projectViewTasksRollDown')) ?></span>
</div>
</div>

<div id="indicator-milestone" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<div id="projectMilestones">
<div id="projectMilestoneAddEdit" style="margin-top: 10px;">
</div>
<?php include_partial('project/milestone_list', array('project' => $project, 'id' => 'projectViewMilestones')) ?>
</div>

<div class="projectHeader"><div class="headerInvoices"><?php echo __('Invoices (#%1%)', array('%1%' => count($project->getInvoicesJoinPaymentStatus()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new invoice')), "/invoice/create?project_id=" . $project->getId()."&client_id=" . $project->getProjectClientId()) ?></span>
    <span id="projectViewInvoicesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'projectViewInvoices') . visual_effect('appear', 'projectViewInvoicesRollDown') . visual_effect('fade', 'projectViewInvoicesRollUp')) ?></span>
    <span id="projectViewInvoicesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'projectViewInvoices') . visual_effect('appear', 'projectViewInvoicesRollUp') . visual_effect('fade', 'projectViewInvoicesRollDown')) ?></span>
</div></div>

<?php include_partial('invoice/invoice_list', array('invoices' => $project->getInvoicesJoinPaymentStatus(), 'id' => 'projectViewInvoices')) ?>

<div class="projectHeader"><div class="headerExpenses"><?php echo __('Expenses (#%1%)', array('%1%' => count($project->getExpenseItemsJoinExpenseCategory()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new expense')), "/expense/create?project_id=" . $project->getId()) ?></span>
    <span id="projectViewExpensesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'projectViewExpenses') . visual_effect('appear', 'projectViewExpensesRollDown') . visual_effect('fade', 'projectViewExpensesRollUp')) ?></span>
    <span id="projectViewExpensesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'projectViewExpenses') . visual_effect('appear', 'projectViewExpensesRollUp') . visual_effect('fade', 'projectViewExpensesRollDown')) ?></span>
</div></div>

<?php include_partial('expense/expense_list', array('expense_items' => $project->getExpenseItemsJoinExpenseCategory(), 'id' => 'projectViewExpenses')) ?>

<div class="projectHeader"><div class="headerIncomes"><?php echo __('Incomes (#%1%)', array('%1%' => count($project->getIncomeItemsJoinIncomeCategory()))) ?></div>
<div class="windowControlsDashboard">
    <span><?php echo link_to(image_tag('button_add.gif', __('Create new income')), "/income/create?project_id=" . $project->getId()) ?></span>
    <span id="projectViewIncomesRollUp"><?php echo link_to_function(image_tag('button_rollUp.gif', __('Roll Up')), visual_effect('slideUp', 'projectViewIncomes') . visual_effect('appear', 'projectViewIncomesRollDown') . visual_effect('fade', 'projectViewIncomesRollUp')) ?></span>
    <span id="projectViewIncomesRollDown" style="display:none"><?php echo link_to_function(image_tag('button_rollDown.gif', __('Roll Down')), visual_effect('slideDown', 'projectViewIncomes') . visual_effect('appear', 'projectViewIncomesRollUp') . visual_effect('fade', 'projectViewIncomesRollDown')) ?></span>
</div></div>

<?php include_partial('income/income_list', array('income_items' => $project->getIncomeItemsJoinIncomeCategory(), 'id' => 'projectViewIncomes')) ?>

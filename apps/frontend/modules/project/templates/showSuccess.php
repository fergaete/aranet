<?php use_helper('Number', 'NumberExtended') ?>
<?php aranet_title(__('Project "%1%"', array('%1%' => $project))) ?>
<?php ysfYUI::addComponents('reset', 'fonts', 'grids', 'tabview'); ysfYUI::addEvent('tabs', 'ready', "var tabs = new YAHOO.widget.TabView('tabs');"); ?>

<h3><?php echo __('View project details') ?>: <span class="subText"><?php echo $project ?></span></h3>

<div id="projectDisplay" class="windowFrame">
    <table>
    <tr>
        <td class="leftSide">
            <h4><?php echo $project ?></h4>
            <?php echo ($project->getProjectUrl()) ? '<p>'.link_to($project->getProjectUrl(), $project->getProjectUrl()) .'</p>': '' ?>
            <h5><?php echo __('Client') ?>:</h5>
            <p><?php echo link_to($project->getClient()->getFullName(false), '@client_show_by_id?id=' . $project->getClient()->getId()) ?></p>
            <?php include_partial('address/basic_data', array('address' => $project->getClient()->getDefaultAddress())) ?>
            <?php include_partial('contact/basic_data', array('contact' => $project->getDefaultContact())) ?>
        </td>
        <td class="rightSide">
              <div id="tabs" class="yui-navset">
                <ul class="yui-nav">
                  <li class="selected"><a href="#stats"><em><?php echo __('Project stats') ?></em></a></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Contacts').'</em>', array(
                    'url' => url_for('@contact_minilist?related=Project&id='.$project->getId() . '#contacts'),
                    'update' => 'contacts-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                  <li><?php echo yui_link_to_remote('<em>'.__('Files').'</em>', array(
                    'url' => url_for('@file_minilist?related=Project&id='.$project->getId() . '#files'),
                    'update' => 'files-tab',
                    'loading'  => "Element.show('indicator-tabs')",
                    'complete' => "Element.hide('indicator-tabs')")) ?></li>
                </ul>
                <div class="yui-content">
                  <div id="stats">
                    <?php include_partial('stats', array('project' => $project)) ?>
                  </div>
                  <div id="contacts-tab"></div>
                  <div id="files-tab"></div>
                </div>
              </div>
              <div id="indicator-tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
        </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center">
          <div id="cliDetailEdit" style="padding: 4px;">
            <?php echo yui_button_to(__('Edit'), '@project_edit_by_id?id=' . $project->getId()) ?>
            <?php echo yui_button_to(__('Delete'), '@project_delete_by_id?id=' . $project->getId()) ?>
            <?php echo yui_button_to(__('Return to list'), '@project_list') ?>
          </div>
      </td>
    </tr>
    </table>
</div>

<div id="indicator-related_tabs" style="display:none"><?php echo image_tag('indicator.gif') ?></div>

<?php ysfYUI::addEvent('related_tabs', 'ready', "var relatedTabs = new YAHOO.widget.TabView('related_tabs');"); ?>

<div id="related_tabs" class="yui-navset">
  <ul class="yui-nav">
    <li class="selected"><a href="#budgets"><em><?php echo __('Budgets') ?></em></a></li>
    <li><a href="#invoices"><em><?php echo __('Invoices') ?></em></a></li>
    <li><a href="#incomes"><em><?php echo __('Incomes') ?></em></a></li>
    <li><a href="#expenses"><em><?php echo __('Expenses') ?></em></a></li>
    <li><a href="#tasks"><em><?php echo __('Tasks and Milestones') ?></em></a></li>    
    <!-- <li><?php echo yui_link_to_remote('<em>'.__('Budgets (AJAX)').'</em>', array(
                    'url' => url_for('@budget_minilist?related=Project&id='.$project->getId() . '#budgets-ajax'),
                    'update' => 'budgets-ajax',
                    'loading'  => "Element.show('indicator-related_tabs')",
                    'complete' => "Element.hide('indicator-related_tabs')")) ?></li> -->
  </ul>
  <div class="yui-content">
    <div id="budgets">
      <div id="clientBudgets">
<?php include_partial('budget/budget_list', array('budgets' => $project->getLastBudgetsOrderedByDate(), 'related' => 'Project')) ?>
      </div>
      <?php echo yui_button_to(__('Create new budget'), "@budget_create_from_object?related=Project&id=" . $project->getId()) ?>
    </div>
    <div id="invoices">
      <div id="clientInvoices">
<?php include_partial('invoice/invoice_list', array('invoices' => $project->getInvoicesJoinPaymentStatusOrderByNumber(), 'related' => 'Project')) ?>
      </div>
      <?php echo yui_button_to(__('Create new invoice'), "@invoice_create_from_object?related=Project&id=" . $project->getId()) ?>
    </div>
    <div id="incomes">
      <div id="clientIncomes">
<?php include_partial('income/income_list', array('income_items' => $project->getIncomeItems(), 'related' => 'Project')) ?>
      </div>
      <?php echo yui_button_to(__('Create new income'), "@income_create_from_object?related=Project&id=" . $project->getId()) ?>
    </div>
    <div id="expenses">
      <div id="clientExpenses">
<?php include_partial('expense/expense_list', array('expense_items' => $project->getExpenseItems(), 'related' => 'Project')) ?>
      </div>
      <?php echo yui_button_to(__('Create new expense'), "@expense_create_from_object?related=Project&id=" . $project->getId()) ?>
    </div>
    <div id="tasks">
      <div id="clientTasks">
<?php include_partial('project/milestone_list', array('project' => $project, 'id' => 'projectViewMilestones')) ?>      </div>
      <?php echo yui_button_to(__('Create new task'), "@project_create_task?id=" . $project->getId()) ?>
      <?php echo yui_button_to(__('Create new milestone'), "@project_create_milestone?id=" . $project->getId()) ?>
    </div>
    <div id="budgets-ajax"></div>
  </div>
</div>

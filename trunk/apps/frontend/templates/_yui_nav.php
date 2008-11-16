      <div id="aranetnav" class="yuimenubar yuimenubarnav">
        <div class="bd">
          <ul class="first-of-type">
            <li class="yuimenubaritem first-of-type"><?php echo link_to(__('Dashboard'), '@homepage', 'class="yuimenubaritemlabel"') ?></li>
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#companies"><?php echo __('Companies') ?></a>
              <div id="companies" class="yuimenu">
                <div class="bd">
                  <ul>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#clients"><?php echo __('Clients') ?></a>
                      <div id="clients" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all clients'), '@client_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new client'), '@client_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#vendors"><?php echo __('Vendors') ?></a>
                      <div id="vendors" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all vendors'), '@vendor_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new vendor'), '@vendor_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#contacts"><?php echo __('Contacts') ?></a>
                      <div id="contacts" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all contacts'), '@contact_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new contact'), '@contact_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#addresses"><?php echo __('Addresses') ?></a>
                      <div id="addresses" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all addresses'), '@address_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new address'), '@address_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#projects"><?php echo __('Projects') ?></a>
              <div id="projects" class="yuimenu">
                <div class="bd">
                  <ul>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#projects1"><?php echo __('Projects') ?></a>
                      <div id="projects1" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all projects'), '@project_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new project'), '@project_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#budgets"><?php echo __('Budgets') ?></a>
                      <div id="budgets" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all budgets'), '@budget_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new budget'), '@budget_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#timesheets"><?php echo __('Timesheets') ?></a>
                      <div id="timesheets" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all timesheets'), '@timesheet_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new timesheet'), '@timesheet_create', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Timesheet reports'), '@timesheet_reports', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#finances"><?php echo __('Finances') ?></a>
              <div id="finances" class="yuimenu">
                <div class="bd">
                  <ul>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#invoices"><?php echo __('Invoices') ?></a>
                      <div id="invoices" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all invoices'), '@invoice_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new invoice'), '@invoice_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#expenses"><?php echo __('Expenses') ?></a>
                      <div id="expenses" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all expenses'), '@expense_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new expense'), '@expense_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#incomes"><?php echo __('Incomes') ?></a>
                      <div id="incomes" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all incomes'), '@income_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new income'), '@income_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#cash"><?php echo __('Cash') ?></a>
                      <div id="cash" class="yuimenu">
                        <div class="bd">
                          <ul class="first-of-type">
                            <li class="yuimenuitem"><?php echo link_to(__('View all cash movements'), '@cash_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                            <li class="yuimenuitem"><?php echo link_to(__('Add new cash movement'), '@cash_create', 'class="yuimenuitemlabel"'); ?></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#members"><?php echo __('Members') ?></a>
              <div id="members" class="yuimenu">
                <div class="bd">
                  <ul>
                    <li class="yuimenuitem"><?php echo link_to(__('View all members'), '@member_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                    <li class="yuimenuitem"><?php echo link_to(__('Add new member'), '@member_create', 'class="yuimenuitemlabel"'); ?></li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#files"><?php echo __('Files') ?></a>
              <div id="files" class="yuimenu">
                <div class="bd">
                  <ul>
                    <li class="yuimenuitem"><?php echo link_to(__('View all files'), '@file_list_remove_filters', 'class="yuimenuitemlabel"'); ?></li>
                  </ul>
                </div>
              </div>
            </li>
<?php if ($sf_user->hasCredential('admin')) : ?>            
            <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#administration"><?php echo __('Administration') ?></a></li>
<?php endif ?>
          <li class="yuimenubaritem"><?php echo link_to(__('Logout'), '@sf_guard_signout', 'class="yuimenubaritemlabel"') ?></li>
          </ul>            
        </div>
      </div>
      
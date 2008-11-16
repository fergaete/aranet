<?php use_helper('Number', 'NumberExtended') ?>
<div class="tab">
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Client since') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($client->getClientSince()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Industry or Business type') ?></strong></td>
                            <td class="rightCol"><?php echo $client->getKindOfCompany() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Number of projects') ?></strong></td>
                            <td class="rightCol"><?php //echo $client->getClientNbProjects() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Total hours') ?></strong></td>
                            <td class="rightCol"><?php //echo format_hour($client->getClientTotalHours()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Total costs') ?></strong></td>
                            <td class="rightCol"><?php //echo format_currency($client->getClientTotalCosts() + $client->getClientTotalExpenses(), 'EUR') ?> (<?php echo __('Costs') ?>: <?php // echo format_currency($client->getClientTotalCosts(), 'EUR') ?>; 
                            <?php echo __('Expenses') ?>: <?php //echo format_currency($client->getClientTotalExpenses(), 'EUR') ?>)       
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Revenue generated') ?></strong></td>
                            <td class="rightCol"><?php //echo format_currency($client->getClientTotalInvoices(), 'EUR') ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Budgets') ?></strong></td>
                            <td class="rightCol">
                            <table style="width: 100%">
                                <tr>
                                    <th style="text-align: right; width:50%"><?php echo __('Active amount') ?></th>
                                    <td><?php //echo format_currency($client->getClientActiveBudgets(), 'EUR') ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right; width:50%"><?php echo __('Approved amount') ?></th>
                                    <td><?php //echo format_currency($client->getClientApprovedBudgets(), 'EUR') ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right; width:50%"><?php echo __('Total amount') ?></th>
                                    <td><?php //echo format_currency($client->getClientTotalBudgets(), 'EUR') ?></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $client->getTags()) ?></td>
                        </tr>
                    </table>
</div>
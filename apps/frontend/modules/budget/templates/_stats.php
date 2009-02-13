<?php use_helper('Number', 'NumberExtended') ?>
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Status') ?></strong></td>
                            <td class="rightCol"><?php echo $budget->getFullStatus(); //
__('Open') . ': ' . format_date($budget->getCreatedAt()) . '; ' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project') ?></strong></td>
                            <td class="rightCol"><?php echo ($budget->getBudgetProjectId()) ? link_to($budget->getProject(), 'project/show?id=' . $budget->getBudgetProjectId()) : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Comments') ?></strong></td>
                            <td class="rightCol"><?php echo $budget->getBudgetComments() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Payment Terms') ?></strong></td>
                            <td class="rightCol"><?php echo ($budget->getBudgetPaymentConditionId()) ? $budget->getPaymentCondition() : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tax and Freight') ?></strong></td>
                            <td class="rightCol"><?php echo __('Tax rate: %1%  Shipping Costs: %2%', array('%1%' => format_percent($budget->getBudgetTaxRate()), '%2%' => format_currency($budget->getBudgetFreightCharge(), 'EUR'))) ?></td>
                        </tr>
                        <?php if (false && $budget->getBudgetTotalExpenses()) : ?>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Expenses') ?></strong></td>
                            <td class="rightCol"><?php //echo format_currency($budget->getBudgetTotalExpenses(),'EUR') ?></td>
                        </tr>
                        <?php endif ?>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Costs') ?></strong></td>
                            <td class="rightCol">
                                <table style="width: 100%">
                                <tr>
                                    <th style="text-align: right; width:40%"><?php echo __('Estimate') ?></th>
                                    <td><?php $estimated_costs = $budget->getBudgetTotalCost(); echo format_currency($estimated_costs, 'EUR') ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right; width:40%"><?php echo __('Actual (%1%)', array('%1%' => format_hour($budget->getBudgetTotalHours()))) ?></th>
                                    <td><?php $total_hour_costs = $budget->getBudgetTotalHoursCost(); echo format_currency($total_hour_costs, 'EUR') ?> + <?php $total_costs = $budget->getBudgetTotalExpenses(); echo format_currency($total_costs, 'EUR') ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right; width:40%"><?php $diff = $estimated_costs - $total_hour_costs - $total_costs; echo __('Difference (%1%)', array('%1%' => format_percent($estimated_costs ? $diff * 100 / $estimated_costs : 0))) ?></th>
                                    <td><?php echo format_currency($diff, 'EUR') ?></td>
                                </tr>
                            </table>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Average margins') ?></strong></td>
                            <td class="rightCol">
                              <table style="width: 100%">
                                <tr>
                                    <th style="text-align: right; width:40%"><?php echo __('Estimate') ?></th>
                                    <td><?php echo format_percent($budget->getBudgetAverageMargin()) ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right; width:40%"><?php echo __('Real') ?></th>
                                    <td><?php echo format_percent($budget->getBudgetAverageRealMargin($total_hour_costs, $total_costs)) ?></td>
                                </tr>
                              </table>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $budget->getTags()) ?></td>
                        </tr>
                    </table>

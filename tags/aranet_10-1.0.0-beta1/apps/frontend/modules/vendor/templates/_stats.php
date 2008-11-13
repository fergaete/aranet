<?php use_helper('Number', 'NumberExtended') ?>
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('CIF') ?></strong></td>
                            <td class="rightCol"><?php echo $vendor->getVendorCif() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Vendor since') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($vendor->getVendorSince()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Vendor comments') ?></strong></td>
                            <td class="rightCol"><?php echo $vendor->getVendorComments() ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Incomes') ?></strong></td>
                            <td class="rightCol"><strong><?php //echo format_currency($vendor->getVendorTotalIncomes(), 'EUR') ?></strong></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Amount') ?></strong></td>
                            <td class="rightCol"><strong><?php //echo format_currency($vendor->getVendorTotalAmount(), 'EUR') ?></strong></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $vendor->getTags()) ?></td>
                        </tr>
                    </table>

<?php use_helper('Object', 'Javascript') ?>
                    <table class="gridTable">
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project status') ?></strong></td>
                            <td class="rightCol">
                                <span id="project-status">
                                <?php if ($project->getProjectStatusId()) : ?>
                                <?php echo $project->getProjectStatus() ?>
                                <?php endif ?>
                                </span>&nbsp;
                                <?php echo select_tag('project_status_id', objects_for_select(ProjectStatusPeer::doSelect(new Criteria()),
                                    'getId',
                                    '__toString',
                                '', 'include_custom='.__('Update status').'...'), array(
                                    'name' => 'project_status_id',
                                    'class' => 'form-small-combo',
                                    'onchange' => remote_function(array(
                                        'update' => 'project-status',
                                        'url' => '/project/updatestatus',
                                        'with' => "'id=" . $project->getId() . "&project_status_id=' + this.options[this.selectedIndex].value"
                                    ))
                                    )
                                ) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project date range') ?></strong></td>
                            <td class="rightCol"><?php echo format_date($project->getProjectStartDate()) . ' ' . __('to') . ' ' . format_date($project->getProjectFinishDate()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Project URL') ?></strong></td>
                            <td class="rightCol"><?php echo ($project->getProjectUrl()) ? link_to($project->getProjectUrl(), $project->getProjectUrl()) : '' ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Total hours') ?></strong></td>
                            <td class="rightCol"><?php //echo format_hour($project->getProjectTotalHours()) ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Revenue generated') ?></strong></td>
                            <td class="rightCol"><?php //echo format_currency($project->getProjectTotalInvoices() + $project->getProjectTotalIncomes(), 'EUR') ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Cost due') ?></strong></td>
                            <td class="rightCol"><?php //echo format_currency($project->getProjectTotalExpenses(), 'EUR') ?></td>
                        </tr>
                        <tr>
                            <td class="leftCol"><strong><?php echo __('Tags') ?></strong></td>
                            <td class="rightCol"><?php echo implode(', ', $project->getTags()) ?></td>
                        </tr>
                    </table>

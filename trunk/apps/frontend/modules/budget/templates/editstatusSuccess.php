<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<div class="popUpWindow" id="ABBAbudWindow<?php echo $budget_id ?>" style="text-align: left; width: 190px;">
    <div style="text-align: right;">
        <?php echo link_to_function(image_tag('buttonCloseSmall.gif', 'alt="Close"'),
            visual_effect('fade', 'budWindow' . $budget_id)) ?>
    </div>
    <div style="height: 5px;"></div>
    <div id="windowContent" style="text-align: left;">
        <div style="text-align: left;" id="budgetWindowOpen<?php echo $budget_id ?>">
            <?php echo form_tag('budget/updatestatus') ?>
            <?php echo input_hidden_tag('id', $budget_id) ?>
            <strong><?php echo __('Status') ?>:</strong>
            <?php echo select_tag('budget_status_id', objects_for_select(BudgetStatusPeer::doSelect(new Criteria()),
                                'getId',
                                '__toString',
                                $budget->getBudgetStatusId()
                            )) ?><br/><br/>
            <?php echo submit_to_remote('submit', '', array(
                    'update'   => 'budStatus' . $budget_id,
                    'url'      => 'budget/updatestatus',
                ), array('class' => 'form-save')) ?>
            </form>
        </div>
    </div>
</div>
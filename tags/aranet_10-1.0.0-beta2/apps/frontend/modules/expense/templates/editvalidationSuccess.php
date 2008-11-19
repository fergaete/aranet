<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<div class="popUpWindow" id="ABBAexpWindow<?php echo $expense_item_id ?>" style="text-align: left; width: 190px;">
    <div style="text-align: right;">
        <?php echo link_to_function(image_tag('buttonCloseSmall.gif', 'alt="Close"'),
            visual_effect('fade', 'expWindow' . $expense_item_id)) ?>
    </div>
    <div style="height: 5px;"></div>
    <div id="windowContent" style="text-align: left;">
        <div style="text-align: left;" id="expenseWindowOpen<?php echo $expense_item_id ?>">
            <?php echo form_tag('expense/updatevalidation') ?>
            <?php echo input_hidden_tag('id', $expense_item_id) ?>
            <strong><?php echo __('Validation') ?>:</strong>
            <?php echo select_tag('expense_item_validation_id', options_for_select(array('1' => __('Waiting approval'), '2' => __('Approved')), $expense_item->getIsValidated())) ?><br/><br/>
            <?php echo submit_to_remote('submit', '', array(
                    'update'   => 'expValidation' . $expense_item_id,
                    'url'      => 'expense/updatevalidation',
                ), array('class' => 'form-save')) ?>
            </form>
        </div>
    </div>
</div>
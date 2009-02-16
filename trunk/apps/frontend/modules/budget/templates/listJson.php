{"recordsReturned":<?php echo $pager->getMaxPerPage() ?>,
    "totalRecords":<?php echo count($pager->getResults()) ?>,
    "startIndex":<?php echo $pager->getFirstIndice()-1 ?>,
    "records":[
<?php $i = 0; foreach ($pager->getResults() as $budget) : $i++ ?>
        {"id":"<?php echo $budget->getId() ?>",
        "checkbox":"<input type='checkbox' name='select[]' value='<?php echo $budget->getId() ?>' />",
        "actions":"<div class='objectActions'><ul><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form.png', 'alt='.__("View")), '@budget_show_by_id?id='.$budget->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_edit.png', 'alt='.__('Edit')), '@budget_edit_by_id?id='.$budget->getId())) ?></li><li><?php echo str_replace('"', "'", link_to(image_tag('icons/application_form_delete.png', 'alt='.__('Delete')), '@budget_delete_by_id?id='.$budget->getId())) ?></li></ul></div>",
        "title":"<?php echo $budget->getFullTitle() ?>",
        "number":"<?php echo $budget->getFullNumber() ?>",
        "client":"<?php echo $budget->getClient()->__toString() ?>",
        "project":"<?php echo $budget->getBudgetProjectId() ? $budget->getProject()->__toString() : '' ?>",
        "date":"<?php echo $budget->getBudgetDate() ?>",
        "status":"<?php echo $budget->getBudgetStatus()->__toString() ?>",
        "expenses":"<?php //echo format_currency($budget->getClientTotalInvoices(), "EUR") ?>",
        "incomes":"<?php echo $budget->getBudgetTotalAmount() ?>"
        }
        <?php if ($i+$pager->getFirstIndice()-1 < count($pager->getResults())) : ?>,<?php endif ?>
<?php endforeach ?>
    ]
}
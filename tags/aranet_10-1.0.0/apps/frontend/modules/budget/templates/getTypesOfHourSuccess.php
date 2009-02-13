<?php use_helper('Object') ?>
<?php if (isset($types_of_hour)) : ?>
<?php echo select_tag('items['.$i.'][type_of_hour]', objects_for_select($types_of_hour, 'getId', 'getTypeOfHourTitle', $hour)) ?>
<?php else: ?>
<?php echo input_tag('items['.$i.'][cost]', $cost, array (
                                'size' => 7, 'class' => 'form-tiny-text', 'name' => 'items['.$i.'][cost]')) ?>
<?php endif ?>

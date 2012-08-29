<?php use_helper('Object', 'Javascript') ?>
<div id="indicator-<?php echo $i ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
    <div id="invoiceItems-<?php echo $i ?>"><table class="dataTable">
                    <tr>
                        <th style="width: 40%;"><?php echo __('Item Description') ?></th>
                        <th style="width: 12%;"><?php echo __('Type') ?></th>
                        <th style="width: 12%;"><?php echo __('Qty') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Cost') ?></th>
                        <th style="width: 12%; text-align: right;"><?php echo __('Total') ?></th>
                        <th style="width: 12%;"></th>
                    </tr>
                    <tr>
                        <td><?php echo textarea_tag('items['.$i.'][description]', '', array (
                            'size' => '30x3', 'class' => 'form-textarea' )) ?></td>
                        <td style="vertical-align: top;"><?php echo select_tag('items['.$i.'][type_id]',
                            '<option value="0">'.__('Select...') . '</option>'.objects_for_select(TypeOfInvoiceItemPeer::doSelect(new Criteria()),
                            'getId',
                            '__toString',
                            0), array ('class' => 'form-tiny-combobox')) ?></td>
                        <td style="vertical-align: top;"><?php echo input_tag('items['.$i.'][quantity]', '0', array (
                            'size' => 7, 'class' => 'form-tiny-text')) ?></td>
                        <td style="vertical-align: top;"><?php echo input_tag('items['.$i.'][cost]', '0', array (
                            'size' => 7, 'class' => 'form-tiny-text')) ?></td>
                        <td style="vertical-align: top; text-align: right;"><?php echo input_tag('items['.$i.'][total]', '0', array (
                            'size' => 7, 'class' => 'form-tiny-text')) ?></td>
                        <td style="vertical-align: top; text-align: center;">
                            <?php echo link_to_remote(image_tag('buttonAdd.gif', 'alt="Add Item"'), array(
                            'update' => 'invoiceItems-'.($i+1),
                            'url' => 'invoice/createitem?index='.($i+1),
                            'loading'  => visual_effect('appear', "indicator-".($i+1)),
                            'complete' => visual_effect('fade', "indicator-".($i+1)).
                                          visual_effect('highlight', "invoiceItems-".($i+1)),
                                          )) ?>
                        </td>
                    </tr>
                </table>
    </div>

<div id="indicator-<?php echo ($i+1) ?>" style="display:none"><?php echo image_tag('indicator.gif') ?></div>
<div id="invoiceItems-<?php echo ($i+1) ?>">
</div>
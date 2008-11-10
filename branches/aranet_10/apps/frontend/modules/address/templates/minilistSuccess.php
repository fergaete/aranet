<?php use_helper('NumberExtended') ?>
<div id="miniaddressDisplay" style="width: 100%;" class="windowFrame">
<?php if (isset($addresss)) : ?>
    <table class="dataTable">
        <tbody>
        <?php $i = 1; foreach ($addresss as $address): $odd = fmod(++$i, 2) ?>
            <tr id="address_<?php echo $address->getId() ?>" class="row_<?php echo $odd ?>">
                <td style="width:35%;"><?php echo ($address->getAddressName()) ? '<strong>'.$address->getAddressName().'</strong>' : '' ?></td>
                <td style="width:65%;"><?php echo $address->__toString() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>
</div>
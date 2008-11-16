<?php use_helper('NumberExtended') ?>
<?php if ($address) : ?>
<?php if (!is_array($address)) $address = array($address) ?>
  <p><?php echo ($address[0]->getAddressName()) ? '<strong>'.$address[0]->getAddressName().'</strong><br/>' : '' ?><?php echo $address[0]->__toString() ?></p>
<?php endif ?>
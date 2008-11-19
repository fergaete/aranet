<?php use_helper('NumberExtended') ?>
<?php if ($address) : ?>
<ul>
<?php if (!is_array($address)) $address = array($address) ?>
<?php foreach ($address as $add) : ?>
  <li><?php echo ($add->getAddressName()) ? '<strong>'.$add->getAddressName().'</strong><br/>' : '' ?><?php echo $add ?></li>
<?php endforeach ?>
</ul>
<?php endif ?>
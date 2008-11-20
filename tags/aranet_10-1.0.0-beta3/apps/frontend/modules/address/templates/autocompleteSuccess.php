<ul>
<?php foreach ($addresses as $address): ?>
  <li id="<?php echo $address->getId() ?>"><?php echo $address->getAddressLine1() ?></li>
<?php endforeach; ?>
</ul>
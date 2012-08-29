<ul>
<?php foreach ($clients as $client): ?>
  <li id="<?php echo $client->getId() ?>"><?php echo $client->getFullName() ?></li>
<?php endforeach; ?>
</ul>

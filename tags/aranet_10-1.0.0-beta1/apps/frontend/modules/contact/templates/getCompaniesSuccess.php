<ul>
<?php foreach ($companies as $company): ?>
  <li id="<?php echo $company->getId() ?>" class="<?php echo ($company instanceof Client) ? 'Client' : 'Vendor' ?>"><?php echo $company->getFullName() ?></li>
<?php endforeach; ?>
</ul>
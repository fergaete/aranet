<ul>
<?php foreach ($vendors as $vendor): ?>
    <li id="<?php echo $vendor->getId() ?>"><?php echo $vendor->getFullName() ?></li>
<?php endforeach; ?>
</ul>

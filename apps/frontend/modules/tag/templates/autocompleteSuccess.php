<ul>
<?php foreach ($tags as $tag): ?>
  <li id="<?php echo $tag->getId() ?>"><?php echo $tag->getName() ?></li>
<?php endforeach; ?>
</ul>
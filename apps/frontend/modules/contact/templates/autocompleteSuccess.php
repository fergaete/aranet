<?php if ($contacts && is_array($contacts)) : ?>
<ul>
<?php foreach ($contacts as $contact): ?>
  <li id="<?php echo $contact->getId() ?>"><?php echo $contact ?></li>
<?php endforeach; ?>
</ul>
<?php endif ?>
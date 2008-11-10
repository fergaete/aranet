<ul>
<?php foreach ($projects as $project): ?>
  <li id="<?php echo $project->getId() ?>"><?php echo $project ?></li>
<?php endforeach; ?>
</ul>
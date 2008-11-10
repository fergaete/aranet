<ul>
<?php foreach ($budgets as $budget): ?>
  <li id="<?php echo $budget->getId() ?>"><?php echo $budget->getFullTitle() ?></li>
<?php endforeach; ?>
</ul>
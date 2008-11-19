[?php use_helper('Object') ?]
<div class="windowHead"><span class="windowHeadTitle">[?php echo __('Add new <?php echo $this->getModuleName() ?>') ?></span>
<div class="windowControls"></div>
</div>

[?php echo form_tag('<?php echo $this->getModuleName() ?>/update') ?]

<?php foreach ($this->getPrimaryKey() as $pk): ?>
[?php echo object_input_hidden_tag($<?php echo $this->getSingularName() ?>, 'get<?php echo $pk->getPhpName() ?>') ?]
<?php endforeach; ?>

<table class="gridTable" width="100%">
<tbody>
<?php foreach ($this->getTableMap()->getColumns() as $name => $column): ?>
<?php if ($column->isPrimaryKey()) continue ?>
<?php if ($name == 'CREATED_AT' || $name == 'UPDATED_AT') continue ?>
<tr>
  <td class="leftCol"><label<?php if ($column->isNotNull()): ?> class="required"<?php endif; ?>><?php echo sfInflector::humanize(sfInflector::underscore($column->getPhpName())) ?></label></td>
  <td class="rightCol">[?php echo <?php echo $this->getCrudColumnEditTag($column) ?> ?]</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<table style="width: 100%;">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">[?php echo submit_tag(__('Save <?php echo $this->getModuleName() ?>'), 'class="btn big green"') ?]</td>
    </tr>
</table>

[?php if (<?php echo $this->getPrimaryKeyIsSet() ?>): ?]
  &nbsp;[?php echo link_to('delete', '<?php echo $this->getModuleName() ?>/delete?<?php echo $this->getPrimaryKeyUrlParams() ?>, 'post=true&confirm=Are you sure?') ?]
  &nbsp;[?php echo link_to('cancel', '<?php echo $this->getModuleName() ?>/show?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]
[?php else: ?]
  &nbsp;[?php echo link_to('cancel', '<?php echo $this->getModuleName() ?>/list') ?]
[?php endif; ?]
</form>

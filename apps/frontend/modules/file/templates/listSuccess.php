<?php use_helper('Object', 'DateForm', 'Javascript') ?>
<?php $sf_context->getResponse()->setTitle(TITLE . ' > ' . __('List files')) ?>
<h3><?php echo __('View all files') ?></h3>

<?php include_partial('file_full_list', array('pager' => $pager)) ?>

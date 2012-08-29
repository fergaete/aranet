<div id="footer-inner" class="block">
<?php if (date('Y') != '2007') 
$to = "-" . date('Y');
else
$to = '' ?>
  <a href="/copyright.html" title="<?php echo __('See copy policies') ?>">Copyright &copy; <em class="aranova">ARANOVA</em> 2007<?php echo $to ?></a> |
  <?php echo link_to(__('App version %1%', array('%1%' => sfConfig::get('aranet_version'))), 'http://www.aranova.es') ?> | 
  <?php echo mail_to('webmaster@aranova.es', __('Support'), 'title="' . __('Contact with support') . '"') ?>
</div>

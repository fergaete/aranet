<div id="footer-inner">
<?php if (date('Y') != '2007') 
$to = "-" . date('Y');
else
$to = '' ?>
  <?php echo link_to('Copyright &copy; <em class="aranova">ARANOVA</em> 2007' . $to, '/copyright.html', 'title="'  . __('See copy policies') . '"') ?> |
  <?php echo link_to(__('App version %1%', array('%1%' => VERSION)), 'http://www.aranova.es') ?> | 
  <?php echo mail_to('webmaster@aranova.es', 'webmaster', 'title="' . __('Contact with webmaster') . '"') ?>
</div>
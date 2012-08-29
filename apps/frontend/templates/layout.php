<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<?php echo include_http_metas() ?>
<?php echo include_metas() ?>
<?php echo include_title() ?>

<link rel="shortcut icon" href="/images/<?php echo sfConfig::get('aranet_app_icon', 'aranet.ico') ?>" type="image/x-icon" />
<link rel="icon" href="/images/<?php echo sfConfig::get('aranet_app_icon', 'aranet.ico') ?>" type="image/x-icon" />
<link rel="start" href="/" title="<?php echo __('Homepage') ?>"/>
</head>

<body class="yui-skin-sam" id="top">
<!-- the id on the containing div determines the page width. -->
<!-- #doc = 750px; #doc2 = 950px; #doc3 = 100%; #doc4 = 974px -->

<!-- To set the Preset Template, add a class to the containing node -->
<!-- .yui-t1 = left 160px; .yui-t2 = left 180px; .yui-t3 = left 300px; -->
<!-- .yui-t4 = right 180px; .yui-t5 = right 240px; .yui-t6 = right 300px; -->
<div id="doc3" class="yui-t6">
  <div id="bd">

    <div id="hd" class="header">
      <?php include('_header.php') ?>
    </div>

    <div class='hnav'>
      <?php include('_nav.php') ?>
    </div>

    <div id="yui-main">
      <div class="yui-b content">
<?php echo $sf_content ?>
      </div>
    </div>
      
    <div class="yui-b sidebar">
      <?php include_slot('filters') ?>
      <?php //include_partial('widgets/yui_calendar') ?>
      <?php include_component('widgets', 'tags') ?>
      <?php include_slot('sidebar') ?>
    </div>

    <div id="ft" class="footer">
      <?php include('_footer.php') ?>
    </div>

  </div>
</div>
</body>
</html>

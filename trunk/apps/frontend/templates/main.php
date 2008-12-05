<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<?php echo include_http_metas() ?>
<?php echo include_metas() ?>
<?php echo include_title() ?>

<link rel="shortcut icon" href="/images/aranet.ico" type="image/x-icon" />
<link rel="icon" href="/images/aranet.ico" type="image/x-icon" />
<link rel="start" href="/" title="<?php echo __('Homepage') ?>"/>
</head>

<body class="yui-skin-<?php echo sfConfig::get('yui_default_skin') ?>" id="top">
<!-- the id on the containing div determines the page width. -->
<!-- #doc = 750px; #doc2 = 950px; #doc3 = 100%; #doc4 = 974px -->

<!-- To set the Preset Template, add a class to the containing node -->
<!-- .yui-t1 = left 160px; .yui-t2 = left 180px; .yui-t3 = left 300px; -->
<!-- .yui-t4 = right 180px; .yui-t5 = right 240px; .yui-t6 = right 300px; -->
<div id="doc3">
  <div id="bd">

    <div id="hd" class="header">
      <h1><?php echo link_to(image_tag(sfConfig::get('aranet_company_logo'), 'alt="' . sfConfig::get('aranet_company_name') . '"'), sfConfig::get('aranet_company_site', 'http://www.aranova.es'), 'accesskey="1"');?></h1>
      <h2><?php echo link_to(image_tag('aranet_logo.jpg', 'alt="ARANet" style="margin-top:10px"'), 'http://aranet.aranova-it.com', 'accesskey="2"') ?></h2>
      <h3><?php echo __('Backoffice Web Management') ?></h3>
    </div>

    <div id="yui-main">
      <div class="yui-b content">

<?php echo $sf_content ?>

      </div>
    </div>
    
    <div id="ft" class="footer">
      <?php include('_footer.php') ?>
    </div>

  </div>
</div>
</body>
</html>

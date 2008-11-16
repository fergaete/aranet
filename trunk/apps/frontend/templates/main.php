<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<?php echo include_http_metas() ?>
<?php echo include_metas() ?>
<?php echo include_title() ?>

<link rel="shortcut icon" href="/images/<?php echo sfConfig::get('app_sf_settings_plugin_icon') ?>" type="image/x-icon" />
<link rel="icon" href="/images/<?php echo sfConfig::get('app_sf_settings_plugin_icon') ?>" type="image/x-icon" />
<link rel="start" href="/" title="<?php echo __('Homepage') ?>"/>

</head>
<body class="layout-one-column yui-skin-<?php echo sfConfig::get('yui_default_skin') ?>" id="top">

    <div id="container">
        <div id="container-inner" class="block">

            <div id="banner">
                <div id="banner-inner" class="block">
                  <h1 id="banner-header"><?php echo link_to(image_tag(sfConfig::get('app_sf_settings_plugin_company_logo'), 'alt="' . sfConfig::get('app_sf_settings_plugin_company') . '"'), sfConfig::get('app_sf_settings_plugin_company_site', 'http://www.aranova.es'), 'accesskey="1"');?></h1>
                  <h2 id="banner-subject"><?php echo link_to(image_tag('aranet_logo.jpg', 'alt="ARANet" style="margin-top:10px"'), sfConfig::get('app_sf_settings_plugin_aranet_site', 'http://aranet.aranova-it.com'), 'accesskey="2"') ?></h2>
                    <h3 id="banner-description"><?php echo __('Backoffice Web Management') ?></h3>
                </div>
            </div>

            <div id="pagebody">
                <div id="pagebody-inner" class="block">

                    <div class='hnav'>
                    </div>

                    <?php include_component('widgets', 'subnav') ?>

                <div id="alpha">
                    <div id="alpha-inner" class="content">

<?php echo $sf_content ?>
                    </div>
                </div>
                </div>
            </div>

            <div id="footer" class="main_footer">
              <?php include('_footer.php') ?>
            </div>
        </div>
    </div>
</body>
</html>

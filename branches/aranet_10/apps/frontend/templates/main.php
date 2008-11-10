<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<?php echo include_http_metas() ?>
<?php echo include_metas() ?>
<?php echo include_title() ?>

<link rel="shortcut icon" href="/images/<?php echo APP_ICON ?>" type="image/x-icon" />
<link rel="icon" href="/images/<?php echo APP_ICON ?>" type="image/x-icon" />
<link rel="start" href="/" title="<?php echo __('Homepage') ?>"/>

</head>

<body class="layout-one-column">
    <div id="top"></div>
    <div id="container">
        <div id="container-inner" class="pkg">

            <div id="banner">
                <div id="banner-inner" class="pkg">
                    <h1 id="banner-header"><?php echo link_to(image_tag(COMPANY_LOGO, 'alt="' . COMPANY . '"'), COMPANY_SITE, 'accesskey="1"');?></a></h1>
                    <h2 id="banner-subject"><?php echo link_to(image_tag('aranet_logo.jpg', 'alt="ARANet"'), HOME_URL, 'accesskey="2"') ?></h2>
                    <h3 id="banner-description"><?php echo __('Backoffice Web Management') ?></h3>
                </div>
            </div>

            <div id="pagebody">
                <div id="pagebody-inner" class="pkg">

                    <div class='hnav'>
                        <?php include('_nav.php') ?>
                    </div>

                    <?php include_component_slot('widget_subnav') ?>

                <div id="alpha">
                    <div id="alpha-inner" class="pkg content">

<?php echo $sf_data->getRaw('sf_content') ?>
                    </div>
                </div>

                <div class="clear">&nbsp;</div>

                </div>
            </div>

            <div id="footer">
              <?php include('_footer.php') ?>
            </div>
        </div>
    </div>
</body>
</html>

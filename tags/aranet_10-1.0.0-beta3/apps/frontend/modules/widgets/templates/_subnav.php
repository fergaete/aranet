<?php use_helper('Javascript', 'nifty') ?>
    <div id="subMenuBG" style="float: left;">
        <div id="pageTitleBG" ><div class="pageTitleIcon project-icon">
            <div class="pageTitle"><?php echo __(ucfirst($module) . ' manager') ?></div>
        </div></div>
    </div>
    <div id="subMenuLinks">
        <?php include_partial('widgets/'.$module.'_links', array('filters' => $filters)) ?>
    </div>
    <div class="headerControls">
<?php if ($sf_user->isAuthenticated()) : ?>
<?php echo __('Welcome %1%', array('%1%' => $fullname)) ?>
<?php endif ?></div>

    <div style="clear: left;"></div>
<?php echo javascript_tag(nifty_round_elements( "div#pageTitleBG", "tr")) ?>

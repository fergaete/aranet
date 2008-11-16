<?php use_helper('Javascript') ?>
    <div id="subMenuBG">
        <div id="pageTitleBG">
          <div class="pageTitleIcon">
            <div class="pageTitle"><?php echo __(ucfirst($module) . ' manager') ?></div>
          </div>
        </div>
    <div class="headerControls">
<?php if ($sf_user->isAuthenticated()) : ?>
<?php echo __('Welcome %1%', array('%1%' => $fullname)) ?>
<?php endif ?></div>
    <div id="subMenuLinks">
        <?php include_partial('widgets/'.$module.'_links', array('filters' => $filters, 'form' => $form)) ?>
    </div>
    <div style="clear:both"></div>
</div>

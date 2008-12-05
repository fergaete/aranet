<?php aranet_title(__('Login')) ?>
<?php sfContext::getInstance()->getResponse()->addStylesheet('forms') ?>    
<div class="loginContainer">
<div class='loginShell'>
  <h1 style='text-align: left;padding-left: 180px;'><?php echo __('Signin panel'); ?></h1>
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="signin">
  <?php if (strpos($sf_params->get('referer'), 'logout') === false && $sf_params->get('referer')) : ?>
  <?php $sf_user->serReferer($sf_params->get('referer')); ?>
  <?php endif ?>

  <div class='left'>
    <?php echo __('Please, complete with your data to access ARANet');?><br/>
    <span class="notes">
      <?php echo link_to(__('Forgot your password?'), '@sf_guard_password', array('id' => 'sf_guard_auth_forgot_password')) 
  ?>
    </span>
  </div>

  <div class='right'>
    <fieldset>
        <table>
            <?php echo $form ?>
            <tr>
                <td></td>
                <td class="actions">
                    <?php use_helper('YUIForm') ?>
                    <?php echo submit_tag(__('Login')." &raquo;") ?>
                </td>
            </tr>
        </table>
  </fieldset>

   </div>
 </form>
 </div>
</div>

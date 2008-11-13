<?php use_helper('Validation') ?>

<div class="loginContainer">
<?php echo form_error('username') ?><br />
<?php echo form_error('password') ?><br />
<div class='loginShell'>
  <h1 style='text-align: left;padding-left: 180px;'><?php echo __('Signin panel'); ?></h1>
  <?php echo form_tag('@sf_guard_signin', 'id="sigin-form"') ?>
  <?php if (strpos($sf_params->get('referer'), 'logout') === false && $sf_params->get('referer')) : ?>
  <?php echo input_hidden_tag('referer', $sf_params->get('referer')); ?>
  <?php else: ?>
  <?php echo input_hidden_tag('referer', url_for('@homepage')); ?>
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

    <div class="form-row" id="sf_guard_auth_username">
      <?php
      echo label_for('username', __('Username') . ':'),
      input_tag('username', $sf_data->get('sf_params')->get('username'),'class="form-text"');
      ?>
    </div>

    <div class="form-row" id="sf_guard_auth_password">
      <?php
      echo label_for('password', __('Password') . ':'),
        input_password_tag('password', null, 'class="form-text"');
      ?>
    </div>
    <div class="form-row" id="sf_guard_auth_remember">
      <?php
      echo label_for('remember', __('Remember me?')),
      checkbox_tag('remember');
      ?>
    </div>
  </fieldset>
<?php
    echo label_for('submit_btn', '&nbsp;');
    echo submit_tag(__('Login') . ' &raquo;', 'id="submit_btn" class="btn big"') ?>

   </div>
 </form>
 </div>
</div>
<?php if (DEMO_MODE == 1) : ?>
<div style="text-align:center">
<p><?php echo __('Use demo/demo for username and password') ?></p>
</div>
<?php endif ?>

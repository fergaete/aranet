<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <?php echo $form ?>
  </table>

  <input type="submit" value="sign in" />
  <a href="<?php echo url_for('@sf_guard_password') ?>">Forgot your password?</a>
</form>

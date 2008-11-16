<?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('member')) : ?>
<p class="welcome"><?php echo __('Welcome %1%', array('%1%' => $sf_user->getFullname())) ?></p>
<p><?php echo __('Last login on %1%', array('%1%' => format_date($sf_user->getLastLogin()))) ?></p>
<?php endif ?>

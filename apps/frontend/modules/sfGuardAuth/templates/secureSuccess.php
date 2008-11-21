<div class="sfTContainer">
      <h1><?php echo __('Restringed access') ?></h1>
      <h5><?php echo __("You don't have enough permission to access this area") ?>.</h5>

  <dl class="sfTMessageInfo">
    <dt><?php echo __("Maybe, something could be broken") ?></dt>
    <dd><?php echo __("Please e-mail us at webmaster@aranova.es and let us know what you were doing when this error occurred.") . __("We will fix it as soon as possible.") . __("Sorry for any inconvenience caused.") ?></dd>

    <dt><?php echo __("What's next") ?></dt>

    <dd>
      <ul class="sfTIconList">
        <li class="sfTLinkMessage"><a href="javascript:history.go(-1)"><?php echo __("Back to previous page") ?></a></li>
        <li class="sfTLinkMessage"><?php echo link_to(__("Go to Homepage"), '@homepage') ?></li>
      </ul>
    </dd>
  </dl>
</div>


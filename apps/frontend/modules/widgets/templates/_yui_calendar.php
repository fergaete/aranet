<?php use_helper('YUICalendar') ?>
<div class="module-calendar module">
  <h2><?php echo __('Calendar events') ?></h2>
  <div class="module-content">
    <div id="cal1Container"></div>
    <div class="block"></div>
</div>
  <div class="module-footer">
  </div>
</div>
<?php echo yui_calendar('cal1') ?>

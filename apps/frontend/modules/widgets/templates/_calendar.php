<?php use_helper('Javascript', 'nifty', 'Date', 'Number') ?>
<div class="module-calendar module">
  <h2><?php echo format_date(date('Y-m-d'), 'MMMM yyyy') ?></h2>
  <div class="module-content">
      <table class="gridTable">
          <tr>
              <th>Lun</th>
              <th>Mar</th>
              <th>Mié</th>
              <th>Jue</th>
              <th>Vie</th>
              <th>Sáb</th>
              <th>Dom</th>
          </tr>
  <?php
  foreach ($calendar as $week)
  {  
    ?>
    <tr>
      <?php
      foreach ($week as $day => $events)
      {
          $td_class = ' ';
          if ($day == date('Y-m-d')) {
              $td_class .= 'today ';
          }
          if (date('D', strtotime($day)) == 'Sun') {
              $td_class .= 'festive ';
          }
          echo '<td class="' . trim($td_class) . '">';
        
          echo '<div>' . date('j', strtotime($day)) . '</div>';
          if (!empty($events))
          {
            foreach ($events as $event)
            {
              ?><p><?php echo link_to_if(isset($event['url']), $event['title'], $event['url'], array('title' => $event['alt'])); ?></p><?php
            }
          }
          ?>
        </td>
        <?php
      }
      ?>
    </tr>
    <?php
  }
  ?>
</table>
</div>
  <div class="module-footer">
  </div>
</div>
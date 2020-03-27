
<event-card-mini>
  MINI
  <ul class='detail-list'>
    <li class='detail date'><h3><?=$date?></h3></li>
    <li class='detail title'><?=$title?></li>
    <li class='detail link'>
      <a href='<?php echo get_permalink($event); ?>' target='<?=$title?>' class='button more-info'>Details</a>
    </li>
  </ul>
</event-card-mini>

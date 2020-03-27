
<event-card>
  <ul class='detail-list'>
    <li class='detail date'><h3><?=$date?></h3></li>
    <li class='detail title'>The title of the event</li>
    <li class='detail venue'>The venue of the event</li>
    <li class='detail link'>
      <a href='<?php echo get_permalink($event); ?>' target='_blank' class='button more-info'>Details</a>
    </li>
  </ul>
</event-card>

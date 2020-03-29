
<event-card>
  <ul class='detail-list'>
    <li class='detail date'><h3><?=$date?></h3></li>
    <li class='detail title'><?=$title?></li>
    <!-- <li class='detail venue'><?=$venueName?></li> -->
    <li class='detail'>
      <?php if ($startTime) { ?>
        <?=$startTime?>,
      <?php } ?>

      <?=$ageRestriction?>
    </li>

    <li class='detail link'>
      <a href='<?php echo get_permalink($event); ?>' target='_blank' class='button more-info'>Details</a>
    </li>
  </ul>
</event-card>

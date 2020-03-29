
<?php
  include('get-event-data.php');

  if ($poster) {
    $poster = $decorativeImage;
  }
?>


<section class='page-section event-spotlight'>
<inner-column>


  <?php
    /* in theory... these shows could be connected to a record... and we'd show that branding here... relationship field - or based on date range...
    
    instead - I'm just going to put in a default image for now... and if there is a 'flier' - it'll use that / otherwise default

    */
  ?>
  <picture class='theme-image'>
    <img src='<?=$poster?>'>
  </picture>


  <info>
    <h1 class='title'>
      <?=$title?>
    </h1>

    <h2 class='date'>
      <?=$date?>
    </h2>

    <h3 class='venue'>
      <?=$venueName?> <?php if ($venueUrl) { ?>
        <a href='<?=$venueUrl?>'>site</a>
      <?php } ?>
    </h3>

    <h4 class='address'>
      <?=$venueAddress?><br>
      <?=$cityState?> <?=$zipocde?> <?=$country?>
    </h4>

    <section class='line-up'>

      <h2>Lineup</h2>

      
      
      <ol class='act-list'>
      <?php foreach($lineUp as $act) { ?>
        <li class='act'>
          <act-card>

            <?php
              $name = $act["act_name"];
              $link = $act["link_to_act"];
              $setTime = $act["set_time"];
              $notes = $act["additional_notes"];
            ?>

            <?php if ($link) { ?>
              <a href='<?=$link?>' target='<?=$name?>'>
                <?=$name?>
              </a>
            <?php } else { ?>
              <?=$name?>
            <?php } ?>

            <?php if ($setTime) { ?>
              (<?=$setTime?>)
            <?php } ?>

            <?php if ($notes) { ?>
              (<?=$notes?>)
            <?php } ?>

          </act-card>
        </li>
      <?php } ?>
      </ol>

      <p><?=$ageRestriction?> <?=$cost?></p>

      <?php if ($mc) { ?>
        <p class='mc'>and <?=$mc?></p>
      <?php } ?>

      <p class='start-time'><?=$startTime?> </p>

      <?php if ($fbEventUrl) { ?>
        <a class='fb-invite' href='<?=$fbEventUrl?>'>FB event link</a>
      <?php } ?>

    </section>

    <text-content class='description'>
      <?php if ($fullDescription) { ?>
        <?=$fullDescription?>
      <?php } elseif ($shortDescription) { ?>
        <?=$shortDescription?>
      <?php } ?>
    </text-content>
  </info>

</inner-column>
</section>

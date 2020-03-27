
<release-card>

  <picture class='record-cover'>
    <?php if ($largeCover) { ?>
      <img src='<?=$largeCover?>' alt='Record cover for "<?php echo get_the_title(); ?>"'>
    <?php } else { ?>
      <img src='https://placehold.it/1600'>
    <?php } ?>
  </picture>

  <h2 class='title'>
    <?=$title?>
  </h2>

  <h3 class='date'>
    Released: <?=$date?>
  </h3>

  <h4 class='label'>
    <?php if ($labelUrl) { ?>
      <a href='<?=$labelUrl?>' target='<?=$labelName?>'>
        <?=$labelName?>
      </a>
    <?php } else { ?>
      <?=$labelName?>
    <?php } ?>
  </h4>

    <?php if ($micrositeUrl) { ?>
      <p>
        <a href='<?=$micrositeUrl?>' target='<?=$title?>'>
          Visit micro-site
        </a>
      </p>
    <?php } ?>

</release-card>

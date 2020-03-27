
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
    <?php if ($labelUrlzzz) { ?> <?php // we don't really want them to leave.... ?>
      <a href='<?=$labelUrl?>' target='<?=$labelName?>'>
        <?=$labelName?>
      </a>
    <?php } else { ?>
      <?=$labelName?>
    <?php } ?>
  </h4>

  <?php include('purchase-links-loop.php'); ?>

  <?php if ($micrositeUrlzzz) { ?>
    <p>
      <a href='<?=$micrositeUrl?>' target='<?=$title?>'>
        Visit micro-site
      </a>
    </p>
  <?php } ?>

  <p>
    <a href='<?=$releaseLink?>' target='<?=$releaseLink?>'>
      Full details
    </a>
  </p>

</release-card>

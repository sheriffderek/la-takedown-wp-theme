
<release-card>

  <picture class='record-cover'>
    <?php if ($largeCover) { ?>
      <img src='<?=$largeCover?>' alt='Record cover for "<?php echo get_the_title(); ?>"'>
    <?php } else { ?>
      <img src='https://placehold.it/1600'>
    <?php } ?>
  </picture>

  <h2 class='title'><?php echo get_the_title(); ?></h2>

</release-card>

<?php
  $event_args = array(
    'post_type' => 'release',
    'order' => 'DESC',
    'showposts' => '-1',
  );
  $event_query = new WP_Query($event_args);
?>

<?php if ( $event_query->have_posts() ) { ?>
  <ul class='release-list'>
    <?php while ( $event_query->have_posts() ) { ?>
      <?php $event_query->the_post(); ?>

        <?php include('get-release-data.php'); ?>

        <li class='release'>
          <?php include('components/card-release.php'); ?>
        </li>

    <?php } ?>
  </ul>
<?php } ?>

<?php wp_reset_postdata(); ?>
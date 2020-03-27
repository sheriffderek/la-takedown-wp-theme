<?php

// get today's date
// $today = date('Ymd');
// $today2 = $today - 1;

// define the rules/arguments
$event_args = array(
  'post_type' => 'release',
  // 'meta_key' => 'event_date',
  // 'orderby' => 'meta_value_num',
  'order' => 'DESC',
  'showposts' => '-1',
  // 'meta_query' => array(
  //   array(
  //     'key' => 'event_date',
  //     'compare' => '>=',
  //     'value' => $today2,
  //   )
  // ),
);

$event_query = new WP_Query($event_args);

?>

<?php if ( $event_query->have_posts() ) { ?>
  <ul class='release-list'>
  <?php while ( $event_query->have_posts() ) { ?>
    <?php $event_query->the_post(); ?>

      <?php
        $largeCover = get_field('record_cover_large')["url"];
        $smallCover = get_field('record_cover_small')["url"];
      ?>


      <li class='release'>
        <?php include('card-release.php'); ?>
      </li>

  <?php } // end while ?>
  </ul>
<?php } ?>

<?php wp_reset_postdata(); ?>
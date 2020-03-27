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

        <?php
          $title = get_field('record_title');
          $date = get_field('release_date');
          $largeCover = get_field('record_cover_large')["url"];
          $smallCover = get_field('record_cover_small')["url"];
          $labelName = get_field('record_label');
          $labelUrl = get_field('record_label_url');
          $purchaseLinks = get_field('purchase_links');
          $description = get_field('record_description');
          $otherNotes = get_field('other_notes');
          $micrositeUrl = get_field('microsite_url');
        ?>

        <li class='release'>
          <?php include('card-release.php'); ?>
        </li>

    <?php } ?>
  </ul>
<?php } ?>

<?php wp_reset_postdata(); ?>
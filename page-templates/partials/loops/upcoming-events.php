

<?php

// get today's date
$today = date('Ymd');
$today2 = $today - 1;

// define the rules/arguments
$event_args = array(
  'post_type'     => 'event',
  'meta_key'      => 'event_date',
  'orderby'     => 'meta_value_num',
  'order'       => 'ASC',
  'showposts'     => '-1',
  'meta_query' => array(
    array(
      'key'     => 'event_date',
      'compare' => '>=',
      'value'   => $today2,
    )
  ),
);

$event_query = new WP_Query($event_args);

?>

<?php if ( $event_query->have_posts() ) { ?>
  <ul class='block-list event-list'>
  <?php while ( $event_query->have_posts() ) { ?>
    <?php $event_query->the_post(); ?>

    
    <?php if ( get_field('announcement_date') ) { ?>

      <?php $anouncement = get_field('announcement_date'); ?>

      <?php if ( $anouncement <= $today ) { ?>

        <li class='event'>

          <ul class='block-list details-list'>
            <li><h4 class='date'><?php the_field('event_date'); ?></h4></li>
            <li class='title'><?php the_field('event_title') ?></li>
            <li class='venue'><?php the_field('venue_name'); ?></li>
            <li><a href='<?php the_permalink(); ?>' target='_blank' class='button more-info'>Details</a></li>
          </ul>

        </li>

      <?php } ?>

    <?php } else { ?>

      <li class='event'>

        <ul class='block-list details-list'>
          <li><h4 class='date'><?php the_field('event_date'); ?></h4></li>
          <li class='title'><?php the_field('event_title') ?></li>
          <li class='venue'><?php the_field('venue_name'); ?></li>
          <li><a href='<?php the_permalink(); ?>' target='_blank' class='button more-info'>Details</a></li>
        </ul>

      </li>

    <?php } ?>


  <?php } // end while ?>
  </ul>
<?php } else { // end if ?>
  
  <div class='no-events'>
    <?php the_field('no_upcoming_shows', 170); ?>

    <h3 class='past'>View past events: <a href='/events' target='past'>here</a></h3>
  </div>

    <ul class='event-list'>

      <li class='event'>
        <ul class='detail-list'>
          <li class='detail date'><h3>The event date here</h3></li>
          <li class='detail title'>The title of the event / location?</li>
          <li class='detail venue'>The venue of the event</li>
          <li class='detail link'>
            <a href='#' target='_blank' class='button more-info'>Details</a>
          </li>
        </ul>
      </li>

      <li class='event'>
        <ul class='detail-list'>
          <li class='detail date'><h3>The event date here</h3></li>
          <li class='detail title'>The title of the event / location?</li>
          <li class='detail venue'>The venue of the event</li>
          <li class='detail link'>
            <a href='#' target='_blank' class='button more-info'>Details</a>
          </li>
        </ul>
      </li>

      <li class='event'>
        <ul class='detail-list'>
          <li class='detail date'><h3>The event date here</h3></li>
          <li class='detail title'>The title of the event / location?</li>
          <li class='detail venue'>The venue of the event</li>
          <li class='detail link'>
            <a href='#' target='_blank' class='button more-info'>Details</a>
          </li>
        </ul>
      </li>

    </ul>

<?php } ?>

<?php wp_reset_postdata(); ?>

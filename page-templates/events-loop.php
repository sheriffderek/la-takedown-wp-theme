
<?php

  // get today's date
  $today = date('Ymd');

  // define the rules/arguments
  $future_args = array(
    'post_type' => 'event',
    'order' => 'DESC',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'meta_query' => array(
      array(
        'key'     => 'event_date',
        'compare' => '>=',
        'value'   => $today,
      )
    ),
  );

  // The Query
  $the_query = new WP_Query( $future_args );

  // The Loop
  if ( $the_query->have_posts() ) {
      echo '<ul class="event-list">';
      while ( $the_query->have_posts() ) {
          $the_query->the_post();
          ?>

            <?php include('get-event-data.php'); ?>

            <li class='event'>

              <?php if ($useMiniEventCard) { ?>
                <?php include('components/card-event-mini.php'); ?>
              <?php } else { ?>
                <?php include('components/card-event.php'); ?>
              <?php } ?>
            </li>

          <?php
      }
      echo '</ul>';
  } else {
      ?>

        <div class='message'>
          <p>There are currently no upcoming events</p>
        </div>

      <?php
  }
  /* Restore original Post Data */
  wp_reset_postdata();


  ?>



  <?php 

  if (!$onlyUpcoming) {


    ?>

        <hr class='events-break'>

        <h2 class='past-heading'>Past events:</h2>

    <?php 

    // get today's date
    $today = date('Ymd');

    // define the rules/arguments
    $future_args = array(
      'post_type' => 'event',
      'order' => 'DESC',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'meta_query' => array(
        array(
          'key'     => 'event_date',
          'compare' => '<',
          'value'   => $today,
        )
      ),
    );

    // The Query
    $the_query = new WP_Query( $future_args );
     
    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<ul class="event-list">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            ?>

            <?php include('get-event-data.php'); ?>

            <li class='event'>

              <?php if ($useMiniEventCard) { ?>
                <?php include('components/card-event-mini.php'); ?>
              <?php } else { ?>
                <?php include('components/card-event.php'); ?>
              <?php } ?>
            </li>

            <?php
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
  }


?>



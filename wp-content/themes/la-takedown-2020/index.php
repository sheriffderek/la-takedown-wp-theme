<?php
// Silence is golden?
?>


<?php get_header(); ?>
<!-- ====================================== -->


<?php if ( is_page('events') ) { include('page-templates/events.php'); } ?>

<?php if ( is_page('releases') ) { include('page-templates/releases.php'); } ?>

<?php if ( is_page(20250) ) { include('page-templates/natural-microsite.php'); } ?>

<?php if ( is_singular('event') ) { include('page-templates/event-spotlight.php'); } ?>


<!-- ====================================== -->
<?php get_footer(); ?>
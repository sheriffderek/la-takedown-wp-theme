<?php
// Silence is golden?
?>


<?php get_header(); ?>
<!-- ====================================== -->


<?php if ( is_page('events') ) { include('page-templates/events.php'); } ?>

<?php if ( is_page('releases') ) { include('page-templates/releases.php'); } ?>


<!-- ====================================== -->
<?php get_footer(); ?>
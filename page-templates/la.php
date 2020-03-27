<?php
/*
  Template name: la template
*/
?>


<?php get_header(); ?>
<!-- ====================================== -->

<?php //include('sunset-info.php'); ?>



<div class='master'>

  <div class='small-touch'>
    <?php require('partials/la-small.php'); ?>
  </div>

  <div class='full-screen'>
    <?php require('partials/la-full.php'); ?>
  </div>

</div>



<!-- ====================================== -->
<?php get_footer('microsite'); ?>
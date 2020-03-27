<!doctype html>

<html>
  <?php require('partials/head.php'); ?>


  <body <?php body_class('main-site'); ?>>
	 
    <?php include('partials/icons.php'); // svg icons ?>

  	<header class='page-section site-header'>
  	<inner-column>

  		<h1 class='site-title'><?php the_field('site_title', 'option'); ?></h1>

      <nav class='main-nav'>
        <?php wp_nav_menu('main-menu'); ?>
      </nav>

  	</inner-column>
  	</header>


    <main class='page-content'>
      <?php // page content here!!! chech the index.php for a start : ) ?>

<!doctype html>

<html>
  <?php require('partials/head.php'); ?>


  <body <?php body_class('main-site'); ?> class='played'>
	 
    <?php include('partials/icons.php'); // svg icons ?>

  	<header class='page-section site-header'>
  	<inner-column>

  		<h1 class='site-title visually-hidden'>
        L.A. Takedown
      </h1>

      <div class='logo'>
        <?php include('page-templates/components/logo.php'); ?>
      </div>

      <nav class='main-nav'>
        <?php wp_nav_menu('main-menu'); ?>
      </nav>

  	</inner-column>
  	</header>


    <main class='page-content'>
      <?php // page content here!!! chech the index.php for a start : ) ?>

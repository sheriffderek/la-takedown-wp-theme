<?php // list in order of importance


// hide admin bar - that thing interferes with layout and stuff
show_admin_bar( false );


// register and call style sheet
function site_styles() {
  wp_enqueue_style('my-styles', get_stylesheet_directory_uri() .'/style.css' . "?date=" . date("His")); // adding a version - to ensure that cache is busted
}
add_action( 'wp_enqueue_scripts', 'site_styles' );


// register and call scripts
function site_scripts() {
  wp_register_script( 'main-scripts',
    get_template_directory_uri() . '/site-scripts-min.js',
    array( 'jquery' ) );
  wp_enqueue_script( 'main-scripts' );
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );


// add featured image ability
function add_featured_image_ability() {
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'add_featured_image_ability' );


// I'd prefer to skip these - but they offer a 'currently-selected' type class for the current page link... and sometimes the client wants that
register_nav_menus( array(
  'main-menu' => 'Main menu',
));

// remove p tags from images // in case people put them in the WYSIWYG - but we shouldn't really allow that...  $todo
function filter_ptags_on_images($content) {
  // do a regular expression replace...
  // find all p tags that have just
  // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
  // replace it with just the image tag...
  return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
// we want it to be run after the autop stuff... 10 is default. ? ? ?
add_filter('the_content', 'filter_ptags_on_images');



function add_admin_favicon() {
    $favicon_url = get_stylesheet_directory_uri() . '/admin-favicon.ico?v=23';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
  // $why??? is this just for the ADMIN person - ? 
  // so you can quickly see what is admin and what is front-end in the tabs?
  // confirmed. This is helpful for various admin reasons
}

// Now, just make sure that function runs when you're on the login page and admin pages
add_action('login_head', 'add_admin_favicon');
add_action('admin_head', 'add_admin_favicon');


// no empty lines after this! ?>
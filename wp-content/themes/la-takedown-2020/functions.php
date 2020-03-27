<?php /* list in order of importance */


// reset
require('partials/functions/reset.php');


// basics | styles / scripts
require('partials/functions/basics.php');


// rename the default 'post' for semantics
require('partials/functions/rename-default-post.php');


// custom post types and associated categories // currently in CUSTOM POST TYPES UI PLUGIN


// custom option menus | ACF
include('partials/functions/custom-option-menus.php');


// tiny-mce | custom admin editor styles
// require('partials/functions/tiny-mce.php');


// CREATE UNIX TIME STAMP FROM DATE PICKER
function custom_unixtimesamp ( $post_id ) {
    if ( get_post_type( $post_id ) == 'event_type' ) {
	$event_date = get_post_meta($post_id, 'event_date', true);

		if($event_date) {
			$dateparts = explode('/', $event_date);
			$newdate1 = strtotime(date('d.m.Y H:i:s', strtotime($dateparts[1].'/'.$dateparts[0].'/'.$dateparts[2])));
			update_post_meta($post_id, 'unixstartdate', $newdate1  );
		}
	}
}
add_action( 'save_post', 'custom_unixtimesamp', 100, 2);
// WHY ???



function micrositeScripts() {
  if ( is_page(313) ) { // la-takedown
		wp_register_script('laScripts', ( get_bloginfo('template_url') . '/js/min/sunset-scripts-min.js'), array('jquery'));
		wp_enqueue_script('laScripts'); // then print. it will be added after jquery is added
	}
  if ( is_page(308) ) { // ii
    wp_register_script('iiScripts', ( get_bloginfo('template_url') . '/js/compiled/ii-compiled.js'), array('jquery'));
    wp_enqueue_script('iiScripts'); // then print. it will be added after jquery is added
  }
}
add_action( 'wp_print_scripts', 'micrositeScripts'); // now just run the function





// function my_custom_fonts() {
//   echo '<style>

//     .button#publish {
//     	background: lightgreen;
//       border: 2px solid green;
//       text-shadow: 0;
//       box-shadow: 0;
//     }

//   </style>';
// }
// add_action('admin_head', 'my_custom_fonts');



// no empty lines after this! ?>
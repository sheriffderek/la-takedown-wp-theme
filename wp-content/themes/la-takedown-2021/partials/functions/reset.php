<?php

// removes the newer Emoji tuff
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');
function prefix_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// no empty lines after this! ?>
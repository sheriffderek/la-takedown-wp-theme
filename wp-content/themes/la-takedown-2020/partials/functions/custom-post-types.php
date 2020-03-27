<?php


/*
	WHY NOT CPT UI plugin? $todo
*/


// custom post type | event
function register_cpt_event() {

	$labels = array( 
		'name' => _x( 'Events', 'event' ),
		'singular_name' => _x( 'Event', 'event' ),
		'add_new' => _x( 'Add New', 'event' ),
		'add_new_item' => _x( 'Add New Event', 'event' ),
		'edit_item' => _x( 'Edit Event', 'event' ),
		'new_item' => _x( 'New Event', 'event' ),
		'view_item' => _x( 'View Event', 'event' ),
		'search_items' => _x( 'Search Events', 'event' ),
		'not_found' => _x( 'No events found', 'event' ),
		'not_found_in_trash' => _x( 'No events found in Trash', 'event' ),
		'parent_item_colon' => _x( 'Parent Event:', 'event' ),
		'menu_name' => _x( 'Events', 'event' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,


		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'event', $args );
}
add_action( 'init', 'register_cpt_event' );


// custom post type | product
add_action( 'init', 'register_cpt_products' );

function register_cpt_products() {

	$labels = array( 
		'name' => _x( 'Products', 'products' ),
		'singular_name' => _x( 'Products', 'products' ),
		'add_new' => _x( 'Add New', 'products' ),
		'add_new_item' => _x( 'Add New Products', 'products' ),
		'edit_item' => _x( 'Edit Products', 'products' ),
		'new_item' => _x( 'New Products', 'products' ),
		'view_item' => _x( 'View Products', 'products' ),
		'search_items' => _x( 'Search Products', 'products' ),
		'not_found' => _x( 'No productss found', 'products' ),
		'not_found_in_trash' => _x( 'No productss found in Trash', 'products' ),
		'parent_item_colon' => _x( 'Parent Products:', 'products' ),
		'menu_name' => _x( 'Products', 'products' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'taxonomies' => array( 'product' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,


		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'product', $args );
}

// custom post type categories | product
register_taxonomy( 'categories',
	array (
		0 => 'product',
	),
	array( 
		'hierarchical' => true, 
		'label' => 'Product Categories',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => ''),
		'singular_label' => 'Product Category'
	) 
);

// no empty lines after this! ?>
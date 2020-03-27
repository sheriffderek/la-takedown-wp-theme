<?php


// register and call tinymce styles
function my_theme_add_editor_styles() {
	// add_editor_style( 'http://august.services/assets/august.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
  // Define the style_formats array
  $style_formats = array(
    // Each array child is a format with it's own settings

    array(
      'block'   => 'p',
      'title'   => 'Paragraph (default)',
      'classes' => 'p',
      'wrapper' => false
    ),
    array(
      'block'   => 'h1',
      'title'   => 'Heading 1',
      'classes' => 'h1',
      'wrapper' => false
    ),
    array(
      'block'   => 'h2',
      'title'   => 'Heading 2',
      'classes' => 'h2',
      'wrapper' => false
    ),
    array(
      'block'   => 'h3',
      'title'   => 'Heading 3',
      'classes' => 'h3',
      'wrapper' => false
    ),
    array(
      'block'   => 'h4',
      'title'   => 'Heading 4',
      'classes' => 'h4',
      'wrapper' => false
    ),
    array(
      'block'  => 'div',
      'title'   => 'book end',
      'classes' => 'book-end',
      'wrapper' => false
    ),
    array(
      'inline'  => 'span',
      'title'   => 'magic',
      'classes' => 'magic',
      'wrapper' => false
    )
  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



add_filter("mce_buttons", "tinymce_editor_buttons", 99); //targets the first line
add_filter("mce_buttons_2", "tinymce_editor_buttons_second_row", 99); //targets the second line

function tinymce_editor_buttons($buttons) {
return array(
    'styleselect',
    'bold',
    'italic',
    //'underline',
    'strikethrough',
    'bullist',
    'numlist',
    'blockquote',
    //'justifyleft',
    'justifycenter',
    //'justifyright',
    'link',
    'unlink',
    'wp_more',
    //'spellchecker',
    //'wp_fullscreen',
    //'wp_adv',
    //'separator',

    //'formatselect',

    //'justifyfull',
    //'forecolor',
    //'pastetext',
    //'pasteword',
    'removeformat',
    'charmap',
    // 'format',
    //'outdent',
    //'indent',
    //'undo',
    //'redo',
    //'wp_help'
  );
}

function tinymce_editor_buttons_second_row($buttons) {
  //return an empty array to remove this line
  return array(
    //'formatselect',
    // 'styleselect',
    // 'format',
    // 'wp_help',
  );
}







// no empty lines after this! ?>
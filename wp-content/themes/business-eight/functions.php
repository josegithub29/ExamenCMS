<?php 
add_action( 'wp_enqueue_scripts' , 'business_eight_script',999 );
function business_eight_script() {
	$parent_style = 'parent-style'; // Replace this with parent style handle.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'business-eight-style', get_stylesheet_uri(), array( $parent_style ) );
	wp_enqueue_style( 'business-eight-default', get_stylesheet_directory_uri() . '/css/default.css', array( $parent_style ));
}
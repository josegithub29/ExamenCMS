<?php
/*
 * enqueue scripts function
 */ 

if( !function_exists('radon_scripts'))
{
	function radon_scripts(){
		
		// radon stylesheets
		wp_enqueue_style('bootstrap', RADON_TEMPLATE_DIR_URI . '/css/bootstrap.css' );
		wp_enqueue_style('radon-style', get_stylesheet_uri() );
		wp_enqueue_style('font-awesome', RADON_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.css' );
		wp_enqueue_style('radon-default', RADON_TEMPLATE_DIR_URI . '/css/default.css' );
		wp_enqueue_style('radon-woocommerce', RADON_TEMPLATE_DIR_URI . '/css/woocommerce.css' );
		
		// radon js
		wp_enqueue_script( 'bootstrap' , RADON_TEMPLATE_DIR_URI . '/js/bootstrap.js' , array('jquery') );
		wp_enqueue_script( 'radon-custom' , RADON_TEMPLATE_DIR_URI . '/js/custom.js' );
		wp_enqueue_script( 'radon-menu' , RADON_TEMPLATE_DIR_URI . '/js/menu/menu.js' );
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );	
	}
}
add_action('wp_enqueue_scripts','radon_scripts');

add_action( 'customize_controls_enqueue_scripts', 'radon_customizer_enqueque_scripts' );
function radon_customizer_enqueque_scripts(){
	wp_enqueue_script( 'radon-customizer-js' , RADON_TEMPLATE_DIR_URI . '/js/radon_customizer.js' , array("jquery"), '20120206', true );
}

// media upload
function radon_upload_scripts()
{
	 wp_enqueue_media();	
	 wp_enqueue_script('media-upload');
     wp_enqueue_script('thickbox');
     wp_enqueue_script('upload_media_widget', RADON_TEMPLATE_DIR_URI . '/js/upload-media.js', array('jquery'));
	 wp_enqueue_style('thickbox');
	 wp_enqueue_style('radon-drag-drop',RADON_TEMPLATE_DIR_URI.'/css/drag-drop.css');
	 wp_enqueue_style('radon-about', RADON_TEMPLATE_DIR_URI . '/css/about-theme.css' );
}
add_action("admin_enqueue_scripts","radon_upload_scripts");
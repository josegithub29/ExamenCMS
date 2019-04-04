<?php 
/**
 * Radon functions and definitions
 *
 * @package WordPress
 * @subpackage radon
 * @since Radon 0.1
 */

/*
 * radon theme url variables defining
 */
 
define(
	'RADON_TEMPLATE_DIR_URI' ,
	get_template_directory_uri()
);	

define(
	'RADON_TEMPLATE_DIR' , 
	get_template_directory() 
);
	
define(
	'RADON_THEME_FUNCTIONS_PATH' , 
	RADON_TEMPLATE_DIR.'/functions'
);


/*
 * radon include config file
 */
  require( RADON_TEMPLATE_DIR.'/include/config.php');
  require( RADON_TEMPLATE_DIR.'/include/radon-about/welcome-screen.php');

 
if ( ! function_exists( 'radon_setup' ) ) :
function radon_setup(){
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'radon', get_template_directory() . '/lang' );
	
	
	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * This theme uses wp_nav_menu() in primary locations.
	 *
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'radon' ),
		'footer'  => __( 'Footer Menu', 'radon' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	/*
	 * Custom logo
	 * Add theme support for custom logo. https://codex.wordpress.org/Theme_Logo
	 */
	$args = array(
		'flex-width'  => true,
		'height'      => 39,
	);
	add_theme_support( 'custom-logo', $args );
	
	// Add custom header support. https://codex.wordpress.org/Custom_Headers
	$args = array(
		'width'        => 1600,
		'flex-width'   => true,
		'default-image' => get_template_directory_uri() . '/images/seprator.jpg',
		// Header text
		'header-text'   => false,
	);
	add_theme_support( 'custom-header', $args );
	
	$header_image = array(
			'library' => array(
				'url'           => get_template_directory_uri() . '/images/seprator.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/seprator.jpg',
				'description'   => 'Library Ceiling',
			),
		);
	register_default_headers( $header_image );
	
	// Add custom background support. https://codex.wordpress.org/Custom_Backgrounds
	add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
		)
	);
	
	/*
	 * woocommerce support
	 */
	add_theme_support( 'woocommerce' );
	
	/* WooCommerce support for latest gallery */
	if ( class_exists( 'WooCommerce' ) ) {
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
endif;  // radon_setup

add_action( 'after_setup_theme', 'radon_setup' );


// wp title       
function radon_title( $title, $sep )
{	
    global $paged, $page;
	
	if( is_home() ){
		return $title;
	}
	
	if ( is_feed() )
        return $title;
		
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
			
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'radon' ), max( $paged, $page ) );
		
		return $title;
}	

add_filter( 'wp_title', 'radon_title', 10,2 );


/**
 * Add appropriate classes to body tag.
 *
 */
function radon_a_body_classes( $classes ) {
	$radon_obj = new Radon_settings_array();
	$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );

	if ( $option['layout'] == true ) {
		$classes[] = 'boxed';
	}
	return $classes;
}

add_filter( 'body_class', 'radon_a_body_classes' );
<?php 
/*
 * Radon Sidebar Registers
 */
 add_action('widgets_init','radon_sidebar_function');
 function radon_sidebar_function(){
	 
	$radon_obj = new Radon_settings_array();
	$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );
	$contact_col = 12 / $option['contact_section_column'];
	
	register_sidebar( array(
	'name' => __( 'Primary Sidebar', 'radon' ),
	'id' => 'sidebar-primary',
	'description' => __( 'The primary widget area', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Home Page Service Contents', 'radon' ),
	'id' => 'sidebar-service',
	'description' => __( 'Drag service widget to show your services in home page.', 'radon' ),
	'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-4 widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="rdn-service-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Home Page Contact Sidebar', 'radon' ),
	'id' => 'homepage-contact',
	'description' => __( 'Drag contact widget to show contact informations.', 'radon' ),
	'before_widget' => '<div class="col-md-'.$contact_col.' col-sm-'.$contact_col.'" ><div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 1', 'radon' ),
	'id' => 'footer-1',
	'description' => __( 'The footer sidebar widget area 1', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 2', 'radon' ),
	'id' => 'footer-2',
	'description' => __( 'The footer sidebar widget area 2', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 3', 'radon' ),
	'id' => 'footer-3',
	'description' => __( 'The footer sidebar widget area 3', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Footer Sidebar 4', 'radon' ),
	'id' => 'footer-4',
	'description' => __( 'The footer sidebar widget area 4', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
	'name' => __( 'Woocommerce Sidebar', 'radon' ),
	'id' => 'sidebar-woocommerce',
	'description' => __( 'Woocommerce widget area', 'radon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	) );
 }
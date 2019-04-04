<?php
/*
 * include all fonts used by radon theme
 */
function radon_fonts_url() {
	
	$radon_obj = new Radon_settings_array();
	$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );
	
    $fonts_url = '';
		
    $font_families = array();
	
	$font_families[] = 'Poppins:100,300,400,500,600,700,900';
	$font_families[] = 'Raleway:100,300,400,500,600,700,900';
	
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}

function radon_fonts() {
	
    wp_enqueue_style( 'radon-fonts', radon_fonts_url(), array(), null );
	
}
add_action( 'wp_enqueue_scripts', 'radon_fonts' );
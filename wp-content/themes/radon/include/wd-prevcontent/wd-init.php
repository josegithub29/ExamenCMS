<?php
/**
 * allow this when we are in prev mode
 *
 * @return bool
 */
function radon_prevmode() {
	$wd_theme = wp_get_theme();
	$themename = $wd_theme ->get( 'TextDomain' );
	$activetheme = radon_get_raw_option( 'template' );
	return apply_filters( 'radon_prevmode', ( $activetheme != strtolower( $themename ) && ! is_child_theme() ) );
}

/**
 * options or a single option val
 *
 * @param string $option_name Option name.
 *
 * @return bool|mixed
 */
function radon_get_raw_option( $option_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $option_name ] ) ? maybe_unserialize( $alloptions[ $option_name ] ) : false;
}

/**
 * if we're on demo preview
 */
if ( radon_prevmode() ) {
	load_template( get_template_directory() . '/include/wd-prevcontent/wd-functions.php' );
}

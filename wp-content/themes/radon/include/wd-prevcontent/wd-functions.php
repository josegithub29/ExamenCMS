<?php
/**
 * Get a random images
 * @param int $i Maximum number of recalls.
 * @return mixed
 */
function radon_get_prevmode_img_src( $i = 0 ) {
	if ( 3 == $i ) {
		return '';
	}

	$path = get_template_directory() . '/include/wd-prevcontent/img/';

	if ( ! isset( $GLOBALS['prevcontent_img'] ) || empty( $GLOBALS['prevcontent_img'] ) ) {
		$imgs = array();
		$candidates = array();

		if ( is_dir( $path ) ) {
			$imgs = scandir( $path );
		}

		if ( ! $imgs || empty( $imgs ) ) {
			return array();
		}

		foreach ( $imgs as $img ) {
			if ( '.' === $img[0] || is_dir( $path . $img ) ) {
				continue;
			}
			$candidates[] = $img;
		}
		$GLOBALS['prevcontent_img'] = $candidates;
	}
	$candidates = $GLOBALS['prevcontent_img'];

	$rand_key = array_rand( $candidates );
	$img_name = $candidates[ $rand_key ];

	if ( ! file_exists( $path . $img_name ) ) {
		unset( $GLOBALS['prevdem_img'] );
		$i++;
		return radon_get_prevmode_img_src( $i );
	}

	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img , 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS['prevcontent_img'] = $new_candidates;
	return get_template_directory_uri() . '/include/wd-prevcontent/img/' . $img_name;
}

/**
 *thumbnail image
 * @param string $input Post thumbnail.
 */
function radon_the_post_thumbnail( $input ) {
	if ( empty( $input ) ) {
		$placeholder = radon_get_prevmode_img_src();
		return '<img src="' . esc_url( $placeholder ) . '">';
	}
	return $input;
}
add_filter( 'post_thumbnail_html', 'radon_the_post_thumbnail' );
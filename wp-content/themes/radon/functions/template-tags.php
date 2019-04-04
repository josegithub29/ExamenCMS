<?php 
/*
 * All themes functions
 *
 */

 
/*
 * radon featured image
 *
 */
if ( ! function_exists( 'radon_post_thumbnail' ) ) :
function radon_post_thumbnail() {
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );
	
	if( $option['blog_feature_image_enable'] == true ):

		if ( is_singular() ) :
		
			$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'default' );
			if ( ! empty( $post_thumbnail_url ) ) :
		?>
			<div class="rdn-featured-image">
				<?php echo $post_thumbnail_url; ?>
			</div>
		<?php
			endif;
			
		else : 
			
			$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'hestia-blog' );
			if ( ! empty( $post_thumbnail_url ) ) :
		?>
		<div class="rdn-featured-image">
			<a href="<?php the_permalink(); ?>" class="post-thumbnail" title="<?php the_title_attribute(); ?>">
				<?php echo $post_thumbnail_url; ?>
			</a>
		</div>
		<?php 
			endif;
			
		endif; // End is_singular()
		
	endif;
}
endif;

/*
 * radon meta
 *
 */
if ( ! function_exists( 'radon_post_meta' ) ) :
function radon_post_meta(){
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );
	
	if($option['blog_meta_enable']==true):
	?>
	<div class="entry-meta">
		<span class="author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php _e('Posted by: ','radon'); echo get_the_author_link();?></a></span>
		<span class="entry-date">
			<a href="<?php echo esc_url( get_month_link( get_post_time('Y') ,get_post_time('m') ) ); ?>">
				<?php _e('Posted on: ','radon'); echo esc_attr( get_the_date( get_option('date_format') ) ); ?>
			</a>
		</span>
		<?php the_tags( '<span class="tag-links">', ' , ', '</span>' ); ?>
	</div>
	<?php
	endif;
}
endif;


/**
 * Sets the content width in pixels.
 *
 * @global int $content_width
 */
function radon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'radon_content_width', 728 );
}
add_action( 'after_setup_theme', 'radon_content_width', 0 );

add_filter('get_avatar','radon_gravatar_class');
function radon_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-circle", $class);
    return $class;
}

if ( ! function_exists( 'radon_author_detail' ) ) :
function radon_author_detail(){
?>
<section class="blog-author">
	<div class="media">
		<div class="pull-left">
			<?php echo get_avatar( get_the_author_meta( 'ID') , 103); ?>
		</div>
		<div class="media-body">
			<h3 class="author-title"><?php the_author(); ?></h3>
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
	</div>
</section>
<?php 
}
endif;


if ( ! function_exists( 'radon_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 */
function radon_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
<?php 
/**
 * Template Name: Blog Full Width
 * This is custm blog full width page template file
 *
 * @package WordPress
 * @subpackage radon
 * @since Radon 0.1
 */
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );
get_header(); 
radon_breadcrumbs(); ?>
	
	<section class="rdn-main-content">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12">
				<?php 
				global $paged;
				$paged  = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
				$args = array( 'post_type' => 'post','paged'=>$paged);
				$loop = new WP_Query($args);
				
				if( $loop->have_posts() ):
					while( $loop->have_posts() ): $loop->the_post();
						get_template_part('content','');
					endwhile;
				else:
					get_template_part('content','none');
				endif;
									

				// pagination function
				?>
				<ul class="pagination">
					<li><?php previous_posts_link( __('Previous','radon') ); ?></li>
					<li><?php next_posts_link( __('Next','radon'), $loop->max_num_pages ); ?></li>
				</ul>
				<?php wp_reset_postdata(); ?>
				</div>
				
			</div>
		</div>
	</section><!-- .rdn-main-content -->
	
<?php get_footer(); ?>
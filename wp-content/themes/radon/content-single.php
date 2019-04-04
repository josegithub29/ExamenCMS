<?php 
/*
 * Display Blog details contents
 */
?>
<article id="<?php the_ID(); ?>" <?php post_class('post'); ?>>
		
		<?php $post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'default' );
			if ( ! empty( $post_thumbnail_url ) ) : ?>
		<div class="rdn-featured-image">
			<?php echo $post_thumbnail_url; ?>
		</div>
		<?php endif; ?>
		
		<div class="post-contents">
			<header class="entry-header">
				<?php 	
					if ( is_single() ) :
						the_title('<h2 class="entry-title">', '</h2>' );
					else:
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif; 
					?>
			</header>
			
			<?php radon_post_meta(); ?>
			
			<div class="entry-content">
				<?php 
				
				the_content();
				
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'radon' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'radon' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
				
				?>
			</div>
		</div>

</article>
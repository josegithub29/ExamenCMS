<?php
if( !function_exists('radon_breadcrumbs') ):
	function radon_breadcrumbs() { 
			
		global $post;
		$homeLink = home_url();
	?>
	<section class="rdn-sub-header" style="background-image: url(<?php header_image(); ?>);">
	<div class="rdn-sub-header-inner">
		<ul>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home','radon'); ?></a></li>
			<?php 
			
			if (is_home() || is_front_page()) :
			
				echo '<li>'.get_bloginfo( 'name' ).'</li>';
				
			else:
				
				// Blog Category
				if ( is_category() ) {
					echo '<li>' . __('Archive by category','radon').' "' . single_cat_title('', false) . '"</li>';

				// Blog Day
				} else if ( is_day() ) {
					echo '<li>'. get_the_time('Y') .'';
					echo '<li>'. get_the_time('F') .'';
					echo '<li>'. get_the_time('d') .'</li>';

				// Blog Month
				} else if ( is_month() ) {
					echo '<li>' . get_the_time('Y') . '';
					echo '<li>'. get_the_time('F') .'</li>';

				// Blog Year
				} else if ( is_year() ) {
					echo '<li>'. get_the_time('Y') .'</li>';

				// Single Post
				} 
				else if( is_archive() ){
					the_archive_title( '<li>', '</li>' );
				}
				else if ( is_single() && !is_attachment() ) {
										
					// Custom post type
					if ( get_post_type() == 'project' ) {
							$post_type = 'project';
							$tax = 'portfolio_categories'; 
							$term_args = array( 'hide_empty' => true);
							$tax_terms = get_terms($tax, $term_args);
							$cat = $tax_terms[0];
							if($cat){
								echo '<li>';
								echo get_category_parents($cat, TRUE, '');
								echo '</li>';
								echo '<li>'. get_the_title() .'</li>';
							}
						
					}
					else if( get_post_type() == 'post' ){
						$cat = get_the_category();
						$cat = $cat[0];
						if($cat){
							echo '<li>';
							echo get_category_parents($cat, TRUE, '');
							echo '</li>';
							echo '<li>'. get_the_title() .'</li>';
						}
					}
				}  
				else if ( is_page() && $post->post_parent ) {
					$parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						$breadcrumbs[] = '<li>' . get_the_title($page->ID) . '';
						$parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					foreach ($breadcrumbs as $crumb) echo $crumb;
					
					echo '<li>'. get_the_title() .'</li>';
				}
				elseif( is_search() )
				{
					echo '<li>'. get_search_query() .'</li>';
				}
				elseif( is_404() )
				{
					echo '<li>' . __('404 Error','radon') . '</li>';
				}
				else { 
					// Default
					echo '<li>'. get_the_title() .'</li>';
				}
			endif; 
			?>
		</ul>
	</div>
	</section><!-- .rdn-sub-header -->
	<div class="rdn-page-seperate"></div>
	<?php }
endif
?>
<?php
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() ); ?>

<?php if( $option['news_section_enable'] == true ) : ?>
	<section id="news" style="background:url('<?php echo esc_url( $option['news_section_image'] ); ?>') fixed center no-repeat <?php echo esc_attr( $option['news_section_backgorund_color'] ); ?>;">
		<div class="rdn-section-body">
			<div class="container">
			
				<div class="row">
				
					<?php if ( radon_prevmode() ) { echo '<h1 class="section-title wow animated fadeInUp">Customize blog title</h1>'; }else{ ?>
					<?php if($option['news_section_title']!=''): ?>
					<h2 class="section-title wow animated fadeInUp"><?php echo esc_html( $option['news_section_title'] ); ?></h2>
					<?php endif; } ?>
					
					<?php if ( radon_prevmode() ) { echo '<p class="section-desc wow animated fadeInUp">Change blog title and subtitle from customizer.</p>'; }else{ ?>
					<?php if($option['news_section_description']!=''): ?>
					<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $option['news_section_description'] ); ?></p>
					<?php endif; } ?>
				</div>
				
				<div class="row">
					<?php 
					$cat_id = $option['news_category_show'];
					$news_no_of_show = $option['news_no_of_show'];
					
					$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => absint( $cat_id ), 'posts_per_page' => absint( $news_no_of_show ) );
					$news_query = new WP_Query($args);
					$i=1;
					while($news_query->have_posts() ) : $news_query->the_post();
					?>
					<div class="col-md-4 col-sm-4">
						<div class="media rdn-home-news-area">
							
							<?php if( has_post_thumbnail() ): ?>
							<div class="home-news-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('full'); ?>
								</a>
								<span class="home-news-date"><strong><?php echo get_the_date('j'); ?></strong><?php echo get_the_date('M'); ?></span>
							</div>
							<?php endif; ?>
							
							<div class="home-news-body">
								<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="home-news-content">
								<?php 
								$more = '... <p><a class="more-link" href="'.get_the_permalink().'">Read More</a></p>';
								echo apply_filters( 'the_content', wp_trim_words( get_the_content(), 13, $more ) ); ?>
								</div>
							</div>
						</div>
					</div>
					<?php 
					if($i==3) { echo '<div class="clearfix"></div>'; $i=0; } $i++;
					endwhile;
					
					wp_reset_postdata();
					?>
				
			</div>
		</div>
	</section><!-- #rdn-home-news -->
<?php endif; ?>
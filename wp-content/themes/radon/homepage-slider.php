<?php 
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() );

$args = array( 'post_type' => 'post' , 'cat'=> absint( $option['slider_cat'] ) );
$loop = new WP_Query($args);
?>

<?php if ( radon_prevmode() ) { ?>
<section id="rdn-slider">
	<div id="main_Carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
		<ol class="carousel-indicators">
			<li data-target="#main_Carousel" data-slide-to="0" class="active"></li>
			<li data-target="#main_Carousel" data-slide-to="1" class=""></li>
		</ol>
		
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="<?php echo get_template_directory_uri(); ?>/images/slide1.jpg" alt="radon wordpress theme slide">
				<div class="carousel-caption">
					<h2 class="rdn-slider-title">Add slide title</h2>
					<p>Create a post and assign a category this post. and select category form slider setting in customizer.</p>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/images/slide2.jpg" alt="radon wordpress theme slide">
				<div class="carousel-caption">
					<h2 class="rdn-slider-title">Add slide title</h2>
					<p>Create a post and assign a category this post. and select category form slider setting in customizer.</p>
				</div>
			</div>
		</div>

	  <a class="left carousel-control" href="#main_Carousel" role="button" data-slide="prev">
		<span class="fa fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Previous','radon') ?></span>
	  </a>
	  <a class="right carousel-control" href="#main_Carousel" role="button" data-slide="next">
		<span class="fa fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Next','radon') ?></span>
	  </a>
	</div>
</section>
<?php } else { ?>

	<?php if($option['slider_enable']==true): ?>
		<section id="rdn-slider">
			<div id="main_Carousel" class="carousel slide <?php if( $option['slider_animation_type']=='fade' ){ echo 'carousel-' . esc_attr( $option['slider_animation_type'] ); } ?>" data-ride="carousel" data-interval="<?php echo esc_attr( $option['slider_speed']); ?>">
			  
			  <?php if( $loop->have_posts() ): ?>
			  <ol class="carousel-indicators">
				  <?php 
				  $s = 0;
				  while( $loop->have_posts() ) : $loop->the_post();
				  
					if( has_post_thumbnail() ):
					
				  ?>
					<li data-target="#main_Carousel" data-slide-to="<?php echo $s; ?>" class="<?php if($s==0){ echo 'active'; } $s++; ?>"></li>
				  <?php 
					endif;
					
				  endwhile; ?>
			  </ol>
			  <?php endif; ?>
			
			  <div class="carousel-inner" role="listbox">
			  <?php 
			  $i = 0;
			  while( $loop->have_posts() ) : $loop->the_post();
			  
				if( has_post_thumbnail() ):
			  ?>
				<div class="item <?php if($i==0){ echo 'active'; } $i++; ?>">
						
						<?php the_post_thumbnail(); ?>
						
						<div class="carousel-caption">
						
							<?php 
							
							the_title('<h2 class="rdn-slider-title">','</h2>'); 
							
							the_excerpt();
							
							?>
						</div>
				</div>
			  <?php 
				endif;
				
			  endwhile; ?>
			  </div>
			
			  <?php if( $loop->post_count > 1 ): ?>
			  <a class="left carousel-control" href="#main_Carousel" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only"><?php _e('Previous','radon') ?></span>
			  </a>
			  <a class="right carousel-control" href="#main_Carousel" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only"><?php _e('Next','radon') ?></span>
			  </a>
			  <?php endif; ?>
			
			</div>
		</section><!-- #rdn-slider -->
	<?php endif; ?>
	
<?php } ?>
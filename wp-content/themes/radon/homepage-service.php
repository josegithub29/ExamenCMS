<?php
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() ); 

global $wp_customize;
?>
<?php if($option['service_section_enable']==true): ?>
	<section id="service" style="background:url('<?php echo esc_url( $option['service_section_image'] ); ?>') fixed center no-repeat <?php echo esc_attr( $option['service_section_backgorund_color'] ); ?>;">
		<div class="rdn-section-body">
			<div class="container">
				<div class="row">
				
					<?php if ( radon_prevmode() ) { echo '<h1 class="section-title wow animated fadeInUp">Customize service title</h1>'; }else{ ?>
					<?php if($option['service_section_title']!=''): ?>
					<h2 class="section-title wow animated fadeInUp"><?php echo esc_html( $option['service_section_title'] ); ?></h2>
					<?php endif; } ?>
					
					<?php if ( radon_prevmode() ) { echo '<p class="section-desc wow animated fadeInUp">Change title and subtitle from customizer.</p>'; }else{ ?>
					<?php if($option['service_section_description']!=''): ?>
					<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $option['service_section_description'] ); ?></p>
					<?php endif; } ?>
				</div>
				
				<?php if ( radon_prevmode() ) {
					echo '<div class="row sidebar-service">
							<div class="col-md-4 col-sm-6 widget">
							<div class="rdn-service-area">
								<div class="rdn-service-icon-area">
									<a class="rdn-service-icon" href="#"><i class="fa fa-desktop"></i></a>
								</div>
								<h3 class="rdn-service-title"><a href="#">Web Design</a></h3>
								<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>
									<a class="rdn-service-btn" href="#">Read More</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 widget">
							<div class="rdn-service-area">
								<div class="rdn-service-icon-area">
									<a class="rdn-service-icon" href="#"><i class="fa fa-code"></i></a>
								</div>
								<h3 class="rdn-service-title"><a href="#">Web Development</a></h3>
								<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>
								<a class="rdn-service-btn" href="#">Read More</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 widget">
							<div class="rdn-service-area">
								<div class="rdn-service-icon-area">
									<a class="rdn-service-icon" href="#"><i class="fa fa-search"></i></a>
								</div>
								<h3 class="rdn-service-title"><a href="#">Seo Analisys</a></h3>
								<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>
								<a class="rdn-service-btn" href="#">Read More</a>
							</div>
						</div>			
				</div>';
				}else{ ?>
				<?php if( is_active_sidebar('sidebar-service') ) : ?>
				<div class="row sidebar-service">
					<?php dynamic_sidebar('sidebar-service'); ?>
				</div>
				<?php endif; } ?>
				
			</div>
		</div>
	</section><!-- #rdn-services -->
<?php endif; ?>
<?php
$radon_obj = new Radon_settings_array();
$option = wp_parse_args(  get_option( 'radon_option', array() ), $radon_obj->default_data() ); ?>

<?php if($option['contact_section_enable']==true): ?>
	<section id="contact">
		<div class="container">
			
			<div class="row">
			
				<?php if ( radon_prevmode() ) { echo '<h1 class="section-title wow animated fadeInUp">Get In Touch</h1>'; }else{ ?>
				<?php if($option['contact_section_title']!=''): ?>
				<h2 class="section-title wow animated fadeInUp"><?php echo esc_html( $option['contact_section_title'] ); ?></h2>
				<?php endif; } ?>
				
				<?php if ( radon_prevmode() ) { echo '<p class="section-desc wow animated fadeInUp">Add your contact information here.</p>'; }else{ ?>
				<?php if($option['contact_section_description']!=''): ?>
				<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $option['contact_section_description'] ); ?></p>
				<?php endif; } ?>
			</div>
			
			<?php if ( radon_prevmode() ) { 
			echo '<div class="row home_contact_info">
				<div class="col-md-4 text-center">
					<p><label class="cont_label">Address : </label>&nbsp;<span class="cont_span"> 5801 Marmora Road, Glasgow, S04 58GR.</span></p>
				</div>
				<div class="col-md-4 text-center">
					<p><label class="cont_label">Phone : </label>&nbsp;<span class="cont_span"> +91 456 7890 333 , +1 800 603 6035</span></p>
				</div>
				<div class="col-md-4 text-center">
					<p><label class="cont_label">Email : </label>&nbsp;<span class="cont_span"> info@example.com</span></p>
				</div>
			</div>'; } else { ?>
			<?php if( is_active_sidebar('homepage-contact') ) : ?>
			<div class="row home_contact_info">
				<?php dynamic_sidebar('homepage-contact'); ?>
			</div>
			<?php endif; } ?>
		</div>
	</section><!-- #rdn-contact -->
<?php endif; ?>
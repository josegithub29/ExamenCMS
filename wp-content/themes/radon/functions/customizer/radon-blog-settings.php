<?php 
function radon_blog_settings_fucntion( $wp_customize ){

	/* BLOG SETTINGS */
	// $wp_customize->add_panel( 'blogsettings', array(
		// 'priority'       => 141,
		// 'capability'     => 'edit_theme_options',
		// 'title'      => __('Blogs Settings', 'radon'),
	// ) );
		
		/* Blog Settings Sections */
		$wp_customize->add_section( 'blogsettingssection' , array(
			'title'      => __('Blogs Settings', 'radon'),
			//'panel'  => 'blogsettings'
		) );
			
			// enable feature image
			$wp_customize->add_setting( 'radon_option[blog_feature_image_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[blog_feature_image_enable]' , array(
			'label' => __('Show Featured Image','radon'),
			'description' => __('Check this setting to show featured images in posts.','radon'),
			'section' => 'blogsettingssection',
			'type'=>'checkbox',
			) );
			
			// enable post meta
			$wp_customize->add_setting( 'radon_option[blog_meta_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[blog_meta_enable]' , array(
			'label' => __('Show post meta','radon'),
			'description' => __('Check this setting to show post meta in posts.','radon'),
			'section' => 'blogsettingssection',
			'type'=>'checkbox',
			) );
}
add_action( 'customize_register', 'radon_blog_settings_fucntion' );
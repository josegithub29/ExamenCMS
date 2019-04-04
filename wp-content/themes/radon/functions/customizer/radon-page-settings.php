<?php 
function radon_page_settings_fucntion( $wp_customize ){

	/* PAGE SETTINGS */
	// $wp_customize->add_panel( 'pagesettings', array(
		// 'priority'       => 142,
		// 'capability'     => 'edit_theme_options',
		// 'title'      => __('Page Settings', 'radon'),
	// ) );
		
		/* PAGE Settings Sections */
		$wp_customize->add_section( 'pagesettingssection' , array(
			'title'      => __('Page Settings', 'radon'),
			//'panel'  => 'pagesettings'
		) );
			
			// enable feature image
			$wp_customize->add_setting( 'radon_option[page_feature_image_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[page_feature_image_enable]' , array(
			'label' => __('Show featured image','radon'),
			'description' => __('Check this setting to show featured image of pages.','radon'),
			'section' => 'pagesettingssection',
			'type'=>'checkbox',
			) );
			
			// enable post meta
			$wp_customize->add_setting( 'radon_option[page_meta_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[page_meta_enable]' , array(
			'label' => __('Show Post Meta','radon'),
			'description' => __('Check this setting to display post meta in pages.','radon'),
			'section' => 'pagesettingssection',
			'type'=>'checkbox',
			) );
}
add_action( 'customize_register', 'radon_page_settings_fucntion' );
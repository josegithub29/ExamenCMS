<?php 
function radon_genral_settings_fucntion( $wp_customize ){

	/* GENRAL SETTINGS */
	$wp_customize->add_panel( 'general_settings', array(
		'priority'       => 125,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'radon'),
	) );
		
		/* Top Header */
		$wp_customize->add_section( 'top_header' , array(
			'title'      => __('Top Header', 'radon'),
			'panel'  => 'general_settings'
		) );
	
			// header left icon1
			$wp_customize->add_setting( 'radon_option[header-left-icon1]' , array(
			'default'    => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-left-icon1]' , array(
			'label' => __('Top Header Icon 1','radon'),
			'description'=> 'Add your icon like: fa-mobile <a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank"> click here! </a>',
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => 'fa-mobile',
			),
			) );
			
			// header left text1
			$wp_customize->add_setting( 'radon_option[header-left-text1]' , array(
			'default'    => '+91 456 7890 333',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-left-text1]' , array(
			'label' => __('Top Header Text 1','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('+222 3333','radon'),
			)
			) );
			
			// header left icon2
			$wp_customize->add_setting( 'radon_option[header-left-icon2]' , array(
			'default'    => 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));

			$wp_customize->add_control('radon_option[header-left-icon2]' , array(
			'label' => __('Top Header Icon 2','radon'),
			'description'=> 'Add your icon like: fa-facebook <a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">click here!</a>',
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('fa-envelope','radon'),
			)
			) );
			
			// header left text2
			$wp_customize->add_setting( 'radon_option[header-left-text2]' , array(
			'default'    => 'info@radon.com',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-left-text2]' , array(
			'label' => __('Top Header Text 2','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('info@example.com','radon'),
			)
			) );
			
			// facebook url
			$wp_customize->add_setting( 'radon_option[header-facebook-url]' , array(
			'default'    => '#',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-facebook-url]' , array(
			'label' => __('Header Facebook URL','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('Facebook URL','radon'),
			),
			) );
			
			// twitter url
			$wp_customize->add_setting( 'radon_option[header-twitter-url]' , array(
			'default'    => '#',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-twitter-url]' , array(
			'label' => __('Header Twitter URL','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('Twitter URL','radon'),
			),
			) );
			
			// linkedin url
			$wp_customize->add_setting( 'radon_option[header-linkedin-url]' , array(
			'default'    => '#',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-linkedin-url]' , array(
			'label' => __('Header Linked In URL','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('Linked-In URL','radon'),
			),
			) );
			
			// googleplus url
			$wp_customize->add_setting( 'radon_option[header-googleplus-url]' , array(
			'default'    => '#',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-googleplus-url]' , array(
			'label' => __('Header Google Plus URL','radon'),
			'section' => 'top_header',
			'type'=>'text',
			'input_attrs' => array(
				'placeholder' => __('Google+ URL','radon'),
			),
			) );
			
			// open window
			$wp_customize->add_setting( 'radon_option[header-social-target]' , array(
			'default'    => false,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[header-social-target]' , array(
			'label' => __('Enable Target','radon'),
			'description' => __('Check this setting to open window in new tab.','radon'),
			'section' => 'top_header',
			'type'=>'checkbox',
			) );
			
			// hide top header
			$wp_customize->add_setting( 'radon_option[top-header-hide]' , array(
			'default'    => false,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[top-header-hide]' , array(
			'label' => __('Hide Top Header bar','radon'),
			'description' => __('Check this for hiding top header bar that shows before navigation menus.','radon'),
			'section' => 'top_header',
			'type'=>'checkbox',
			) );
			
		/* Boxed Layout */
		$wp_customize->add_section( 'layout_section' , array(
			'title'      => __('Layout Settings', 'radon' ),
			'panel'  => 'general_settings'
		) );
		
			// boxed layout settings
			$wp_customize->add_setting( 'radon_option[layout]' , array(
			'default'    => false,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[layout]' , array(
			'label' => __('Boxed Layout','radon' ),
			'description' => __('Check this setting to show your website with boxed layout.','radon' ),
			'section' => 'layout_section',
			'type'=>'checkbox',
			) );
			
		/* footer settings */
		$wp_customize->add_section( 'footer_settings' , array(
			'title'      => __('Footer Settings', 'radon'),
			'panel'  => 'general_settings'
		) );
		
			// footer copyright
			$wp_customize->add_setting( 'radon_option[footer_copyright]' , array(
			'default'    => '',
			'type'=>'option',
			'sanitize_callback' => 'radon_sanitize_text',
			));

			$wp_customize->add_control('radon_option[footer_copyright]' , array(
			'label' => __('Footer Copyright Text','radon'),
			'description' => __('Add your credit text or link in bottom of footer area.','radon'),
			'section' => 'footer_settings',
			'type'=>'text',
			) );
			
			// footer social icon enable / disable
			$wp_customize->add_setting( 'radon_option[footer_socialicon_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[footer_socialicon_enable]' , array(
			'label' => __('Show Social Icons','radon'),
			'description' => __('Check this setting for show social icons in footer part that display bottom of footer widgets.','radon'),
			'section' => 'footer_settings',
			'type'=>'checkbox',
			) );
			
			// footer social icon title
			$wp_customize->add_setting( 'radon_option[footer_socialicon_title]' , array(
			'default'    => '',
			'type'=>'option',
			'sanitize_callback' => 'radon_sanitize_text',
			));

			$wp_customize->add_control('radon_option[footer_socialicon_title]' , array(
			'label' => __('Footer social icon title','radon'),
			'description' => __('Enter text for footer social icons title','radon'),
			'section' => 'footer_settings',
			'type'=>'text',
			) );
			
			// footer menus
			$wp_customize->add_setting( 'radon_option[footer_menu]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[footer_menu]' , array(
			'label' => __('Enable Footer Menu','radon'),
			'description' => __('Check this setting to show footer menu links.','radon'),
			'section' => 'footer_settings',
			'type'=>'checkbox',
			) );
}
add_action( 'customize_register', 'radon_genral_settings_fucntion' );

/*
 * radon sanitize text function
 */
function radon_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*
 * radon sanitize checkbox function
 */
function radon_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

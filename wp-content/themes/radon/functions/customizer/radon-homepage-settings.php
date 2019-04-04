<?php 

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
 class radon_category_dropdown_custom_control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
									
									
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
 
function radon_slider_sanitize( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
    return $value;
}
	
function radon_homepage_settings_fucntion( $wp_customize ){

	/* SLIDER SETTINGS */
	$wp_customize->add_panel( 'slider_panel', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home Page Slider Section', 'radon'),
	) );
	
	
		/* Slider Settings */
		$wp_customize->add_section( 'slider_setting' , array(
			'title'      => __('Settings', 'radon'),
			'panel'  => 'slider_panel',
			'description'=> '<p>Create a post ( <a target="_blank" href="'.admin_url('post-new.php').'">link</a> ) and assign it a category. and select below slider content setting to choose your slider category.</p>',
		) );
	
			// slider enable
			$wp_customize->add_setting( 'radon_option[slider_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[slider_enable]' , array(
			'label' => __('Enable Slider','radon'),
			'section' => 'slider_setting',
			'type'=>'checkbox',
			) );
			
			// slider animation type
			$wp_customize->add_setting( 'radon_option[slider_animation_type]' , array(
			'default'    => 'slide',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[slider_animation_type]' , array(
			'label' => __('Slider Animation Type','radon'),
			'section' => 'slider_setting',
			'type'=>'select',
			'choices'=>array(
				'slide'=>'Slide',
				'fade'=>'Fade',
			),
			) );
			
			// slider speed
			$wp_customize->add_setting( 'radon_option[slider_speed]' , array(
			'default'    => 3000,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[slider_speed]' , array(
			'label' => __('Slider Speed','radon'),
			'section' => 'slider_setting',
			'type'=>'select',
			'choices'=>array(
				500 => 500,
				1000 => 1000,
				2000 => 2000,
				3000 => 3000,
				4000 => 4000,
				5000 => 5000,
				6000 => 6000,
				7000 => 7000,
				8000 => 8000,
				9000 => 9000,
				10000 => 10000,
			),
			) );
			
		/* Slider Slides */
		$wp_customize->add_section( 'slider_slide' , array(
			'title'      => __('Slider Content', 'radon'),
			'panel'  => 'slider_panel'
		) );
		
			// slider cat
			$wp_customize->add_setting('radon_option[slider_cat]',array(
			'default' => 1,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'radon_slider_sanitize',
			'type'=>'option',
			) );
			
			$wp_customize->add_control( new radon_category_dropdown_custom_control( $wp_customize, 'radon_option[slider_cat]', array(
			'label'   => __('Select category to show slides','radon'),
			'section' => 'slider_slide',
			'settings'   =>  'radon_option[slider_cat]',
			) ) );
			
			
		
	/* SERVICE SETTINGS */
	$wp_customize->add_panel( 'service_panel', array(
		'priority'       => 128,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home Page Service Section', 'radon'),
	) );
	
		/* Service Settings */
		$wp_customize->add_section( 'service_settings' , array(
			'title'      => __('Service Settings', 'radon'),
			'panel'  => 'service_panel',
			'priority'       => 1,
			'description'=> '<p>Add your service in fornt page. <br/> Go To back and select <strong>Home Page Service section</strong> and add a <strong>service widget</strong> and fill it your service information. and add more service by just add a new <strong>service widget</strong>.</p>',
		) );
			
			// service section enable/disable
			$wp_customize->add_setting( 'radon_option[service_section_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[service_section_enable]' , array(
			'label' => __('Enable Service Section','radon'),
			'section' => 'service_settings',
			'type'=>'checkbox',
			) );
		
		/* Service header */
		$wp_customize->add_section( 'service_header' , array(
			'title'      => __('Section Header', 'radon'),
			'panel'  => 'service_panel',
			'priority'       => 2,
		) );
		
			// service section title
			$wp_customize->add_setting( 'radon_option[service_section_title]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[service_section_title]' , array(
			'label' => __('Service Section Title','radon'),
			'section' => 'service_header',
			'type'=>'text',
			) );
			
			// service section description
			$wp_customize->add_setting( 'radon_option[service_section_description]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[service_section_description]' , array(
			'label' => __('Service Section Description','radon'),
			'section' => 'service_header',
			'type'=>'text',
			) );
			
		/* Service background */
		$wp_customize->add_section( 'service_background' , array(
			'title'      => __('Section Background', 'radon'),
			'panel'  => 'service_panel',
			'priority'       => 3,
		) );
			
			// service section background color
			$wp_customize->add_setting( 'radon_option[service_section_backgorund_color]' , array(
			'default'    => '#ffffff',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'radon_option[service_section_backgorund_color]' , array(
			'label' => __('Section Background Color','radon'),
			'section' => 'service_background',
			'settings'=>'radon_option[service_section_backgorund_color]'
			) ) );
			
			// service section image
			$wp_customize->add_setting( 'radon_option[service_section_image]' , array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'radon_option[service_section_image]' ,
			array(
			'label'          => __( 'Service Section Image', 'radon' ),
			'description'=> __('Upload your background image minimum size ( 1600 x 900 ).','radon'),
			'section'        => 'service_background',
		    ) )	);
	
	/* NEWS SETTINGS */
	$wp_customize->add_panel( 'news_panel', array(
		'priority'       => 129,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home Page News Section', 'radon'),
	) );
	
		/* News Settings */
		$wp_customize->add_section( 'news_settings' , array(
			'title'      => __('Settings', 'radon'),
			'panel'  => 'news_panel',
			'description'=> '<p>Go To back and select <strong>Section Contacts Setting</strong> and select news category for fornt page.</p>',
		) );

			// news section enable/disable
			$wp_customize->add_setting( 'radon_option[news_section_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[news_section_enable]' , array(
			'label' => __('Enable News Section','radon'),
			'section' => 'news_settings',
			'type'=>'checkbox',
			) );
		
		/* section header */
		$wp_customize->add_section( 'news_header' , array(
			'title'      => __('Section Header', 'radon'),
			'panel'  => 'news_panel'
		) );
		
			// news section title
			$wp_customize->add_setting( 'radon_option[news_section_title]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[news_section_title]' , array(
			'label' => __('News Section Title','radon'),
			'section' => 'news_header',
			'type'=>'text',
			) );
			
			// news section description
			$wp_customize->add_setting( 'radon_option[news_section_description]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[news_section_description]' , array(
			'label' => __('News Section Description','radon'),
			'section' => 'news_header',
			'type'=>'text',
			) );
			
		/* section content */
		$wp_customize->add_section( 'news_content' , array(
			'title'      => __('Section Contents', 'radon'),
			'panel'  => 'news_panel'
		) );
			
			// news no of show
			$wp_customize->add_setting( 'radon_option[news_no_of_show]' , array(
			'default'    => 4,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[news_no_of_show]' , array(
			'label' => __('News No Of Show','radon'),
			'section' => 'news_content',
			'type'=>'number',
			) );
			
			// news category show
			$wp_customize->add_setting( 'radon_option[news_category_show]' , array(
			'default'    => 1,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[news_category_show]' , array(
			'label' => __('News Category Show','radon'),
			'section' => 'news_content',
			'type'=>'select',
			'choices'=> radon_get_post_category(),
			) );
			
		/* section background */
		$wp_customize->add_section( 'news_background' , array(
			'title'      => __('Section Background', 'radon'),
			'panel'  => 'news_panel'
		) );
		
			// news section background color
			$wp_customize->add_setting( 'radon_option[news_section_backgorund_color]' , array(
			'default'    => '#e8e8e8',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'radon_option[news_section_backgorund_color]' , array(
			'label' => __('Section Background Color','radon'),
			'section' => 'news_background',
			'settings'=>'radon_option[news_section_backgorund_color]'
			) ) );
			
			// News section image
			$wp_customize->add_setting( 'radon_option[news_section_image]' , array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'radon_option[news_section_image]' ,
			array(
			'label'          => __( 'News Section Image', 'radon' ),
			'section'        => 'news_background',
			'description'=> __('Upload your background image minimum size ( 1600 x 900 ).','radon'),
		    ) )	);
	
	/* CONTACT SETTINGS */
	$wp_customize->add_panel( 'contact_panel', array(
		'priority'       => 134,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home Page Contact Section', 'radon'),
	) );
	
		/* Contact Settings */
		$wp_customize->add_section( 'contact_settings' , array(
			'title'      => __('Settings', 'radon'),
			'panel'  => 'contact_panel',
			'priority'       => 1,
			'description'=> '<p>Go To back and select <strong>Home Page Contact Sidebar</strong> and add a <strong>Contact Info Widget</strong> to show your contact information on your front page.</p>',
		) );
			
			// Contact section enable/disable
			$wp_customize->add_setting( 'radon_option[contact_section_enable]' , array(
			'default'    => true,
			'sanitize_callback' => 'radon_sanitize_checkbox',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[contact_section_enable]' , array(
			'label' => __('Enable Contact Section','radon'),
			'section' => 'contact_settings',
			'type'=>'checkbox',
			) );
			
			// Contact widget column layout
			$wp_customize->add_setting( 'radon_option[contact_section_column]' , array(
			'default'    => 3,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[contact_section_column]' , array(
			'label' => __('Column Layout','radon'),
			'section' => 'contact_settings',
			'type'=>'select',
			'choices'=>array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
			) ) );
		
		/* Contact header */
		$wp_customize->add_section( 'contact_header' , array(
			'title'      => __('Contact Header', 'radon'),
			'panel'  => 'contact_panel',
			'priority'       => 2,
		) );
		
			// Contact section title
			$wp_customize->add_setting( 'radon_option[contact_section_title]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[contact_section_title]' , array(
			'label' => __('Contact Section Title','radon'),
			'section' => 'contact_header',
			'type'=>'text',
			) );
			
			// Contact section description
			$wp_customize->add_setting( 'radon_option[contact_section_description]' , array(
			'default'    => '',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control('radon_option[contact_section_description]' , array(
			'label' => __('Contact Section Description','radon'),
			'section' => 'contact_header',
			'type'=>'text',
			) );
}
add_action( 'customize_register', 'radon_homepage_settings_fucntion' );

function radon_get_post_category(){
	$cats = get_categories();
	$arr = array();
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}

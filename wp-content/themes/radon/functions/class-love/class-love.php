<?php 
/*
 * Radon settings 
 */
class Radon_settings_array {

	function default_data(){
		return array(
		
		/* GENRAL SETTINGS */
		'header-left-icon1'=>'',
		'header-left-text1'=>'',
		'header-left-icon2'=>'',
		'header-left-text2'=>'',
		'header-facebook-url'=>'',
		'header-twitter-url'=>'',
		'header-linkedin-url'=>'',
		'header-googleplus-url'=>'',
		'header-social-target'=>false,
		'top-header-hide'=>false,
		'layout'=>false,
		
		'footer_copyright'=> '',
		'footer_socialicon_enable'=> false,
		'footer_socialicon_title'=> '',
		'footer_menu'=> true,
		'theme_color'=>'#1a61cb',
		'custom_color_enable'=>false,
		
		/* HOME PAGE SETTINGS */
		'slider_enable'=> true,
		'slider_animation_type'=> 'slide',
		'slider_speed'=> 3000,
		'slider_cat'=> 1,
		
		/* HOME PAGE SERVICE SETTINGS */
		'service_section_backgorund_color'=> '#ffffff',
		'service_section_image'=> '',
		'service_section_enable'=>true,
		'service_section_title'=>'',
		'service_section_description'=>'',
		
		/* HOME PAGE NEWS SETTINGS */
		'news_section_backgorund_color'=> '#e8e8e8',
		'news_section_image'=> '',
		'news_section_enable'=>true,
		'news_section_title'=>'',
		'news_section_description'=>'',
		'news_no_of_show'=>4,
		'news_category_show'=>1,
		
		/* HOME PAGE CONTACT SETTINGS */
		'contact_section_enable'=> true,
		'contact_section_column'=> 3,
		'contact_section_title'=>'',
		'contact_section_description'=>'',
		
		/* BLOGS SETTINGS */
		'blog_feature_image_enable'=>true,
		'blog_meta_enable'=>true,
		
		/* PAGE SETTINGS */
		'page_feature_image_enable'=>true,
		'page_meta_enable'=>true,
		
		);
	}
}
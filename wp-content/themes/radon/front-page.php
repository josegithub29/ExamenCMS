<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
if( is_front_page() && is_home() ){
	get_header();

		get_template_part('homepage','slider');

		get_template_part('homepage','service');
		
		get_template_part('homepage','news');
		 
		get_template_part('homepage','contact');
			
	get_footer();
}else{
	include( get_page_template() );
}
?>
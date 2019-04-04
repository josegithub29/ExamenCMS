<?php
/**
 * Welcome Screen Class
 */
class radon_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'radon_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'radon_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'radon_style_and_scripts' ) );

		/* enqueue script for customizer */
		//add_action( 'customize_controls_enqueue_scripts', array( $this, 'radon_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'radon_info_screen', array( $this, 'radon_getting_started' ), 	    10 );
		//add_action( 'radon_info_screen', array( $this, 'radon_import_data' ), 			20 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_radon_dismiss_required_action', array( $this, 'radon_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_radon_dismiss_required_action', array($this, 'radon_dismiss_required_action_callback') );

	}

	public function radon_register_menu() {
		add_theme_page( 'About radon Theme', 'About Radon Theme', 'activate_plugins', 'radon-about', array( $this, 'radon_welcome_screen' ) );
	}

	public function radon_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			//add_action( 'admin_notices', array( $this, 'radon_admin_notice' ), 99 );
			//add_action( 'admin_notices', array( $this, 'radon_admin_import_notice' ), 99 );
			
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function radon_admin_notice() {
		?>
			<div class="updated notice notice-success notice-alt is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing radon Theme! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'radon' ), '<a href="' . esc_url( admin_url( 'themes.php?page=radon-about' ) ) . '">', '</a>' ); ?></p>
			</div>
		<?php
	}
	
	function radon_admin_import_notice(){
    ?>
    <div class="updated notice notice-success notice-alt is-dismissible">
        <p><?php printf( esc_html__( 'Save time by importing our demo data and make your site ready in minutes. %s', 'radon' ), '<a class="button button-secondary" href="'.esc_url( add_query_arg( array( 'page' => 'radon-about&tab=demo_import' ), admin_url( 'themes.php' ) ) ).'">'.esc_html__( 'Import Demo Data', 'radon' ).'</a>'  ); ?></p>
    </div>
    <?php
}

	/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function radon_style_and_scripts( $hook_suffix ) {
		
		if ( 'appearance_page_radon-about' == $hook_suffix ) {
			
			
			wp_enqueue_style( 'radon-about-css', get_template_directory_uri() . '/include/radon-about/css/bootstrap.css' );
			
			wp_enqueue_style( 'radon-about-screen-css', get_template_directory_uri() . '/include/radon-about/css/welcome.css' );

			wp_enqueue_script( 'radon-about-screen-js', get_template_directory_uri() . '/include/radon-about/js/welcome.js', array('jquery') );

			global $radon_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('radon_show_required_actions') ):
				$radon_show_required_actions = get_option('radon_show_required_actions');
			else:
				$radon_show_required_actions = array();
			endif;

			if( !empty($radon_required_actions) ):
				foreach( $radon_required_actions as $radon_required_action_value ):
					if(( !isset( $radon_required_action_value['check'] ) || ( isset( $radon_required_action_value['check'] ) && ( $radon_required_action_value['check'] == false ) ) ) && ((isset($radon_show_required_actions[$radon_required_action_value['id']]) && ($radon_show_required_actions[$radon_required_action_value['id']] == true)) || !isset($radon_show_required_actions[$radon_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'radon-about-screen-js', 'radonLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','radon' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @sfunctionse  1.8.2.4
	 */
	public function radon_scripts_for_customizer() {

		wp_enqueue_style( 'radon-about-screen-customizer-css', get_template_directory_uri() . '/include/radon-about/css/welcome_customizer.css' );
		wp_enqueue_script( 'radon-about-screen-customizer-js', get_template_directory_uri() . '/include/radon-about/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $radon_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('radon_show_required_actions') ):
			$radon_show_required_actions = get_option('radon_show_required_actions');
		else:
			$radon_show_required_actions = array();
		endif;

		if( !empty($radon_required_actions) ):
			foreach( $radon_required_actions as $radon_required_action_value ):
				if(( !isset( $radon_required_action_value['check'] ) || ( isset( $radon_required_action_value['check'] ) && ( $radon_required_action_value['check'] == false ) ) ) && ((isset($radon_show_required_actions[$radon_required_action_value['id']]) && ($radon_show_required_actions[$radon_required_action_value['id']] == true)) || !isset($radon_show_required_actions[$radon_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'radon-about-screen-customizer-js', 'radonLiteWelcomeScreenObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=radon-about#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','radon'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @sfunctionse 1.8.2.4
	 */
	public function radon_dismiss_required_action_callback() {

		global $radon_required_actions;

		$radon_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $radon_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($radon_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('radon_show_required_actions') ):

				$radon_show_required_actions = get_option('radon_show_required_actions');

				$radon_show_required_actions[$radon_dismiss_id] = false;

				update_option( 'radon_show_required_actions',$radon_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$radon_show_required_actions_new = array();

				if( !empty($radon_required_actions) ):

					foreach( $radon_required_actions as $radon_required_action ):

						if( $radon_required_action['id'] == $radon_dismiss_id ):
							$radon_show_required_actions_new[$radon_required_action['id']] = false;
						else:
							$radon_show_required_actions_new[$radon_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'radon_show_required_actions', $radon_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @sfunctionse 1.8.2.4
	 */
	public function radon_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		
		$tab = null;
		if ( isset( $_GET['tab'] ) ) {
			$tab = sanitize_text_field( $_GET['tab'] );
		} else {
			$tab = null;
		}
		?>
		<div class="radon_wrap">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
					<?php 
					$theme_data = wp_get_theme('radon');
					?>
					<h1><?php printf(esc_html__('Welcome to Radon - Version %1s', 'radon'), $theme_data->Version ); ?></h1>
					<div class="about-text">
					<?php esc_html_e( 'Radon is a responsive WordPress theme with multipurpose design. it will enable you to create almost any type of website such a blog, portfolio, business website, consultency, photography, responsive, RTL & translation ready, favicon icon, logo feature, slider, service, blog, best SEO practices, unique WooCommerce features to increase conversion and much more, Radon provides all the construction blocks you need to rapidly create an engaging front page.', 'radon' ); ?>
					</div>
					<a target="_blank" href="<?php echo esc_url('http://webdzier.com'); ?>" class="webdzier-badge wp-badge"><span>Webdzier</span></a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<h2 class="nav-tab-wrapper">
							<a href="?page=radon-about" class="nav-tab <?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Radon','radon'); ?></a>
							<a href="?page=radon-about&tab=free_pro" class="nav-tab <?php echo $tab == 'free_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free vs Pro','radon'); ?></a>
							<!--<a href="?page=radon-about&tab=demo_import" class="nav-tab <?php // echo $tab == 'demo_import' ? ' nav-tab-active' : null; ?>"><?php //esc_html_e( 'One Click Demo Import','radon'); ?></a>-->
						</h2>
					</div>
				</div>

				<div class="radon-tab-content">
					<?php do_action( 'radon_info_screen' ); ?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 */
	public function radon_getting_started() {
		require_once( get_template_directory() . '/include/radon-about/sections/getting-started.php' );
	}

	/**
	 * Import Data
	 *
	 */
	public function radon_import_data() {
		require_once( get_template_directory() . '/include/radon-about/sections/import-data.php' );
	}
	
	
	
}

$GLOBALS['radon_screen'] = new radon_screen();
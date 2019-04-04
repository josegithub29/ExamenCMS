<?php
class radon_customize_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof radon_customize_import_dummy_data ) ) {
			self::$instance = new radon_customize_import_dummy_data;
			self::$instance->radon_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function radon_setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'radon_customize_register' ) );

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'radon_import_customize_scripts' ), 0 );

	}

	public function radon_import_customize_scripts() {

		wp_enqueue_script( 'radon-import-customizer-js', get_template_directory_uri() . '/js/radon-import-customizer.js', array( 'customize-controls' ) );
	}

	public function radon_customize_register( $wp_customize ) {

		require_once get_template_directory() . '/functions/customizer/custom_control/class-dummy-import-control.php';
		
		$wp_customize->register_section_type( 'radon_dummy_import' );

		$wp_customize->add_section(
			new radon_dummy_import(
				$wp_customize,
				'radon_import_section',
				array(
					'priority' => 0,
				)
			)
		);

	}
}

$import_customizer = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
radon_customize_import_dummy_data::init( apply_filters( 'radon_import_customizer', $import_customizer ) );

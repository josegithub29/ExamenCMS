<?php 

$tab = null;
if ( isset( $_GET['tab'] ) ) {
	$tab = sanitize_text_field( $_GET['tab'] );
} else {
	$tab = null;
}
		
if ( $tab == 'demo_import' ) { ?>
<div id="demo_import" class="radon-tab-pane active">
	<div class="demo-import-tab-content info-tab-content">
		<?php if ( has_action( 'radon_demo_import_content_tab' ) ) {
			do_action( 'radon_demo_import_content_tab' );
		} else { ?>
			<div id="plugin-filter" class="demo-import-boxed">
				<?php
				$plugin_name = 'one-click-demo-import';
				$status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
				$button_class = 'install-now button';
				$button_txt = esc_html__( 'Install Now', 'radon' );
				if ( ! $status ) {
					$install_url = wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $plugin_name
							),
							network_admin_url( 'update.php' )
						),
						'install-plugin_'.$plugin_name
					);

				} else {
					$install_url = add_query_arg(array(
						'action' => 'activate',
						'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
						'plugin_status' => 'all',
						'paged' => '1',
						
						'external_url' => network_admin_url('themes.php?page=pt-one-click-demo-import'),
					), network_admin_url('themes.php?page=pt-one-click-demo-import'));
					$button_class = 'activate-now button-primary';
					$button_txt = esc_html__( 'Active Now', 'radon' );
				}

				$detail_link = add_query_arg(
					array(
						'tab' => 'plugin-information',
						'plugin' => $plugin_name,
						'TB_iframe' => 'true',
						'width' => '772',
						'height' => '349',

					),
					network_admin_url( 'plugin-install.php' )
				);

				?>
				<h3><?php _e('Importing Dummy Content','radon'); ?><h3>
				<?php echo sprintf(__('<p><strong>One Click Demo Import</strong> is the WordPress Plugin which helps in creating the exact replica of our demo site. Just click the button to proceed further.</p>','radon')); ?>
				<h4><?php _e('Key Notes:','radon'); ?></h4>
			
					<li><?php _e('Click the button to install the plugin. Ignore if already installed.','radon'); ?></li>
					<li><?php _e('Activate the plugin so that they can read the dummy data files from the theme folder and import the content for you.','radon'); ?></li>
					<li><?php _e('After activation go to Appreance >> Import Demo Data.','radon'); ?></li>
				
				<?php
				echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
				?> 
				 
				
			</div>
		<?php } ?>
	</div>
</div>
<?php } ?>
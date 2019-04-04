<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>
<?php 
$tab = null;
if ( isset( $_GET['tab'] ) ) {
	$tab = sanitize_text_field( $_GET['tab'] );
} else {
	$tab = null;
}
?>
<?php if ( is_null( $tab ) ) { ?>
<div class="radon-tab-pane active">
	<div class="container-fluid">
		<div class="row radon-wrap">
			<div class="col-md-5">
				<hr style="margin:20px 0;">
				<h2><?php _e('Have a problem with our theme?','radon') ?></h2>
				<p class="radon-content"><?php _e('If you any problem regarding our Radon Theme. please contact us to click on Support button.','radon') ?></p>
				<a target="_blank"  class="button button-primary" href="https://wordpress.org/support/theme/radon">
					<?php _e('Support','radon'); ?>
				</a>
				
				<hr style="margin:20px 0;">
				<h2><?php _e('If you Love it.','radon') ?></h2>
				<p class="radon-content"><?php _e('If you like our Radon Theme and support kindly share us your feedback to click on Feedback button.','radon') ?></p>
				<a target="_blank"  class="button button-primary" href="https://wordpress.org/support/theme/radon/reviews/">
					<?php _e('Feedback','radon'); ?>
				</a>
			</div>
			<div class="col-md-7">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
			</div>	
		</div>
	</div>
</div>
<?php } ?>

<?php if ( $tab == 'free_pro' ) { ?>
<div class="radon-tab-pane active">
	<div class="container-fluid">
		<div class="wrap radon-wrap text-center">
			<hr style="margin:20px 0;">
			<h2><?php _e('Compaire Our Free and Premium Theme Version','radon') ?></h2>
			
				<table class="radon-table">
					<tbody>
						<tr>
							<th> <?php _e('Features','radon') ?> </th>
							<th> <?php _e('Free Theme','radon') ?> </th>
							<th> <?php _e('Premium Theme','radon') ?> </th>
						</tr>
						<tr>
							<td> Color Scheme </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Front Page </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> About Template </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Contact Template </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Social Icons </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Blog Templates </td>
							<td class="text-center"> Defalut </td>
							<td class="text-center"> 5 Templates </td>
						</tr>
						<tr>
							<td> Google Fonts </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
							<td class="text-center"> 500+ Fonts </td>
						</tr>
						<tr>
							<td> Responsive Design </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Gallery Template </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> WooCommerce </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Parallax Template </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Google map </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Custom Widgets </td>
							<td class="text-center"> 2 </td>
							<td class="text-center"> 3 </td>
						</tr>
						<tr>
							<td> Custom Post Type </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
						<tr>
							<td> Pricing Table </td>
							<td class="text-center"> <i class="cross_red"></i> </td>
							<td class="text-center"> <i class="yes_green"></i> </td>
						</tr>
					</tbody>
				</table>
		
		</div>
	
		<div class="row radon-wrap text-center">
			<hr style="margin:20px 0;">
			<h2><?php _e('Get More Features of Radon Theme','radon') ?></h2>
			<a class="radon-button red" target="_blank" href="https://webdzier.com/themes/radon-pro/"><span><?php _e('Upgrade To Pro','radon') ?></span></a>
		</div> 			
	</div>
</div>	
<?php } ?>
<?php 
/**
 * This template for displaying woocommerce sidebar
 *
 * @package WordPress
 * @subpackage radon
 * @since Radon 0.1
 */
?>

<?php if( is_active_sidebar('sidebar-woocommerce') ): ?>
<div class="col-md-4">
	<?php dynamic_sidebar('sidebar-woocommerce'); ?>
</div>
<?php endif; ?>
<?php 
/**
 * This template for displaying sidebar
 *
 * @package WordPress
 * @subpackage radon
 * @since Radon 0.1
 */
?>

<?php if( is_active_sidebar('sidebar-primary') ): ?>
<div class="col-md-4">
	<?php dynamic_sidebar('sidebar-primary'); ?>
</div>
<?php endif; ?>
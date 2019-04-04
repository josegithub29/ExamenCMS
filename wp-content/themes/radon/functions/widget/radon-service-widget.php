<?php 
add_action( 'widgets_init','radon_service_widget'); 
/*
 * radon service widget
 */
function radon_service_widget() 
{ 
	return   register_widget( 'radon_service_widget' );
}

class radon_service_widget extends WP_Widget {

	function __construct() {
		parent::__construct('radon_service_widget', 
		__('Radon : Service Widget', 'radon'),
		array( 
			'description' => __( 'Radon Service Widget', 'radon' ),
		) );
	}

	public function widget( $args , $instance ) {
		
		$instance['icon'] = ( isset($instance['icon'] ) ? $instance['icon'] : '' );
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['desc'] = ( isset($instance['desc'] ) ? $instance['desc'] : '' );
		$instance['btn_text'] = ( isset($instance['btn_text'] ) ? $instance['btn_text'] : '' );
		$instance['btn_url'] = ( isset($instance['btn_url'] ) ? $instance['btn_url'] : '' );
		$instance['btn_target'] = ( isset($instance['btn_target'] ) && $instance['btn_target'] == 1 ? 1 : 0 );
		
		echo $args['before_widget'];
			?>
				<div class="rdn-service-area">
					
					<?php if( $instance['icon'] != ''): ?>
					<div class="rdn-service-icon-area">
						<a class="rdn-service-icon"><i class="fa <?php echo esc_attr( $instance['icon'] ); ?>"></i></a>
					</div>
					<?php endif; ?>
					
					<?php echo $args['before_title']; ?>
					
						<?php if( $instance['btn_url'] != ''): ?>
						<a href="<?php echo esc_url( $instance['btn_url'] ); ?>">
						<?php endif; ?>
						
							<?php echo esc_html( $instance['title'] ); ?>
							
						<?php if( $instance['btn_url'] != ''): ?>
						</a>
						<?php endif; ?>
					<?php echo $args['after_title']; ?>
					
					<?php if( $instance['desc'] != ''): ?>
					<p><?php echo esc_html( $instance['desc'] ); ?></p>
					<?php endif; ?>
					
					<?php if( $instance['btn_url'] != ''): ?>
					<a class="rdn-service-btn" href="<?php echo esc_url( $instance['btn_url'] ); ?>" <?php if(isset($instance['btn_target'])) echo 'target="_blank"'; ?> ><?php echo ($instance['btn_text']!=''?esc_html( $instance['btn_text'] ):__('Read More','radon')); ?></a>
					<?php endif; ?>
				</div>
			<?php
		
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		
		$instance['icon'] = ( isset($instance['icon'] ) ? $instance['icon'] : '' );
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['desc'] = ( isset($instance['desc'] ) ? $instance['desc'] : '' );
		$instance['btn_text'] = ( isset($instance['btn_text'] ) ? $instance['btn_text'] : '' );
		$instance['btn_url'] = ( isset($instance['btn_url'] ) ? $instance['btn_url'] : '' );
		$instance['btn_target'] = ( isset($instance['btn_target'] ) && $instance['btn_target'] == 1 ? 1 : 0 );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Service Icon: { like: fa-cloud } ','radon' ); ?><a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank" ><?php _e('Click Here!','radon'); ?></a></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Service Title:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Service Description:','radon' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>"><?php _e( 'Service Button Text:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $instance['btn_text'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'btn_url' ); ?>"><?php _e( 'Service Button Link:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" value="<?php echo esc_attr( $instance['btn_url'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'btn_target' ); ?>"><?php _e( 'Open in new tab:','radon' ); ?></label> 
		<input type="checkbox" id="<?php echo $this->get_field_id( 'btn_target' ); ?>" name="<?php echo $this->get_field_name( 'btn_target' ); ?>" value="1" <?php if( $instance['btn_target'] == true ){ echo 'checked'; } ?> />
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? sanitize_text_field( $new_instance['icon'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? sanitize_text_field( $new_instance['desc'] ) : '';
		$instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? sanitize_text_field(  $new_instance['btn_text'] ) : '';
		$instance['btn_url'] = ( ! empty( $new_instance['btn_url'] ) ) ? esc_url_raw( $new_instance['btn_url'] ) : '';
		$instance['btn_target'] = isset( $new_instance['btn_target'] ) && $new_instance['btn_target'] == 1  ? 1 : 0 ;
		
		return $instance;
	}

} // class
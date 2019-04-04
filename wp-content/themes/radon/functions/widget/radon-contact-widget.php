<?php 
add_action( 'widgets_init','radon_contact_widget'); 
/*
 * radon service widget
 */
function radon_contact_widget() 
{ 
	return   register_widget( 'radon_contact_widget' );
}

class radon_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct('radon_contact_widget', 
		__('Radon : Contact Info Widget', 'radon'),
		array( 
			'description' => __( 'Contact Info Widget to show your contact information like : Address,Phone,website', 'radon' ),
		) );
	}

	public function widget( $args , $instance ) {
		
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['contactlabel'] = ( isset($instance['contactlabel'] ) ? $instance['contactlabel'] : '' );
		$instance['contacttext'] = ( isset($instance['contacttext'] ) ? $instance['contacttext'] : '' );

		echo $args['before_widget'];
		
		if(!empty($instance['title']))
		{
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}
		?>
		<p><label class="cont_label"><?php echo ($instance['contactlabel']!=''?esc_html( $instance['contactlabel'] ):''); ?>  </label>&nbsp;<span class="cont_span"> <?php echo esc_html( $instance['contacttext'] ); ?></span></p>
		<?php
		echo $args['after_widget']; 	
	}

	public function form( $instance ) {
		$instance['title'] = ( isset($instance['title'] ) ? $instance['title'] : '' );
		$instance['contactlabel'] = ( isset($instance['contactlabel'] ) ? $instance['contactlabel'] : '' );
		$instance['contacttext'] = ( isset($instance['contacttext'] ) ? $instance['contacttext'] : '' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Contact Title:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contactlabel' ); ?>"><?php _e( 'Contact Info Label:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'contactlabel' ); ?>" name="<?php echo $this->get_field_name( 'contactlabel' ); ?>" type="text" value="<?php echo esc_attr( $instance['contactlabel'] ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'contacttext' ); ?>"><?php _e( 'Contact Info Text:','radon' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'contacttext' ); ?>" name="<?php echo $this->get_field_name( 'contacttext' ); ?>" type="text" value="<?php echo esc_attr( $instance['contacttext'] ); ?>" />
		</p>

		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['contactlabel'] = ( ! empty( $new_instance['contactlabel'] ) ) ? sanitize_text_field( $new_instance['contactlabel'] ) : '';
		$instance['contacttext'] = ( ! empty( $new_instance['contacttext'] ) ) ? sanitize_text_field( $new_instance['contacttext'] ) : '';
		return $instance;
	}

} // class
<?php
/**
 * Widget API: CW_Widget_Home_Page class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.1
 */

/**
 * Core class used to implement a Custom Home Page widget.
 *
 * @since 4.8.1
 *
 * @see WP_Widget
 */
class CW_Widget_Home_Page extends WP_Widget {

	public function __contructor() {
		parent::__contructor();

	}

	public function __construct() {
		// $widget_ops = array(
		// 	'classname' => 'widget_custom_html',
		// 	'description' => __( 'Arbitrary HTML code.' ),
		// 	'customize_selective_refresh' => true,
		// );
		// $control_ops = array(
		// 	'width' => 400,
		// 	'height' => 350,
		// );

		$widget_ops = array(
			'description' => __( 'Lista de páginas a mostrar', 'classicwhite-theme' )
		);

		parent::__construct(
			strtolower( get_class( $this ) ),
			__( 'Home Páginas Widget', 'classicwhite-theme' ),
			$widget_ops
		);

	}

	/**
	 * Create widget front-end
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			$title = $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		require_once dirname(__FILE__) .'/class-cw-widget-home-page.html.php';
		echo $args['after_widget'];
	}

	/**
	 * Create widget Backend
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Páginas', 'classicwhite-theme' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
	 * Updating widget replacing old instances with new
 	 *
	 * @return string
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}

<?php
/**
 * @package open table
 * @version 1.6
 */
/*
Plugin Name: Open Table
Plugin URI: http://wordpress.org/plugins/open table/
Description:
Author: JCakeC
Version: 1.6
Author URI: http://wordpress.org/plugins/open table/
*/

class Open_Table_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'open_table_widget',
			esc_html__( 'Open Table Widget', 'canape' ),
			array(
				'description' => __( 'Open Table Widget for WordPress', 'canape' ),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		if ( ! empty( $instance['params'] ) ) {
			echo '<script type="text/javascript" src="' . esc_url( $this->build_embed_url( $instance['params'] ) ) . '"></script>';
		}

		echo $args['after_widget'];
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']   =  sanitize_text_field( $new_instance['title'] );

		if ( ! empty( $new_instance['embed-code'] ) ) {
			$instance['params'] = $this->extract_embed_params( $new_instance['embed-code'] );
		}

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'canape' ); ?>
			</label>
			<?php
			printf( '<input class="widefat" id="%1$s" name="%2$s" type="text" value="%3$s" />',
				esc_attr( $this->get_field_id( 'title' ) ),
				esc_attr( $this->get_field_name( 'title' ) ),
				isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_attr__( 'My Open Table Widget', 'canape' )
			);
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'embed-code' ) ); ?>">
				<?php
				printf( __( 'Paste your EMBED code from <a href="%s">Open Table Reservations</a> here:', 'canape' ),
					'http://www.otrestaurant.com/marketing/ReservationWidget" target="_blank'
				);
				?>
			</label>
			<?php
			printf( '<textarea class="widefat" id="%1$s" name="%2$s">%3$s</textarea>',
				esc_attr( $this->get_field_id( 'embed-code' ) ),
				esc_attr( $this->get_field_name( 'embed-code' ) ),
				isset( $instance['params'] ) ? esc_textarea( '<script type="text/javascript" src="' . esc_url_raw( $this->build_embed_url( $instance['params'] ) ) . '"></script>' ) : ''
			);
			?>
		</p>
	<?php
	}

	/**
	 * Parse Javascript elements so we don't let them execute any weird code.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param string. The Javascript embed code from OpenTable Website.
	 *
	 * @return array The extracted values from the URL.
	 */
	public function extract_embed_params( $js_string ) {
		preg_match( '/< *script[^>]*src *= *["\']?([^"\']*)/i', $js_string, $matches );

		if ( ! isset( $matches[1] ) ) {
			return false;
		}

		$allowed_args = array(
			'rid'           => '',
			'bgcolor'       => '',
			'titlecolor'    => '',
			'subtitlecolor' => '',
			'btnbgimage'    => '',
			'otlink'        => '',
			'icon'          => '',
			'mode'          => '',
		);
		$parts = parse_url( $matches[1] );

		if ( ! isset( $parts['query'] ) ) {
			return false;
		}

		parse_str( urldecode( $parts['query'] ), $parts['query'] );

		$whitelisted_query_args = wp_parse_args( $parts['query'], $allowed_args );

		return array_map( 'sanitize_text_field', $whitelisted_query_args );
	}

	/**
	 * Build an embed URL from an array of URL values.
	 *
	 * @param $params Array of URL values.
	 *
	 * @return string Embed URL
	 */
	public function build_embed_url( $params ) {
		return add_query_arg( array(
				'rid'           => (int) $params['rid'],
				'restref'       => (int) $params['rid'],
				'bgcolor'       => $params['bgcolor'],
				'titlecolor'    => $params['titlecolor'],
				'subtitlecolor' => $params['subtitlecolor'],
				'btnbgimage'    => $params['btnbgimage'],
				'otlink'        => $params['otlink'],
				'icon'          => $params['icon'],
				'mode'          => 'ist',
		), 'https://www.opentable.com/frontdoor/default.aspx' );
	}
}

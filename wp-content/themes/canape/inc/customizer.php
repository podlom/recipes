<?php
/**
 * Canape Theme Customizer.
 *
 * @package Canape
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function canape_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_panel( 'canape_panel', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'canape' ),
		'description'    => esc_html__( 'Canape Theme Options', 'canape' ),
	) );

	$wp_customize->add_section( 'canape_footer_settings', array(
		'title'	=> esc_html__( 'Footer', 'canape' ),
		'panel'	=> 'canape_panel',
	) );

		// Display site title in the footer checkbox.
		$wp_customize->add_setting( 'canape_footer_branding', array(
			'default'           => '1',
			'sanitize_callback' => 'canape_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'canape_footer_branding', array(
			'label'             => esc_html__( 'Show site title and description in the footer.', 'canape' ),
			'section'           => 'canape_footer_settings',
			'type'              => 'checkbox',
		) );

		$wp_customize->add_setting('canape_footer_sidebar_bg', array(
			'transport'			=> 'refresh',
			'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
			'canape_footer_sidebar_bg',
			array(
				'label'		=> __( 'Footer Widget Area Background Image', 'canape' ),
				'section'	=> 'canape_footer_settings',
			)
		) );

		$wp_customize->add_setting( 'canape_footer_opacity', array(
			'default'           => '0.8',
			'sanitize_callback' => 'canape_sanitize_opacity',
			'transport'         => 'refresh',
		) );

		$wp_customize->add_control( 'canape_footer_opacity', array(
		'label'       => esc_html__( 'Footer Widget Area Background Opacity', 'canape' ),
		'section'     => 'canape_footer_settings',
		'type'        => 'select',
		'active_callback' => 'canape_footer_background',
		'description' => esc_html( 'Set the opacity of the footer widget area overlay.', 'canape' ),
		'choices'     => array(
			'0.2' => esc_html__( '20%', 'canape' ),
			'0.4' => esc_html__( '40%', 'canape' ),
			'0.6' => esc_html__( '60%', 'canape' ),
			'0.8' => esc_html__( '80%', 'canape' ),
			'1'   => esc_html__( '100%', 'canape' ),
		),
		) );

	$wp_customize->add_section( 'canape_front_page', array(
		'title'		  => esc_html__( 'Front Page', 'canape' ),
		'panel'		  => 'canape_panel',
	) );

		// Testimonials checkbox
		$wp_customize->add_setting( 'canape_front_testimonials', array(
			'default'           => '1',
			'sanitize_callback' => 'canape_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'canape_front_testimonials', array(
			'label'             => esc_html__( 'Show Testimonials Section on the Front Page', 'canape' ),
			'section'           => 'canape_front_page',
			'type'              => 'checkbox',
		) );

		// Fetured Menu Item #1
		$wp_customize->add_setting( 'canape_featured_term_1', array(
			'default'           => 'none',
			'sanitize_callback' => 'canape_sanitize_terms',
		) );

		$wp_customize->add_control( 'canape_featured_term_1', array(
			'label'             => esc_html__( 'Front Page: Featured Menu Section One', 'canape' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Food Menu Sections</a>.', 'canape' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=nova_menu&post_type=nova_menu_item' ) ) ),
			'section'           => 'canape_front_page',
			'type'              => 'select',
			'choices' 			=> canape_get_terms(),
		) );

		$wp_customize->add_setting( 'canape_featured_image_1', array(
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'canape_featured_image_1',
				array(
					'label'    		=> esc_html__( 'Featured Image One', 'canape' ),
					'description'   => esc_html__( 'Recommended image width is 345px.', 'canape' ),
					'settings' 		=> 'canape_featured_image_1',
					'section'  		=> 'canape_front_page',
				)
		) );

		// Fetured Menu Item #2
		$wp_customize->add_setting( 'canape_featured_term_2', array(
			'default'           => 'none',
			'sanitize_callback' => 'canape_sanitize_terms',
		) );

		$wp_customize->add_control( 'canape_featured_term_2', array(
			'label'             => esc_html__( 'Front Page: Featured Menu Section Two', 'canape' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Food Menu Sections</a>.', 'canape' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=nova_menu&post_type=nova_menu_item' ) ) ),
			'section'           => 'canape_front_page',
			'type'              => 'select',
			'choices' 			=> canape_get_terms(),
		) );

		$wp_customize->add_setting( 'canape_featured_image_2', array(
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'canape_featured_image_2',
				array(
					'label'    		=> esc_html__( 'Featured Image Two', 'canape' ),
					'description'   => esc_html__( 'Recommended image width is 345px.', 'canape' ),
					'settings' 		=> 'canape_featured_image_2',
					'section'  		=> 'canape_front_page',
				)
		) );

		// Fetured Menu Item #3
		$wp_customize->add_setting( 'canape_featured_term_3', array(
			'default'           => 'none',
			'sanitize_callback' => 'canape_sanitize_terms',
		) );

		$wp_customize->add_control( 'canape_featured_term_3', array(
			'label'             => esc_html__( 'Front Page: Featured Menu Section Three', 'canape' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Food Menu Sections</a>.', 'canape' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=nova_menu&post_type=nova_menu_item' ) ) ),
			'section'           => 'canape_front_page',
			'type'              => 'select',
			'choices' 			=> canape_get_terms(),
		) );

		$wp_customize->add_setting( 'canape_featured_image_3', array(
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'canape_featured_image_3',
				array(
					'label'    		=> esc_html__( 'Featured Image Three', 'canape' ),
					'description'   => esc_html__( 'Recommended image width is 345px.', 'canape' ),
					'settings' 		=> 'canape_featured_image_3',
					'section'  		=> 'canape_front_page',
				)
		) );

	return $wp_customize;

}
add_action( 'customize_register', 'canape_customize_register' );


if ( ! function_exists( 'canape_get_terms' ) ) :
/**
 * Return an array of term names and slugs for Jetpack's Food Menus
 *
 * @since 1.0.0.
 *
 * @return array                The list of terms.
 */
function canape_get_terms() {

	$choices = array( 0 );

	// Default
	$choices = array( 'none' => esc_html__( 'None', 'canape' ) );

	if ( post_type_exists( 'nova_menu_item' ) ) {
		// Food Menu Sections
		$type_terms = get_terms( 'nova_menu' );
		if ( ! empty( $type_terms ) ) {
			$type_slugs = wp_list_pluck( $type_terms, 'slug' );
			$type_names = wp_list_pluck( $type_terms, 'name' );
			$type_list = array_combine( $type_slugs, $type_names );
			$choices = array_merge(
				$choices,
				$type_list
			);
		}
	}

	return apply_filters( 'canape_get_terms', $choices );
}
endif;

if ( ! function_exists( 'canape_sanitize_terms' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function canape_sanitize_terms( $value ) {

	$choices = canape_get_terms();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

if ( ! function_exists( 'canape_sanitize_checkbox' ) ) :
/**
 * Sanitize the checkbox.
 *
 * @param  mixed 	$input.
 * @return boolean	(true|false).
 */
function canape_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}
endif;

if ( ! function_exists( 'canape_sanitize_opacity' ) ) :
/**
 * Sanitize the checkbox.
 *
 * @param  boolean	$input.
 * @return boolean	(true|false).
 */
function canape_sanitize_opacity( $input ) {
	$choices = array( 0.2, 0.4, 0.6, 0.8, 1 );

	if ( ! in_array( $input, $choices ) ) {
		$input = 0.8;
	}

	return $input;
}
endif;

if ( ! function_exists( 'canape_footer_background' ) ) :
/**
 * Active callback for canape_footer_opacity control.
 *
 * @param  object	$control.
 * @return boolean	(true|false).
 */
function canape_footer_background( $control ) {
	if ( '' == $control->manager->get_setting( 'canape_footer_sidebar_bg' )->value() ) {
		return false;
	} else {
		return true;
	}
}
endif;

/*
 * Output our custom CSS to change background colour/opacity of panels.
 * Note: not very pretty, but it works.
 */
function canape_customizer_css( $control ) {
	// Adjust the opacity of featured image if set
	if ( get_theme_mod( 'canape_footer_sidebar_bg' ) ) :
		if ( get_theme_mod( 'canape_footer_opacity' ) ) :
		?>
			<style type="text/css">
			.pre-footer:after {
				opacity:  <?php echo esc_attr( get_theme_mod( 'canape_footer_opacity' ) ); ?>;
			}
			</style>
		<?php
		endif;
	endif;
}
add_action( 'wp_head', 'canape_customizer_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function canape_customize_preview_js() {
	wp_enqueue_script( 'canape_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151208', true );
}
add_action( 'customize_preview_init', 'canape_customize_preview_js' );

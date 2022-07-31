<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Canape
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function canape_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'footer_widgets' => array( 'sidebar-2', 'sidebar-3' ),
		'container' 	 => 'main',
		'render'    	 => 'canape_infinite_scroll_render',
		'footer'    	 => 'page',
	) );

	add_image_size( 'canape-logo', 380, 100 );
	add_theme_support( 'site-logo', array( 'size' => 'canape-logo' ) );

	add_theme_support( 'nova_menu_item' );
	add_theme_support( 'jetpack-testimonial' );

} // end function canape_jetpack_setup
add_action( 'after_setup_theme', 'canape_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function canape_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function canape_infinite_scroll_render

/**
 * Flush the Rewrite Rules for CPT after the user has activated the theme.
 */
function canape_flush_rewrite_rules() {
	flush_rewrite_rules();
} // end function canape_flush_rewrite_rules
add_action( 'after_switch_theme', 'canape_flush_rewrite_rules' );

/**
 * Disable Infinite Scroll for the Menu CPT
 * @return bool
 */
function canape_infinite_scroll_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_archive() || is_home() ) && ! is_tax( 'nova_menu' );
}
add_filter( 'infinite_scroll_archive_supported', 'canape_infinite_scroll_supported' );

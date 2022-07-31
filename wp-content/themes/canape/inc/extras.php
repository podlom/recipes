<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Canape
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function canape_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

    if ( is_page() && !is_page_template( 'page-templates/menu-page.php' ) && !comments_open() && '0' == get_comments_number() ) {
		$classes[] = 'comments-closed';
    }

	return $classes;
}
add_filter( 'body_class', 'canape_body_classes' );

/**
 * Change the class of the hero area depending on featured image.
 */
function canape_additional_class() {

	$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

	if ( is_post_type_archive() && ! $jetpack_options['featured-image'] ) {
		$additional_class = 'without-featured-image';
	} else if ( is_page() && ! has_post_thumbnail() ) {
		$additional_class = 'without-featured-image';
	} else {
		$additional_class = 'with-featured-image';
	}

	return esc_attr( $additional_class );
}
/**
 * Get the truncated version of menu section's description for display on the front page.
 */
function canape_get_descripton_excerpt( $excerpt, $count ){
	if ( $count > strlen( $excerpt ) ) {
		return $excerpt;
	}

    $excerpt = apply_filters('the_content', $excerpt);
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, absint( $count ) );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
	$excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
	$excerpt = $excerpt . '...';

	return $excerpt;
}

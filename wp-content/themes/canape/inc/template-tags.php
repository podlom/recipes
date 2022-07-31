<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Canape
 */

if ( ! function_exists( 'canape_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function canape_posted_on( $type = '' ) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	if ( 'testimonial' == $type ) {
		echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
	} else {
		echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'; // WPCS: XSS OK.
	}
}
endif; // ends check for canape_posted_on()

if ( ! function_exists( 'canape_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: date, comments and edit link.
 */
function canape_entry_meta() {
	// Sticky
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . esc_html__( 'Featured', 'canape' ) . '</span>';
	}

	// Date
	if ( ! is_sticky() ) {
		canape_posted_on();
	}

	// Comments
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'canape' ), esc_html__( '1 Comment', 'canape' ), esc_html__( '% Comments', 'canape' ) );
		echo '</span>';
	}

	// Edit link
	edit_post_link( esc_html__( 'Edit', 'canape' ), '<span class="edit-link">', '</span>' );
}
endif; // ends check for canape_entry_meta()

if ( ! function_exists( 'canape_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories and tags.
 */
function canape_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'canape' ) );
		if ( $categories_list && canape_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'canape' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		the_tags( sprintf( '<span class="tags-links">%s ', esc_html__( 'Tagged', 'canape' ) ), esc_html__( ', ', 'canape' ), '</span>' );

	}

}
endif; // ends check for canape_entry_footer()

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
function canape_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php else : ?>

	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
		 <?php the_post_thumbnail(); ?>
		</a>
	</div>

	<?php endif; // ends check for is_singular()
}

if ( ! function_exists( 'canape_jp_testimonials_content' ) ) :
/**
 * Outputs the Testimonials Page Content option.
 */
function canape_jp_testimonials_content() {
	$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

	if ( isset( $jetpack_options['page-content'] ) && '' != $jetpack_options['page-content'] ) :
	?>

		<div class="entry-content">
			<?php echo convert_chars( convert_smilies( wptexturize( wp_kses_post( $jetpack_options['page-content'] ) ) ) ); ?>
		</div><!-- .entry-content -->

	<?php endif;
}
endif; // ends check for canape_jp_testimonials_content()

if ( ! function_exists( 'canape_comment' ) ) :
/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function canape_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'canape' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'canape' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<header class="comment-meta">
				<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'canape' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'canape' ); ?></p>
				<?php endif; ?>

				<div class="comment-tools">
					<?php edit_comment_link( esc_html__( 'Edit', 'canape' ), '<span class="edit-link">', '</span>' ); ?>

					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">',
							'after'     => '</span>',
						) ) );
					?>
				</div><!-- .comment-tools -->
			</header><!-- .comment-meta -->

			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for canape_comment()

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function canape_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'canape_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'canape_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so canape_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so canape_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in canape_categorized_blog.
 */
function canape_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'canape_categories' );
}
add_action( 'edit_category', 'canape_category_transient_flusher' );
add_action( 'save_post',     'canape_category_transient_flusher' );

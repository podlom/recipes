<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canape
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php canape_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</a>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-body">
		<div class="entry-meta">
			<?php canape_entry_meta(); ?>
		</div><!-- .entry-meta -->


		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'canape' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'canape' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->


		<footer class="entry-meta">
			<?php canape_entry_footer(); ?>
		</footer><!-- .entry-meta -->
	</div><!-- .entry-body -->

</article><!-- #post-## -->


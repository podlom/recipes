<?php
/**
 * The template used for displaying testimonials.
 *
 * @package Canape
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php canape_posted_on( 'testimonial' ); ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<?php edit_post_link( __( 'Edit', 'canape' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->

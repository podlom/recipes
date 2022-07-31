<?php
/**
 * Template Name: Page with sidebar
 *
 * @package Canape
 */


get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper <?php echo esc_attr( canape_additional_class() ); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .content_wrapper -->

<?php get_footer(); ?>

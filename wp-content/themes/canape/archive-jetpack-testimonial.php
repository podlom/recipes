<?php
/**
 * The template for displaying the Testimonials archive page.
 *
 * @package Canape
 */

get_header(); ?>

	<?php $jetpack_options = get_theme_mod( 'jetpack_testimonials' ); ?>

	<?php if ( isset( $jetpack_options['featured-image'] ) && '' != $jetpack_options['featured-image'] ) : ?>
		<div class="hero">
			<div class="entry-thumbnail" style="background-image: url(<?php echo wp_get_attachment_image_src( (int)$jetpack_options['featured-image'], 'full' )['0']; ?>)">
				<?php echo wp_get_attachment_image( (int)$jetpack_options['featured-image'], 'canape-hero-thumbnail' ); ?>
			</div>
		</div><!-- .thumbnail -->
	<?php endif; ?>

	<div class="content-wrapper full-width <?php echo esc_attr( canape_additional_class() ); ?>">
		<div id="primary" class="content-area testimonials-content-area">
			<div id="main" class="site-main testimonials grid" role="main">

				<article class="hentry">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
							if ( isset( $jetpack_options['page-title'] ) && '' != $jetpack_options['page-title'] )
								echo esc_html( $jetpack_options['page-title'] );
							else
								esc_html_e( 'Testimonials', 'canape' );
							?>
						</h1>
					</header><!-- .entry-header -->

					<?php canape_jp_testimonials_content(); ?>
				</article><!-- .hentry -->

				<div id="testimonials">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'testimonial' ); ?>
						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/no-results', 'testimonial' ); ?>
					<?php endif; ?>
				</div><!-- .testimonials .grid -->

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>

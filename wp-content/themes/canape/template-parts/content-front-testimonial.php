<?php
/**
 * The template used for displaying testimonials on the Front Page.
 *
 * @package Canape
 */
?>

	<?php
		$jetpack_options = get_theme_mod( 'jetpack_testimonials' );
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'posts_per_page' => 3,
			'no_found_rows'  => true,
		) );
	?>

	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="inner">

			<?php if ( post_type_exists( 'jetpack-testimonial' ) && $testimonials->have_posts() ) : ?>

				<h2>
					<?php
					if ( isset( $jetpack_options['page-title'] ) && '' != $jetpack_options['page-title'] )
						echo esc_html( $jetpack_options['page-title'] );
					else
						esc_html_e( 'Testimonials', 'canape' );
					?>
				</h2>

				<div class="flexslider">
					<ul class="slides">
					<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>

						 <li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
							<div class="entry-content">
								<?php the_content(); ?>
							</div>

							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header>

						</li><!-- #post-## -->

					<?php endwhile; ?>
					</ul><!-- .slides -->
				</div><!-- .flexslider -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<?php if ( current_user_can( 'publish_posts' ) ) : ?>

					<section class="no-results not-found">
						<h2><?php esc_html_e( 'No Testimonials Found', 'canape' ); ?></h2>

						<p>
							<?php printf( esc_html__( 'This section will display your latest testimonials. It can can be disabled via the Customizer.', 'canape' ) ); ?><br />
							<?php printf( wp_kses( __( 'Ready to publish your first testimonial? <a href="%1$s">Get started here</a>.', 'canape' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-testimonial' ) ) ); ?>
						</p>

					</section><!-- .no-results .not-found -->

				<?php endif; ?>

			<?php endif; ?>
		</div>
	</div><!-- .front-testimonials -->

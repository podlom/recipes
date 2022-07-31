<?php
/**
 * Template Name: Menu Template
 * The template for displaying menu items.
 *
 * @package Canape
 */
get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper full-width <?php echo esc_attr( canape_additional_class() ); ?>">
		<div id="primary" class="content-area">
			<div id="main" class="site-main" role="main">
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // end of the normal loop.


					$loop = new WP_Query( array( 'post_type' => 'nova_menu_item' ) );

					if ( post_type_exists( 'nova_menu_item' ) && $loop -> have_posts() ) :

						while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part( 'template-parts/content', 'menu' );
						endwhile; // end of the Menu Item Loop
						wp_reset_postdata();

						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) {
							comments_template( '', true );
						}

					endif;
					?>
			</div><!-- #content .site-main -->
		</div><!-- #primary .content-area -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>

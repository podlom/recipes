<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Canape
 */

get_header(); ?>

	<div class="content-wrapper full-width">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'canape' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'canape' ); ?></p>

						<?php get_search_form(); ?>

						<?php
							$args = array(
								'before_title'  => '<h3 class="widget-title">',
								'after_title'   => '</h3>'
							);

							the_widget( 'WP_Widget_Recent_Posts', 'number=5', $args );
						?>

						<?php if ( canape_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
						<div class="widget widget_categories">
							<h3 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'canape' ); ?></h3>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->
						<?php endif; ?>

						<?php the_widget( 'WP_Widget_Archives', 'dropdown=1', $args ); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->
<?php get_footer(); ?>

<?php
/**
 * The template used for displaying featured food menu categories on the Front Page.
 *
 * @package Canape
 */

$featured_menu_items = array(
	get_theme_mod( 'canape_featured_term_1', 'none' ),
	get_theme_mod( 'canape_featured_term_2', 'none' ),
	get_theme_mod( 'canape_featured_term_3', 'none' ),
);

if ( post_type_exists( 'nova_menu_item' ) && array_filter( $featured_menu_items ) ) :

?>

	<div id="front-page-menu" class="front-featured-menu-items menu">
		<div class="grid-row">

			<?php
			$i = 0;

			foreach ( $featured_menu_items as $item ) :
				$i++;

				if ( 'none' != $item ) :

				$the_term = get_term_by( 'slug', $item, 'nova_menu' );
				$featured_image = get_theme_mod( 'canape_featured_image_' . $i, 'none' );

				if ( false === $the_term ) {
					continue;
				}
			?>
				<div class="item <?php echo ( 'none' == $featured_image || '' == $featured_image ) ? 'no-thumbnail' : ''; ?>">
					<a href="<?php echo esc_url( get_term_link( $item, 'nova_menu' ) ); ?>" class="menu-section-thumbnail">

						<?php if ( '' != $featured_image && 'none' != $featured_image ) : ?>
							<img src="<?php echo esc_url( $featured_image ); ?>" />
						<?php endif; ?>

						<div class="overlay">
							<div class="overlay-inner">
								<h2><?php echo esc_html( $the_term->name ); ?></h2>

								<?php if ( '' != $the_term->description ) : ?>
									<p class="description"><?php echo canape_get_descripton_excerpt( $the_term->description, 280 ); ?></p>
								<?php endif; ?>
							</div>
						</div>

					</a>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div><!-- .front-featured-menu-items -->

<?php endif; ?>

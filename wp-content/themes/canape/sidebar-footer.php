<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Canape
 */

$footer_branding = get_theme_mod( 'canape_footer_branding', 1 );
$branding_class = '';
$footer_extra_class = '';

if ( !$footer_branding && !has_nav_menu( 'social' ) ) {
	$branding_class = 'empty';
}

if ( !$footer_branding && !has_nav_menu( 'social' ) && !is_active_sidebar( 'sidebar-2' ) && !is_active_sidebar( 'sidebar-3' ) ) {
	$footer_extra_class = 'empty';
}


$sidebarbg = esc_attr( get_theme_mod( 'canape_footer_sidebar_bg' ) );
$background_style = '';

if ( !empty ( $sidebarbg ) ) {
	$background_style = "background-image:url( ' " . esc_url( $sidebarbg ) . " ' );";
}
?>

<div id="tertiary" class="pre-footer <?php echo esc_attr( $footer_extra_class ); ?>" role="complementary" style="<?php echo $background_style; ?>">
	<div class="inner">
		<div class="footer-branding <?php echo esc_attr( $branding_class ); ?>">
			<?php if( $footer_branding ) : ?>
			<div class="footer-site-branding">
				<p class="footer-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php if ( '' != get_bloginfo( 'description' ) ) : ?>
					<p class="footer-site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<?php endif; ?>

			<?php
				if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links' ) );
				}
			?>
		</div>

		<?php
		if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) :
		?>

			<div class="widget-area footer-widget-area">
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<div id="widget-area-2" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #widget-area-2 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<div id="widget-area-3" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div><!-- #widget-area-3 -->
				<?php endif; ?>

			</div><!-- .footer-widget-area -->

		<?php endif; ?>

	</div>
</div><!-- #tertiary -->

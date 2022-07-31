<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canape
 */

?>

	</div><!-- #content -->

		<?php get_sidebar( 'footer' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'canape' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'canape' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'canape' ), 'canape', '<a href="https://wordpress.com/themes/" rel="designer">Automattic</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template used for displaying menu content in menu-page.php
 *
 * @package Canape
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_content() ) : ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<span class="menu-price">
		<?php echo esc_html( get_post_meta( get_the_ID(), 'nova_price', true ) ); ?>
	</span>

</article><!-- #post-## -->

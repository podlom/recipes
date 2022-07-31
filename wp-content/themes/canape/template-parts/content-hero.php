<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package Canape
 */
?>
<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$post_image = $thumb['0'];
?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="hero">
		<div class="entry-thumbnail" style="background-image: url(<?php echo esc_url( $post_image ); ?>)">
			<?php the_post_thumbnail( 'canape-hero-thumbnail' ); ?>
		</div>
	</div><!-- .hero -->
<?php endif; ?>

<?php
/**
 * The template for displaying menu items in single category.
 *
 * @package Canape
 */
get_header();
?>

<div class="content-wrapper full-width">
	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'menu' );

				endwhile;
			else :

				get_template_part( 'template-parts/none', 'conent' );

			endif;

			$args = array( 'hide_empty' => 0 );
			$terms = get_terms( 'nova_menu', $args );

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :

				$count = count( $terms );
				$i = 0;
				$term_list = '<div class="menu-breadcrumbs">';

				foreach ( $terms as $term ) :
					$i++;
					$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all post filed under %s', 'canape' ), $term->name ) ) . '">' . esc_html( $term->name ) . '</a>';
					if ( $count != $i ) {
						$term_list .= ' &middot; ';
					}
					else {
						$term_list .= '</div><!-- .menu-breadcrumbs -->';
					}
				endforeach;
				echo $term_list;

			endif;
			?>
		</div><!-- #content .site-main -->
	</div><!-- #primary .content-area -->
</div><!-- .content-wrapper -->

<?php get_footer(); ?>

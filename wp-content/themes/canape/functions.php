<?php
/**
 * Canape functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Canape
 */

if ( ! function_exists( 'canape_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function canape_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Canape, use a find and replace
	 * to change 'canape' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'canape', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 765, 380, true );
	// Hero Image on the front page & single page template
	add_image_size( 'canape-hero-thumbnail', 1180, 530, true );

	// Testimonial thumbnail
	add_image_size( 'canape-testimonial-thumbnail', 90, 90, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> esc_html__( 'Primary Menu', 'canape' ),
		'social'	=> esc_html__( 'Social Menu', 'canape' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'quote',
		'link',
	) );
}
endif; // canape_setup
add_action( 'after_setup_theme', 'canape_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function canape_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'canape_content_width', 620 );

	//Adjust content_width value for page and attachement templates.
	if ( is_page_template( 'page-templates/full-width-page.php' )
	  || is_attachment() ) {
		$GLOBALS['content_width'] = 765;
	}
}
add_action( 'after_setup_theme', 'canape_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function canape_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'canape' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget Area', 'canape' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget Area', 'canape' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'First Front Page Widget Area', 'canape' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Second Front Page Widget Area', 'canape' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Third Front Page Widget Area', 'canape' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'canape_widgets_init' );

/**
 * Returns the Google font stylesheet URL, if available.
 */
function canape_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$playfair_display  = esc_html_x( 'on', 'Playfair Display font: on or off',  'canape' );

	/* translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	$noticia_text = esc_html_x( 'on', 'Noticia Text font: on or off', 'canape' );

	/* translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	$montserrat  = esc_html_x( 'on', 'Montserrat font: on or off',  'canape' );

	if ( 'off' !== $playfair_display || 'off' !== $noticia_text || 'off' !== $montserrat ) {
		$font_families = array();

		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'Playfair Display:400,400italic,700,700italic';
		}
		if ( 'off' !== $noticia_text ) {
			$font_families[] = 'Noticia Text:400,400italic,700,700italic';
		}
		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:400,700';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function canape_scripts() {

	// Add custom fonts.
	wp_enqueue_style( 'canape-fonts', canape_fonts_url(), array(), null );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_style( 'canape-style', get_stylesheet_uri() );

	if ( is_front_page() && ! is_home() && 1 == get_theme_mod( 'canape_front_testimonials', 1 ) && canape_has_testimonials() ) {
		wp_enqueue_script( 'canape-flexslider', get_template_directory_uri() . '/js/canape-flexslider.js', array( 'jquery', 'flexslider' ), '20170914', true );
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20170914', true );
		wp_enqueue_style( 'flexslider-styles', get_template_directory_uri() . '/css/flexslider.css', array(), '20170914' );
	}

	wp_enqueue_script( 'canape-script', get_template_directory_uri() . '/js/canape.js', array( 'jquery' ), '20150825', true );

	wp_enqueue_script( 'canape-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'canape-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'canape_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Filter the query for menu taxonomy pages
 *
 * @param WP_Query $query
 * @return WP_Query Possibly modified WP_query
 */
function canape_menu_posts( $query = false ) {
	if ( ! is_tax( 'nova_menu' ) || ! is_a ( $query, 'WP_Query' ) || ! $query->is_main_query() ) {
		return;
	}

	$query->set( 'posts_per_page', '999' );
	$query->set( 'orderby', 'menu_order' );
	$query->set( 'order', 'ASC' );
	return;
}
add_action( 'pre_get_posts', 'canape_menu_posts' );

/**
 * Helper function to check for the presence of Jetpack Testimonials
 * Used in functions.php, canape_scripts()
 * @return bool
 */

function canape_has_testimonials() {
	$testimonials = new WP_Query( array(
		'post_type'      => 'jetpack-testimonial',
		'posts_per_page' => 1,
		'no_found_rows'  => true,
	) );

	if ( ! $testimonials->have_posts() ) {
		return false;
	}

	return true;
}



/**
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';
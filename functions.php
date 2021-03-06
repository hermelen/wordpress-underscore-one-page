<?php
/**
 * hermelen-one-page functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hermelen-one-page
 */


// echo(exec("whoami"));

if ( ! function_exists( 'hermelen_one_page_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hermelen_one_page_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hermelen-one-page, use a find and replace
		 * to change 'hermelen-one-page' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hermelen-one-page', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'hermelen-one-page' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hermelen_one_page_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hermelen_one_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hermelen_one_page_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hermelen_one_page_content_width', 640 );
}
add_action( 'after_setup_theme', 'hermelen_one_page_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hermelen_one_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hermelen-one-page' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hermelen-one-page' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hermelen_one_page_widgets_init' );


add_post_type_support( 'page', 'excerpt' );
/**
* Dequeue jquery for !admin and enqueue new jquery scripts.
*/
function my_jquery_enqueue() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', false, null);
  wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
// add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
/**
* Enqueue scripts and styles.
*/
function hermelen_one_page_scripts() {
	// css for slick-slider
	wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
	wp_enqueue_style( 'slick-slider-style', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css');
	wp_enqueue_style( 'slick-slider-theme-style', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css');
	// css for full-calendar style
	wp_enqueue_style( 'full-calendar-style', get_template_directory_uri() . '/node_modules/fullcalendar/dist/fullcalendar.min.css');
	// css hermelen-one-page-style
	wp_enqueue_style( 'hermelen-one-page-style', get_stylesheet_uri() );


	// default underscores scripts
	wp_enqueue_script( 'hermelen-one-page-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'hermelen-one-page-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	// script for slick-slider
	wp_enqueue_script( 'slick-slider-scripts', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', array(), '20181224', true );
	// momentjs for full-calendar
	wp_enqueue_script( 'moment', get_template_directory_uri() . '/node_modules/moment/min/moment.min.js', array(), '20181211', true );
	// script for full-calendar
	wp_enqueue_script( 'full-calendar-scripts', get_template_directory_uri() . '/node_modules/fullcalendar/dist/fullcalendar.min.js', array(), '20181211', true );
	wp_enqueue_script( 'full-calendar-locale-scripts', get_template_directory_uri() . '/node_modules/fullcalendar/dist/locale/fr.js', array(), '20181211', true );
	// custom hermelen scripts
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '20181115', true );
	// facebook scripts
	wp_enqueue_script('facebook', 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2&appId=1590158981073819&autoLogAppEvents=1' , array(), null, true );
	// gmap scripts
	// breadcrumb
	require get_template_directory() . '/theme_config.php';
	wp_enqueue_script('googleapis', esc_url( add_query_arg( 'key', $map_api.'&callback=initMap', '//maps.googleapis.com/maps/api/js' )), array(), null, true );
	wp_enqueue_script( 'gmap-scripts', get_template_directory_uri() . '/js/map.js', array(), '20181115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hermelen_one_page_scripts' );



function add_async_defer_attribute_to_gmap($tag, $handle) {
	if ( 'googleapis' !== $handle )
	return $tag;
	return str_replace( ' src', ' async defer src', $tag );
}
add_filter('script_loader_tag', 'add_async_defer_attribute_to_gmap', 10, 2);

function add_async_defer_attribute_to_fb($tag, $handle) {
	if ( 'facebook' !== $handle )
	return $tag;
	return str_replace( ' src', ' async defer src', $tag );
}
add_filter('script_loader_tag', 'add_async_defer_attribute_to_fb', 10, 2);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

////////////////////////////////////// HERMELEN CUSTOM FUNCTIONS //////////////////////////////////////////
function debug($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}
// custom one page navigation
require get_template_directory() . '/inc/mono-walker.php';
// breadcrumb
require get_template_directory() . '/inc/breadcrumb.php';

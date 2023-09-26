<?php
/**
 * Wesley Donehue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wesley_Donehue
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

include_once( get_template_directory() . '/inc/bootstrap5.php' );
include_once( get_template_directory() . '/inc/helper-functions.php' );
include_once( get_template_directory() . '/inc/cpt-taxonomies.php' );
include_once( get_template_directory() . '/inc/theme-styles.php' );
include_once( get_template_directory() . '/inc/login-page.php' );

//Plugins
include_once( get_template_directory() . '/inc/plugins/slick-slider.php' );
include_once( get_template_directory() . '/inc/plugins/swiper.php' );
include_once( get_template_directory() . '/inc/plugins/lightgallery.php' );
include_once( get_template_directory() . '/inc/plugins/aos-animate.php' );
include_once( get_template_directory() . '/inc/plugins/loadmore.php' );
include_once( get_template_directory() . '/inc/plugins/objectfit-images.php' );


include( get_template_directory() . '/inc/ACF_Field_Unique_ID.php' );

// Initialize functionality to give us unique IDs for repeaters.
PhilipNewcomer\ACF_Unique_ID_Field\ACF_Field_Unique_ID::init();


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wesley_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wesley Donehue, use a find and replace
		* to change 'wesley' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wesley', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-primary'	=> esc_html__( 'Primary', 'wesley' ),
			'menu-footer'	=> esc_html__( 'Footer', 'wesley' ),
			'menu-social'	=> esc_html__( 'Social', 'wesley' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wesley_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wesley_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wesley_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wesley_content_width', 1140 );
}
add_action( 'after_setup_theme', 'wesley_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wesley_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wesley' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wesley' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wesley_widgets_init' );


/**
 * Custom Image Sizes
 */

add_filter( 'image_size_names_choose', 'awesome_custom_image_sizes' );

add_image_size( 'card-image', 800, 450, array( 'center', 'center' ) );// 865 pixels wide by 487 pixels tall, hard proportional crop mode
add_image_size( 'logo-image', 220, 100 );

function awesome_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'card-image' => __( 'Card Image' ),
	) );
}

/**
 * Option Pages
 */
if ( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Footer Modules',
		'menu_title'  => 'Footer Modules',
		'parent_slug' => $parent['menu_slug'],
		'capability'  => 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Login Page',
		'menu_title'  => 'Login Page',
		'parent_slug' => $parent['menu_slug'],
		'capability'  => 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Analytics',
		'menu_title'  => 'Analytics',
		'parent_slug' => $parent['menu_slug'],
		'capability'  => 'edit_posts',
	));
}


/**
 * Enqueue scripts and styles.
 */
function wesley_scripts() {
	wp_enqueue_style( 'wesley-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wesley-style', 'rtl', 'replace' );

	//AddToAny Share Buttons
	wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js' );

	//Font Awesome
	wp_enqueue_script( 'font-awesome-6', 'https://kit.fontawesome.com/ef5186c81a.js' );

	wp_enqueue_script( 'carousel-classes', get_stylesheet_directory_uri() . '/assets/js/carousel-classes-min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts-min.js', array ( 'jquery' ), 1.1, true);

	//Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap' );

	wp_enqueue_style( 'custom-fonts', get_stylesheet_directory_uri() . '/assets/css/fonts.css?v='.time(), array(), false, 'all' );

	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/assets/css/style.css?v='.time(), array(), false, 'all' );
	$theme_styles = awesome_add_theme_css();
	wp_add_inline_style( 'theme-styles', $theme_styles );
}
add_action( 'wp_enqueue_scripts', 'wesley_scripts' );

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
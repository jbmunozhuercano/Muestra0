<?php
/**
 * muestra0 functions and definitions
 *
 * @package muestra0
 */

if ( ! function_exists( 'muestra0_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function muestra0_setup() {
    
        /* This theme styles the visual editor to resemble the theme style */
        $font_url = 'http://fonts.googleapis.com/css?family=Comfortaa:400,300,700|Raleway:500,700,800,400';
        add_editor_style( array('inc/editor-style.css', str_replace( ', ', '%2c', $font_url ) ) );
	
        /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on muestra0, use a find and replace
	 * to change 'muestra0' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'muestra0', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size('large-thumb', 1024, 576, true);
        add_image_size('app-thumb', 604, 207, true);
        add_image_size('index-thumb', 400, 200, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'muestra0' ),
                'social' => esc_html__( 'Social Menu', 'muestra0' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'quote', 'link',
	//) );
        
        add_theme_support( 'post-formats', array('aside') );

	// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'muestra0_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // muestra0_setup
add_action( 'after_setup_theme', 'muestra0_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function muestra0_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'muestra0_content_width', 600 );
}
add_action( 'after_setup_theme', 'muestra0_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function muestra0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'muestra0' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'muestra0' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__('Footer widgets area appears in the footer of the site', 'muestra0'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'muestra0_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function muestra0_scripts() {
	wp_enqueue_style( 'muestra0-style', get_stylesheet_uri() );
        
         if (is_page_template('page-templates/page-nosidebar.php')) {
            wp_enqueue_style( 'muestra0-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
        } else {
            if (is_front_page() ) {
                wp_enqueue_style( 'muestra0-layout-style' , get_template_directory_uri() . '/layouts/masonry-index.css');
                wp_enqueue_script('muestra0-masonry-functions', get_template_directory_uri() . '/js/masonry-functions.js', array('jquery','masonry'), '20150525', true);
            } else {
                wp_enqueue_style( 'muestra0-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
            }
        }
        
        wp_enqueue_style('muestra0-google-fonts', 'http://fonts.googleapis.com/css?family=Comfortaa:400,300,700|Raleway:500,700,800,400');
        
        wp_enqueue_style('muestra0-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        
        wp_enqueue_script('muestra0-js-functions', get_template_directory_uri() . '/js/functions.js', array('jquery','masonry'), '20150520', true);
             
	wp_enqueue_script( 'muestra0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'muestra0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'muestra0_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

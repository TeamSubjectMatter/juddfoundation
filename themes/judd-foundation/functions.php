<?php
/**
 * judd-foundation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package judd-foundation
 */

if ( ! function_exists( 'judd_foundation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function judd_foundation_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on judd-foundation, use a find and replace
	 * to change 'judd-foundation' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'judd-foundation', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'judd-foundation' ),
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
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'judd_foundation_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'judd_foundation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function judd_foundation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'judd_foundation_content_width', 640 );
}
add_action( 'after_setup_theme', 'judd_foundation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function judd_foundation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'judd-foundation' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'judd_foundation_widgets_init' );

add_filter( 'body_class','home_body_class' );
function home_body_class( $classes ) {
 
    if ( is_page_template( 'front-page.php' ) ) {
        $classes[] = 'home';
    }
     
    return $classes;
     
}

/*
* Creating a function to create our Locations custom post type
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Artwork', 'Post Type General Name', 'judd-foundation' ),
		'singular_name'       => _x( 'Artwork', 'Post Type Singular Name', 'judd-foundation' ),
		'menu_name'           => __( 'Artwork', 'judd-foundation' ),
		'parent_item_colon'   => __( 'Parent Locations', 'judd-foundation' ),
		'all_items'           => __( 'All Artwork', 'judd-foundation' ),
		'view_item'           => __( 'View Artwork', 'judd-foundation' ),
		'add_new_item'        => __( 'Add New Artwork', 'judd-foundation' ),
		'add_new'             => __( 'Add New', 'judd-foundation' ),
		'edit_item'           => __( 'Edit Artwork', 'judd-foundation' ),
		'update_item'         => __( 'Update Artwork', 'judd-foundation' ),
		'search_items'        => __( 'Search Artwork', 'judd-foundation' ),
		'not_found'           => __( 'Not Found', 'judd-foundation' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'judd-foundation' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'artwork', 'judd-foundation' ),
		'description'         => __( 'Donald Judd artwork', 'judd-foundation' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies' => array('category',),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'artwork', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

/**
 * Enqueue scripts and styles.
 */
function judd_foundation_scripts() {
	wp_enqueue_style( 'judd-foundation-style', get_stylesheet_uri() );

	wp_enqueue_script( 'judd-foundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'judd-foundation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'judd_foundation_scripts' );

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

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

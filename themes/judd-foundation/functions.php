<?php
/**
 * judd-foundation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package judd-foundation
 */

//deregister default post type -- there are custom post types to help channel content entry
add_action('admin_menu','remove_default_post_type');    
function remove_default_post_type() {  	
	remove_menu_page('edit.php');  
}



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
* Creating a function to create our custom post types
*/

function custom_post_type() {

	/*
	 * Art
	 */
	$args = array(
		'label'               => __( 'art', 'judd-foundation' ),
		'description'         => __( 'Donald Judd\'s Art', 'judd-foundation' ),
		'labels'              => array(
									'name'                => _x( 'Art', 'Post Type General Name', 'judd-foundation' ),
									'singular_name'       => _x( 'Art', 'Post Type Singular Name', 'judd-foundation' ),
									'menu_name'           => __( 'Art', 'judd-foundation' ),
									'parent_item_colon'   => __( 'Parent Locations', 'judd-foundation' ),
									'all_items'           => __( 'All Art', 'judd-foundation' ),
									'view_item'           => __( 'View Art', 'judd-foundation' ),
									'add_new_item'        => __( 'Add New Art', 'judd-foundation' ),
									'add_new'             => __( 'Add New', 'judd-foundation' ),
									'edit_item'           => __( 'Edit Art', 'judd-foundation' ),
									'update_item'         => __( 'Update Art', 'judd-foundation' ),
									'search_items'        => __( 'Search Artw', 'judd-foundation' ),
									'not_found'           => __( 'Not Found', 'judd-foundation' ),
									'not_found_in_trash'  => __( 'Not found in Trash', 'judd-foundation' ),
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies' 		  => array(''	),
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
	
	register_post_type( 'art', $args );


	

	/*
	 * Spaces
	 */
	$args = array(
		'label'               => __( 'spaces', 'judd-foundation' ),
		'description'         => __( 'Donald Judd\'s Spaces', 'judd-foundation' ),
		'labels'              => array(
									'name'                => _x( 'Spaces', 'Post Type General Name', 'judd-foundation' ),
									'singular_name'       => _x( 'Spaces', 'Post Type Singular Name', 'judd-foundation' ),
									'menu_name'           => __( 'Spaces', 'judd-foundation' ),
									'parent_item_colon'   => __( 'Parent Locations', 'judd-foundation' ),
									'all_items'           => __( 'All Spaces', 'judd-foundation' ),
									'view_item'           => __( 'View Spaces', 'judd-foundation' ),
									'add_new_item'        => __( 'Add New Spaces', 'judd-foundation' ),
									'add_new'             => __( 'Add New', 'judd-foundation' ),
									'edit_item'           => __( 'Edit Spaces', 'judd-foundation' ),
									'update_item'         => __( 'Update Spaces', 'judd-foundation' ),
									'search_items'        => __( 'Search Spaces', 'judd-foundation' ),
									'not_found'           => __( 'Not Found', 'judd-foundation' ),
									'not_found_in_trash'  => __( 'Not found in Trash', 'judd-foundation' ),
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies' 		  => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'spaces', $args );

	/*
	 * Programs
	 */
	$args = array(
		'label'               => __( 'programs', 'judd-foundation' ),
		'description'         => __( 'Donald Judd\'s Programs', 'judd-foundation' ),
		'labels'              => array(
									'name'                => _x( 'Programs', 'Post Type General Name', 'judd-foundation' ),
									'singular_name'       => _x( 'Programs', 'Post Type Singular Name', 'judd-foundation' ),
									'menu_name'           => __( 'Programs', 'judd-foundation' ),
									'parent_item_colon'   => __( 'Parent Locations', 'judd-foundation' ),
									'all_items'           => __( 'All Programs', 'judd-foundation' ),
									'view_item'           => __( 'View Programs', 'judd-foundation' ),
									'add_new_item'        => __( 'Add New Programs', 'judd-foundation' ),
									'add_new'             => __( 'Add New', 'judd-foundation' ),
									'edit_item'           => __( 'Edit Programs', 'judd-foundation' ),
									'update_item'         => __( 'Update Programs', 'judd-foundation' ),
									'search_items'        => __( 'Search Programs', 'judd-foundation' ),
									'not_found'           => __( 'Not Found', 'judd-foundation' ),
									'not_found_in_trash'  => __( 'Not found in Trash', 'judd-foundation' ),
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies' 		  => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'programs', $args );

	/*
	 * News
	 */
	$args = array(
		'label'               => __( 'news', 'judd-foundation' ),
		'description'         => __( 'Donald Judd\'s News', 'judd-foundation' ),
		'labels'              => array(
									'name'                => _x( 'News', 'Post Type General Name', 'judd-foundation' ),
									'singular_name'       => _x( 'News', 'Post Type Singular Name', 'judd-foundation' ),
									'menu_name'           => __( 'News', 'judd-foundation' ),
									'parent_item_colon'   => __( 'Parent Locations', 'judd-foundation' ),
									'all_items'           => __( 'All News', 'judd-foundation' ),
									'view_item'           => __( 'Views News', 'judd-foundation' ),
									'add_new_item'        => __( 'Add New News', 'judd-foundation' ),
									'add_new'             => __( 'Add New', 'judd-foundation' ),
									'edit_item'           => __( 'Edit News', 'judd-foundation' ),
									'update_item'         => __( 'Update News', 'judd-foundation' ),
									'search_items'        => __( 'Search News', 'judd-foundation' ),
									'not_found'           => __( 'Not Found', 'judd-foundation' ),
									'not_found_in_trash'  => __( 'Not found in Trash', 'judd-foundation' ),
								),
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies' 		  => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	register_post_type( 'news', $args );

	

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );

function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('art_type', 'art', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Art Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Art Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Art Types' ),
      'all_items' => __( 'All Art Types' ),
      'edit_item' => __( 'Edit Art Type' ),
      'update_item' => __( 'Update Art Type' ),
      'add_new_item' => __( 'Add New Art Type' ),
      'new_item_name' => __( 'New Art Type' ),
      'menu_name' => __( 'Art Types' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'art_type', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));

   register_taxonomy('program_type', 'programs', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Program Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Program Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Program Types' ),
      'all_items' => __( 'All Program Types' ),
      'edit_item' => __( 'Edit Program Type' ),
      'update_item' => __( 'Update Program Type' ),
      'add_new_item' => __( 'Add New Program Type' ),
      'new_item_name' => __( 'New Program Type' ),
      'menu_name' => __( 'Program Types' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'program_type', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));

}
add_action( 'init', 'add_custom_taxonomies', 0 );


/**
 * Enqueue scripts and styles.
 */
function judd_foundation_scripts() {
	wp_enqueue_style( 'judd-foundation-style', get_stylesheet_uri() );
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	
	if(is_page_template( 'page-single-content.php' ) ||
	   is_page_template( 'page-gallery-view-b.php' ) ||
	   is_page_template( 'page-two-column-utility.php' ) ||
	   is_page_template( 'page-section-landing.php') ||
	   is_page_template( 'single-news.php') ||
	   is_page_template( 'single-spaces.php') ||
	   is_page_template( 'single-programs.php')) {
	wp_enqueue_script( 'judd-foundation-slider', get_template_directory_uri() . '/js/jssor.js', array(), '20120206', true );
	wp_enqueue_script( 'judd-foundation-slider-mini', get_template_directory_uri() . '/js/jssor.slider.mini.js', array(), '20120206', true );
	}
	wp_enqueue_script( 'judd-foundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'judd-foundation-isotope', get_template_directory_uri() . '/js/isotope.js', array(), '20120206', true );
	wp_enqueue_script( 'judd-foundation-scripts', get_template_directory_uri() . '/js/script.js', array(), '20120206', true );

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

class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"sub-container\"><ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

function color_a_link() {
	$colors = array('#da7a2d',
					  //'#601900', -- too dark for # button
					  '#c3248a',
					  '#204c8a',
					  '#5e9299',
					  '#2c4636',
					  '#269a7b',
					  '#9e6f32',
					  '#de97a8',
					  '#9f9fa2',
					  '#a6a8aa',
					  //'#57245d', -- too dark for # button
					  );
	return $colors[array_rand($colors, 1)];
}

$random_link_color = color_a_link();

function instagram_homepage_color_link() {
	$colors = array('#da7a2d',
					  '#601900', 
					  '#c3248a',
					  '#204c8a',
					  //'#5e9299', -- too light for # button
					  '#2c4636',
					  '#269a7b',
					  '#9e6f32',
					  //'#de97a8',
					  //'#9f9fa2',
					  //'#a6a8aa',
					  '#57245d', 
					  );
	return $colors[array_rand($colors, 1)];
}


$instagram_homepage_color_link = instagram_homepage_color_link();
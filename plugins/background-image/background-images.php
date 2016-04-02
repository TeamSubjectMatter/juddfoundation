<?php
/*
Plugin Name: Background Images
Plugin URI: http://premium.wpmudev.org/blog
Description: Add background images
Author: Chris Knowles
Version: 1.0
Author URI: http://twitter.com/ChrisKnowles
*/

function custom_background_image() {

    global $post;
    		
	if (is_admin()) return;

	$page_bgimg_url = '';

	$options = get_option( 'bgimg_settings' );
	
	// if front page only
	if ( $options['bgimg_homepage'] ) {
	
		// then only set if the front pgage
		if ( is_front_page() || is_home() ) {
			$page_bgimg_url = get_background_image();
		}
		
	} else {
	
		// make the global the default
		$page_bgimg_url = get_background_image();
	
		// if single and single active
		if ( is_singular() && $options['bgimg_single'] ) {

    		// check to see if the theme supports Featured Images, and one is set
    		if (current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID )) {
            
        		// specify desired image size in place of 'full'
        		$page_bgimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        		$page_bgimg_url = $page_bgimg[0]; // this returns just the URL of the image

    		} 
    		
		}
    	
    	// get background image for a category 
    	if ( is_archive() && $options['bgimg_category'] && function_exists('category_image_src') ) {

    		if ( category_image_src() != '' ) {
    			$page_bgimg_url = category_image_src();
    		}
    	} 
	
	}

	// write out css 
	echo '
	<style type="text/css" id="custom-background-css-override">
        body.custom-background { ' .
        	( $page_bgimg_url == '' ? 'background-image: none;' : 'background: url(' . $page_bgimg_url . ') no-repeat center center fixed;' ) . 
        	( $options['bgimg_fullscreen'] ? '  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;' : '' ) .
        '}
    </style>';

}

add_action('wp_head' , 'custom_background_image' , 9999);

// add theme support for custom-background
function add_cb_support(){

	if ( !current_theme_supports( 'custom-background' ) ) {
		add_theme_support( 'custom-background' );
	}

}

add_action( 'after_setup_theme', 'add_cb_support' );

// Settings
function bgimg_add_admin_menu(  ) { 

	add_submenu_page( 'themes.php', 'Background Images', 'Background Images', 'manage_options', 'background_images', 'background_images_options_page' );

}


function bgimg_settings_exist(  ) { 

	if( false == get_option( 'background_images_settings' ) ) { 

		add_option( 'background_images_settings' );

	}

}


function bgimg_settings_init(  ) { 

	register_setting( 'pluginPage', 'bgimg_settings' );

	add_settings_section(
		'bgimg_pluginPage_section', 
		'', 
		'bgimg_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'bgimg_homepage', 
		__( 'Display background on home page only', 'bgimg' ), 
		'bgimg_homepage_render', 
		'pluginPage', 
		'bgimg_pluginPage_section' 
	);

	add_settings_field( 
		'bgimg_fullscreen', 
		__( 'Make images fullscreen', 'bgimg' ), 
		'bgimg_fullscreen_render', 
		'pluginPage', 
		'bgimg_pluginPage_section' 
	);

	add_settings_field( 
		'bgimg_single', 
		__( 'Use featured image on posts', 'bgimg' ), 
		'bgimg_single_render', 
		'pluginPage', 
		'bgimg_pluginPage_section' 
	);

	add_settings_field( 
		'bgimg_category', 
		__( 'Use featured image on categories (requires WPCustom Category Image plugin)' , 'bgimg' ), 
		'bgimg_category_render', 
		'pluginPage', 
		'bgimg_pluginPage_section' 
	);


}

function bgimg_homepage_render(  ) { 

	$options = get_option( 'bgimg_settings' );
	?>
	<input type='checkbox' name='bgimg_settings[bgimg_homepage]' <?php checked( $options['bgimg_homepage'], 1 ); ?> value='1'>
	<?php

}

function bgimg_fullscreen_render(  ) { 

	$options = get_option( 'bgimg_settings' );
	?>
	<input type='checkbox' name='bgimg_settings[bgimg_fullscreen]' <?php checked( $options['bgimg_fullscreen'], 1 ); ?> value='1'>
	<?php

}


function bgimg_single_render(  ) { 

	$options = get_option( 'bgimg_settings' );
	
	if ( !current_theme_supports( 'post-thumbnails' ) ) {
	
		echo '<p style="color: #ff0000">This theme does not support featured images. This setting has been disabled.</p>';
		echo '<input type="checkbox" name="bgimg_settings[bgimg_single]" value="0" disabled>';

	} else {

		echo '<input type="checkbox" name="bgimg_settings[bgimg_single]"' . checked( $options['bgimg_single'], 1 , false) . ' value="1">';
	
	}

}


function bgimg_category_render(  ) { 

	$options = get_option( 'bgimg_settings' );
	
	if ( !is_plugin_active('wpcustom-category-image/load.php') ) {
	
		echo '<p style="color: #ff0000">The WPCustom Category Images plugin is not active. This setting has been disabled.</p>';
		echo '<input type="checkbox" name="bgimg_settings[bgimg_category]" value="0" disabled>';

	} else {

		echo '<input type="checkbox" name="bgimg_settings[bgimg_category]"' . checked( $options['bgimg_category'], 1 , false) . ' value="1">';
	
	}

}


function bgimg_settings_section_callback(  ) { 

	echo __( '<p>Set your preferences for background images.</p><p>The global background image set in <a href="http://www.test.dev/wp-admin/themes.php?page=custom-background">Background</a> will be used on all pages unless overriden.', 'bgimg' );

}


function background_images_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Background Images</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}

add_action( 'admin_menu', 'bgimg_add_admin_menu' );
add_action( 'admin_init', 'bgimg_settings_init' );

?>
<?php
// Don't uninstall unless you absolutely want to!
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	wp_die( 'WP_UNINSTALL_PLUGIN undefined.' );
}

// Delete all meta data.
delete_post_meta_by_key( '_wpdh_display_header' );
delete_option( 'wpdh_tax_meta' );

foreach ( get_users() as $user ) {
	delete_user_meta( $user->ID, 'wp-display-header' );
}


/* Goodbye! Thank you for having me! */


/* End of file uninstall.php */
/* Location: ./wp-content/plugins/wp-display-header/uninstall.php */
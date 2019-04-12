<?php
/**
 * Plugin Name: WPSE 332513
 * Plugin URI: https://wordpress.stackexchange.com/q/332513/137402
 * Description: A sample plugin which adds <a href="#">my-term-selector.js</a> to the Post edit screen.
 * Version: 20190412.1
 * Author: Sally CJ
 * Author URI:
 * Text Domain: wpse-332513
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_enqueue_scripts', function(){
	if ( ! $screen = get_current_screen() ) {
		return;
	}

	$post_types = [ 'post', 'my_cpt' ];
	if ( in_array( $screen->id, $post_types ) ) {
		// Don't forget that `wp-editor` must be added as a dependency.
		$url = plugin_dir_url( __FILE__ ) . 'js/my-terms-selector.js';
		wp_enqueue_script( 'my-terms-selector', $url, [ 'wp-editor' ] );
	}
} );


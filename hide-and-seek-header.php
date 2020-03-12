<?php 

/*
Plugin Name: Hide and Seek Header
Plugin URI: https://github.com/marklchaves/hide-and-seek-header
Description: Hides the site header on down scroll events. Eventually it will hide the header on scroll up or down or both.
Version: 0.0.1
Author: caught my eye
Author URI: https://caughtmyeye.dev/about/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Define Constants
 */

define( "PLUGIN_NAME", "hide-and-seek-header" );

define( "PLUGIN_VERSION", "0.0.1" );

/**
 * Enqueue Plugin Styles & Scripts
 */
function hideandseek_style_scripts_includer() {
    wp_enqueue_style(
    	PLUGIN_NAME,
        plugin_dir_url( __FILE__ ) . 'css/' . PLUGIN_NAME . '.css',
        array(), 
        PLUGIN_VERSION, 
        'all'
    );

    wp_enqueue_script( 
        PLUGIN_NAME, 
        plugin_dir_url( __FILE__ ) . 'js/' . PLUGIN_NAME . '.js',
        array(), 
        PLUGIN_VERSION, 
        true // Means put this script in the footer.
    );

}
add_action( 'wp_enqueue_scripts', 'hideandseek_style_scripts_includer' );
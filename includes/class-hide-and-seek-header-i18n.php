<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/includes
 * @author     caught my eye <mark@marklchaves.com>
 */
class Hide_And_Seek_Header_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hide-and-seek-header',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/public
 * @author     caught my eye <mark@marklchaves.com>
 */
class Hide_And_Seek_Header_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name . '-main', plugin_dir_url( __FILE__ ) . 'css/hide-and-seek-header-public-main.css', array(), $this->version, 'all' );

        // Grab all options
        $options = get_option($this->plugin_name);

		// Depending on the option, load the required CSS.

		$breakpoint_opts = 
			(empty($options['breakpoint'])) ? 'all' : 'mdlg';	

		$animation_opts = 
			(empty($options['animation'])) ? '' : '-a';	

		$css_opts = $breakpoint_opts . $animation_opts;

		wp_enqueue_style( $this->plugin_name . '-' . $css_opts, plugin_dir_url( __FILE__ ) . 'css/hide-and-seek-header-public-' . $css_opts . '.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
	
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hide-and-seek-header-public.js', '', $this->version, true ); // Put in the footer ~mlc

        // Grab all options
        $options = get_option($this->plugin_name);

		$landing_mode = 
			(empty($options['landing'])) ? 0 : $options['landing'];	
		
		$sensi_setting = 
			(empty($options['sensitivity'])) ? 0 : $options['sensitivity'];	

		// Localize the script with new data	
		$headerArgs = array(
			'landing_mode' => $landing_mode,
			'sensi_setting' => $sensi_setting,
			$this->plugin_name
		);
		wp_localize_script( $this->plugin_name, 'php_vars', $headerArgs );

		wp_enqueue_script( $this->plugin_name );

	}

}

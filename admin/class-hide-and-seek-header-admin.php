<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://caughtmyeye.cc
 * @since      1.0.0
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hide_And_Seek_Header
 * @subpackage Hide_And_Seek_Header/admin
 * @author     caught my eye <mark@marklchaves.com>
 */
class Hide_And_Seek_Header_Admin
{

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/hide-and-seek-header-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/hide-and-seek-header-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 27 March 2020
	 */

	public function add_plugin_admin_menu()
	{
		add_options_page('Hide and Seek Header Option Settings', 'Hide and Seek Header', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 27 Mar 2020
	 */

	public function add_action_links($links)
	{
		$settings_link = array(
			'<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge($settings_link, $links);
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.0.0
	 * 
	 * ~mlc 27 Mar 2020
	 */

	public function display_plugin_setup_page()
	{
		include_once('partials/hide-and-seek-header-admin-display.php');
	}

	// ~mlc 27 Mar 2020
	public function validate($input)
	{
		// All inputs        
		$valid = array();

		// Hide and Seek Mobile Breakpoint
		$valid['breakpoint'] = (isset($input['breakpoint']) && !empty($input['breakpoint'])) ?  1 : 0;

		// Hide and Seek Mobile Animation
		$valid['animation'] = (isset($input['animation']) && !empty($input['animation'])) ?  1 : 0;

		// Hide and Seek Mobile Landing Page Mode
		$valid['landing'] = (isset($input['landing']) && !empty($input['landing'])) ?  1 : 0;

		// Hide and Seek Scroll Up Sensitivity Setting
		$valid['sensitivity'] = (isset($input['sensitivity']) && !empty($input['sensitivity'])) ?  1 : 0;

		return $valid;
	}

	// ~mlc 27 Mar 2020
	public function options_update()
	{
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
}

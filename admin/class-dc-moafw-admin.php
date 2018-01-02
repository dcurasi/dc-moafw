<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/admin
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Moafw_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dc_Moafw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dc_Moafw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dc-moafw-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dc_Moafw_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dc_Moafw_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dc-moafw-admin.js', array( 'jquery' ), $this->version, false );

	}

	//inizializzazione menu di amministrazione
	function add_menu_page()
	{
	    add_submenu_page('woocommerce','Minimum Order', 'Minimum Order', 'manage_options', 'dc-moafw-menu-page', array( $this,'create_admin_interface' ));
	}

	/**
	 * Callback function for the admin settings page.
	 *
	 * @since    1.0.0
	 */
	public function create_admin_interface(){

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/dc-moafw-admin-display.php';

	}

	/**
	 * Creates our settings sections with fields etc.
	 *
	 * @since    1.3.0
	 */
	public function settings_api_init(){
		register_setting('dc_moafw_options_group', 'dc_moafw_activate');
	    register_setting('dc_moafw_options_group', 'dc_moafw_minimum');
	    register_setting('dc_moafw_options_group', 'dc_moafw_message');
	    register_setting('dc_moafw_options_group', 'dc_moafw_current_total_text');
	    register_setting('dc_moafw_options_group', 'dc_moafw_currency_display_type');
	    register_setting('dc_moafw_options_group', 'dc_moafw_message_shop');
	}


	/**
	 * error_notice
	 *
	 * @since    1.1.0
	 */
	public function error_notice() {
		echo '<div class="notice notice-error is-dismissible">
        		<p>'.__('Minimum Order Amount for Woocommerce is active but does not work. You need to install WooCommerce because the plugin is working properly.', 'dc-moafw').'</p>
    		  </div>';
	}

	/**
	 * register string in polylang
	 *
	 * @since    1.2.0
	 */
	public function dc_moafw_register_string_polylang() {
		if (function_exists('pll_register_string')) {
			pll_register_string('message', get_option('dc_moafw_message'), 'dc-moafw');
			pll_register_string('current_total_text', get_option('dc_moafw_current_total_text'), 'dc-moafw');
		}
	}

}

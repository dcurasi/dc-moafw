<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/public
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Moafw_Public {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dc-moafw-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dc-moafw-public.js', array( 'jquery' ), $this->version, false );

	}

	// Set a minimum dollar amount per order
	public function dc_moafw_set_minimum_order() {
	    // Only run in the Cart or Checkout pages
	    if( is_cart() || is_checkout() ) {
	        global $woocommerce;
	 
	        // Set minimum cart total
	        $minimum_cart_total = get_option('dc_moafw_minimum');
	        $message = str_replace('[minimum]', '%s %s', get_option('dc_moafw_message'));
	        $current_cart_text = str_replace('[current]', '%s %s', get_option('dc_moafw_current_total_text'));
	        
	        // Total we are going to be using for the Math
	        // This is before taxes and shipping charges
	        $total = round(WC()->cart->subtotal, 2);
	                                
	        // Compare values and add an error is Cart's total
	        // happens to be less than the minimum required before checking out.
	        // Will display a message along the lines of
	        // A Minimum of 10 USD is required before checking out. (Cont. below)
	        // Current cart total: 6 USD 
	        if( $total < $minimum_cart_total  ) {
	            // Display our error message

	            wc_add_notice( sprintf( '<strong>'.$message.'</strong>'
	                .'<br />'.$current_cart_text,
	                $minimum_cart_total,
	                get_option( 'woocommerce_currency'),
	                $total,
	                get_option( 'woocommerce_currency') ),
	            'error' );
	            
	        }
	    }
	}

}

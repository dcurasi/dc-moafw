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

	/**
	 * Set a minimum dollar amount per order
	 *
	 * @since    1.3.1
	 */
	public function dc_moafw_set_minimum_order() {
        global $woocommerce;
        if ( in_array( 'woocommerce-product-price-based-on-countries/woocommerce-product-price-based-on-countries.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        	$wcpbc_values = new WCPBC_Customer();
        }
        else {
        	$wcpbc_values = null;
        }
 		$wcpbc_currency_active = $this->dc_moafw_wcpbc_currency_is_active($wcpbc_values);

    	$message = $this->dc_moafw_get_message();
    	$current_cart_text = $this->dc_moafw_get_current_cart_text();
		$decimal_separator = wc_get_price_decimal_separator();
		$thousand_separator = wc_get_price_thousand_separator();
		$num_decimals = wc_get_price_decimals();

        // Total we are going to be using for the Math
        // This is before taxes and shipping charges
        $total = round(WC()->cart->subtotal, $num_decimals);
        //print_r(WC()->cart->subtotal_ex_tax);
        if( (is_cart() || is_checkout()) && $total) {
		    if($wcpbc_currency_active) {
		        // Set minimum cart total
		        $minimum_cart_total = get_option('dc_moafw_minimum') * $wcpbc_values->exchange_rate;

		        if( $total < $minimum_cart_total  ) {
		            // Display our error message
		            wc_add_notice( sprintf( '<strong>'.$message.'</strong>'
		                .'<br />'.$current_cart_text,
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($minimum_cart_total, $num_decimals, $decimal_separator, $thousand_separator),
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($total, $num_decimals, $decimal_separator, $thousand_separator) ),
		            'error' );
		        }
		    }
		    else {
		    	// Set minimum cart total
		        $minimum_cart_total = get_option('dc_moafw_minimum');

		        if( $total < $minimum_cart_total  ) {
		            // Display our error message
		            wc_add_notice( sprintf( '<strong>'.$message.'</strong>'
		                .'<br />'.$current_cart_text,
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($minimum_cart_total, $num_decimals, $decimal_separator, $thousand_separator),
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($total, $num_decimals, $decimal_separator, $thousand_separator) ),
		            'error' );
		        }
		    }
		}
		elseif(get_option( 'dc_moafw_message_shop' ) && $total) {
			if($wcpbc_currency_active) {
		        // Set minimum cart total
		        $minimum_cart_total = get_option('dc_moafw_minimum') * $wcpbc_values->exchange_rate;

		        if( $total < $minimum_cart_total  ) {
		            // Display our error message
		            wc_add_notice( sprintf( '<strong>'.$message.'</strong>',
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($minimum_cart_total, $num_decimals, $decimal_separator, $thousand_separator) ),
		            'error' );
		        }
		    }
		    else {
		    	// Set minimum cart total
		        $minimum_cart_total = get_option('dc_moafw_minimum');

		        if( $total < $minimum_cart_total  ) {
		            // Display our error message
		            wc_add_notice( sprintf( '<strong>'.$message.'</strong>',
		                $this->dc_moafw_get_currency_display_type($wcpbc_values),
		                number_format($minimum_cart_total, $num_decimals, $decimal_separator, $thousand_separator) ),
		            'error' );
		        }
		    }
		}
	}

	/**
	 * Check if woocommerce-product-price-based-on-countries is active and have a currency
	 *
	 * @since    1.3.0
	 */
	public function dc_moafw_wcpbc_currency_is_active($wcpbc_values) {
		if ( in_array( 'woocommerce-product-price-based-on-countries/woocommerce-product-price-based-on-countries.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	        if ( $wcpbc_values->zone_id ) {
	        	return true;
	        }

	        return false;
	    }

	    return false;
	}

	/**
	 * Get a currency display type
	 *
	 * @since    1.3.0
	 */
	public function dc_moafw_get_currency_display_type($wcpbc_values) {
		if(get_option('dc_moafw_currency_display_type') != "symbol") {
			if($this->dc_moafw_wcpbc_currency_is_active($wcpbc_values)) {
				return $wcpbc_values->currency;
			}

			return get_option( 'woocommerce_currency');
		}

		return get_woocommerce_currency_symbol();
	}

	/**
	 * Get a message
	 *
	 * @since    1.5.0
	 */
	public function dc_moafw_get_message() {
		$price_format = get_woocommerce_price_format();
		if ( ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || in_array( 'polylang-pro/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) && function_exists('pll__') ) {
        	return str_replace('[minimum]', $price_format, pll__(get_option('dc_moafw_message')));

        }

        return str_replace('[minimum]', $price_format, get_option('dc_moafw_message'));
	}

	/**
	 * Get a current cart text
	 *
	 * @since    1.5.0
	 */
	public function dc_moafw_get_current_cart_text() {
		$price_format = str_replace(array('1', '2'), array('3', '4'), get_woocommerce_price_format());
		if ( ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || in_array( 'polylang-pro/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) && function_exists('pll__') ) {
        	return str_replace('[current]', $price_format, pll__(get_option('dc_moafw_current_total_text')));
        }
        	return str_replace('[current]', $price_format, get_option('dc_moafw_current_total_text'));
	}

}

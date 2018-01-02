<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/dcurasi
 * @since      1.0.0
 *
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Dc_Moafw
 * @subpackage Dc_Moafw/includes
 * @author     Dario Curasì <curasi.d87@gmail.com>
 */
class Dc_Moafw_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.3.0
	 */
	public static function activate() {
		add_option('dc_moafw_activate', 1);
		add_option('dc_moafw_minimum', 50);
		add_option('dc_moafw_message', __('A Minimum of [minimum] is required before checking out.', 'dc-moafw'));
		add_option('dc_moafw_current_total_text', __("Current cart's total: [current]", 'dc-moafw'));
		add_option('dc_moafw_currency_display_type', "text");
		add_option('dc_moafw_message_shop', 0);
	}

}

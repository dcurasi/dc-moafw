<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/dcurasi
 * @since             1.5.0
 * @package           Dc_Moafw
 *
 * @wordpress-plugin
 * Plugin Name:       Minimum Order Amount for Woocommerce
 * Plugin URI:        https://github.com/dcurasi/dc-moafw
 * Description:       Minimum Order Amount for Woocommerce allows you to set easily and fast a minimum amount for the woocommerce orders.
 * Version:           1.5.0
 * Author:            Dario Curasì
 * Author URI:        https://github.com/dcurasi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dc-moafw
 * Domain Path:       /languages
 * WC requires at least: 2.1.0
 * WC tested up to: 3.5.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dc-moafw-activator.php
 */
function activate_dc_moafw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dc-moafw-activator.php';
	Dc_Moafw_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dc-moafw-deactivator.php
 */
function deactivate_dc_moafw() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dc-moafw-deactivator.php';
	Dc_Moafw_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dc_moafw' );
register_deactivation_hook( __FILE__, 'deactivate_dc_moafw' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dc-moafw.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dc_moafw() {

	$plugin = new Dc_Moafw();
	$plugin->run();

}
run_dc_moafw();

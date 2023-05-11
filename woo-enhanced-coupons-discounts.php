<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpenhanced.com
 * @since             1.0.0
 * @package           Woo_Enhanced_Coupons_Discounts
 *
 * @wordpress-plugin
 * Plugin Name:       Woo Enhanced Coupons & Discounts
 * Plugin URI:        https://wpenhanced.com/woo-enhanced-coupons-discounts
 * Description:       This plugin provides advanced and customizable discount management for WooCommerce stores.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        https://wpenhanced.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-enhanced-coupons-discounts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Currently plugin version. Start at version 1.0.0 and use SemVer - https://semver.org
// Rename this for your plugin and update it as you release new versions.
define( 'WOO_ENHANCED_COUPONS_DISCOUNTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-enhanced-coupons-discounts-activator.php
 */
function activate_woo_enhanced_coupons_discounts() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-enhanced-coupons-discounts-activator.php';
    Woo_Enhanced_Coupons_Discounts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-enhanced-coupons-discounts-deactivator.php
 */
function deactivate_woo_enhanced_coupons_discounts() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-enhanced-coupons-discounts-deactivator.php';
    Woo_Enhanced_Coupons_Discounts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woo_enhanced_coupons_discounts' );
register_deactivation_hook( __FILE__, 'deactivate_woo_enhanced_coupons_discounts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-enhanced-coupons-discounts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_enhanced_coupons_discounts() {

    $plugin = new Woo_Enhanced_Coupons_Discounts();
    $plugin->run();

}

run_woo_enhanced_coupons_discounts();

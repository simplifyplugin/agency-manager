<?php
/**
 * Plugin Name:     Agency Manager
 * Plugin URI:      https://plugins.wp-cli.org/demo-plugin
 * Description:     Manager Agency by REST API & show on marker
 * Author:          Vasim Shaikh
 * Author URI:      https://wp-cli.org
 * Text Domain:     wpcli-demo-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wpcli_Demo_Plugin
 */

// Your code starts here.


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define Plugin Constants
define('AGENCY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AGENCY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AGENCY_PLUGIN_VERSION', '1.0');
define('AGENCY_GOOGLE_MAPS_API_KEY', 'YOUR_GOOGLE_MAPS_API_KEY');


require_once plugin_dir_path( __FILE__ ).'admin/cpt-agency.php';
require_once plugin_dir_path( __FILE__ ).'admin/api-agency.php';
require_once plugin_dir_path( __FILE__ ).'admin/helpers-agency.php';
require_once plugin_dir_path( __FILE__ ).'admin/metabox-agency.php';
require_once plugin_dir_path( __FILE__ ).'admin/userrole-agency.php';

// public

require_once plugin_dir_path( __FILE__ ).'public/map-agency.php';


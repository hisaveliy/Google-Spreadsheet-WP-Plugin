<?php
/**
 * Plugin Name:       Google Spreadseet WP Plugin
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       Created to relieve working with Google Spreadsheet API
 * Version:           0.0.1
 * Author:            Saveliy D.
 * Author URI:        https://github.com/hisaveliy
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gs-wp
 * Domain Path:       /languages
 */

namespace GoogleSpreadsheetWP;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// The class that contains the plugin info.
require_once plugin_dir_path(__FILE__) . 'includes/class-info.php';

/**
 * The code that runs during plugin activation.
 */
function activation() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-activator.php';
    Activator::activate();
}
register_activation_hook(__FILE__, __NAMESPACE__ . '\\activation');

/**
 * Check for updates.
 */
require_once plugin_dir_path(__FILE__) . 'includes/vendor/plugin-update-checker/plugin-update-checker.php';
$plugin_slug = Info::SLUG;
$update_url  = Info::UPDATE_URL;
$myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
    $update_url . '?action=get_metadata&slug=' . $plugin_slug,
    __FILE__,
    $plugin_slug
);

/**
 * Run the plugin.
 */
function run() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-plugin.php';
    $plugin = new Plugin();
    $plugin->run();
}
run();

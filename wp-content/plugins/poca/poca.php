<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/ambikeshkumargautam-cedcoss
 * @since             1.0.0
 * @package           Poca
 *
 * @wordpress-plugin
 * Plugin Name:       Poca
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/wp-content/plugins/poca
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ambikesh kumar Gautam
 * Author URI:        https://github.com/ambikeshkumargautam-cedcoss
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       poca
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POCA_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-poca-activator.php
 */
function activate_poca() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-poca-activator.php';
	Poca_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-poca-deactivator.php
 */
function deactivate_poca() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-poca-deactivator.php';
	Poca_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_poca' );
register_deactivation_hook( __FILE__, 'deactivate_poca' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-poca.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_poca() {

	$plugin = new Poca();
	$plugin->run();

}
run_poca();

/**
 * Including custom post type Podcast
 */
require plugin_dir_path( __FILE__ ) . 'includes/custom-post-podcast.php';

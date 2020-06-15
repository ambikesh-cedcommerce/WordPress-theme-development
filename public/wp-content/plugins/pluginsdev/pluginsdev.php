<?php
/**
 * Myplugins-dev
 *
 * @package           Pluginsdev
 * @author            Ambikesh kumar Gautam
 * @copyright         2020 Cedcoss PVT LKO
 * @license           GPL-2.0-or-later
 */

/**
 * Myplugins-dev
 *
 * @wordpress-plugin
 * Plugin Name:       Pluginsdev
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/public/wp-content/plugins/pluginsdev
 * Description:       This Plugins is about making our own plugins in WordPress.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Ambikesh Kumar Gautam
 * Author URI:        https://github.com/ambikeshkumargautam-cedcoss
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'PLUGINSDEV_VERSION', '1.0.0' );
/**
 * The will activate a plugins and enable new custom post in the WP_Admin .
 * This action is documented in includes/class-pluginsdev-activator.php
 */
function activate_pluginsdev() {
	/**
	 * Register the "Music" custom post type .
	 */
	function wporg_custom_post_type() {
		register_post_type(
			'wporg_product',
			array(
				'labels'      => array(
					'name'          => __( 'sdfsddf', 'textdomain' ),
					'singular_name' => __( 'asdfsddffd', 'textdomain' ),
				),
				'public'      => true,
				'has_archive' => true,
				'rewrite'     => array( 'slug' => 'products' ), // my custom slug .
			)
		);
	}

}

/**
 * This function will deactivate this pluginsdev .
 * This action is documented in includes/class-pluginsdev-deactivator.php.
 */
function deactivate_pluginsdev() {
			// Unregister the post type  , so the rules are no  longer in memory .
			unregister_post_type( 'Products' );
			// Clear the permalinks to remove our post type's rule from the database .
			flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'activate_pluginsdev' ); // This will activate this function which we want to activate in the plugins functionality.
register_deactivation_hook( __FILE__, 'deactivate_pluginsdev' ); // This will deactivate all the custom post or feature which we want to remove after the deactivation of the plugins .

/**
 * The core  pluginsdev class that is used to defive internationalization ,
 * admin-specific hooks , and public-facing site hooks.
 */

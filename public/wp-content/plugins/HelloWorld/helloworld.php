<?php
/**
 * HelloWorld
 *
 * @package           HelloWorld
 * @author            Ambikesh kumar Gautam
 * @copyright         2020 Cedcoss PVT LKO
 * @license           GPL-2.0-or-later
 */

/**
 * HelloWorld
 *
 * @wordpress-plugin
 * Plugin Name:       HelloWorld
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/public/wp-content/plugins/pluginsdev
 * Description:       This Plugins is about making our own plugins in WordPress.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Ambikesh Kumar Gautam
 * Author URI:        https://github.com/ambikeshkumargautam-cedcoss
 * Text Domain:       HelloWorld
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
 * Activate the plugin.
 */
function pluginprefix_activate() {
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
	add_option( 'installed_on', current_datetime() );
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
	// For deactivate Plugins .
	delete_option( 'installed_on' );
}

register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );
// Uninstall Plugin .
register_uninstall_hook( __FILE__, 'pluginprefix_function_to_run' );

/**
 * Filter Hook for content of blogposts(single posts) .
 *
 * @param string $content .
 */
function filter_the_content_in_the_main_loop( $content ) {
	// Check if we're  in a single Post.
	if ( is_single() ) {
		$content = '<div style="color:black; background-color:#28a8a2;">'. $content . '</div><a href="https://twitter.com/login/error?redirect_after_login=%2F" class="fa fa-twitter">Twitter</a>';

		echo esc_html( str_word_count( $content ) );
		return $content;
	}

			return $content; // Returning all content.
}
// Add filter for content .
add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );
